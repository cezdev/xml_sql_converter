<?php
/*
PHP script voor importeren van xml output files van NIA naar SQL-queries in DB 'inventory' - Tabel 'werkstations'
*/
include ('./include/header.php');


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

	//$timestamp  				= mysql_real_escape_string($mess->TIMESTAMP);
	$network					= mysql_real_escape_string($mess->NETWORK);
	$n 							= mysql_real_escape_string($mess->n);
	$node_name  				= mysql_real_escape_string($mess->Node_name);
	$manufacturer				= mysql_real_escape_string($mess->Manufacturer);
	$model						= mysql_real_escape_string($mess->Model);
	$os_name 					= mysql_real_escape_string($mess->OS_name);
	$windows_serial_number		= mysql_real_escape_string($mess->Windows_serial_number);
	$cpu 						= mysql_real_escape_string($mess->cpu);
	$freezit_id					= mysql_real_escape_string($mess->FreezIT_ID);
	$ip_address					= mysql_real_escape_string($mess->IP_address);
	$gpu						= mysql_real_escape_string($mess->Video_adapter);
	$ram 						= mysql_real_escape_string($mess->ram);
	$hdd						= mysql_real_escape_string($mess->Hdd_Caption);
	$MSOffice_pkey				= mysql_real_escape_string($mess->MS_Office_product_key);
	$MSOffice_edition			= mysql_real_escape_string($mess->MS_Office_edition);
	$LD_free_space				= mysql_real_escape_string($mess->LogicalDisk_FreSpacePer);


	echo "<br>XML regels ingevoerd <br> ";

	// Voer gegevens in database
	mysql_query("INSERT INTO xml (network, n, Node_name, Manufacturer, Model, OS_name, Windows_serial_number, cpu,
		FreezIT_ID, IP_address, Video_adapter, ram, hdd_caption, MS_Office_product_key, MS_Office_edition, LD_free_space )
	 VALUES ('$network', '$n', '$node_name', '$manufacturer', '$model', '$os_name', '$windows_serial_number', '$cpu', '$freezit_id',
	 	'$ip_address', '$gpu', '$ram', '$hdd', '$MSOffice_pkey', '$MSOffice_edition', '$LD_free_space')")
	 or die(mysql_error());

	echo "<br>Toegevoegd aan tabel werkstations <br> ";

	//Toon toevoegde database
	printf("<br>Aantal rij(en) toegevoegd : %d\n", mysql_affected_rows());
	

	echo"<br><tr><td><br>$os_name</br></td><td><br>$cpu</br></td><td><br>$ram</br></td></tr></br>";

}

//Verbreek verbinding met database
mysql_close($connect);

?>
<html><a href="index.php"> <input type="submit" class="button" value="Ander XML-bestand uploaden"/></html>