<?php
   session_start();
  include 'db.php';
  
  
if(isset($_SESSION['user_idap'])){
$id=$_SESSION['user_idap'];
}else{
header("location:index.php");
exit();
}

 if(isset($_POST['ad'])){
      $name=$_POST['name'];
      $description=$_POST['description'];
      $price=$_POST['price'];
      $addres=$_POST['addres'];
      $small_description=$_POST['small_description'];
      $photo=$_FILES['file']['name'];
      $upload="upload/".$photo;
      $query="INSERT INTO `order`(`name_project`, `description`, `price_project`, `user_finance_id`, `addres`, `images`, `small_description`, `type`) VALUES ('$name','$description','$price','$id','$addres','$upload','$small_description','new')";
      $stmt=$connection->prepare($query);
      $stmt->execute([]);

      move_uploaded_file($_FILES['file']['tmp_name'],$upload);
     if($stmt){
      header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/add_applicant.php");
      $_SESSION['response']="Successfully Inserted to the database! ";
      $_SESSION['res_type']="success";
     }
          
      
      
      
  } 



?>

               
                 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>add project</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
    crossorigin="anonymous">
  <link rel="stylesheet" href="./Style.css" />
  <link rel="stylesheet" href="./mobile-style.css">
</head>

<body>
  <header>
    <div class="container-fluid p-0">
      <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">
          <i class="fas fa-book-reader fa-2x mx-3"></i>Modern investment</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
          aria-label="Toggle navigation">
          <i class="fas fa-align-right text-light"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <div class="mr-auto"></div>
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="home_finance%20applicant.php">HOME
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Add new project</a>
            </li>
            
            <li class="nav-item dropdown">
              <div class="dropdown">
                <a href="list_order_finance.php" class="nav-link">List of projects</a>
                
              </div>
            </li>
            

              <li class="nav-item">
              <a class="nav-link" href="logout.php">logout</a>
            </li>
              
          </ul>
        </div>
      </nav>
    </div>

  </header>
  <main>
   
    <section class="section-2 container-fluid p-0">
    <div class="container-fluid">

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
         
             <div class="col-md-4">
                 <h3 class="text-center text-info">Add new projcet</h3>
                 <form action="#" method="post" enctype="multipart/form-data">
                     <div class="form-group">
                     <input type="text" name="name" class="form-control" placeholder="Enter name" required>
                     </div>
                     <div class="form-group">
                     <input type="text" name="description" class="form-control" placeholder="Enter full description" required>
                     </div>
                     <div class="form-group">
                     <input type="text" name="small_description" class="form-control" placeholder="Enter small_description" required>
                     </div>
                     <div class="form-group">
                     <input type="text" name="addres" class="form-control" placeholder="Enter region " required>
                     </div>
                 <div class="form-group">
                     
                     <input type="number" name="price" class="form-control" placeholder="Enter expected cost" required>
                     </div>
                     
                     
                     <div class="form-group">
                        <input type="file" class="custom-file" name="file"  >
                    </div>
                     <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" name="ad" value="creat" >
                    </div>
                     
                 </form>
             </div>
         
        </div>
</section>
  <footer>
    <div class="container-fluid p-0">
      <div class="row text-left">
        <div class="col-md-5 col-sm-5">
          <h4 class="text-light">About us</h4>
          <p class="pt-4 text-muted">Copyright ©2021 All rights reserved | This template is made by
            <span>Eng/Ahmed Hossam Ahmed - Eng/Amr Samir Abdo</span>
          </p>
        </div>
        <div class="col-md-5 col-sm-12">
          <h4 class="text-light">Newsletter</h4>
          <p class="text-muted">Stay Updated</p>
          <form class="form-inline">
            <div class="col pl-0">
              <div class="input-group pr-5">
                <input type="text" class="form-control bg-dark text-white" id="inlineFormInputGroupUsername2" placeholder="E-mail">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-arrow-right"></i>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-2 col-sm-12">
          <h4 class="text-light">Follow Us</h4>
          <p class="text-muted">Let us be social</p>
          <div class="column text-light">
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-youtube"></i>
          </div>
        </div>
      </div>
    </div>
  </footer>
      </main>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <script src="./main.js"></script>
</body>

</html>
