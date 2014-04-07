<?php
/*
PHP script voor importeren van xml output files van NIA naar SQL-queries in DB 'inventory' - Tabel 'werkstations'
*/

echo "Start importeren XML bestand <br><br>";
// database connection vastleggen
$connect = mysql_connect('localhost','root','toorandrej');
if (!$connect) {
	die('Kan geen verbinding maken ' . mysql_error());	}

//database naam
$selectdb = mysql_select_db("inventory",$connect);
if (!$selectdb) { die('Database niet gevonden: ; ' . mysql_error()); }

//echo "verbinding gemaakt met Inventory<br><br>";

$scan =  simplexml_load_file('xml/custom_tabular_20140403_115946.xml');

//echo "XML geupload <br><br>"

//Loopen tot alle xmlregels zijn doorgevoerd
foreach ($message as $message => $message) {
	printf("OS     : %s\n", $OS_name->OS_name);
	printf("CPU    : %s\n", $CPU->cpu);
	printf("RAM    : %s\n",	$RAM->ram);
}

echo "XML regels doorgevoerd";

//
mysql_query("INSERT INTO werkstations
 (OS, CPU, RAM,) VALUES (\"$OS->OS\,")
 or die(mysql_error());

echo "Toegevoegd aan tabel werkstations<br>";

//Toon toevoegde database
printf("Data bijgewerkt: %d\n", mysql_affected_rows());
}

//Verbreek verbinding met database

?>