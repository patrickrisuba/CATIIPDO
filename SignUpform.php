
<?php
require 'db.php';
$message = '';
if (isset ($_POST['fname'])  && isset($_POST['lname']) && isset($_POST['regnumb']) && isset($_POST['Password']))
   {

  $firstn = $_POST['fname'];
  $lastn= $_POST['lname'];
  $regn = $_POST['regnumb'];
  $passW = $_POST['Password'];
  
  $sql = 'INSERT INTO christian_signup(Firstname, Lastname , Regno , password) VALUES(:fname , :lname , :regnumb , :Password)';

  $statement = $connection-> prepare($sql);
  if ($statement->execute([':fname' => $firstn , ':lname' => $lastn , ':regnumb' => $regn , ':Password' => $passW])) {
    $message = 'SignUp successfully';
    header('location:christian_login_page.php');
  }

}
 ?>

<!DOCTYPE html>
<html>
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Form </title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body class="bg-dark">


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- <a class="navbar-brand" href="/">Navbar</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contuct us</a>
      </li>
      
      
      
    </ul>
  </div>
</nav>
     <div class="container">
        <div class="card mt-5">
            
             <div class="col-md-6 offset-md-3 bg-light">
                 <div class="Registration-form">
        
                       <h3 class="mb-5 text-secondary">Fill The Form To Create Account</h3>

                          <?php if(!empty($message)): ?>
                          <div class="alert alert-success">
                          <?= $message; ?>
                          </div>
                          <?php endif; ?>
                       <form action="" method="POST" enctype="multipart/form-data">
                         <div class="row">
                                
                             <div class="mb-3 col-md-9">
                                        <label>First_name<span class="text-danger">*</span></label>
                                        <input type="text" name="fname" class="form-control">    
                            </div>
                            <div class="mb-3 col-md-9">
                                        <label>Last_name<span class="text-danger">*</span></label>
                                        <input type="text" name="lname" class="form-control">    
                            </div>

                            <div class="mb-3 col-md-9">
                                        <label>Registration Number<span class="text-danger">*</span></label>
                                        <input type="text" name="regnumb" class="form-control">    
                              </div>

                               <div class="mb-3 col-md-9">
                                        <label>Password<span class="text-danger">*</span></label>
                                        <input type="password" name="Password" class="form-control">    
                               </div><br>
                                <div class=" col-md-9">
                              <button class="btn btn-primary float-end"><I><b>SignUp Now</b></I></button> 
                                </div>
                         </div> 
                     </form>                 
                 </div>
                 
             </div>
               
           </div>
          
     </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>