<?php
class Session {
    public static function create($session, $value) {
        $_SESSION[$session] = $value;
    }

    public static function remove($session) {
        unset($_SESSION[$session]);
    }

    public static function exists($session) {
        return isset($_SESSION[$session]);
    }

    public static function get($session) {
        return $_SESSION[$session];
    }
}
