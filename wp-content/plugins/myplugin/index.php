<?php

/*
Plugin Name: My Plugin
Description: Detta är min första plugin
Version: 1.0
Author: Eleni
*/

/* if(is_admin()){
    //Är i admin dashboard
}else{
    //Är i frontend
} */

function myplugin_activate(){
    add_option("myplugin_magic", 12345);
}

register_activation_hook(__FILE__, "myplugin_activate");

function myplugin_deactivate(){
    delete_option("myplugin_magic");
}

register_deactivation_hook(__FILE__, "myplugin_activate");

if(is_admin()){
    require_once("settings.php");
}