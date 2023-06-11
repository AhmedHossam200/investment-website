<?php
   session_start();
  include 'action.php';
  
if (isset($_GET['delete'])){
    $id=$_GET['delete'];
    
        $sql="SELECT * FROM `order` WHERE  id='$id' ";
      $stmt2=$connection->prepare($sql);
      $stmt2->execute([]);
   $result = $stmt2->fetch(PDO::FETCH_ASSOC);

    $i=$result['file'];
    unlink($i);
    $query="DELETE FROM `order` WHERE id='$id'";
     $stmt=$connection->prepare($query);
      $stmt->execute([]);
    header('location:hame_admin.php');
      $_SESSION['response']="Successfully delete to the database! ";
      $_SESSION['res_type']="danger";
    
    
    
}
?>