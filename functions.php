<?php

#############################
## Toxic-Manager Functions ##
### Core Global Functions ###
####### See README.md #######
#############################

// Start the session
session_start();

// Include the configuration file
(!file_exists("config.php")) ? die("config.php doesn't exist. Please refer to config.example.php") : require('config.php');

// Function to get the style header
function includeHeader($loggedin=true) {
    
    // Get the configuration
    global $config;
    
    // Detect the requested style
    if (isset($_GET['style'])) {
        $style = $_GET['style'];
    }elseif (isset($_SESSION['style'])) {
        $style = $_SESSION['style'];
    }else{
        $style = $config['style'];
    }
    
    // Ensure that the header file exists
    (!file_exists("styles/{$style}/header.php") || !file_exists("styles/{$style}/headerdata.php")) ? die("Error: The requested style is missing. Please inform your system administrator.");
    
    // Include the header file/s
    require("styles/{$style}/headerdata.php");
    ($loggedin == true) ? require("styles/{$style}/header.php");
    
}

// Function to get the style footer
function includeFooter($loggedin=true) {
    
    // Get the configuration
    global $config;
    
    // Detect the requested style
    if (isset($_SESSION['style'])) {
        $style = $_SESSION['style'];
    }else{
        $style = $config['style'];
    }
    
    // Ensure that the header file exists
    if (!file_exists("styles/{$style}/footer.php")) die("Error: The requested style is missing. Please inform your system administrator.");
    
    // Include the header file/s
    ($loggedin == true) ? require("styles/{$style}/footer.php");
    
}

?>