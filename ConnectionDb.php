<?php
try{
     $conn= new PDO("mysql:host=localhost; dbname=first", "root","root");
}
catch (PDOException $exception) {
            echo "Connection error: ".$exception->getMessage();
  }