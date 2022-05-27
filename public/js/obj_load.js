function obj_cr(geo, pos)
{
   
  //wybór obiektow
  var scene = document.querySelector('a-scene');
  var newObj = document.createElement('a-entity');

  //kwadrat i rozmiar
  newObj.setAttribute('geometry',geo);
  newObj.setAttribute('position',pos);

  newObj.setAttribute('click-drag','');
  newObj.setAttribute('dynamic-body','mass:90000');
  newObj.setAttribute('material','color','blue');
  newObj.setAttribute('movable','');
  newObj.setAttribute('id',incr());
  newObj.setAttribute('collider','');
  //dodanie do sceny
  scene.appendChild(newObj);
}
var incr = (function () {
    var i = 1;
    return function () {
        return i++;
    }
})();