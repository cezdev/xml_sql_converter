<!DOCTYPE html>
<html>
<head>
 	<link rel="stylesheet" type="text/css" href="./css/styles.css" />
 	<link rel="shortcut icon" href="./css/favicon.ico">
	<title>XML Converter</title>
</head>
<body>
<!-- Formulier voor het uploaden van xml-bestand -->
<form action="upload_xml.php" method="post" enctype="multipart/form-data">
	<label for="file">XML-bestand:</label>
		<input type="file" name="file" id="file"><br><br>
		<input type="submit" name="submit" value="Uploaden">
</form>

</body>
</html>
