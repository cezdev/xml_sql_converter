<?php 
include 'header.php';

if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
  }
else
  {
  echo "Bestand: " 		. $_FILES["file"]["name"] . "<br>";
  echo "Type: " 		. $_FILES["file"]["type"] . "<br>";
  echo "Size: " 		. ($_FILES["file"]["size"] / 1024) . " kB<br>";

   if (file_exists("xml/" . $_FILES["file"]["name"]))
      {
      echo "XML-bestand - " . $_FILES["file"]["name"] . " bestaat al. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "xml/" . $_FILES["file"]["name"]);
      echo "Opgeslagen in directory: " . "xml/" . $_FILES["file"]["name"];
      }
  }
?>