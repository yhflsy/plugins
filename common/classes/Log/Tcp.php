<?php

class Log_Tcp extends Log_Writer {

    protected $fp;
    protected $uri;
    protected $timeout;
    private $_attached;

    private static $_instance;

    private function __construct($host, $port, $timeout) {
        $this->config($host, $port, $timeout);
    }

    public static function getInstance($host = '172.17.2.10', $port = 9030, $timeout = 1) {
        if (self::$_instance === null) {
            self::$_instance = new self($host, $port, $timeout);
        }

        return self::$_instance;
    }

    public function config($host, $port, $timeout) {
        $this->uri = sprintf("tcp://%s:%d", $host, $port);
        $this->timeout = max(1, (int) $timeout);
    }

    public function selfAttach() {
        if ($this->_attached) {
            return ;
        }

        Kohana::$log->attach(self::getInstance());
        $this->_attached = true;
    }

    public function selfDetach() {
        if (! $this->_attached) {
            return ;
        }

        Kohana::$log->detach(self::getInstance());
        $this->_attached = false;
    }

    /**
     * Write an array of messages.
     *
     *     $writer->write($messages);
     *
     * @param   array $messages
     * @return  void
     */
    public function write(array $messages) {
        $fp = $this->getFp();

        if (! $fp) return;

        foreach ($messages as $message) {
            @fwrite($fp, $this->buildMessage($message));
        }
    }

    protected function getFp() {
        if ($this->fp === null) {
            if (! $this->fp = @stream_socket_client($this->uri, $errno, $errstr, $this->timeout)) {
                $this->fp = false;
            }
        }

        return $this->fp;
    }

    protected function packMessage(& $message) {
        $length = strlen($message);
        $message = pack('N', $length) . $message;
        return $length + 4;
    }

    protected function buildMessage($message) {
        $result = array(
            'cmd' => 'publish',
            'time' => $message['time'],
            'client' => $_COOKIE['_apilog'],
        );

        if (is_array($message['body'])) {
            $result['content'] = $message['body'];
        } else {
            $result['content']['body'] = $message['body'];
        }

        if ($message['file']) {
            $result['content']['file'] = sprintf("%s:%d", $message['file'], $message['line']);
        }

        if ($message['additional']['trace']) {
            $result['content']['trace'] = $message['additional']['trace'];
        }

        if (array_key_exists('channel', $message['additional'])) {
            $result['channel'] = $message['additional']['channel'];
        } else {
            $result['channel'] = $this->_log_levels[$message['level']];
        }

        $result = json_encode($result);

        $this->packMessage($result);
        return $result;
    }
}