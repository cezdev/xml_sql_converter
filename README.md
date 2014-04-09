A very simple application for importing XML structured data into a MySQL database.

First a custom report scan is made with Network Inventory Advisor. Afterwards the report is exported to a XML-file.
The index.php page handles the action form for uploading the XML. Upload_xml.php uploads and stores the file by usage of the $_FILES function in PHP. Convert_XML.php loads the XML-file (with use of simplexml_load_file) and parses the lines into a single MySQL-query. The query is executed and the data is stored in the appropiate table.

Until so far this conclude the README for the XML_SQL_Converter.