<?php

   try
   {
       
        $dsn = 'mysql:host=localhost;dbname=spotyclown';


       
        $user = 'root';

        $password = '';

        $db = new PDO( $dsn, $user, $password);
   }
   catch (Exception $message){
      
        echo "ya un blem <br>" . "<pre>$message</pre>" ;
   }