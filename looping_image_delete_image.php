<?php
  if(isset($_GET['delete'])) {
   $image = $_GET['delete'];
   $dir = '../../uploads/gt-looping-image/';
   $file = $dir.$image;
   
   $delete = unlink($file);
   
   if( $delete ) {
     return true;
   }
  } else { return false; }
?>