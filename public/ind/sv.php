<?php 

$conn = new mysqli("localhost","root","","logitex");
    $ladunek = file_get_contents("php://input");
    $obj = json_decode($ladunek);
    $uuid = end($obj);
    array_pop($obj);
    $id = end($obj);

    $sql = "SELECT trailer, suma_wag, (SELECT COUNT(*) FROM orders WHERE ID_ZAMOWIENIA ='".$uuid."') as ilosc FROM orders WHERE ID_ZAMOWIENIA = '".$uuid."' LIMIT 1;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $trailer = $row["trailer"];
        $suma_wag = $row['suma_wag'];
        $ilosc = $row['ilosc'];
        $ins = "INSERT INTO final_orders(id,id_naczepy,id_pojazdu,id_zamowienia,waga,ilosc_ladunku,data_dodania)  VALUES (DEFAULT,'$trailer','$id', '$uuid','$suma_wag','$ilosc',CURRENT_TIMESTAMP)";
        if (mysqli_query($conn, $ins) == TRUE) {
          echo "Utworzono zamówienie";
        } else {
          echo "Error: " . $ins . "<br>" . $conn->error;
        }
      }
    } else {
       echo "ERROR";
    }
    $conn->close();
      
 
?>
