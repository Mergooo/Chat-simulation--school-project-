<?php
// NUR SQL, keine Kontrollstrukturen
// Verbindung zum SQL Server
// Prepare gegen SQL Injection
class Model{
    public static function setSQLMessage(string $message){
        $user_id = $_SESSION['id'];//Testzwecke
        $sql = "INSERT INTO tb_messages (user_id,text)
                VALUES(?,?)"; 
                $mask = Service::setPrepare($sql);//SQL Injection Sicherheit 
                $mask->bindValue(1,$user_id,PDO::PARAM_INT);//Maske auffüllen
                $mask->bindValue(2,$message,PDO::PARAM_STR);
                Service::setIntoDB($mask);
            }
    public static function getSQLMessage(){            
        $sql = "SELECT U.name, M.datum, M.text FROM tb_messages M, tb_users U
        WHERE U.id = M.user_id Order by M.datum";
        $mask = Service::setPrepare($sql);//SQL Injection 
        return Service::getFromDB($mask);
    }// hier sortiert phpmyadmin standardmäßig nach "name" 
     // um eine chronologische reihenfolge der nachrichten zu bekommen
     //brauchte ich den befehl " Order by M.datum "
    public static function getSQLIdFromName($user){
        $sql = "SELECT id FROM tb_users
            WHERE name = ?"; 
    $mask = Service::setPrepare($sql);//SQL Injection
    $mask->bindValue(1,$user,PDO::PARAM_STR);//Maske auffüllen
        return Service:: getOneValueFromDB($mask);//kein ARray
    }
}    
?>