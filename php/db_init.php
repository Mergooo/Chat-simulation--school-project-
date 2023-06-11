<?php
// Datenbank on the fly anlegen
// Datei auf Server starten -> Datenbank wird automatisch angelegt
echo "DB anlegen";

//Konstante ein Wert  z.B. const
//     Name     Wert/value
define('HOST','localhost');// Datenbank befindet sich auf www.amazoncloud.de
define('USER','root'); //z.B. Windows
define('PASS','');// XAMPP Grundeinstellung nix
define('DB_NAME','db_chatlog');// Name der Datenbank

// Definition von Namen in der Programmierung
// kein Umlaut ä->ae ß->ss
// CamelCase     für Variablen, Methoden, funktionen $meineUebungZumTag = 'test', nachName
// Name soll Aufgabe darstellen   Falsch a = 1  / i ist richtig
// Snakeschreibweise  $meine_uebung_zum_tag_1234

echo " ".DB_NAME;
try{  //Versuch
    $myPDO = new PDO('mysql:host='.HOST, USER, PASS); // Klasse
}catch(PDOException $e){
    exit("Error: " . $e ->getMessage()); //Fehler ausgeben
}
//print_r(get_class_methods($myPDO));
$myPDO ->exec('CREATE DATABASE IF NOT EXISTS '.DB_NAME); //Anlegen
// Datenbanken anzeigen
//$result = $myPDO->query('SHOW DATABASES');
//print_r($result->fetchAll());
$myPDO ->exec('USE '.DB_NAME); // Bereitstellen zum Füllen

$sql[] = "CREATE TABLE IF NOT EXISTS tb_users(
          id INT(11) AUTO_INCREMENT PRIMARY KEY,
          name VARCHAR(50) NOT NULL UNIQUE)";
$sql[] = "CREATE TABLE IF NOT EXISTS tb_messages(
          id INT(11) AUTO_INCREMENT PRIMARY KEY,
          datum TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
          user_id INT(11) NOT NULL,
          text VARCHAR(160) NOT NULL,
          FOREIGN KEY(user_id) REFERENCES tb_users(id))
         ";

foreach($sql as $query){// Mehrere SQL Anweisungen verarbeiten
    $myPDO ->exec($query);
    $arr = $myPDO ->errorInfo();//SQL Fehler finden
    echo $arr[2];//1 = Fehler als Nummer, 2 = Fehler als Text
}

?>


