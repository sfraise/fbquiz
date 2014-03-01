<?php
// SANITIZE FUNCTION (NORMALLY I WOULD MAKE THIS IT'S OWN CLASS BUT NO NEED HERE)
function escape($string) {
    return htmlentities($string);
}

class Input {
    // MAKE THE CLASS WORK WITH EITHER POST OR GET
    public static function exists($type = 'post') {
        switch($type) {
            case 'post':
                return (!empty($_POST)) ? true : false;
                break;
            case 'get':
                return (!empty($_GET)) ? true: false;
                break;
            default:
                return false;
                break;
        }
    }

    // GET THE VALUE AND SANITIZE IT
    public static function get($item) {
        if(isset($_POST[$item])) {
            return escape($_POST[$item]);
        } else if (isset($_GET[$item])) {
            return escape($_GET[$item]);
        }

        return '';
    }
}
?>