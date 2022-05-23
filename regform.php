
<?php
require 'db.php';
$message = '';
if (isset ($_POST['f_name'])  && isset($_POST['l_name']) && isset($_POST['district']) && isset($_POST['sector'])
 && isset($_POST['church']) && isset($_POST['pastor']) && isset($_POST['phone']) && isset($_POST['email'])
  && isset($_POST['regno']))
   {


  $fname = $_POST['f_name'];
  $lname= $_POST['l_name'];
  $district = $_POST['district'];
  $sector = $_POST['sector'];
  $church = $_POST['church'];
  $pastor = $_POST['pastor'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $regno = $_POST['regno'];
  $file_name = $_FILES['image']['name'];

  $dest ="/Images/";
  move_uploaded_file($_FILES["image"]["tmp_name"], $dest);

  $sql = 'INSERT INTO christian_tbl(Cfname, Clname , District , Sector , Church , Pastor_Name , Telephone , Email , Reg_Num , Attachment) VALUES(:f_name , :l_name , :district , :sector , :church , :pastor , :phone , :email , :regno ,:image)';

  $statement = $connection-> prepare($sql);
  if ($statement->execute([':f_name' => $fname , ':l_name' => $lname , ':district' => $district , ':sector' => $sector , ':church' => $church , ':pastor' => $pastor , ':phone' => $phone , ':email' => $email ,':regno' => $regno , ':image' => $file_name])) {
    $message = '<h1><I><font color="gray">YOU ARE REGISTRED....</font></I></h1>';
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
<body class="bg-info">


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">PROOF OF REGISTRATION</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="christian_logout.php">LOGOUT</a>
        </li>
        
      </ul>
   
    </div>
  </div>
</nav>



     <div class="container">
        <div class="card mt-5">
            
             <div class="col-md-6 offset-md-3 bg-light">
                 <div class="Registration-form">
        
                       <h4 class="mb-5 text-secondary">Fill The Registration Form</h4>

                          <?php if(!empty($message)): ?>
                          <div class="alert alert-success">
                          <?= $message; ?>
                          </div>
                          <?php endif; ?>
                       <form action="" method="POST" enctype="multipart/form-data">
                         <div class="row">
                                <div class="mb-3 col-md-6">
                                       <label>First Name<span class="text-danger">*</span></label>
                                       <input type="text" name="f_name" class="form-control">   
                                </div>

                                <div class="mb-3 col-md-6">
                                        <label>Last Name<span class="text-danger">*</span></label>
                                        <input type="text" name="l_name" class="form-control">   
                                </div>

                                <div class="mb-3 col-md-12">
                                        <label>District<span class="text-danger">*</span></label>
                                        <input type="text" name="district" class="form-control">   
                                </div>

                                <div class="mb-3 col-md-12">
                                        <label>Sector<span class="text-danger">*</span></label>
                                        <input type="text" name="sector" class="form-control">    
                                </div>

                                <div class="mb-3 col-md-12">
                                        <label>Church Name<span class="text-danger">*</span></label>
                                        <input type="text" name="church" class="form-control">    
                                </div>

                                <div class="mb-3 col-md-12">
                                        <label>Pastor Name<span class="text-danger">*</span></label>
                                        <input type="text" name="pastor" class="form-control">    
                                </div>

                                <div class="mb-3 col-md-12">
                                        <label>Telephone<span class="text-danger">*</span></label>
                                        <input type="text" name="phone" class="form-control">    
                                </div>

                                <div class="mb-3 col-md-12">
                                        <label>Email<span class="text-danger">*</span></label>
                                        <input type="text" name="email" class="form-control">    
                                </div>

                                <div class="mb-3 col-md-12">
                                        <label>Registration Number<span class="text-danger">*</span></label>
                                        <input type="text" name="regno" class="form-control">    
                                </div>
                                <input name="image" type="file" class="form-control" required="required"/>
                        

                                <div class=" col-md-12"><br>
                                
                                        <button class="btn btn-primary float-end">Register Now</button> 
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