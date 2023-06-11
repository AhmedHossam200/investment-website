<?php
   session_start();
  include 'db.php';
  
if(isset($_SESSION['user_name7'])){
$id=$_SESSION['user_id7'];
}
else{
header("location:login.php");
exit();
}
$_SESSION['user_idap']=$id;
$_SESSION['user_idp']=$id;



?>

               
                 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>home</title>

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
              <a class="nav-link" href="add_applicant.php">Add new project</a>
            </li>
            
            <li class="nav-item dropdown">
              <div class="dropdown">
                <a href="list_order_finance.php" class="nav-link">List of projects</a>
                
              </div>
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
             
                 
         <?php if(isset($_SESSION['user_name7'])){  ?>
             <h1>welcome <?= $_SESSION['user_name7']; ?> </h1> 
                    

            <?php  }  ?>
          
          <p>
              Find your investor the easiest way. 
          </p>
           <a href="add_applicant.php" class="btn btn-dark px-5 py-2 primary-btn mb-5">Add new project</a>

        </div>
      </div>
    </div>
  </header>
  <main>
   
    <section class="section-2 container-fluid p-0">
    <div class="container-fluid">
         <div class="row">
             <div class="col-md-8">
                 
                 
                 
                
                 <?php
                    
             
                  

                                                        

             $sql = "SELECT * FROM `order` WHERE type = 'wait' and user_finance_id  = '$id'";
                                                       

        $statement = $connection->prepare($sql);
          $statement->execute([]);
            $people = $statement->fetchAll(PDO::FETCH_OBJ);
                 ?>
                 <h3 class="text-center text-info">Projects in waiting list </h3>
                  <table class="table  table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>project name</th>
        <th>cost</th>
        <th>region</th>
        <th>type</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach($people as $person): ?>
      <tr>
                  <td> <?= $person->id; ?></td>
        <td> <?= $person->name_project; ?></td>
        <td><?= $person->price_project; ?></td>
                  <td><?= $person->addres; ?></td>
        <td><?= $person->type; ?></td>
        <td>
                                     <a  href="accept_project.php?accept=<?= $person->id; ?>" class="badge badge-danger p-2">accept</a>

                         <a  href="delete_project.php?delete20=<?= $person->id; ?>" class="badge badge-danger p-2">Delete</a>
                 
                      
          </td>


      </tr>
    <?php endforeach; ?>   
    </tbody>
  </table>
                
             </div>
              <div class="col-md-8">
                
             </div>
              </div>
         </div>
          <div class="container-fluid">
         <div class="row">
             <div class="col-md-8">
                 
                 
                 
                
                 <?php
                    
             
                  

                                                        

             $sql = "SELECT * FROM `order` WHERE type = 'accept' and user_finance_id  = '$id'";
                                                       

        $statement = $connection->prepare($sql);
          $statement->execute([]);
            $people = $statement->fetchAll(PDO::FETCH_OBJ);
                 ?>
                 <h3 class="text-center text-info">list of accepted project </h3>
                  <table class="table  table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>project name</th>
        <th>cost</th>
        <th>region</th>
        <th>type</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach($people as $person): ?>
      <tr>
                  <td> <?= $person->id; ?></td>
        <td> <?= $person->name_project; ?></td>
        <td><?= $person->price_project; ?></td>
                  <td><?= $person->addres; ?></td>
        <td><?= $person->type; ?></td>
        <td>

                         <a  href="delete_project.php?delete20=<?= $person->id; ?>" class="badge badge-danger p-2">Delete</a>
                 
                      
          </td>


      </tr>
    <?php endforeach; ?>   
    </tbody>
  </table>
                
             </div>
              <div class="col-md-8">
                
             </div>
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
