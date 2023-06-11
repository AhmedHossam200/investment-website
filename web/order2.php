<?php
   session_start();
  include 'action.php';
  
if (isset($_GET['order2'])){
    $id=$_GET['order2'];
      
    $query="UPDATE `order` SET type='wait'  WHERE id='$id'";
     $stmt=$connection->prepare($query);
      $stmt->execute([]);
    header('location:project.php');
      $_SESSION['response']="Successfully print to the database! ";
      $_SESSION['res_type']="success";
    
    
    

    
    
}
?>