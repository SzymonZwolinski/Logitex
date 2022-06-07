
<?php 
 

 use App\Models\Trailer;

    $ladunek = file_get_contents("php://input");
    $_id = substr($ladunek,-1);
    $id = substr($ladunek,-(int)($_id+1),-1); 

    $_waga = substr($ladunek,-(int)($_id+2),-(int)($_id+1));
    $waga = substr($ladunek,-(int)($_waga+$_id+2),-(int)($_id+2));

    $ladunek = substr($ladunek,0,-1);

    
        $conn = new mysqli("localhost","root","","logitex");
        
        $sql = "INSERT INTO orders  VALUES (default,'$ladunek', '$waga','$id')";
        $upd = "UPDATE trailers SET dostepnosc = 0 WHERE '$id' = id";
        if (mysqli_query($conn, $sql) == TRUE) {
            echo "Utworzono zamówienie";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          if (mysqli_query($conn, $upd) == TRUE) {
            echo "Zablokowano naczepe";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        $conn->close();
        
?>
