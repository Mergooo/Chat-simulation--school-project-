<?php

   $unix = time();
   echo $unix;
   echo "<br>";
   // Euro 16.05.2023
   // usa 05.16.2023
   // jap 2023.05.16 (ISO 8601) 2023/05/16 2023-05-16 
   // Formatierung DD.MM.YYYY
   echo date('d.m.Y H:i:s');

   echo "<br>";
   // 2222222222
   echo date('d.m.Y H:i:s',2222222222);

?>