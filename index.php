<?php require('auth.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Javascript Browser</title>
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="stylesheet" href="assets/fancybox/jquery.fancybox.min.css" />
    <link rel="manifest" href="manifest.json">
    <script src="assets/js/jquery-1.10.0.min.js"></script>
    <script src="assets/js/script.js" charset="UTF-8"></script>
    <script src="assets/fancybox/jquery.fancybox.min.js" charset="UTF-8"></script> 
  </head>
  <body>
    <div class="filemanager">
      <div class="search">
        <input type="search" placeholder="Find a file.." />
      </div>
      <div class="breadcrumbs">
      </div>
      <ul class="data">
      </ul>
      <div class="nothingfound">
        <div class="nofiles">
        </div>	
        <span>No files here.
        </span>
      </div>
    </div>
    <script type="text/javascript">
    $.fancybox.defaults.hash = false;
    $.fancybox.defaults.buttons = ['zoom','slideShow','download','close'];
    </script>
  </body>
</html>
