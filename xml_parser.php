<?php
	$xml = new SimpleXMLElement($filename);
	$data = $xml->NETWORK->n->Node_name->Manufacturer->Model->Domain->OS_name->Windows_serial_number->cpu->FreezIT_ID->IP_address
	->Video_adapter->ram->Hdd_caption->MS_Office_product_key->MS_Office_edition->LogicalDisk_FreSpacePer
?>