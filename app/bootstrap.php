<?php 
   // load config file
   require_once 'config/config.php';

   // Load libraries
   // require_once 'libraries/Core.php';
   // require_once 'libraries/Controller.php';
   // require_once 'libraries/Database.php';
   // AUTOLOADER FOR ALL UP THERE

   // Autoload Core Libraries (to load libraries up there, think about if we have 100 libraries !!!)
   spl_autoload_register(function($className){
      require_once 'libraries/' .$className. '.php';
   });

?>
<!-- <h1>bootstrap'tan gelenler...</h1> -->