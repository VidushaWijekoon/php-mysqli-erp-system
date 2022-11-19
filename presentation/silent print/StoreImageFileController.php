<?php

//generate random file name
$randFileName = 'MyFile'.uniqid();
//save image file on root website folder
file_put_contents($randFileName, $_POST['base64ImageContent']);
//return file name back to client
ob_start();
ob_clean();
header('Content-type: text/plain');
echo $randFileName;
ob_end_flush();
exit();
        