function load()
{
    let params = new URLSearchParams(document.location.search);
    let szerokosc = params.get('sz');
    let wysokosc = params.get('wys');
    let dlugosc = params.get('dl');
    console.log(szerokosc ,wysokosc, dlugosc);
    addTrailer(szerokosc,wysokosc,dlugosc);
    
}

function addTrailer(szerokosc,wysokosc,dlugosc)
{
    var scene = document.querySelector('a-scene');
    var newObj = document.createElement('a-entity');
    var newObj1 = document.createElement('a-entity');
    var newObj2 = document.createElement('a-entity');
    var newObj3 = document.createElement('a-entity');
    var newObj4 = document.createElement('a-entity');
    var newObj5 = document.createElement('a-entity');



    newObj.setAttribute('geometry',{'primitive': 'plane', 'height': 10, 'width': 10, 'depth':10});
    newObj.setAttribute('static-body','');
    newObj.setAttribute('material','color','grey');
    newObj.setAttribute('rotation','-90 0 0');
    newObj.setAttribute('position',{x:0, y:-0.3, z:0});

    //newObj.removeAttribute('collide','');
    //kwadrat i rozmiar 2
    //Sciana z+
    newObj1.setAttribute('geometry',{'primitive': 'plane', 'height': wysokosc*(1.75), 'width': szerokosc*(2), 'depth':dlugosc});
    newObj1.setAttribute('static-body','');
    newObj1.setAttribute('material','color','green');
    newObj1.setAttribute('position',{x:0, y:(wysokosc/2), z:(szerokosc/2)*(0.58333333),});
    newObj1.setAttribute('rotation','0 180 90');
    //kwadrat i rozmiar 3
    //Sciana z-
    newObj2.setAttribute('geometry',{'primitive': 'plane', 'height': wysokosc, 'width': szerokosc*(0.58333333), 'depth':dlugosc});
    newObj2.setAttribute('static-body','');
    newObj2.setAttribute('material','color','red');
    newObj2.setAttribute('position',{x:(dlugosc/2)*(0.58333333), y:(wysokosc/2), z:0});
    newObj2.setAttribute('rotation','0 -90 0');
    //kwadrat i rozmiar 4 
    //Sciana x+
    newObj3.setAttribute('geometry',{'primitive': 'plane', 'height': (wysokosc)*(1.75), 'width': (szerokosc)*(2), 'depth':dlugosc});
    newObj3.setAttribute('static-body','');
    newObj3.setAttribute('material','color','magenta');
    newObj3.setAttribute('position',{x:0, y:(wysokosc/2), z:-(szerokosc/2)*(0.58333333)});
    newObj3.setAttribute('rotation','0 0 90');
 //kwadrat i rozmiar 5 
    //Sciana x-
    newObj4.setAttribute('geometry',{'primitive': 'plane', 'height': wysokosc, 'width': szerokosc*(0.58333333), 'depth':dlugosc});
    newObj4.setAttribute('static-body','');
    newObj4.setAttribute('material','color','yellow');  
    newObj4.setAttribute('position',{x:-(dlugosc/2)*(0.58333333), y:(wysokosc/2), z:0});
    newObj4.setAttribute('rotation','0 90 0');

     //kwadrat i rozmiar 5 
    //Sufit
    newObj5.setAttribute('geometry',{'primitive': 'plane', 'height': wysokosc*(1.75), 'width': szerokosc*(0.58333333), 'depth':dlugosc*(0.58333333)});
    newObj5.setAttribute('static-body','');
    newObj5.setAttribute('material','color','white');
    newObj5.setAttribute('position',{x:0, y:(wysokosc), z:0});
    newObj5.setAttribute('rotation','90 -90 0');
    
  
    //dodanie do sceny
    scene.appendChild(newObj);
    scene.appendChild(newObj1);
    scene.appendChild(newObj2);
    scene.appendChild(newObj3);
    scene.appendChild(newObj4);
    scene.appendChild(newObj5);
  
  
}