
/* obsługa obiektów */

var obj;
var objtab =new Array();

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


function AddObject(wysokosc,szerokosc,glebokosc)
{
   if(isNaN(wysokosc) == true || wysokosc=="")
   {
       wysokosc=1.2;
   }
   if(isNaN(szerokosc) == true || szerokosc=="")
   {
        szerokosc=1;
   }
   if(isNaN(glebokosc) == true || glebokosc=="")
   {
       glebokosc = 1.2;
   }
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

  //dodanie do sceny
  scene.appendChild(newObj);

  
}

function wait_toload()
{
    var readyStateCheckInterval = setInterval(function()
     {
        if (document.readyState === "complete") 
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


    while (text.length > 3) 
    {
        gChar = text.indexOf("G");
        gChar_end = text.indexOf("}");
        geometry = text.substr(gChar+2,gChar_end-4); 
        text = text.substr(gChar_end+1);
        pChar = text.indexOf("P");
        pChar_end = text.indexOf("}");
        position = text.substr(pChar+2,pChar_end-1);
        text = text.substr(pChar_end+2);
        console.log("geo= ",geometry);
        console.log("pozyc= ", position.replaceAll('"',''));
        obj_cr(geometry.replaceAll('"',"'"),position.replaceAll('"',''));
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
function obj_cr(geo, pos)
{
//wczytanie zapisanych obiektow
//wybór obiektow
var scene = document.querySelector('a-scene');
var newObj = document.createElement('a-entity');

//kwadrat i rozmiar
newObj.setAttribute('geometry',geo);
newObj.setAttribute('position',pos+0.1);

newObj.setAttribute('click-drag','');
newObj.setAttribute('dynamic-body','mass:90000');
newObj.setAttribute('material','color','blue');
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
            /*
            if(position.x <-10)
            {
                var size = clickdrag.getAttribute('width');
                clickdrag.setAttribute('position',{x: -9+(size+0.01), y: position.y, z: position.z});
            }
            if(position.x >10)
            {
                var size = clickdrag.getAttribute('width');
                clickdrag.setAttribute('position',{x: 10-(size-0.01), y: position.y, z: position.z});
            }
            if(position.z >10)
            {
                var size = clickdrag.getAttribute('depth');
                clickdrag.setAttribute('position',{x: position.x, y: position.y, z: 10-(size-0.01)});
            }
            if(position.z <-10)
            {
                console.log(position.z);
                var size = clickdrag.getAttribute('depth');
                clickdrag.setAttribute('position',{x: position.x, y: position.y, z: -9+(size+0.01)});
            }
            */
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

=======
    let params = new URLSearchParams(document.location.search);
    let id = params.get('tr');

    objtab.forEach (function(fun)
    {
        pozycja = JSON.stringify(fun.getAttribute('position'));
        geometria = JSON.stringify(fun.getAttribute('geometry'));
        identyfikator = fun.getAttribute('id');

        doZapisu = identyfikator.concat("G:",geometria,"P:",pozycja);
        saveArr.push(doZapisu);
    });
    let toJSON = JSON.stringify(saveArr);
    //console.log("save jako json: ",toJSON);
    toJSON = toJSON.concat(id);
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
