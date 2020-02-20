<?php

session_start();
session_destroy();
//header("location : index.php");
?>

<html>
  <head>
    <script type="text/javascript">
      function RedirectionJavascript(){
        document.location.href="index.php";
      }
   </script>
  </head>
  <body onLoad="RedirectionJavascript()">
     <div>Si vous voyez ce messages</div>
  </body>
</html>