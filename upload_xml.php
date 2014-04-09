<?php 
include ('./include/header.php');

if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
  }
else
  {
  echo "Bestand: " 		. $_FILES["file"]["name"] . "<br>";
  echo "Type: " 		. $_FILES["file"]["type"] . "<br>";
  echo "Size: " 		. ($_FILES["file"]["size"] / 1024) . " kB<br>";

   if (file_exists("" . $_FILES["file"]["name"]))
      {
      echo "XML-bestand - " . $_FILES["file"]["name"] . " bestaat al. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "" . $_FILES["file"]["name"]);
      echo "Opgeslagen in directory: " . " " . $_FILES["file"]["name"];
      }
  }
?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/styles.css" />
  <link rel="shortcut icon" href="css/favicon.ico">
</head>
<body>
<!-- Formulier voor het importen van xml-bestand --> 
<form action="convert_xml.php" method="post">
   <br> <input type="submit"       name="submit"  value="Convert gegevens naar database">
</form>
<a href="index.php"> <input type="submit" class="button" value="Ander XML-bestand uploaden"/>

</body>
</html>