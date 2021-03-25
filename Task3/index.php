<?php
const WEB_ADDRESS_FOR_IP = "http://fetchip.com";

### logic and processing ###
$dateFormat = '';
$dateTimeObject = new DateTime("now");
$dateFormat = $dateTimeObject->format('l \t\h\e jS \of F Y - H:i:s');


# open the current file
$filename = "/var/www/html/index.php";
$currentFile = fopen($filename, 'r');
$currentFileContents = htmlentities(fread($currentFile, filesize($filename)));
fclose($currentFile);

# get your public ip address
$curlHandle = curl_init(WEB_ADDRESS_FOR_IP);
curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
$pageResponse = curl_exec($curlHandle);
$ipAddress = '';
if (!empty($pageResponse)) {
    $domHandler = new DOMDocument();
    $domHandler->loadHTML($pageResponse);

    $nodes = $domHandler->getElementsByTagName('div');

    $ipAddress = trim($nodes->item(0)->nodeValue);
}

### display formatting ###

$bodyTop = <<<'BODYTOP'
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>
BODYTOP;

$bodyBottom = <<<"BODYBOTTOM"
    </body>
    </html>
BODYBOTTOM;

$bodyMiddle = <<<"BODYMIDDLE"
    </div>
    <p>My source code is </p>
    <textarea style="width: 800px; height: 750px">$currentFileContents</textarea><br/>
BODYMIDDLE;

### display output ###
echo $bodyTop;
echo "The current date and time is ";
echo !empty($dateFormat) ? $dateFormat : '&lt;DATE FORMAT HERE&gt;';
echo "<br>Your ip address is ";
echo !empty($ipAddress) ? $ipAddress : '&lt;IP ADDRESS&gt;';
echo $bodyMiddle;
echo $stringToDisplay;
echo $bodyBottom;
