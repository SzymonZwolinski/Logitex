<!DOCTYPE HTML>
    <script src="https://jesstelford.github.io/aframe-click-drag-component/build.js"></script>
    <!--Aframe event--->
    <script src="https://unpkg.com/aframe-event-set-component@3.0.3/dist/aframe-event-set-component.min.js"></script>

    <script src="./aframescript/obiekt.js">
    </script>
  <body>
    <div id ="ui">
    <input type="button" name="dodobiekt" value="Dodaj obiekt" onclick="AddObject()">
    </div>
    <a-scene>

      <a-plane static-body rotation="-90 0 0" width="200" height="200" color="#7BC8A4"></a-plane>
      <a-sky color="#ECECEC"></a-sky>
      <a-entity position="0 0 3.8">
        <a-camera look-controls-enabled="false" keyboard-controls="fpsMode: true" dynamic-body ></a-camera>
      </a-entity>

    </a-scene>
  </body>
</html>