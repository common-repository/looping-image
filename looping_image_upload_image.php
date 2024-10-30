<?php
if(is_dir('../../uploads/gt-looping-image/')) {
  addFile();
} else {
  mkdir('../../uploads/gt-looping-image/');
  addFile();
}

function addFile(){
  if ((($_FILES["gt-file"]["type"] == "image/gif") || ($_FILES["gt-file"]["type"] == "image/jpeg") || ($_FILES["gt-file"]["type"] == "image/pjpeg")) && ($_FILES["gt-file"]["size"] < 500000)) {
  
    if ($_FILES["gt-file"]["error"] > 0)  {
      header("location: /wp-admin/options-general.php?page=LoopingImage&error");
    } else{

      if (file_exists("../../uploads/gt-looping-image/" . $_FILES["gt-file"]["name"])) {
        header("location: /wp-admin/options-general.php?page=LoopingImage&duplicate_image");
      } else {
        move_uploaded_file($_FILES["gt-file"]["tmp_name"],
        "../../uploads/gt-looping-image/" . $_FILES["gt-file"]["name"]);
            header("location: /wp-admin/options-general.php?page=LoopingImage&successful");
      }
    }
  } else {  
    header("location: /wp-admin/options-general.php?page=LoopingImage&error");
  }
}
?>