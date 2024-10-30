<?php 
/*
	Plugin Name: General Things Looping Image
	Plugin URI: http://labs.generalthings.com
	Description: Plugin for adding a rotating image graphic across the header of your site
	Author: Christopher Hein
	Version: 0.1
	Author URI: http://generalthings.com
*/

function looping_image() {
	  // Setting the Directory path
	$hasImages = false;
	$dirPath = 'wp-content/uploads/gt-looping-image/';
	$scripts = "<script src='/wp-content/plugins/looping_image/js/jquery-1.4.2.min.js' type='text/javascript'></script>";
  $scripts .= "<script src='/wp-content/plugins/looping_image/js/jquery.cycle.lite.min.js' type='text/javascript'></script>";
  $scripts .= "<script src='/wp-content/plugins/looping_image/js/scripts.js' type='text/javascript'></script>";
	
	  // Include scripts
	$allfiles = $scripts; 

  $allfiles .= "<div id='gt-loop-container'>";
  if ($handle = opendir($dirPath)) {

     while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
          $hasImages = true;
          $allfiles .= "<img class='gt-looping_image' src='/wp-content/uploads/gt-looping-image/".$file."'/>";
        }
     } 
     closedir($handle);
  }
  $allfiles .= "</div>";
  if( $hasImages == true ) {
    return $allfiles;
  }
}

//*************** Admin function ***************
function looping_image_admin() {
	include('looping_image_admin.php');
}

function looping_image_admin_actions() {
    add_options_page("Looping Image", "Looping Image", 1, "LoopingImage", "looping_image_admin");
}

add_action('admin_menu', 'looping_image_admin_actions');

?>