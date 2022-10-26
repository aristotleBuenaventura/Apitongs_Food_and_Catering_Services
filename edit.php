<?php 
  include "connection.php";
  session_start();
  if (isset($_SESSION['email'])){
    $email = $_SESSION['email'];
  } else {
    $email = "";
  }
  $id = $_GET["id"];
  $result = mysqli_query($conn,"SELECT * FROM registration WHERE id='$id'");
  $resultCheck = mysqli_num_rows($result);
  
  $result2 = mysqli_query($conn,"SELECT * FROM registration WHERE email='$email'");
  $resultCheck2 = mysqli_num_rows($result);

    
  if($resultCheck > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $idDB = $row['id'];
      $userDB = $row['username'];
      $emailDB = $row['email'];
      $firstnameDB = $row['firstname'];
      $lastnameDB = $row['lastname'];
      $passwordDB = $row['password'];
      $roleDB = $row['role'];
    }
  }
  $roleDB2 = '';
  if($resultCheck2 > 0) {
    while($row = mysqli_fetch_assoc($result2)) {
      $idDB2 = $row['id'];
      $userDB2 = $row['username'];
      $emailDB2 = $row['email'];
      $firstnameDB2 = $row['firstname'];
      $lastnameDB2 = $row['lastname'];
      $passwordDB2 = $row['password'];
      $roleDB2 = $row['role'];
    }
  }
  
  if ( $roleDB2 == 'user' || $email == "") :
    header('Location: index.php');
    exit();
  endif;
  

  $sqlCode = "SELECT count(*) as total from reservation WHERE email='$email'";
  $results = $conn->query($sqlCode);
  $data =  $results->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css'>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"> -->

<title>Inquiry</title>

<meta charset ="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="mainAbout.css">

</head>

<body>

<!-- Navbar  -->  
<nav class="navbar navbar-expand-lg navbar-light bg-warning sticky-top ">
  <div class="container">
    <img src ="apitonglogo.png" class="img-responsive logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse container" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item nav-a">
          <a class="nav-link" href="index.php">Home</a>
      </li>

      <li class="nav-item nav-a">
          <a class="nav-link" href="Packages.php">Packages</a>
      </li>

      <li class="nav-item nav-a">
        <a class="nav-link" href="Inquiry.php">Inquiry</a>
    </li>

      <li class="nav-item nav-a">
          <a class="nav-link" href="About.php">About Us</a>
      </li>

      <?php if($roleDB2 == 'user')
      {
      ?>
      <li class="nav-item nav-a">
        <a class="nav-link" href="reservation.php">Bookings</a>
        <?php if($data['total'] > 0) 
        {
        ?>
        <span class="position-absolute top-0 start-100 ml-1 mt-1 translate-middle badge rounded-pill bg-danger">
        <?php
        echo $data['total'];
        ?>
  </span>
         <?php
        }
        ?> 
      </li>
      <li class="nav-item nav-a">
        <a class="nav-link" href="profile.php">Profile</a>
      </li>
        <li class="nav-item nav-a">
          <a class="nav-link" href="Logout.php">Log out</a>
        </li>
      <?php }
      elseif($roleDB2 == 'admin') {
        ?>
          <li class="nav-item nav-a">
            <a class="nav-link" href="profile.php">Profile</a>
          </li>
          <li class="nav-item nav-a">
            <a class="nav-link" href="admin.php">Admin</a>
          </li>
          <li class="nav-item nav-a">
          <a class="nav-link" href="Logout.php">Log out</a>
        </li>
        <?php
      }
      else{ ?>
        

      <li class="nav-item nav-a">
        <a class="nav-link" href="loginBackEnd.php">Log in</a>
      </li>
      <?php } ?>
      
    </div>
  </div>
</nav>

<div class="bg-light">
    <div class="container">
        <div class="col-lg-4">
            <div class="atitle">
                <!-- <h2>Admin Database Management System</h2> -->
            </div>
            <form action="" name="form1" method="POST" enctype="multipart/form-data">

            <img src="<?php echo $image1;?>" height="100" width="100">
                
                <div class="form-group">
                    <label for="email">Username:</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" value="<?php echo $userDB; ?>" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $emailDB; ?>" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="<?php echo $passwordDB; ?>" required>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image1">
                </div>


                <button type="submit" name="update" class="btn btn-default">Update</button>
                <button type="submit" name="cancel" class="btn btn-default">Cancel</button>

            </form>
        </div>
    </div>
<?php
if (isset($_POST["update"])) {

    // $tm=md5(time());
    // $fnm=$_FILES["image1"]["name"];

    // if($fnm=="")
    // {
    //     mysqli_query($conn, "update users set username='$_POST[username]',email='$_POST[email]',password='$password' where id=$id");
    // }
    // else
    // {
    //     $dst="./userimages/".$tm.$fnm;
    //     $dst1="userimages/".$tm.$fnm;
    //     move_uploaded_file($_FILES["image1"]["tmp_name"],$dst);
    
    //     $password = md5($_POST['password']);
    //     mysqli_query($conn, "update users set username='$_POST[username]',email='$_POST[email]',password='$password', image1='$dst' where id=$id");
    // }




    mysqli_query($conn, "update registration set username='$_POST[username]',email='$_POST[email]',password='$_POST[password]',role='$roleDB' where id=$idDB");
?>
    <script type="text/javascript">
        window.location = "admin.php";
    </script>
<?php
}

if (isset($_POST["cancel"])) {
?>
    <script type="text/javascript">
        window.location = "admin.php";
    </script>
<?php
}
?>
</div>



















<!-- Footer  -->
<div class="global">
		<div class="container">
			<div class="row ">
				<div class="col col-12 col-md-6 col-xl-6 mt-5">
          <h6>Legal</h6>
          <ul class="nav flex-column">
            <li><a href="TermsCondition.php">Terms & Conditions</a></li>
            <li><a href="PrivacyPolicy.php">Privacy Policy</a></li>
          </ul>
			  </div>
				<div class="col col-12 col-md-6 col-xl-6 mt-5 mb-5">
          <h6>Support</h6>
          <ul class="nav flex-column">
            <li>Phone Number: +639178883334</li>
            <li>Landline: 394-7896<li>
            <li>Email: apitongscatering@business.com</li>
          </ul>
			  </div>
				<div class="social">
          <div class="mt-5 mb-4">
              <a href="https://www.facebook.com/Dirtysoda11"><i class="fa fa-facebook"></i></a>
              <a href="https://twitter.com/RAVEN75754452?s=09"><i class="fa fa-twitter"></i></a>
              <a href="https://www.instagram.com/algeralddelapaz/"><i class="fa fa-instagram"></i></a>
              <a href="#"><i class="fa fa-snapchat-ghost"></i></a>
          </div>
        </div>
        <p class="copyright mb-5"> &copy; Apitongs Food & Catering Services. All Rights Reserved</p>
      </div>
  </div>
</div>
			
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" 
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" 
integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" 
crossorigin="anonymous"></script>

<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" 
crossorigin="anonymous"></script>

<script src="mainIndex.js"></script>

</body>

</html>