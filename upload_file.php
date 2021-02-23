<!--

<form action="upload.php" method="post" enctype="multipart/form-data">
  <td><input type="file" name="file"></td>
  <td><input name="submit" type="submit" value="Upload" /></td>
</form>

-->


<?php
###  FILE UPLOAD  ###
##				         ##
#					          #
if ($_FILES["file"]) {
  echo "File sended<br>";
} else {
  echo "Please select a file";
}
if ($_FILES["file"]) {
  $Path = "images";
  $UploadPath = __DIR__ . DIRECTORY_SEPARATOR . $Path . DIRECTORY_SEPARATOR . $_FILES["file"]["name"];
  if ( file_exists($UploadPath) ) {
      echo "File already exists";
  } else {
      if ($_FILES["file"]["size"]  > 1000000) {                         //Change this for max file size
          echo "File size over the limit";
      } else {
          $FileExtension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
          if ($FileExtension != "jpg" && $FileExtension != "png") { #Control the file extension 
              echo "You can only upload png or jpg files.";
          } else {

              $Final = move_uploaded_file($_FILES["file"]["tmp_name"], $UploadPath);
              echo $Final ? "File uploaded successfully" : "An error occured";
          }
      }
  }
} else {
  echo "Please select a file";
}
#					          #
##				         ##
###  FILE UPLOAD  ###