<?php
     
     session_start();

     include 'includes/db.php';

     include 'includes/functions.php';

     include 'includes/dash_header.php';

      logout();

      session_unset();
      session_destroy();

      reDirect("index.php", '?Please login');
?>