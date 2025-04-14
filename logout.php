<?php
session_start();

session_destroy();

echo "<script>
		    alert('logout succssfull ');
		    window.location.href = 'index.php';
       </script>";

 ?>