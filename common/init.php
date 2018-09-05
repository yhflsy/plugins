<?php
// Kohana::$environment = Kohana::DEVELOPMENT;
switch (Kohana::$environment) {
    case Kohana::PRODUCTION: // 生产
        defined('DOMAIN_HT')       or define('DOMAIN_HT',       'www.happytoo.cn');
        defined('DOMAIN_CY')       or define('DOMAIN_CY',       'www.tripb2b.com');
        defined('DOMAIN_MC')       or define('DOMAIN_MC',       'www.mconline.com.cn');
        defined('DOMAIN_SERVICE')  or define('DOMAIN_SERVICE',  'tripb2b.com');
        defined('DOMAIN_STATIC')   or define('DOMAIN_STATIC',   'static.tripb2b.com');
        defined('DOMAIN_PASSPORT') or define('DOMAIN_PASSPORT', 'passport.tripb2b.com');
        break;
    case Kohana::STAGING:  // pre
        defined('DOMAIN_HT')       or define('DOMAIN_HT',       'pre.ht.tripb2b.com');
        defined('DOMAIN_CY')       or define('DOMAIN_CY',       'pre.cy.tripb2b.com');
        defined('DOMAIN_MC')       or define('DOMAIN_MC',       'pre.mc.tripb2b.com');
        defined('DOMAIN_SERVICE')  or define('DOMAIN_SERVICE',  'pre.tripb2b.com');
        defined('DOMAIN_STATIC')   or define('DOMAIN_STATIC',   'pre.static.tripb2b.com');
        defined('DOMAIN_PASSPORT') or define('DOMAIN_PASSPORT', 'pre.passport.tripb2b.com');
        break;
    case Kohana::TESTING: // test
        defined('DOMAIN_HT')       or define('DOMAIN_HT',       'test.ht.etu6.org');
        defined('DOMAIN_CY')       or define('DOMAIN_CY',       'test.cy.etu6.org');
        defined('DOMAIN_MC')       or define('DOMAIN_MC',       'test.mc.etu6.org');
        defined('DOMAIN_SERVICE')  or define('DOMAIN_SERVICE',  'test.etu6.org');
        defined('DOMAIN_STATIC')   or define('DOMAIN_STATIC',   'static.etu6.org');
        defined('DOMAIN_PASSPORT') or define('DOMAIN_PASSPORT', 'test.passport.etu6.org');
        break;
    case Kohana::DEVELOPMENT: // dev
        defined('DOMAIN_HT')       or define('DOMAIN_HT',       'ht.d.etu6.org');
        defined('DOMAIN_CY')       or define('DOMAIN_CY',       'cy.d.etu6.org');
        defined('DOMAIN_MC')       or define('DOMAIN_MC',       'mc.d.etu6.org');
        defined('DOMAIN_SERVICE')  or define('DOMAIN_SERVICE',  'd.etu6.org');
        defined('DOMAIN_STATIC')   or define('DOMAIN_STATIC',   'static.d.etu6.org');
        defined('DOMAIN_PASSPORT') or define('DOMAIN_PASSPORT', 'test.passport.etu6.org');
        break;
}

if (array_key_exists('__env', $_REQUEST)) {
    echo '<pre style="display: block; width: 600px; margin: 5px auto;">';
    $constants = get_defined_constants(true);
    $tpl = "<strong>%s</strong>: %s \n";
    array_walk($constants['user'], function($value, $key) use ($tpl) {
        if (strpos($key, 'DOMAIN_') === 0)
            printf($tpl, $key, $value);
    });
    printf($tpl, "ENV", Kohana::$environment);
    printf($tpl, "APP_DEBUG", APP_DEBUG);
    echo '</pre>';
    phpinfo();
    exit;
}