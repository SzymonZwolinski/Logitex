<?php 

$conn = new mysqli("localhost","root","","logitex");
    $ladunek = file_get_contents("php://input");
    $obj = json_decode($ladunek);
    $uuid = end($obj);
    array_pop($obj);
    $id = end($obj);

    $sql = "SELECT trailer, suma_wag, (SELECT kubatura FROM orders WHERE ID_ZAMOWIENIA LIKE '".$uuid."' LIMIT 1) AS wolne, (SELECT COUNT(*) FROM orders WHERE ID_ZAMOWIENIA LIKE '".$uuid."') AS ilosc FROM orders WHERE ID_ZAMOWIENIA LIKE '".$uuid."' LIMIT 1;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $trailer = $row["trailer"];
        $suma_wag = $row['suma_wag'];
        $ilosc = $row['ilosc'];
        $wolne = $row['wolne'];
        $ins = "INSERT INTO final_orders(id,id_naczepy,id_pojazdu,id_zamowienia,waga,ilosc_ladunku,data_dodania,kubatura)  VALUES (DEFAULT,'$trailer','$id', '$uuid','$suma_wag','$ilosc',CURRENT_TIMESTAMP,'$wolne')";
        if (mysqli_query($conn, $ins) == TRUE) {
          echo "Utworzono zamówienie";
        } else {
          echo "Error: " . $ins . "<br>" . $conn->error;
        }
      }
    } 
    else 
    {
       echo "ERROR";
    }
    $upd = "UPDATE cars SET P_dostepnosc = 0 WHERE id = '$id'";
      if (mysqli_query($conn, $upd) == TRUE) {
        echo "Zablokowano naczepe";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    $conn->close();
      
 
?>
