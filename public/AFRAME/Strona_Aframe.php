<!DOCTYPE HTML>
 <head>
    <script src="https://jesstelford.github.io/aframe-click-drag-component/build.js"></script>
    <!--Aframe event--->
    <script src="https://unpkg.com/aframe-event-set-component@3.0.3/dist/aframe-event-set-component.min.js"></script>
    <script>
        function drpdedt() {
          document.getElementById("myDropdown").classList.toggle("show");
        }
        function drpdadd() {
          document.getElementById("addDropdown").classList.toggle("show");
        }
    </script>
    <script src="../js/obiekt.js" ></script>
    <script src="../js/kamer.js"></script>
    <script src="../js/AF_load.js"></script>

    <link rel="stylesheet" href="../css/Aframe_buttons.css">
  </head>
  <body onload="load()">
    <div id ="ui">
    <div class="dropdown">
      <button onclick="drpdadd()" class="dropbtn">Dodaj Obiekt</button>
        <div id="addDropdown" class="dropdown-content">
          <input type="number" name="height" id="height" min="0.5" placeholder="wysokosc...">
          <input type="number" name="witdth" id="width" min="0.5" placeholder="szerokosc...">
          <input type="number" name="depth" id="depth" min="0.5" placeholder="glebokosc...">
          <input type="number" name="weight" id="weight"  placeholder="ciężar...">
          <input type="text" name="Nadawca" id="Nadawca"  placeholder="Nazwa Nadawcy...">
          <input type="button" name="dodobiekt" value="Dodaj obiekt" onclick="AddObject(document.getElementById('height').value,document.getElementById('width').value,document.getElementById('depth').value,document.getElementById('weight').value,document.getElementById('Nadawca').value)">
        </div>
    </div>  
        <input type="number" name="nr" id="nr" hidden>
        <input type="submit" name="del" value="Skasuj obiekt" onclick="DelObject(document.getElementById('nr').value)" >
        <input type="submit" name="ch" value="Sprawdź obiekt" onclick="ChObject(document.getElementById('nr').value)" >

        <div class="dropdown">
            <button onclick="drpdedt()" class="dropbtn">Edytuj Obiekt</button>
              <div id="myDropdown" class="dropdown-content">
                  <input type="number" name="edit_height" id="edit_height" min="0.5" placeholder="wysokosc...">
                  <input type="number" name="edit_witdth" id="edit_width" min="0.5" placeholder="szerokosc...">
                  <input type="number" name="edit_depth"  id="edit_depth" min="0.5" placeholder="glebokosc...">
                  <input type="button" name="edobiekt" value="Potwierdź" onclick="EditObject(document.getElementById('nr').value, document.getElementById('edit_height').value, document.getElementById('edit_width').value, document.getElementById('edit_depth').value)">
              </div>
        </div>
    <input type="button" name="weightCh" value="Sprawdz wagę" onClick="weightCh()">
    <input type="button" name="kamera2" value="Zamien Kamere" onclick="ChCam()">  
    <input type="button" name="zapis" value="Zapisz" onclick="save()">
    <div style="display: inline"   >
      Pozostałe miejsce (m^2): <input type="value" id="kubatur" name="kubatura"   disabled>
    </div>   
  </div>
    <a-scene fog  renderer="precision: low; antialias:false;" vr-mode-ui="enabled: false" >

      <a-plane static-body rotation="-90 0 0" width="8" height="3.5" color="#7BC8A4"></a-plane>
      
      <a-sky color="#ECECEC"></a-sky>

      <a-entity position="0 1 3.8">
        <a-entity position="0 0.20 0" cam1 camera="active: true" look-controls-enabled="true"
         keyboard-controls="fpsMode: true" dynamic-body >
        <a-entity cursor="fuse: true; fuseTimeout: 500"
            position="0 0 -1"
            geometry="primitive: ring; radiusInner: 0.02; radiusOuter: 0.03"
            material="color: black; shader: flat">
         </a-entity>
        </a-entity>
      </a-entity>
	  
	    <a-entity position="0 10 0" rotation="-90 0 0">
	    <a-entity cam2 camera="active: false" look-controls-enabled="true"  keyboard-controls="fpsMode: false" dynamic-body></a-entity>
	    </a-entity>

    </a-scene>
  </body>
</html>