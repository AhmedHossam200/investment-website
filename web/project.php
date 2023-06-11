<?php
   session_start();
  include 'db.php';
if(isset($_SESSION['user_idp2'])){
$id55=$_SESSION['user_idp2'];
}
  
if (isset($_GET['project'])){
    $id=$_GET['project'];
}else{
header("location:home_investor.php");
exit();
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-compatible" content="lE=edge" >
  <title>producer</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/css2.css">
  <link rel="stylesheet" type="text/css" href="css/pages.css">  <!-- media="screen"/"print" -->
    <!-- media="screen"/"print" -->
  <link rel="stylesheet" type="text/css" href="css/media.css"> 
  <link rel="stylesheet" type="text/css" href="css/hover.css"> 
  <link rel="stylesheet" type="text/css" href="css/option_1.css">
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</head>
<body>
    <div id="google_translate_element"></div>

<!-- start  section option box -->

<section class="option">
  <div class="color">
    <h3> color option</h3>
    <ul class="list-unstyled">
      <li data-value="css/defualt_option.css"></li>
      <li data-value="css/option_1.css"></li>
      <li data-value="css/option_2.css"></li>
      <li data-value="css/option_3.css"></li>
      <li data-value="css/option_4.css"></li>
    </ul>
  </div> 
  <i class="fa fa-gear fa-3x geer"></i> 
</section>

<nav class="navbar navbar-inverse navbar-fixed-top ">
  <div class="container">
    <!-- start of container -->
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    
      <a class="navbar-brand hvr-grow-rotate  <!-- hvr-skew-backward -->" href="#">Modern investment</a>
    </div>

    
  
  </div><!-- end of container -->
</nav>
 <?php
         
             $sql = "SELECT * FROM `order` WHERE id ='$id'";
            $statement = $connection->prepare($sql);
            $statement->execute();
     $sql3 = "UPDATE `order` SET inv='$id55'  WHERE id='$id'";
            $statement3 = $connection->prepare($sql3);
            $statement3->execute();
              $people = $statement->fetchAll(PDO::FETCH_OBJ);
                 ?>
<section class="text-center about-us">
  <div class="container">
    <div class="row">

           <?php foreach($people as $person):?>
      
    <h2 class="h1">
     <?= $person->name_project; 
        ?> 
    </h2>
        
	<img src="<?= $person->images; ?>" width="300">
    
	<h2>region of project: <?= $person->addres; ?></h2>  
     <h2>description:  <?= $person->description; ?></h2> 
	<h2>price :<?= $person->price_project; ?></h2>
        <?php
          $sql9 = "SELECT * FROM `user_finance applicant` WHERE id ='$person->user_finance_id'";
            $statement9 = $connection->prepare($sql9);
            $statement9->execute();
                      $people9 = $statement9->fetchAll(PDO::FETCH_OBJ);

        ?>
               <?php foreach($people9 as $person9):?>
                	<h2>name of finance applicant: <?= $person9->user_nameFrist; ?></h2>  

        	<h2>number of finance applicant: <?= $person9->phone; ?></h2> 
        <script>
            $('#done').on('click',function(e){
                          e.preventDefault();
            bs4pop.dialog({
                id:'modal',
                title:'done ',
                content:'plase call <?= $person9->phone; ?> to accept project',
                width: 600,
                height:'',
                target:'body',
                closeBtn:true,
                hideRemove:true,
                escape:true,
                autoFocus:true,
                show:true,
                backdrop:true,
                drag:true,
                btns:[{
                    label:'done',
                    className:'btn-secondary',
                    onclick(cb){}
                }]
                
            })
                          })
        </script>

<?php endforeach; ?>
                  <a href="action.php?order2=<?= $person->id; ?>" class="btn btn-primary" id="done">Done</a>

 
	  <?php endforeach; ?> 
	  
   
  
      </div>

  </div>
         

</section>
</body>
</html>