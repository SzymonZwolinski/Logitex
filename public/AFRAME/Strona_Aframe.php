<!DOCTYPE HTML>
    <script src="https://jesstelford.github.io/aframe-click-drag-component/build.js"></script>
    <!--Aframe event--->
    <script src="https://unpkg.com/aframe-event-set-component@3.0.3/dist/aframe-event-set-component.min.js"></script>

    <script src="../../resources/js/AFRAME/obiekt.js">
    </script>
  <body>
    <div id ="ui">
    <input type="button" name="dodobiekt" value="Dodaj obiekt" onclick="AddObject()">
    </div>
    <a-scene fog stats renderer="precision: low; antialias:false;">

      <a-plane static-body rotation="-90 0 0" width="20" height="20" color="#7BC8A4"></a-plane>
      <a-entity static-body geometry="primitive:plane; width:20; height:10" rotation="0 -180 0" position="0 5 10" color="#7BC8A4"></a-entity>
      <a-entity static-body geometry="primitive:plane; width:20; height:10" rotation="0 0 0" position="0 5 -10" color="#7BC8A4"></a-entity>
      <a-entity static-body geometry="primitive:plane; width:20; height:10" rotation="0 -90 0" position="10 5 0" color="#7BC8A4"></a-entity>
      <a-entity static-body geometry="primitive:plane; width:20; height:10" rotation="0 90 0" position="-10 5 0" color="#7BC8A4"></a-entity>
      <a-sky color="#ECECEC"></a-sky>
      <a-entity position="0 0 3.8">
        <a-camera look-controls-enabled="false" keyboard-controls="fpsMode: true" dynamic-body ></a-camera>
      </a-entity>

    </a-scene>
  </body>
</html>