<?php

if(isset($_POST['nachricht'])){
    $text = $_POST['nachricht'];
    myWrite($text);
}

function myWrite($text){

    $zeit = date('H:i:s');
    $zeile = $zeit.';'.$text;
    file_put_contents('log/log.csv' , $zeile."\r\n",FILE_APPEND);
    header("Location: chat.php");
}



?>