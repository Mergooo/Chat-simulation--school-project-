<?php
session_start(); // Cookie wird zim CLient geschickt 
// es wird für jeden Client eine eigene ID erzeugt
//Zerfällt beim Browser schließen oder logout


// automatisches Laden benötigter Klassen
// autoloader(Containerverwaltung)
spl_autoload_register(  
    function($class) {
    include 'class_'.$class.'.php';
});

// clean Codes = Großbuchstabe
class Controller{
    private $r;// Querystring
  //Überprüfen aller Eingänge
  // Einzige Zugang
  function __construct(){
    $this->r = $_REQUEST;// POST/GET  
    switch(key($this->r)){    // ?write=Hallo & smily=:)
        case 'write':   $this->setMessage();
                        break;
        case 'update':  $this->updateMessage();
                        break; 
                        case'checklogin': $this-> setLogin() ;   
                        break;  
          case 'user': $this ->checkUsername();
                        break;      
        default: header('Location: ../chat.php');
    }//switch
  }//function/Methode
  
  private function checkUsername(){
     //Prüfe den Anmeldename wenn eine ID existiert
     $id = Model::getSQLIdFromName($this->r['user']);
    //  echo $id;
     if($id){
      $_SESSION['id'] = $id; //Id wird gespeichert
    }
    header('Location: ../chat.php '); //weiter chat anzeigen 
    
  }
  
  
  private function setLogin(){
    
    

    $toDisplay = new View;

    if(isset($_SESSION['id'])){//Nur wenn ID existiert dann Message senden möglich
    
      $toDisplay->setLayout('input',''); // $this kann in Objekt verwedet werden 
      
    } else{
      $toDisplay->setLayout('login',''); // $this kann in Objekt verwedet werden 
    }
  }



  private function updateMessage(){
    $data = Model::getSQLMessage(); //Model liefert mit return
    $toDisplay = new View;
    $toDisplay->setLayout('messages',$data); // $this kann in Objekt verwedet werden 
   
    // echo "<pre>";
    // print_r($data);
    // echo "<pre>";
  }


  private function setMessage(){
    $message = $this->r['write'];
    Model::setSQLMessage($message);// Zur Modellierung der Datenbankanfrage
    header('Location: ../chat.php '); //weiter chat anzeigen 
  }

}//class

new Controller(); 
// Objekt aus Klasse Controller 
// ruft Konstruktor automatisch auf