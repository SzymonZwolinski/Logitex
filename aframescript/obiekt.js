//import "./Collider.js"


AFRAME.registerComponent('movable', {
    schema: {
        
    },

    init: function () {
      // Do something when component first attached.
    },

    update: function () {
      // Do something when component's data is updated.
    
    },

    remove: function () {
      // Do something the component or its entity is detached.
    },

    tick: function (time, timeDelta) {

        var collider =document.querySelectorAll('a-box');
        collider.forEach(function(_collider)
        {
            _collider.addEventListener('collide',function(evt)
            {
                _collider.setAttribute('color','#03fc1c');
                console.log("Kolizja");
                
            });
        });
        move();

      
    },
    tock: function(time,timeDelta)
    {
         
    },
    
});
/*
AFRAME.registerComponent('paleta', {
    schema: {
      color: {type: 'color', default: '#EF2D5E'},
      //clickDrag:{type:'click-drag', default:'true'},
      dynamicBody:{type:'dynamic-body',default:'mass: 20'},
      position:{type:'position',default:'5 4 -1'}

    },
    init: function()
    {
        console.log("Utworzono Obiekt");
    }
  });*/

function AddObject()
{
  var scene = document.querySelector('a-scene');
  var newObj = document.createElement('a-entity');
  //var weight = "mass: 10";
  //newObj.setAttribute('paleta','');
  newObj.setAttribute('geometry','primitive:box');
  newObj.setAttribute('click-drag','');
  newObj.setAttribute('dynamic-body','mass:20');
  newObj.setAttribute('color','#EF2D5E');
  newObj.setAttribute('position',{x:5, y:4, z:-1});
  
  newObj.setAttribute('collider','');
  newObj.setAttribute('id',incr());
  //newObj.setAttribute('event-set__enter','_event: mouseenter; color: #8FF7FF');
  //newObj.setAttribute('event-set__leave','_event: mouseleave; color: #EF2D5E');
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
            //console.log(dragInfo.detail.velocity.y);
            var x = dragInfo.detail.velocity.x;
            var y = dragInfo.detail.velocity.y;
            var z = dragInfo.detail.velocity.z;
            //console.log(x);
            clickdrag.components['dynamic-body'].play();
            clickdrag.body.velocity.set(x, y, z);
            //clickdrag.setAttribute('velocity',{x, y});
            //x=0;
            //y=0;
            //z=0;
            //console.log('drag end', dragInfo.detail.velocity);
        });
    });
}

var incr = (function () {
    var i = 1;
    return function () {
        return i++;
    }
})();