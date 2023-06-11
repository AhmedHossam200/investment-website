<?php
   session_start();
  include 'action.php';
  
if (isset($_GET['accept'])){
    $id=$_GET['accept'];
   
     
    $query="UPDATE `order` SET type='accept'  WHERE id='$id'";
     $stmt=$connection->prepare($query);
      $stmt->execute([]);
   

    header('location:home_finance applicant.php');
      $_SESSION['response']="Successfully print to the database! ";
      $_SESSION['res_type']="success";
    
    
    
}
?>