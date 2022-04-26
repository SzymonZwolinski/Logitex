<?php
    session_start();      
    include('connection.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password); 
      
        $sql = "select *from logowanie where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        $userid = $row["ID_EMP"];
        if($count == 1){ 
            $sql_id = "select * from pracownicy where ID_EMP = '$userid'";
            $result_id = mysqli_query($con, $sql_id);
            $row_id = mysqli_fetch_array($result_id, MYSQLI_ASSOC);
            if($row["PERM"] == 1) // sprawdzenie czy jest administratorem
            {
                echo "<h1><center> Zalogowano jako administrator</center></h1>";
                $_SESSION["username"] = $username;
                $_SESSION["permission"] = "Admin";
                $_SESSION["imie"] = $row_id["NAME"];
                $_SESSION["nazwisko"] = $row_id["SURNAME"]; 
                header("Location: ../Menu/Amenu.php"); 
            }
            else //else jest userem
            {
              echo "<h1><center> Zalogowano pomyslnie </center></h1>";
                 
                $_SESSION["username"] = $username;
                $_SESSION["permission"] = "User";
                $_SESSION["imie"] = $row_id["NAME"];
                $_SESSION["nazwisko"] = $row_id["SURNAME"];
                header("Location: ../Menu/Umenu.php"); 
            }
            
        }  
        else{  
            echo "<h1> Logowanie zakonczone niepowodzeniem. Nieprawidlowa nazwa uzytkownika lub haslo.</h1>";  
        }     
?>  