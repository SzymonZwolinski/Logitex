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
    var newObj1 = document.createElement('a-entity');
    var newObj2 = document.createElement('a-entity');
    var newObj3 = document.createElement('a-entity');
    var newObj4 = document.createElement('a-entity');
    var newObj5 = document.createElement('a-entity');

    //newObj.removeAttribute('collide','');
    //kwadrat i rozmiar 2
    //Sciana z+
    newObj1.setAttribute('geometry',{'primitive': 'plane', 'height': wysokosc/10, 'width': szerokosc/10, 'depth':dlugosc/10});
    newObj1.setAttribute('static-body','');
    newObj1.setAttribute('material','color','green');
    newObj1.setAttribute('position',{x:0, y:(wysokosc/2)/10, z:(dlugosc/2)/10});
    newObj1.setAttribute('rotation','0 180 0');
    //kwadrat i rozmiar 3
    //Sciana z-
    newObj2.setAttribute('geometry',{'primitive': 'plane', 'height': wysokosc/10, 'width': szerokosc/10, 'depth':dlugosc/10});
    newObj2.setAttribute('static-body','');
    newObj2.setAttribute('material','color','brown');
    newObj2.setAttribute('position',{x:0, y:(wysokosc/2)/10, z:-(dlugosc/2)/10});
    newObj2.setAttribute('rotation','0 0 0');
    //kwadrat i rozmiar 4 
    //Sciana x+
    newObj3.setAttribute('geometry',{'primitive': 'plane', 'height': wysokosc/10, 'width': szerokosc/10, 'depth':dlugosc/10});
    newObj3.setAttribute('static-body','');
    newObj3.setAttribute('material','color','magenta');
    newObj3.setAttribute('position',{x:(szerokosc/2)/10, y:(wysokosc/2)/10, z:0});
    newObj3.setAttribute('rotation','0 -90 0');
 //kwadrat i rozmiar 5 
    //Sciana x-
    newObj4.setAttribute('geometry',{'primitive': 'plane', 'height': wysokosc/10, 'width': szerokosc/10, 'depth':dlugosc/10});
    newObj4.setAttribute('static-body','');
    newObj4.setAttribute('material','color','magenta');
    newObj4.setAttribute('position',{x:-(szerokosc/2)/10, y:(wysokosc/2)/10, z:0});
    newObj4.setAttribute('rotation','0 90 0');

     //kwadrat i rozmiar 5 
    //Sufit
    newObj5.setAttribute('geometry',{'primitive': 'plane', 'height': wysokosc/10, 'width': szerokosc/10, 'depth':dlugosc/10});
    newObj5.setAttribute('static-body','');
    newObj5.setAttribute('material','color','magenta');
    newObj5.setAttribute('position',{x:0, y:(wysokosc)/10, z:0});
    newObj5.setAttribute('rotation','90 0 0');
    
  
    //dodanie do sceny
    
    scene.appendChild(newObj1);
    scene.appendChild(newObj2);
    scene.appendChild(newObj3);
    scene.appendChild(newObj4);
    scene.appendChild(newObj5);
  
  
}