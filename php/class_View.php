<?php

// Keine Komtrollstruckturen
// Keine Requests
// Strukturieren und sortieren von $data erlaubt
class View{
    private $html; // sammeln von HTML Daten zu Ansicht für User
    public function setLayout($template,$data){
        //Server Bereich PHP Berechnungen möglich
        ob_start(); //Puffer auf Server
            require_once("../template/".$template.".tpl.php");
            $this->html = ob_get_contents(); // aus speicher auslesen 
            ob_end_clean(); // Speicher reinigen
            echo $this->html; // Alles berechnete ausgeben
    }       
}
