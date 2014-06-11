<?php
	/**
     * Make Platforms' able to be used throughout the site.
     * Should be clone through out the whole site. Since all files are being
     * loading throught this file/script.
     */
	require_once("platform/platform.php");
	

    /**
     * The backbone of Platform page loaing system. The system will try to
     * load the page that the uri that is attaced to this file.
     */
    $RESOURCE_FOLDER = "resources/";
    $FILE = $RESOURCE_FOLDER . getFolder() . ".php";
	
    addForwardSlash();

    if (getFolder() != "") {
        // Try to load the script at the give given uri.
        // If script not found load the 404 page.
        if (file_exists($FILE)) {
            include($FILE);
        }
        else {
            include($RESOURCE_FOLDER . "404.php");
        }
    }
    else {
        // The home page of the site.
        include($RESOURCE_FOLDER . "home.php");
    }
