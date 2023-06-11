<?php
   session_start();

  include 'db.php';
   if(isset($_POST['add3'])){
    
      $email=$_POST['email'];
      $password=$_POST['password'];
    if($email == "admin@gmail.com" && $password =="123456"){
         header('location:hame_admin.php');
        
    }else{
      
         $sql="SELECT * FROM `user_finance applicant` WHERE Email='$email' AND password='$password' AND type='accept'";
          $statement = $connection->prepare($sql);
          $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);

            $coun = $statement->rowCount();
         if($coun == 1){
      header("location:home_finance applicant.php");
                   $_SESSION['user_name7']= $row['user_nameFrist'];
                    $_SESSION['user_id7']= $row['id'];
             
         }

        else{
                        header("location:login.php?");
 }
   
    }}   

?>


<html>
    <head>
        <meta charset="UTF-8"/>
        <title>  login </title>
         <link rel="stylesheet" href="css/bootstrap.css"/>
         <link rel="stylesheet" href="css/style.css"/>
        <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    </head>
    <body>
        <div id="google_translate_element"></div>

        <div class="container">
            <div class="row justify-contrnt-center" >
             <div class="col-md-10">
                 <?php if(isset($_SESSION['response'])){  ?>
                <div class="alert alert-<?= $_SESSION['res_type']?> alert-dismissible text-center">
              <button type="button" class="close" data-dismiss="alert">&times;
                    </button>
                    <b ><?= $_SESSION['response']; ?></b>
                    </div>
                 <?php } unset($_SESSION['response']); ?>
                 
             </div>
         </div>
            <div class="row">
                <div class="col-md-5">
                    <h1 class="text-center">Login as finance applicant</h1>
                      <form action="#" method="post" enctype="multipart/form-data">

                    <label class="label control-label">Enter your Email</label>
                    <div class="form-group">
                     <input type="email" name="email" class="form-control" placeholder="Enter your Email" required>
                     </div>
                     <label class="label control-label">password</label>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="password" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="checkbox" ><small> Remember me</small>
                        </div>
                    </div>
                   <div class="form-group">
                        <input type="submit"  class="btn btn-primary btn-block" name="add3" value="Login" >
                    </div>
                    <p class="text-center">Not a member yet?<a href="R_f.php"> Sign up</a></p>
                    </form>
                </div>
             
            </div>
        </div>
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
    </body>
</html> 