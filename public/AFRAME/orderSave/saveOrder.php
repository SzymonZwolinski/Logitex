
<?php 
 

 use App\Models\Trailer;

    $ladunek = file_get_contents("php://input");
    $id = substr($ladunek,-1);
    $ladunek = substr($ladunek,0,-1);
  
        $conn = new mysqli("localhost","root","","logitex");
        
        $sql = "INSERT INTO orders  VALUES (default,'$ladunek', '1','$id')";
        $upd = "UPDATE trailers SET dostepnosc = 0 WHERE '$id' = id";
        if (mysqli_query($conn, $sql) == TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          if (mysqli_query($conn, $upd) == TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        $conn->close();
?>