<?php
$target_dir = "uploads/";//especifica el directorio donde se colocará el archivo
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);//especifica la ruta del archivo que se cargará 
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));//contiene la extensión del archivo (en minúsculas)
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
?>