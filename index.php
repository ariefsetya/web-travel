<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script type="text/javascript" src="jquery.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
  <div class="content" id="content">
  <?php
if(isset($_GET['m'])){
    $page = $_GET['m'];
    if(file_exists("tampilan/".$page.".php")){
      include "tampilan/".$page.".php";
    }else{
      include 'tampilan/error/404.php';
    }
  }else{
    include 'home.php';
  }
  ?>
  </div>
<script type="text/javascript" src="script.js"></script>

</body>
</html>