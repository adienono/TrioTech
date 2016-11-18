<?php

// Load the XML source
$xml = new DOMDocument;
$xml->load('timetable.xml');
$xsl = new DOMDocument;
$xsl->substituteEntities = true; 
$xsl->load('timetable.xsl');

// Configure the transformer
$proc = new XSLTProcessor;
$proc->importStyleSheet($xsl); // attach the xsl rules

echo $proc->transformToXML($xml);

$module = $_POST["module"];
$lecturer = $_POST["title"];
$labAssist = $_POST ["genre"];
$lecture = $_POST["price"];
$day     = $_POST["day"];
$time    =$_POST["time"];
$room    =$_POST["room"];

//check if xml file exists 
if (file_exists('timetable.xml')){
  $xml = simplexml_load_file('bookss.xml');
  // add new book to element to variable
  $newChild = $xml->addChild('book');
  $newChild-> addChild('author', $author);
  $newChild-> addChild ('title', $title);
  $newChild-> addChild ('genre', $genre); 
  $newChild-> addChild ('price',$price);
  
}
//if file doesnt exist 
else {
  exit('Failed to open bookss.xml'); //error message
}
 //save new data from variable back into an xml file
file_put_contents('/home/cabox/workspace/xml_update/bookss.xml',$xml->asXML());

?>