function loadOrder(id,trailer,szerokosc, dlugosc, wysokosc,waga,ladunek)
{


   setCookie(id,ladunek,1);
   window.location.href = '/AFRAME/load_Strona_Aframe.php?sz='+szerokosc+'&wys='+wysokosc+'&dl='+dlugosc+'&wg='+waga+'&tr='+trailer+"&id="+id;
}

function setCookie(name, value, daysToLive) {
  // Encode value in order to escape semicolons, commas, and whitespace
  var cookie = name + "=" + encodeURIComponent(value);
  
  if(typeof daysToLive === "number") {
      /* Sets the max-age attribute so that the cookie expires
      after the specified number of days */
      cookie += "; max-age=" + (daysToLive*60);
      
      document.cookie = cookie;
  }
}


