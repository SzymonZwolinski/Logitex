
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
       wysokosc=0.7;
   }
   if(isNaN(szerokosc) == true || szerokosc=="")
   {
        szerokosc=0.7;
   }
   if(isNaN(glebokosc) == true || glebokosc=="")
   {
       glebokosc = 0.7;
   }
  //wybór obiektow
  var scene = document.querySelector('a-scene');
  var newObj = document.createElement('a-entity');

  //kwadrat i rozmiar
  newObj.setAttribute('geometry',{'primitive': 'box', 'height': wysokosc, 'width': szerokosc, 'depth':glebokosc});

  //parametry
  newObj.setAttribute('click-drag','');
  newObj.setAttribute('dynamic-body','mass:90000');
  newObj.setAttribute('material','color','blue');
  newObj.setAttribute('position',{x:0, y:0, z:0});
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
