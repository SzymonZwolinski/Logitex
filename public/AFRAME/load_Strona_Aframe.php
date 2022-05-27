<!DOCTYPE html>
<html>
    <head>
<script>
function zbierz()
    {
    let params = new URLSearchParams(document.location.search);
    /*
    let szerokosc = params.get('sz');
    let wysokosc = params.get('wys');
    let dlugosc = params.get('dl');
    */
   let _id = params.get('id');
   getCookie(_id);
    }
function getCookie(name) {
  // Split cookie string and get all individual name=value pairs in an array
  var cookieArr = document.cookie.split(";");
  
  // Loop through the array elements
  for(var i = 0; i < cookieArr.length; i++) {
      var cookiePair = cookieArr[i].split("=");
      
      /* Removing whitespace at the beginning of the cookie name
      and compare it with the given string */
      if(name == cookiePair[0].trim()) {
          // Decode the cookie value and return
          console.log( decodeURIComponent(cookiePair[1]));
      }
  }
  
  // Return null if not found
  return null;
}
</script>
</head>
<body>


<?php
echo '<script type="text/javascript">zbierz()</script>';
?>
</body>
</html>