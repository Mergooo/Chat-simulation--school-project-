<?php
//$mycsv = file_get_contents('log/log.csv');
//echo $mycsv;

$array = file('log/log.csv', FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);

foreach($array as $zeile){
list($zeit,$message) = explode (';',$zeile);
echo '<div><span class="zeit">'.$zeit.'</span></div>
<div class="text">'.$message.'</div>';

}

?>