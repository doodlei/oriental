<?php
/**
 * Construction Whole Framework
 * @author Samrat Khan <skydotint@gmail.com>
 * @name Bootstrap.php
 * @version 0.1
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @package Bootstrap
 */
class Bootstrap {
    function __construct() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        if (empty($url[0])) {
            require GOVERNOR . DS . 'index.php';
            $governor = new Index();
            return FALSE;
        }
        $file = GOVERNOR . DS . $url[0] . '.php';
        if (file_exists($file)) {
            require $file;
        } else {
            require GOVERNOR . DS . 'error.php';
            $governor = new Error();
            return FALSE;
        }

        $governor = new $url[0];

        if (isset($url[2])) {
            $governor->{$url[2]}($url[2]);
        } else {
            if (isset($url[1])) {
                $governor->{$url[1]}();
            }
        }
    }

}
