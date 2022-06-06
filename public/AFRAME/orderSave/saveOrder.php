
<?php 
 

function save($_uuid,$nadawca,$ladunek,$waga,$sumWaga,$trailer)
{
  $conn = new mysqli("localhost","root","","logitex");
        
  $sql = "INSERT INTO orders  VALUES (default,'$_uuid','$nadawca','$ladunek', '$waga','$sumWaga','$trailer')";
  $upd = "UPDATE trailers SET dostepnosc = 0 WHERE '$trailer' = id";
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
}
    $ladunek = file_get_contents("php://input");
    $obj = json_decode($ladunek);
  
    $uuid = end($obj);
    array_pop($obj);
    $trailer = end($obj);
    array_pop($obj);
    $waga = end($obj);
    array_pop($obj);

    foreach ($obj as $data)
    {
      $startNazwa =strpos($data,"N");
      $koniecNazwa = strpos($data,"W");
      $Nazwa = substr($data,$startNazwa+3,($koniecNazwa-$startNazwa)-4);
      $Waga = substr($data,$koniecNazwa+3,-1);
      save($uuid,$Nazwa,$data,$Waga,$waga,$trailer);
    }



?>
