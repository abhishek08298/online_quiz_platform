  <?php
  session_start();
  include("../config.php");
    if(is_null($_SESSION['ausername']))
   {
     session_destroy();
     header("location: indexadmin.php?logoutsuccessfuly");
   }
  ?>

  <!DOCTYPE HTML>
  <html lang="en">
  <head>  
    <title> Subjects </title>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
       <style>
    body {margin:0;}
    .navbar {
   /* overflow: hidden;*/
    background-color: #5f5f5f;
    position: fixed;
    top: 0;
    width: 100%;
  }

  .navbar a {
    float: left;
    /*display: block;*/
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 16px;
  }

  .navbar a:hover{
  background-color:#000000 !important;
  color:#ffffff !important;
  }
  .navbar a.active {
  background-color:#4CAF50;
  color:#ffffff;
  }
  .main {
    padding: 16px;
    margin-top: 30px;
    height: 1500px; /* Used in this example to enable scrolling */
  }
  </style>

  </head>
  <body>
     <?php
  include ("../config.php");
 if(isset($_POST['submit']))
 {
  
   $strm = mysqli_real_escape_string($db,$_POST['sel1']);
       $sub = mysqli_real_escape_string($db,$_POST['usr']);
       $sub=strtolower($sub);
       $fac = mysqli_real_escape_string($db,$_POST['faculty']);
       $con = mysqli_real_escape_string($db,$_POST['contact']);
        $query = "SELECT * FROM subject WHERE sname='$sub' ";
        $result = mysqli_query($db,$query);
        $numResults = mysqli_num_rows($result);
       
        if($numResults>0)
        {
            header("Location: subject.php?subject_already_exists");
            exit();
        }
        else
        {
          $hello="INSERT INTO subject (sname,sbranch,sfac,scon) VALUES ('$sub','$strm','$fac','$con');"; 
            mysqli_query($db,$hello);
            header("Location: subject.php?entrysuccess");
            exit();
        }
 }

  ?>



     <nav class="navbar navbar-default navbar-fixed-top" style="background: #ffffff">
     <div class="container-fluid" style=" box-shadow: 10px 10px 2px #d3d3d3;">
    <div class="row grid-divider" >
      <div class="col-sm-9"> <h1 style="color:#d2d2d2"> SHOW YOUR CREATIVITY .. !!  </h1>
        </div>
    <div class="col-sm-3" > 
      <div class="row grid-divider" >
         <div class="col-sm-6"> 
           
         
         </div>
          <div class="col-sm-6" style="margin-top: 20px"> 
             <a href="logout.php"> <button type="submit" name="submit" class="btn btn-success"  >  LOG OUT</button> </a> 
          
         </div>
         </div>
         </div>
         </div> 
        </div>
        </nav>
         <div class="navbar" style="margin-top: 83px">
    <a href="#">HOME</a>
    <a href="subject.php">SUBJECTS</a>
    <a href="routine.php">TIME TABLE</a>
    <a href="addtest.php">ADD TEST</a>
    <a href="exam.php">ADD QUESTION</a>
    <a href="#">RESULTS</a>
    <a href="#">MORE</a>

  </div>
        <br>
        <br>
          <br>
          <br>
          <br>
        <br>
          <br>
          <br>
        <div class="col-sm-4" >
        </div>
        <div class="col-sm-4">
          <form role="form" method="POST" action="">
     <div class="form-group">
      <label for="sel1">Select Branch (select one):</label>
      <select class="form-control" id="sel1" name="sel1">
        <option>Science</option>
        <option>Commerce</option>
        <option>Arts</option>
      </select>
     </div>
        <div class="form-group">
              <label for="usr">Subject:</label>
              <input type="text" class="form-control" id="usr" name="usr">
        </div>
         <div class="form-group">
              <label for="faculty">Faculty Name:</label>
              <input type="text" class="form-control" id="faculty" name="faculty">
        </div>
         <div class="form-group">
              <label for="contact">Contact:</label>
              <input type="text" class="form-control" id="contact" name="contact">
        </div>
         <button type="submit" name="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> submit</button>
          <button type="submit" name="showresult" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> show entry</button>
        </form>
     </div>
        <div class="col-sm-4">
        </div>


    
  </body>
  </html>