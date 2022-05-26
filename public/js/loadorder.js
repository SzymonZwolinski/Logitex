function loadOrder(id,trailer,szerokosc, dlugosc, wysokosc,waga,ladunek)
{

    /*
    var xhr = new XMLHttpRequest();    
    xhr.open("POST","/AFRAME/load_Strona_Aframe.php",true);
    xhr.setRequestHeader("Content-Type","application/json");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
               window.location.href = xhr.responseURL+'?sz='+szerokosc+'&wys='+wysokosc+'&dl='+dlugosc+'&wg='+waga+'&tr='+trailer+"&id="+id;
               
            } else {
               console.log('failed');
            }
        }
      }
      

    let toJSON = JSON.stringify(ladunek);
    console.log(toJSON);
    console.log("parse",JSON.parse(toJSON));
    xhr.send(toJSON);
    */
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


