<?php
     class Controller
     {
         //load model
         public function model($model)
         {
             //require model
             require_once '../App/models/' . $model . '.php';
             return new $model();
         }

         //load view
         public function view($view, $data = [])
         {
             //check for the view file
            if (file_exists('../App/views/' . $view . '.php'))
                 require_once '../App/views/' . $view . '.php';
            else
                die('view does not exists');
         }

     }