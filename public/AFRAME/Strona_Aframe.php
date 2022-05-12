<!DOCTYPE HTML>
    <script src="https://jesstelford.github.io/aframe-click-drag-component/build.js"></script>
    <!--Aframe event--->
    <script src="https://unpkg.com/aframe-event-set-component@3.0.3/dist/aframe-event-set-component.min.js"></script>

    <script src="../../resources/js/AFRAME/obiekt.js"></script>
    <script src="../../resources/js/AFRAME/kamer.js">
    </script>
  <body>
    <div id ="ui">
    <input type="button" name="dodobiekt" value="Dodaj obiekt" onclick="AddObject()">

      <input type="number" name="nr" id="nr" hidden>
      <input type="submit" name="del" value="Skasuj obiekt" onclick="DelObject(document.getElementById('nr').value)" >

    <input type="button" name="kamera2" value="Zamien Kamere" onclick="ChCam()">  
  </div>
    <a-scene fog  renderer="precision: low; antialias:false;" >

      <a-plane static-body rotation="-90 0 0" width="20" height="20" color="#7BC8A4"></a-plane>
      <a-entity static-body geometry="primitive:plane; width:20; height:10" rotation="0 -180 0" position="0 5 10" color="#7BC8A4"></a-entity>
      <a-entity static-body geometry="primitive:plane; width:20; height:10" rotation="0 0 0" position="0 5 -10" color="#7BC8A4"></a-entity>
      <a-entity static-body geometry="primitive:plane; width:20; height:10" rotation="0 -90 0" position="10 5 0" color="#7BC8A4"></a-entity>
      <a-entity static-body geometry="primitive:plane; width:20; height:10" rotation="0 90 0" position="-10 5 0" color="#7BC8A4"></a-entity>
      <a-sky color="#ECECEC"></a-sky>

      <a-entity position="0 1 3.8">
        <a-entity cam1 camera="active: true" look-controls-enabled="false"  keyboard-controls="fpsMode: true" dynamic-body >
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