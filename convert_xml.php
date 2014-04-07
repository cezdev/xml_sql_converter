<?php
/*
PHP script voor importeren van xml output files van NIA naar SQL-queries in DB 'inventory' - Tabel 'werkstations'
*/
include 'header.php';

ini_set('display_error', 'On');

// database connection vastleggen
$connect = mysql_connect('localhost','root','toorandrej');
if (!$connect) {
	die('Kan geen verbinding maken ' . mysql_error());	}

//database naam
$selectdb = mysql_select_db("inventory",$connect);
if (!$selectdb) { 
	die('Database niet gevonden: ; ' . mysql_error()); 
}

echo "Database connectie tot stand gebracht . <br> ";

// Lees bestandnamen in directory die eindigen op ".xml"
$file_arr = array();
if ($handle = opendir('.')) {
    while (false !== ($file = readdir($handle))) {
        if (($file != ".") && ($file != "..")) {
            if(substr($file, -4) == ".xml")
            {
                array_push($file_arr, $file);
            }
        }
    }
    closedir($handle);
}

//Loopen tot alle xmlregels zijn doorgevoerd
foreach($file_arr as $filename)
{
	//simplexml load xml file
	$mess = simplexml_load_file($filename);
	echo "<br>XML is aanwezig <br> ";

	$os 	= mysql_real_escape_string($mess->os);
	$cpu 	= mysql_real_escape_string($mess->cpu);
	$ram 	= mysql_real_escape_string($mess->ram);


	echo "<br>XML regels ingevoerd <br> ";

	// Voer gegevens in database
	mysql_query("INSERT INTO xml (os, cpu, ram,)
	 VALUES ('$os', '$cpu', '$ram')")
	 or die(mysql_error());

	echo "<br>Toegevoegd aan tabel xml <br> ";

	//Toon toevoegde database
	printf("Gegevens ingevoerd: %d\n", mysql_affected_rows());
}

//Verbreek verbinding met database
mysql_close($connect);

?>	