<?php
// Konnekt zur Datenbank
// Zugang zur Datenbank
// kein SQL
// keine Kontrollstrukturen
// keine Berechnungen
class Service{
    private static $myPDO;
    private static function connectDB(){
        self::$myPDO = new PDO("mysql:host=localhost;dbname=db_chatlog;charset=utf8", 'root',''); 
   }
   // wird von Model angesprochen
   public static function setPrepare($sql){
    self::connectDB();//Datenbankverbindung aufbauen
    $mask = self::$myPDO->prepare($sql);//Maske speichern
    return $mask;// 
   }

   public static function setIntoDB($mask){
    $mask->execute();//bitte ausführen
   }

   public static function getFromDB($mask){
    $mask->execute();//bitte ausführen
    return $mask->fetchALL(); //array zurückgeben
   }
   public static function getOneValueFromDB($mask){
    $mask->execute();//bitte ausführen
    return $mask->fetchColumn(); //1 wert
   }

}