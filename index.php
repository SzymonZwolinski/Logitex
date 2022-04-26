<!DOCTYPE HTML>
    <script src="https://jesstelford.github.io/aframe-click-drag-component/build.js"></script>
  <body>
     <a-scene>
      <a-box
        click-drag
        dynamic-body="mass: 0.01"
        position="0 3 -1"
        color="#EF2D5E"
      >
      </a-box>
      
      <a-box
        click-drag
        dynamic-body="mass: 20"
        position="5 4 -1"
        color="#EF2D5E"
      >
      </a-box>
      
      <a-plane static-body rotation="-90 0 0" width="200" height="200" color="#7BC8A4"></a-plane>
      <a-sky color="#ECECEC"></a-sky>

      <a-entity position="0 0 3.8">
        <a-camera look-controls-enabled="false" keyboard-controls="fpsMode: true"></a-camera>
      </a-entity>
      <script>
        var draggable = document.querySelector('[click-drag]');
          draggable.addEventListener('dragstart', function(dragInfo) {
          draggable.components['dynamic-body'].pause();
          });
        draggable.addEventListener('dragend', function(dragInfo) {
          var x = dragInfo.detail.velocity.x;
          var y = dragInfo.detail.velocity.y;
          var z = dragInfo.detail.velocity.z;

          draggable.components['dynamic-body'].play();
          draggable.body.velocity.set(x, y, z);
          console.log('drag end', dragInfo.detail.velocity);
        });
      </script>
    </a-scene>
  </body>
</html>