
/* obsługa obiektów */

var obj;
var objtab =new Array();
waga =0;

let params = new URLSearchParams(document.location.search);
let maksWaga = parseInt(params.get('wg'));
AFRAME.registerComponent('cursor-listener', {
    init: function () {
        /* Podczas najazdu kursora na obiekt, jego ID przekazywane jest do funckji 
        umożliwająca usunięcie obiektu */
      this.el.addEventListener('mouseenter', function (evt) {
          //console.log(document.getElementById('nr'));
       document.getElementById('nr').value = evt.target.id;
      });
   
    }
  });


AFRAME.registerComponent('movable', {
    schema: {
        
    },

    init: function () {
      // Do something when component first attached.
      var _objID = incr2();
      obj = document.getElementById(_objID);
      objtab.push(obj);
      console.log("Pojawil sie obiekt", obj  );
      console.log(objtab);
      obj.setAttribute('cursor-listener','');
      /*
      dodajac tutaj event listenery, działaja tylko do nowo dodanego obiektu,
      do optymalizacji można dodawać wszystkim z objtab
      */
    },

    update: function () {
      // Do something when component's data is updated.
    
    },

    remove: function () {
      // Do something the component or its entity is detached.
     
          obj.removeEventListener('dragstart');
          obj.removeEventListener('collide');
    },

    tick: function (t, dt) {
        kolizja();
        move();
    },
    tock: function(time,timeDelta)
    {
       _collider.setAttribute('material','color','blue');
    },
    
});


function AddObject(wysokosc,szerokosc,glebokosc,ciezar,firma) 
{
    
    let akt_wg;
    

    if(isNaN(parseFloat(ciezar) ))
    {
            ciezar  =  800+25;//25 -> waga europalety
    }   
    else
    {
        
        ciezar =parseFloat(ciezar)+25;
    }
    akt_wg = waga+ciezar;
    if(akt_wg <maksWaga)
    {
        firma = firma.toString();
        if(isNaN(parseFloat(wysokosc) ) )
        {
            wysokosc=1.2;
        }
        if(isNaN(parseFloat(szerokosc) ))
        {
                szerokosc=0.8;
        }
        if(isNaN(parseFloat(glebokosc)))
        {
            glebokosc = 0.8;
        }
        if(firma.length == 0)
        {
            firma = generateUUID();
        }
       

       
        waga = waga+parseInt(ciezar);
        //wybór obiektow
        var scene = document.querySelector('a-scene');
        var newObj = document.createElement('a-entity');
        
        //kwadrat i rozmiar
        newObj.setAttribute('geometry',{'primitive': 'box', 'height': wysokosc, 'width': szerokosc*(0.58333333), 'depth':glebokosc*(0.58333333)});

        //parametry
        newObj.setAttribute('click-drag','');
        newObj.setAttribute('dynamic-body','mass:90000');
        newObj.setAttribute('material','color','blue');
        newObj.setAttribute('position',{x:0, y:0.4, z:0});
        newObj.setAttribute('movable','');
        newObj.setAttribute('id',incr());
        newObj.setAttribute('collider','');
        newObj.setAttribute('weight', ciezar    );
        newObj.setAttribute('name',firma);

        //dodanie do sceny
        scene.appendChild(newObj);
    }
    else
    {
        alert("Za duże obciążenie naczepy o "+ Math.abs(maksWaga-(akt_wg))+" Kg");
    }

  
}
function weightCh()
{
    alert("Aktualna waga wynosi "+waga+" Kg" +"/"+maksWaga+" Kg");
}

function weigthLoad()
{
    let params = new URLSearchParams(document.location.search);
    //maksWaga = params.get('wg');
    waga = params.get('akwg');
   
}
function wait_toload()
{
    var readyStateCheckInterval = setInterval(function()
     {
        if (document.readyState == "complete") 
        {
            clearInterval(readyStateCheckInterval);
            zbierz();
        }
    }, 10);
}
function zbierz()
{
   
    let params = new URLSearchParams(document.location.search);
    
    /*
    let szerokosc = params.get('sz');
    let wysokosc = params.get('wys');
    let dlugosc = params.get('dl');
    */
    let _id = params.get('id');
    let text= getCookie(_id);
    console.log("JSON: ", text);
    let i = 0;
    let gChar;
    let pChar;
    let gChar_end;
    let pChar_end;
    let position;
    let geometry;

    let nChar;
    let wChar;
    let N;
    let W;
    let endChar;
    while (text.length>1 ) 
    {
        i = i+1;
        gChar = text.indexOf("G");
        gChar_end = text.indexOf("}");
        geometry = text.substr(gChar+2,(gChar_end-gChar)-1); 

        text = text.substr(gChar_end+1);

        pChar = text.indexOf("P");
        pChar_end = text.indexOf("}");

        position = text.substr(pChar+2,(pChar_end-pChar)-1);
        text = text.substr(pChar_end+1);

        nChar = text.indexOf("N");
        wChar = text.indexOf("W");

        N = text.substr(nChar+3,(wChar-nChar)-4);
        text = text.substr(wChar+3);
        endChar = text.indexOf('"');
        W = text.substr(0,endChar);


        
        obj_cr(geometry.replaceAll(`"`,`'`),position.replaceAll('"',''),N,W);
       
    }


}
function getCookie(name) 
{
    // Split cookie string and get all individual name=value pairs in an array
    var cookieArr = document.cookie.split(";");
    
    // Loop through the array elements
    for(var i = 0; i < cookieArr.length; i++) 
    {
        var cookiePair = cookieArr[i].split("=");
        
        /* Removing whitespace at the beginning of the cookie name
        and compare it with the given string */
        if(name == cookiePair[0].trim()) 
        {
            // Decode the cookie value and return
            return ( decodeURIComponent(cookiePair[1]));
        }
    }

    // Return null if not found
    return null;
}
function obj_cr(geo, pos, n, w)
{
    let _x = pos.indexOf("x");
    let _y = pos.indexOf("y");
    let _z = pos.indexOf("z");
    let charEnd = pos.indexOf("}");
    let myX = pos.substr(_x+2,(_y-(_x)-3));
    let myY = pos.substr(_y+2,(_z-(_y))-3);
    let myZ = pos.substr(_z+2,(charEnd-(_z))-2);


    let _height = geo.indexOf("height");
    let _width = geo.indexOf("width");
    let _depth = geo.indexOf("depth");
    let goeEnd = geo.indexOf("}");
    let myHeight = geo.substr(_height+8,(_width-(_height+10)));
    let myWidth = geo.substr(_width+7,(_depth-(_width+9)));
    let myDepth = geo.substr(_depth+7,(goeEnd-(_depth+7)));
    //wczytanie zapisanych obiektow
    //wybór obiektow
    var scene = document.querySelector('a-scene');
    var newObj = document.createElement('a-entity');

    newObj.setAttribute('geometry',{'primitive':'box','height':myHeight,'width':myWidth,'depth':myDepth});

    newObj.setAttribute('click-drag','');
    newObj.setAttribute('dynamic-body','mass:90000');
    newObj.setAttribute('material','color','white');
    newObj.setAttribute('position',{x:myX, y:myY, z:myZ});
    newObj.setAttribute('weight', w);
    newObj.setAttribute('name',n);
    newObj.setAttribute('movable','');
    newObj.setAttribute('id',incr());
    newObj.setAttribute('collider','');
    //dodanie do sceny
    scene.appendChild(newObj);
}


function DelObject(objID)
{
    console.log(objID);
    var scene = document.querySelector('a-scene');
    var rmObj = document.getElementById(objID);
    if(rmObj!=null)
    {
        console.log(rmObj);
        scene.removeChild(rmObj);
    }
    else
    {
        alert("Brak obiektu do usunięcia!");
    }

}

function ChObject(objID)
{
    var chObj = document.getElementById(objID);
    if(chObj!=null)
    {
       var height = chObj.getAttribute('geometry').height;
       var width = chObj.getAttribute('geometry').width;
       var depth = chObj.getAttribute('geometry').depth;
       var nadawca = chObj.getAttribute('name');
       var weight = chObj.getAttribute('weight');
       alert("\nWysokość: "+ height*(0.58333333) +"\nSzerokość: "+ width*(0.58333333)+"\nGłębokość: " +depth*(0.58333333) + "\nWaga: " + weight + '\nNadawca: "' + nadawca+'"');
       
    }
    else
    {
        alert("Brak obiektu do sprawdzenia!");
    }
}

function EditObject(objID,wysokosc,szerokosc,glebokosc)
{
    console.log(objID);
    var editObj = document.getElementById(objID);
   
    if(editObj!= null)
    { 
        var chck = true;
        if(isNaN(wysokosc) == true || wysokosc=="")
        {
            chck = false;
            alert("Brak podanej wysokości do edycji!");
        }
        if(isNaN(szerokosc) == true || szerokosc=="")
        {
            chck = false;
            alert("Brak podanej szerokości do edycji!");
        }
        if(isNaN(glebokosc) == true || glebokosc=="")
        {
            chck = false;
            alert("Brak podanej głębokości do edycji!");
        }

        if(chck == true)
        {
            editObj.setAttribute('geometry',{'primitive': 'box', 'height': wysokosc, 'width': szerokosc, 'depth':glebokosc});
        }
    }
    else
    {
        alert("Brak obiektu do edycji!");
    }
}

function move()
{
    var draggable = document.querySelectorAll('[click-drag]');
    draggable.forEach(function(clickdrag)
    {
        clickdrag.addEventListener('dragstart',function(dragInfo)
        {
            clickdrag.components['dynamic-body'].pause();

        });
    });
    draggable.forEach(function(clickdrag)
    {
        clickdrag.addEventListener('dragend', function(dragInfo) 
        {

            var position = clickdrag.getAttribute('position');
            //blokada przed wywaleniem pod mape
            //Nie działa dobrze
            
            if(position.y <0)
            {
                var size = clickdrag.getAttribute('heigh');
                clickdrag.setAttribute('position',{x: position.x, y: size+0.1, z: position.z});
            }
           
            clickdrag.setAttribute('rotation','0');  
            clickdrag.body.velocity.set(0,0,0);
            clickdrag.body.angularVelocity.set(0,0,0);
            clickdrag.body.vlambda.set(0,0,0);
            clickdrag.body.wlambda.set(0,0,0);
            clickdrag.components['dynamic-body'].play();
            //zerowanie prędkosci rzucenia
          
 
        });
    });
}

function kolizja()
{
    var colliders =document.querySelectorAll('[collider]');
    colliders.forEach(function(collider)
    {

        collider.addEventListener('collide',function(evt)
        {
            //nie sprawdzac console.log id bo wywala przegladarke
           if(evt.detail.body.id > 0)
           {
                collider.setAttribute('material','color','red');
           }
           else
           {
               collider.setAttribute('material','color','blue');
           }
        });
    });

}

function save()
{
    let saveArr = new Array();
    let pozycja;
    let geometria;
    let identyfikator;
    let doZapisu;

    let params = new URLSearchParams(document.location.search);
    let id = params.get('tr');
    objtab.forEach (function(fun)
    {
        pozycja = JSON.stringify(fun.getAttribute('position'));
        geometria = JSON.stringify(fun.getAttribute('geometry'));
        nadawca = JSON.stringify(fun.getAttribute('name'));
        _Waga = JSON.stringify(fun.getAttribute('weight'));
        identyfikator = fun.getAttribute('id');
        doZapisu = identyfikator.concat("G:",geometria,"P:",pozycja,"N:",nadawca,"W:",_Waga);
        saveArr.push(doZapisu);
    });
    let UUID = generateUUID();
    saveArr.push(waga, id,UUID);
    let toJSON = JSON.stringify(saveArr);
    console.log(JSON.parse(toJSON));
   
    var xhr = new XMLHttpRequest();    
    xhr.open("POST","./orderSave/saveOrder.php",true);
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
  
      
    xhr.send(toJSON);
    
    sleep(2000).then(() =>{location.replace("../cars"+"?&uuid="+UUID);
     });
    
   
}
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

var incr = (function () {
    var i = 1;
    return function () {
        return i++;
    }
})();
var incr2 = (function () {
    var i = 1;
    return function () {
        return i++;
    }
})();

function generateUUID() { // Public Domain/MIT
    var d = new Date().getTime();//Timestamp
    var d2 = ((typeof performance !== 'undefined') && performance.now && (performance.now()*1000)) || 0;//Time in microseconds since page-load or 0 if unsupported
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
        var r = Math.random() * 16;//random number between 0 and 16
        if(d > 0){//Use timestamp until depleted
            r = (d + r)%16 | 0;
            d = Math.floor(d/16);
        } else {//Use microseconds since page-load if supported
            r = (d2 + r)%16 | 0;
            d2 = Math.floor(d2/16);
        }
        return (c === 'x' ? r : (r & 0x3 | 0x8)).toString(16);
    });
}