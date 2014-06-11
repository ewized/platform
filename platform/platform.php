<?php
    /**
     * Start the session to allow various functions to work.
     */
    session_start();

    /**
     * Buffer the output so we can use header tags.
     */
    ob_start();

    /**
     *  Load all the functions that are in the functions folder.
     */
    require_once("functions/core.php");

    $p_functions = getServerRoot()."/platform/functions/";
    $r_functions = getServerRoot()."/resources/functions/";

    // Platform functions 
    $functions = scandir($p_functions);
    foreach($functions as $function) {
        if (is_file($p_functions.$function)) { 
            require_once($p_functions.$function);
        }
    }

    // Resources functions 
    $functions = scandir($r_functions);
    foreach($functions as $function) {
        if (is_file($r_functions.$function)) { 
            require_once($r_functions.$function);
        }
    }

    /**
     * Load the classes when they are needed.
     */
    spl_autoload_register(function($class) {
        $class = $class . ".php";
        $p_class = getServerRoot() . "/platform/classes/" . $class;
        $r_class = getServerRoot() . "/resources/classes/" . $class;

        // Check if it is a platform class.
        if (is_file($p_class)) { 
            require_once($p_class);
        }
        // Check if it is a resources class.
        else if (is_file($r_class)) { 
            require_once($r_class);
        }
    });
