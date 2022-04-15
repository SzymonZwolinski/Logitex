<html>  
<head>  
    <title>Strona logowania Logitexu</title>   
    <link rel = "stylesheet" type = "text/css" href = "style.css">   
</head>  
<body>  
    <div id = "frm">  
        <h1>Logowanie</h1>  
        <form name="f1" action = "authentication.php" onsubmit = "return validation()" method = "POST">  
            <p>  

                <label> Nazwa uzytkownika: </label>  
                <input type = "text" id ="user" name  = "user" />  

            </p>  
            <p>  
                <label> Hasło: </label>  
                <input type = "password" id ="pass" name  = "pass" /> 

            </p>  
            <p>     
                <input type =  "submit" id = "btn" value = "Zaloguj" />  
            </p>  
        </form>  
    </div>  
    <script>  
            function validation()  
            {  
                var id=document.f1.user.value;  
                var ps=document.f1.pass.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("Pola logowania sa puste");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("Pole nazwy uzytkownika jest puste");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Pole hasla jest puste");  
                    return false;  
                    }  
                }                             
            }  
        </script>  
</body>     
</html>  