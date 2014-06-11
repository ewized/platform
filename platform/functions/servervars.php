<?php 

function loadServerVars() {
    foreach($_SERVER as $name => $var) {
        echo "{$name}: {$var} <br />";
    }
}
