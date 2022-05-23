<?php
 session_start();  
 $host = "localhost";  
 $username = "root";  
 $pass = "";  
 $database = "cepdb";  
 $message = "";  
 
 try  
 {  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $pass);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      if($connect)
      {
         // echo'success';
      }
     // $username = $_POST['username'];
   // $password = $_POST['password'];  
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["regno"]) || empty($_POST["password"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else  
           {  
                $query = "SELECT * FROM christian_signup WHERE Regno = :regno AND password = :password";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          'regno'     =>     $_POST["regno"],  
                          'password'     =>     $_POST["password"]  
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                     $_SESSION["regno"] = $_POST["regno"];  
                     header("location:regform.php");  
                }  
                else  
                {  
                     $message = '<label>Wrong Data</label>'; 
                     echo'errro' ;
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 ?>