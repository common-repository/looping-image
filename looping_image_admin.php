<?php 
  $notice = "<div id='gt-loop-notice'><img src='/wp-content/plugins/looping_image/images/check_mark.jpg'/><h5>Success!</h5><p>Your image was uploaded and can be viewed.</p></div>";
  $noticeError = "<div id='gt-loop-notice'><img src='/wp-content/plugins/looping_image/images/error_mark.jpg'/><h5>Error!</h5><p>There was an error please try again, Invalid image.</p></div>";
  $noticeDuplicate = "<div id='gt-loop-notice'><img src='/wp-content/plugins/looping_image/images/error_mark.jpg'/><h5>Duplicate Image Name!</h5><p>There was an error please try again. Duplicate file name, please rename and try again.</p></div>";
  $scripts = "<script src='/wp-content/plugins/looping_image/js/jquery-1.4.2.min.js' type='text/javascript'></script>";
  $scripts .= "<script src='/wp-content/plugins/looping_image/js/jquery.cycle.lite.min.js' type='text/javascript'></script>";
  $scripts .= "<script src='/wp-content/plugins/looping_image/js/scripts.js' type='text/javascript'></script>";
  $noticeScript = "<script src='/wp-content/plugins/looping_image/js/notice.js' type='text/javascript'></script>";
  
  function displayCurrentImages(){
    $dirPath = '../wp-content/uploads/gt-looping-image/';

    $allfiles .= "<ul>";
    if ($handle = opendir($dirPath)) {

       while (false !== ($file = readdir($handle))) {
          if ($file != "." && $file != "..") {
            $allfiles .= "<li><div rel=".$file." class='gt-delete-button looping_images'><span class='none'>x</span></div><img class='gt-looping_image-small' src='/wp-content/uploads/gt-looping-image/".$file."'/><p>".$file."</p></li>";
          }
       } 
       closedir($handle);
    }
    $allfiles .= "</ul>";
    return $allfiles;
  }
?>

<link href="/wp-content/plugins/looping_image/css/styles.css" rel="stylesheet" type="text/css" media="screen"/>

<?php echo $scripts; ?>
<?php if(isset($_GET['successful'])) { echo $noticeScript; } ?>
<?php if(isset($_GET['error'])) { echo $noticeScript; } ?>
<?php if(isset($_GET['duplicate'])) { echo $noticeScript; } ?>

<div class="wrap gt-wrapper">
  <h2>Looping Image Plugin</h2>
  <p>Edit your looping Images plug in, add images, and delete images.</p>

  <div id="gt-logo"><a href="http://generalthings.com/"><span class="none">General Things</span></a></div>
  
  <?php if(isset($_GET['successful'])) { echo $notice; } ?>
  <?php if(isset($_GET['error'])) { echo $noticeError; } ?>
  <?php if(isset($_GET['duplicate'])) { echo $noticeDuplicate; } ?>
  
  <h3>Your current Images</h3>
  
  <?php echo displayCurrentImages(); ?>
  
  <div id="gt-file-upload-form">
    <form name="looping_image_form" method="post" enctype="multipart/form-data" action="/wp-content/plugins/looping_image/looping_image_upload_image.php">
    	<h3>Upload new photos</h3>
    	<label for="gt-file">Upload File</label>
    	<input type="file" name="gt-file" id="gt-file"/>
    	<p class="submit">
    	  <input type="submit" name="Submit" value="Upload" />
    	</p>
    </form>
  </div>
  
  <div id="gt-loop-footer">
    <a href="http://generalthings.com/">General Things</a>
    <a href="http://labs.generalthings.com/">Labs</a>
    <a href="http://github.com/generalthings/">GitHub</a>
  </div>
</div>
