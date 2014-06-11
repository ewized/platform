<?php
    /**
     * Get the server root.
     */
    function getServerRoot() {
        $SCRIPT_FILENAME = $_SERVER['SCRIPT_FILENAME'];
        $PHP_SELF = $_SERVER['PHP_SELF'];
        $STRING_DEDUCT = strlen($PHP_SELF);
        return substr($SCRIPT_FILENAME,0,-$STRING_DEDUCT);
    }

    /**
     * Returns the website URL.
     */
    function getServer() {
        return "//".$_SERVER['SERVER_NAME'];
    }

    /**
     * Adds the final forward slash to the URL.
     */
    function addForwardSlash() {
        $URI = $_SERVER["REQUEST_URI"];
        $finalURL = getServer().$URI;
        if (!($URI == "/")) {
            if (substr($finalURL,-1) != "/") {
                header("Location: ".$finalURL."/");
                //echo substr($finalURL,-1)." ".$finalURL;
            }
        }
    }

    /**
     * Returns the folder at the current index
     */
    function getFolder($index = 0) {
        $query = $_SERVER["REQUEST_URI"];
        $url = explode("/", $query);
        return $url[$index+1];
    }

    /**
     * Returns the full folder list.
     */
    function getFolders() {
        $query = $_SERVER["REQUEST_URI"];
        $url = explode("/", $query);
        return $url;
    }
