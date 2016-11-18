<?php
/*
*Using SimpleXML to update xml data */

//prevent form redirect
if(isset($_SERVER['HTTP_REFERER'])){
  header ("Location:". $_SERVER['HTTP_REFERER']);
}
else{
  echo"Error";
}

//store form data in variables 

$author = $_POST["author"];
$title = $_POST["title"];
$genre = $_POST ["genre"];
$price = $_POST["price"];

//check if xml file exists 
if (file_exists('bookss.xml')){
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