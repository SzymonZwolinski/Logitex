<?php
session_start();
if(!isset($_SESSION["permission"]))
{
    header("Location: ../login/index.php");  
    exit();
}
?>
<html>  
<head>  
    <title>Logitex Panel Pracownika</title>   
    <link rel = "stylesheet" type = "text/css" href = "style.css">   
</head>  
<body>
<div style='color:#FF0000'>
<h1>Użytkownik</h1>
    <?php   echo $_SESSION["username"];
            echo $_SESSION["permission"];
            echo $_SESSION["imie"];
            echo $_SESSION["nazwisko"]; ?>
</div>
    <div class="btn">
    <input type="button" value="Utwórz zlecenie" id="utwzl" onclick="alert('Utworzenie Zlecenia')">
    <input type="button" value="Edycja zlecenia" id="edzl" onclick="alert('Edycja zlecenia')">
    
    <a href="../login/logout.php" class="wyloguj">Wyloguj</a>
    </div>

</body>
