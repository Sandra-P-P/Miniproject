<?php
echo'<div style="text-align:center;"><a class="btn light m-auto d-block" target="_blank" style="color:black;" type="button" href="vivaquestion.php">
         <button id="start" type="button" class="btn light m-auto d-block" style="color:black; font-weight:30px; text-align:center;" >Start test</button>
         </a></div>';
?>
<script>
function isCamAlreadyActive() {
    if (navigator.getUserMedia) {
        navigator.getUserMedia({
            video: true
        }, function (stream) {
            // returns true if any tracks have active state of true
            var result = stream.getVideoTracks().some(function (track) {
                return track.enabled && track.readyState === 'live';
            });
            var btn=document.getElementById("start");
      if (result) {
        alert("Your webcam is not on");
       btn.style.display="block";
       
      } else {
        alert("ON");
         btn.style.display="none";
      }
        },
        function(e) {
            alert("Error: " + e.name);
        });

    }
  }

</script>
