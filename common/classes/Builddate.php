<?php

class Builddate {

    private $year;
    private $month;
    private $day_week;
    public $data;
    public $res;

    function __construct() {
        
    }

    private function xianDate() {
        if ($this->type) {
            $this->res.= '<table border="0" cellpadding="0" cellspacing="0" monthnum="5" class="tbldate fr">';
        } else {
            $this->res.= '<table border="0" cellpadding="0" cellspacing="0" monthnum="5" class="tbldate fl">';
        }

        $this->res.= '<tbody><tr class="none">';
        $this->res.= '<th colspan="2" valign="top">';
        if ($this->type) {
            $this->res.= '<span class ="change" data-type=1 data-time ="'.$this->aftermonth($this->month,$this->year).'">下个月';
        } else {
           $this->res.= '<span class ="change" data-type=0 data-time ="'.$this->nextmonth($this->month,$this->year).'">上个月';
        }
        $this->res.= '</span></th>';
        $this->res.= '<th colspan="5" valign="top">' . $this->year . "年" . $this->month . "月</th>";
        $this->res.= "</tr>";
    }

    private function weeks() {
        $weeks = array("日", "一", "二", "三", "四", "五", "六");
        $this->res.= '<tr class="none">';
        foreach ($weeks as $value) {
            $this->res.= '<th width="100">' . $value . '</th>';
        }
        $this->res.= '</tr>';
    }

    private function days() {
        $this->res.= '<tr align="left" valign="top" class="none">';

        for ($i = 0; $i < $this->day_week; $i++) {
            $this->res.= '<td class="none">&nbsp;</td>';
        }
        for ($j = 1; $j <= date("t", strtotime($this->year . $this->month . '01')); $j++) {
            $i++;

            if ($this->data[$this->tool($j)]) {
                if ($i % 7 == 0 || $i % 7 == 1) {
                    $this->res.= '<td class="none weeked"><a href="line.details.html?linedateid='.$this->data[$this->tool($j)]['linedateid'].'">' . $j . '<span class="pri">' . $this->data[$this->tool($j)]['adultpricemarket'] . '元</span><em class="num">名额:' . $this->data[$this->tool($j)]['lperson'] . '</em></a></td>';
                } else {
                    $this->res.= '<td class="none"><a href="line.details.html?linedateid='.$this->data[$this->tool($j)]['linedateid'].'">' . $j . '<span class="pri">' . $this->data[$this->tool($j)]['adultpricemarket'] . '元</span><em class="num">名额:' . $this->data[$this->tool($j)]['lperson'] . '</em></a></td>';
                }
            } else {
                if ($i % 7 == 0 || $i % 7 == 1) {
                    $this->res.= '<td id="' . $this->tool($j) . '" class="none weeked">' . $j . '</td>';
                } else {
                    $this->res.= '<td id="' . $this->tool($j) . '" class="none">' . $j . '</td>';
                }
            }
            if ($i % 7 == 0) {
                $this->res.= "</tr>";
            }
        }
        while ($i % 7 != 0) {
            $this->res.= '<td class="none">&nbsp;</td>';
            $i++;
        }
    }

    private function tool($num) {
        return date('Ymd', strtotime($this->year . '-' . $this->month . '-' . $num));
    }

    private function formatdata($data) {
        foreach ($data as $k => $v) {
            $result[date('Ymd', $v['gotime'])]['adultpricemarket'] = $v['adultpricemarket'];
            $result[date('Ymd', $v['gotime'])]['lperson'] = $v['person'] - $v['personorder'];
            $result[date('Ymd', $v['gotime'])]['linedateid'] = $v['id'];
        }
        return $result;
    }

    private function nextmonth($month, $year) {
        if ($month == 1) {
            $year--;
            $month = 12;
        } else {
            $month--;
        }
        return $year.','.$this->formatnum($month);
    }

    private function aftermonth($month, $year) {
        if ($month == 12) {
            $year++;
            $month = 1;
        } else {
            $month++;
        }
        return $year.','.$this->formatnum($month);
    }
    
    //格式化数字
    private function formatnum($num){
        $num = (int)$num;
        if(0<=$num &&$num<10){
            return '0'.$num;
        }else {
            return $num;
        }
    }

    public function out($year = '', $month = '', $data = '', $type = 0) {
        $this->res = '';
        if (!($month && $year && $data)) {
            return 'year  month 或 data为空';
        }

        $this->data = $this->formatdata($data);
//        print_R($this->data); exit;
        $this->type = $type;
        $this->year = $this->formatnum($year);
        $this->month = $this->formatnum($month);
        $this->day_week = date("w", strtotime($this->year . $this->month . '01'));


        $this->xianDate();
        $this->weeks();
        $this->days();
        $this->res.= '</table>';
        return $this->res;
    }

}

