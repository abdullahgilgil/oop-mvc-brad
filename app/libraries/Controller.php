<?php 
   /**
    * This is the BASE Controller
    * Loads the Models and Views
    */

   class Controller {
      // Load Model
      public function model($model){
         // Require model file
         require_once '../app/models/' . $model . '.php';

         // Instantiate the model
         return new $model();
         
      } // function model

      // Load View
      public function view($view, $data = []){
         // Check for the view file
         if(file_exists('../app/views/' . $view . '.php')){
           require_once '../app/views/' . $view . '.php';
         } else {
            // View doesn't exist
            die('View does not exist');
         }
      } // function view

   } // class Controller


?>