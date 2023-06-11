<?php
// TEmplate for Messagefenster beim User
    foreach($data as $spalte){
        echo '<div>'.$spalte['name'].' <span class="zeit">'.$spalte['datum'].'</span><div>
        <div class="text">'.$spalte['text'].'</div>';
    }

?>