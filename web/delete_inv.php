<?php
   session_start();
  include 'action.php';
  
if (isset($_GET['acc'])){
    $id=$_GET['acc'];
   
     
    $query="UPDATE `order` SET type='new'  WHERE id='$id'";
     $stmt=$connection->prepare($query);
      $stmt->execute([]);
     $query2="UPDATE `order` SET inv=0  WHERE id='$id'";
     $stmt2=$connection->prepare($query2);
      $stmt2->execute([]);

    header('location:list_order_investor.php');
      $_SESSION['response']="Successfully print to the database! ";
      $_SESSION['res_type']="success";
    
    
    
}
?>