<?php
   session_start();
  include 'action.php';
  
if (isset($_GET['delete20'])){
    $id=$_GET['delete20'];
    
      
    $query="UPDATE  `order` SET type='new'  WHERE id='$id'";
     $stmt=$connection->prepare($query);
      $stmt->execute([]);
    header('location:home_finance applicant.php');
      $_SESSION['response']="Successfully delete to the database! ";
      $_SESSION['res_type']="danger";
    
    
    
}
?>