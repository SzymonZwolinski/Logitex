function zapis(id,uuid)
{
    var ladunek = new Array();
    ladunek.push(id,uuid);
    ladunek = JSON.stringify(ladunek);
    var xhr = new XMLHttpRequest();    
    xhr.open("POST","./ind/sv.php",true);
    xhr.setRequestHeader("Content-Type","application/json");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
               console.log('successful');
            } else {
               console.log('failed');
            }
        }
      }
  
      
    xhr.send(ladunek);
    
    sleep(3000).then(() =>{location.replace("/final_order_location/show?&uuid="+uuid);
     });
     
     
}
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}
  