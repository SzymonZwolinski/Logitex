/* obsługa obiektów */

var obj;
var objtab =new Array();

var szerokosc = 1;
var wysokosc = 1;
var glebokosc = 1;

AFRAME.registerComponent('movable', {
    schema: {
        
    },

    init: function () {
      // Do something when component first attached.
      obj = document.getElementById(incr2());
      objtab.push(obj);
      console.log("Pojawil sie obiekt", obj  );
      console.log(objtab);

      
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


function AddObject()
{
  //wybór obiektow
  var scene = document.querySelector('a-scene');
  var newObj = document.createElement('a-entity');

  //kwadrat i rozmiar
  newObj.setAttribute('geometry',{primitive: "box", height: wysokosc, width: szerokosc, depth:glebokosc});

  //parametry
  newObj.setAttribute('click-drag','');
  newObj.setAttribute('dynamic-body','mass:90000');
  newObj.setAttribute('material','color','blue');
  newObj.setAttribute('position',{x:5, y:4, z:-1});
  newObj.setAttribute('movable','');
  newObj.setAttribute('id',incr());

  newObj.setAttribute('collider','');
  //newObj.setAttribute('event-set__enter','_event: mouseenter; material.color: #8FF7FF');
  //newObj.setAttribute('event-set__leave','_event: mouseleave; material.color: #EF2D5E');

  //dodanie do sceny
  scene.appendChild(newObj);

  
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
            /*
            if(position.y <0)
            {
                var size = clickdrag.getAttribute('heigh');
                clickdrag.setAttribute('position',{x: position.x, y: size+0.1, z: position.z});
            }
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