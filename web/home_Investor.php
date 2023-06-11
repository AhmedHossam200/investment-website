<?php
   session_start();
  include 'db.php';
  
if(isset($_SESSION['user_name8'])){
$id=$_SESSION['user_id8'];
}
else{
header("location:login.php");
exit();
}
$_SESSION['user_idap2']=$id;
$_SESSION['user_idp2']=$id;



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>investor Home</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
    crossorigin="anonymous">
  <link rel="stylesheet" href="./Style.css" />
  <link rel="stylesheet" href="./mobile-style.css">

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
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
              <a class="nav-link" href="#">HOME
                <span class="sr-only">(current)</span>
              </a>
            </li>
          
            <li class="nav-item">
              <a class="nav-link" href="list_order_investor.php">List of orders</a>
            </li>
              <li class="nav-item">
              <a class="nav-link" href="logout.php">logout</a>
            </li>
                  <div id="google_translate_element"></div>

          </ul>
             </div>
            
       
      </nav>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-7 col-sm-12  text-white">
        
                
         <?php if(isset($_SESSION['user_name8'])){  ?>
             <h1>welcome <?= $_SESSION['user_name8']; ?> </h1> 
                    

            <?php  }  ?>

        </div>
      </div>
    </div>
  </header>
  <main>
   
      <?php if(isset($_SESSION['response2'])){  ?>
                <div class="alert alert-<?= $_SESSION['res_type']?> alert-dismissible text-center">
              <button type="button" class="close" data-dismiss="alert">&times;
                    </button>
                    <b ><?= $_SESSION['response2']; ?></b>
                    </div>
                 <?php } unset($_SESSION['response2']); ?>
 
   
  
<section class="table_price text-center">
  <div class="container">
  
    <?php
             $sql = 'SELECT * FROM `order` where type = "new" ';
            $statement = $connection->prepare($sql);
            $statement->execute();
              $people = $statement->fetchAll(PDO::FETCH_OBJ);
                 ?>
    <h1>
        New projects need your support
    </h1>
    <div class="row">

        
              <?php foreach($people as $person): ?>

       <div class="col-lg-4 col-md-5 col-sm-8 col-xs-14">
        <div class="price wow fadeInUp" data-wow-duration="2s" data-wow-offset="300">
          <img class="prodect1" src="<?= $person->images; ?>" width="300" alt="prodact1">
          <ul class="list-unstyled">
            <li> <?= $person->name_project; ?></li>
            <li>description:<?= $person->small_description; ?></li>
              <li> price<?= $person->price_project; ?></li>
          </ul>
          <a href="project.php?project=<?= $person->id; ?>" class="btn btn-primary">View</a>
        </div>
        
      </div>
     
        <?php endforeach; ?> 
      

       
    </div>
  </div>
</section>

  <footer>
    <div class="container-fluid p-0">
      <div class="row text-left">
        <div class="col-md-5 col-sm-5">
          <h4 class="text-light">About us</h4>
          
          <p class="pt-4 text-muted">Copyright ©2021 All rights reserved | This template is made by
            <span>Eng/Ahmed Hossma Ahmed - Eng/Amr Samir Abdo</span>
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