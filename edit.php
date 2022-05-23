<?php
require 'db.php';
$id = $_GET['Cid'];
$sql = 'SELECT * FROM christian_tbl WHERE Cid=:Cid';
$statement = $connection->prepare($sql);
$statement->execute(['Cid' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);

if (isset ($_POST['Cfname'])  && isset($_POST['Clname']) && isset($_POST['District']) && isset($_POST['Sector'])
 && isset($_POST['Church']) && isset($_POST['Pastor_Name']) && isset($_POST['Telephone']) && isset($_POST['Email'])
  && isset($_POST['Reg_Num']))
   {

  $fname    = $_POST['Cfname'];
  $lname    = $_POST['Clname'];
  $district = $_POST['District'];
  $sector   = $_POST['Sector'];
  $church   = $_POST['Church'];
  $pastor   = $_POST['Pastor_Name'];
  $phone    = $_POST['Telephone'];
  $email    = $_POST['Email'];
  $regno    = $_POST['Reg_Num'];


  
  $sql = 'UPDATE christian_tbl SET Cfname=:Cfname, Clname=:Clname, District=:District, Sector=:Sector,  Church=:Church, Pastor_Name=:Pastor_Name, Telephone=:Telephone, Email=:Email, Reg_Num=:Reg_Num WHERE Cid=:Cid';

   $statement = $connection-> prepare($sql);
  if ($statement->execute([':Cfname' => $fname , ':Clname' => $lname , ':District' => $district , ':Sector' => $sector , ':Church' => $church , ':Pastor_Name' => $pastor , ':Telephone' => $phone , ':Email' => $email ,':Reg_Num' => $regno,':Cid' => $id])) {

    header("Location: display.php");
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
          <a class="nav-link active" aria-current="page" href="#">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">LOGOUT</a>
        </li>
        
      </ul>
   
    </div>
  </div>
</nav>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update Christian</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
     
      
      <form action="" method="POST" enctype="multipart/form-data">
                         <div class="row">
                              <div class="mb-3 col-md-6">
                                      
                                       <input type="hidden" value="<?= $person->Cid; ?>" name="Cid" class="form-control">   
                                </div>
                                <div class="mb-3 col-md-12">
                                       <label>First Name<span class="text-danger">*</span></label>
                                       <input type="text" value="<?= $person->Cfname; ?>" name="Cfname" class="form-control">   
                                </div>

                                <div class="mb-3 col-md-12">
                                        <label>Last Name<span class="text-danger">*</span></label>
                                        <input type="text" value="<?= $person->Clname; ?>" name="Clname" class="form-control">   
                                </div>

                                <div class="mb-3 col-md-12">
                                        <label>District<span class="text-danger">*</span></label>
                                        <input type="text" value="<?= $person->District; ?>" name="District" class="form-control">   
                                </div>

                                <div class="mb-3 col-md-12">
                                        <label>Sector<span class="text-danger">*</span></label>
                                        <input type="text" value="<?= $person->Sector; ?>" name="Sector" class="form-control">    
                                </div>

                                <div class="mb-3 col-md-12">
                                        <label>Church Name<span class="text-danger">*</span></label>
                                        <input type="text" value="<?= $person->Church; ?>" name="Church" class="form-control">    
                                </div>

                                <div class="mb-3 col-md-12">
                                        <label>Pastor Name<span class="text-danger">*</span></label>
                                        <input type="text" value="<?= $person->Pastor_Name; ?>" name="Pastor_Name" class="form-control">    
                                </div>

                                <div class="mb-3 col-md-12">
                                        <label>Telephone<span class="text-danger">*</span></label>
                                        <input type="text" value="<?= $person->Telephone; ?>" name="Telephone" class="form-control">    
                                </div>

                                <div class="mb-3 col-md-12">
                                        <label>Email<span class="text-danger">*</span></label>
                                        <input type="text" value="<?= $person->Email; ?>" name="Email" class="form-control">    
                                </div>

                                <div class="mb-3 col-md-12">
                                        <label>Registration Number<span class="text-danger">*</span></label>
                                        <input type="text" value="<?= $person->Reg_Num; ?>" name="Reg_Num" class="form-control">    
                               </div>
                         
                                
                        

                                <div class=" col-md-12"><br>
                                        <button  type= "submit" class="btn btn-primary float-end">Update Now</button> 
                                </div>
                         </div>
                         
                     </form>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>