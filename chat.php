<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>chat</h1>
    <div id="message" >Chat lädt...</div>
    <!-- GET max 1024 Zeichen (Serverseitig max 2048)
         Querystring wird in Adresszeiel angezeigt
         Bei HTTP Übertragung ist der Querystring sichtbar (z.B WLAN Knoten kann mit lesen)
         DSGVO -> Formuleingaben müssen durch HTTPS gesichert sein
      
         POST Server entscheidet über Menge der Daten, mehrere GB möglich
         Querystring wird in Header Bereich HTTP/S gelegt

   -->
   <div id="seeLogin"></div>
<script>
    var seeLogin = document.getElementById('seeLogin');
   function startLogin(){
         var myajax = new XMLHttpRequest();// AJAX Objekt
          myajax.open('get','php/class_Controller.php?checklogin=true');
          myajax.onreadystatechange = function(){
           if(myajax.readyState == 4 && myajax.status == 200){
            seeLogin.innerHTML = myajax.responseText;// Text/Datei vom Server
           }
       }
       myajax.send();//komplexes Prozess auslösen
     }
     startLogin();
     </script>
 

    <script>
        /* Kommentieren */
       // variable    Objekt.Methode(Übergabeargument)
       // Selektion eines HTML Element
        var fenster = document.getElementById('message');
        var scroll = true;// true oder false boolean
       //z.B. fenster.style.background = 'red';
       // AJAX Objekt

      function autoUpdate(){
         var myajax = new XMLHttpRequest();// AJAX Objekt
          myajax.open('get','php/class_Controller.php?update=true');
          myajax.onreadystatechange = function(){
           if(myajax.readyState == 4 && myajax.status == 200){
             fenster.innerHTML = myajax.responseText;// Text/Datei vom Server
             if(scroll) fenster.scrollTop = fenster.scrollHeight;//automatisch berechnen
           }
       }
       myajax.send();//komplexes Prozess auslösen
     }
     //####################### HAUPTPROGRAMM ###########//
     autoUpdate();
     setInterval('autoUpdate()',1000);// alle 1 sek
     
     fenster.onmouseover = function(){
       scroll = false;
     }
     fenster.onmouseout = function(){ // HTML Element mit Maus verlassen
       scroll = true;
     }

    </script>
</body>
</html>