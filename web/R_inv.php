<?php
  include 'action.php';
?>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>signup</title>
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
                    <h1 class="text-center">Sign-up as investor </h1>
                                     <form action="action.php" method="post" enctype="multipart/form-data">

                     <div class="form-group">
                     <input type="text" name="frist_name" class="form-control" placeholder="Enter frist name" required>
                     </div>
                     <div class="form-group">
                     <input type="text" name="list_name" class="form-control" placeholder="Enter last name" required>
                     </div>
                     <div class="form-group">
                     <input type="email" name="email" class="form-control" placeholder="Enter E-mail" required>
                     </div>
                                          <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="password" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password2" placeholder="Re-type password" required>
                    </div>
                     <div class="form-group">
                     <input type="tel" name="phone" class="form-control" placeholder="Enter whatsapp phone number" required>
                     </div>
                                      <div class="form-group">
                     <input type="number" name="age" class="form-control" placeholder="Enter your age" required>
                     </div>
                     
                       <div class="form-group">
                     <input type="text" name="nationality" class="form-control" placeholder="Enter your nationality" required>
                     </div>
                                         <div class="form-group">
                     <input type="email" name="emailg" class="form-control" placeholder="Enter your gmail" required>
                     </div>
                     <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" name="s_v" value="submit" >
                    </div>
                    </form>
                </div>
            
            </div>
        </div>
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
    </body>
</html> 