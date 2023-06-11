<?php
// wenn    ?nachricht = Hallo
// enthält der quersstring die Variable nachricht
if(isset($_POST['nachricht'])){ 
   $text =  $_POST['nachricht'];
   myWrite($text);
}

function myWrite($text){
   $zeit = date('H:i:s');
   // 15:45:30; Nachrichten 1 \r\n
   $zeile = $zeit.';'.$text;
   file_put_contents('log/log.csv',$zeile."\r\n",FILE_APPEND);
   header("Location: chat.php");
}
?>