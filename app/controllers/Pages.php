<?php 
   class Pages extends Controller {

      public function __construct(){
         $this -> postModel = $this->model('Post');

      }

      public function index (){
         // $this -> view('hello');
         // echo 'Index page...';
         $posts = $this -> postModel -> getPosts(); 

         $data = [
            'title' => 'Welcome to Homepage',
            'posts' => $posts
         ];
         
         $this -> view("pages/index", $data);
      }

      public function about (){
         $data = [
            'title' => 'Welcome to About Us'
         ];
         $this->view("pages/about", $data);
      }

   }

?>