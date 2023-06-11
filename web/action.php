<?php
  session_start();
  include 'db.php';

if(isset($_POST['s_v'])){
      $namef=$_POST['frist_name'];
      $namel=$_POST['list_name'];
      $email=$_POST['email'];
      $age=$_POST['age'];
      $phone=$_POST['phone'];
      $password=$_POST['password'];
      $passwrd=$_POST['password2'];
      $nationality=$_POST['nationality'];
$emailg=$_POST['emailg'];
      $age=$_POST['age'];

      
     
      if($password == $passwrd){
          
          $query="INSERT INTO user_investor(user_nameFrist,user_nameList,phone,password,age,Email,ne,Emailg)VALUES(:namef,:namel,:phone,:password,:age,:email,:nationality,:emailg)";
      $stmt=$connection->prepare($query);
      $stmt->execute([':namef' => $namef,':namel' => $namel, ':email' => $email ,':phone' =>$phone ,':password'=>$password,':age'=>$age,':nationality'=>$nationality,':emailg'=>$emailg]);
      header('location:R_inv.php');
      $_SESSION['response']="wait for accept! ";
      $_SESSION['res_type']="success";
          
      }else{
                $_SESSION['response']="fail Inserted to the database! ";
                $_SESSION['res_type']="Danger";
                header('location:R_inv.php');


          
      }
      
  }
if(isset($_POST['s_f'])){
      $namef=$_POST['frist_name'];
      $namel=$_POST['list_name'];
      $email=$_POST['email'];
      $age=$_POST['age'];
      $phone=$_POST['phone'];
      $password=$_POST['password'];
      $passwrd=$_POST['password2'];
      $nationality=$_POST['nationality'];
     $emailg=$_POST['emailg'];

      $age=$_POST['age'];

      
     
      if($password == $passwrd){
          
          $query="INSERT INTO `user_finance applicant`(user_nameFrist,user_nameList,phone,password,age,Email,ne,Emailg)VALUES(:namef,:namel,:phone,:password,:age,:email,:nationality,:emailg)";
      $stmt=$connection->prepare($query);
      $stmt->execute([':namef' => $namef,':namel' => $namel, ':email' => $email ,':phone' =>$phone ,':password'=>$password,':age'=>$age,':nationality'=>$nationality,':emailg'=>$emailg]);
      header('location:R_f.php');
      $_SESSION['response']="wait for accept! ";
      $_SESSION['res_type']="success";
          
      }else{
                $_SESSION['response']="fail Inserted to the database! ";
                $_SESSION['res_type']="Danger";
                header('location:R_f.php');


          
      }
      
  }
if (isset($_GET['delete'])){
    $id=$_GET['delete'];
    
     
    $query="DELETE FROM `user_finance applicant` WHERE id='$id'";
     $stmt=$connection->prepare($query);
      $stmt->execute([]);
    header('location:list_admin.php');
      $_SESSION['response']="Successfully delete to the database! ";
      $_SESSION['res_type']="danger";
    
    
    
}
if (isset($_GET['delete2'])){
    $id=$_GET['delete2'];
    
     
    $query="DELETE FROM `user_investor` WHERE id='$id'";
     $stmt=$connection->prepare($query);
      $stmt->execute([]);
    header('location:list_admin_inv.php');
      $_SESSION['response']="Successfully delete to the database! ";
      $_SESSION['res_type']="danger";
    
    
    
}
if (isset($_GET['order2'])){
    $id=$_GET['order2'];
      
    $query="UPDATE `order` SET type='wait'  WHERE id='$id'";
     $stmt=$connection->prepare($query);
      $stmt->execute([]);
    
    header('location:project.php');
      $_SESSION['response']="Successfully print to the database! ";
      $_SESSION['res_type']="success";
    
    
    

    
    
}
if (isset($_GET['accept'])){
    $id=$_GET['accept'];
      
    $query="UPDATE `user_finance applicant` SET type='accept'  WHERE id='$id'";
     $stmt=$connection->prepare($query);
      $stmt->execute([]);
    
    header('location:list_admin.php');
      $_SESSION['response']="Successfully accept to the database! ";
      $_SESSION['res_type']="success";
    
    
    

    
    
}
if (isset($_GET['accept2'])){
    $id=$_GET['accept2'];
      
    $query="UPDATE `user_investor` SET type='accept'  WHERE id='$id'";
     $stmt=$connection->prepare($query);
      $stmt->execute([]);
    
    header('location:list_admin_inv.php');
      $_SESSION['response']="Successfully accept to the database! ";
      $_SESSION['res_type']="success";
    
    
    

    
    
}

?>