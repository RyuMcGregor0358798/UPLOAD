<!DOCTYPE html>
<html>
<head>
    <title>Upload Text File</title>
</head>
<body>

<?php
$uploadDir = 'DATA/';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
    $targetFile = $uploadDir . basename($_FILES["fileToUpload"]["name"]);
    $fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    // Check if file is a text file
    if($fileType != "txt") {
        echo "Only TXT files are allowed.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<div>
  <form action="UPDATE.php" method="post">
    <p><input class="w3-input w3-padding-16" type="text" placeholder="Name" required name="Name"></p>
    <p><input class="w3-input w3-padding-16" type="text" placeholder="Email" required name="Email"></p>
    <p><input class="w3-input w3-padding-16" type="text" placeholder="Subject" required name="Subject"></p>
    <p><input class="w3-input w3-padding-16" type="text" placeholder="Message" required name="Message"></p>
    <button type="submit" class="w3-button w3-light-grey w3-padding-large">
      <i class="fa fa-paper-plane"></i> SEND MESSAGE
    </button>
  </form>
</div>

</body>
</html>
