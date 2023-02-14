<?php
use PDO;
try 
{
  $conn= new PDO('mysql:host=localhost;dbname=db_multi_shop','root', '');
  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  return $conn;

}
 catch (PDOException $exception)
{
  error_log($exception->getMessage());
  die('Something went wrong. Please, try again later.');
}





?>