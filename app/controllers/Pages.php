<?php 
   class Pages extends Controller {

      public function __construct(){
         
      }

      public function index (){
         $this -> view('hello');
         // echo 'Index page...';
      }

      public function about ($id){
         echo 'This is ABOUT page... ' . $id;
      }

   }

?>