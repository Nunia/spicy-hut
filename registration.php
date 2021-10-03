<?php
$insert = false;
if (isset($_POST['name'])) {
  // Set Connection Variables
  $server = "localhost";
  $username = "root";
  $password = "";
  // Create a Database Connection
  $con = mysqli_connect($server, $username, $password);

  // Check for Connection Success
  if (!$con) {
    die("connection to this database failed due to" . mysqli_connect_error());
  }
  //echo "Connection Successful!";

  // Collect Post Variables
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $deg = $_POST['deg'];
  $aff = $_POST['aff'];

  $sql = "INSERT INTO `registration`.`registration` (`name`, `email`, `phone`, `deg`, `aff`, `dt`) VALUES ('$name', '$email', '$phone', '$deg', '$aff', current_timestamp());";
  //echo $sql;

  // Execute the Query
  if ($con->query($sql) == true) {
    //echo "Successfully Inserted";

    // Flag for Successful Insertion
    $insert = true;
  } else {
    echo "ERROR: $sql <br> $con->error";
  }
  // Close the Database Connection
  $con->close();
}
?>





<!doctype html>
<html lang="en">

<head>
<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">  
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Primary Meta Tags -->
  <title>Startup Registration</title>
  <meta name="title" content="Startup Registration">
  <meta name="description" content="CACLD Best training Institute in India, top training Institute in India, best computer training Institute, top computer training centre In India, best preplacement training in India">


  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
  
  <!-- style css -->
  <link rel="stylesheet" href="css/style.css">

  <style>
    html {
      scroll-behavior: smooth;
    }
  </style>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-178511898-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-178511898-1');
  </script> -->


  <script>
    // Defining a function to display error message
    function printError(elemId, hintMsg) {
      document.getElementById(elemId).innerHTML = hintMsg;
    }

    // Defining a function to validate form 
    function validateForm() {
      // (Fetching values) Retrieving the values of form elements 
      var name = document.contactForm.name.value;
      var email = document.contactForm.email.value;
      var phone = document.contactForm.phone.value;
      var deg = document.contactForm.deg.value;
      var aff = document.contactForm.aff.value;


      // Defining error variables with a default value
      var nameErr = emailErr = phoneErr = degErr = affErr = true;

      // Validate name
      if (name == "") {
        printError("nameErr", "Please enter your name");
      } else {
        var regex = /^[a-zA-Z\s]+$/;
        if (regex.test(name) === false) {
          printError("nameErr", "Please enter a valid name");
        } else {
          printError("nameErr", "");
          nameErr = false;
        }
      }

      // Validate email address
      if (email == "") {
        printError("emailErr", "Please enter your email address");
      } else {
        // Regular expression for basic email validation
        var regex = /^\S+@\S+\.\S+$/;
        if (regex.test(email) === false) {
          printError("emailErr", "Please enter a valid email address");
        } else {
          printError("emailErr", "");
          emailErr = false;
        }
      }

      // Validate phone number
      if (phone == "") {
        printError("phoneErr", "Please enter your phone number");
      } else {
        var regex = /^[1-9]\d{9}$/;
        if (regex.test(phone) === false) {
          printError("phoneErr", "Please enter a valid 10 digit phone number");
        } else {
          printError("phoneErr", "");
          phoneErr = false;
        }
      }

      // Validate deg
      if (deg == "Select") {
        printError("degErr", "Please select your deg");
      } else {
        printError("degErr", "");
        degErr = false;
      }

      // Validate Affiliation
      if (aff == "") {
        printError("affErr", "Please select your Affiliation");
      } else {
        printError("affErr", "");
        affErr = false;
      }

      // Prevent the form from being submitted if there are any errors
      if ((nameErr || emailErr || phoneErr || degErr || affErr) == true) {
        return false;
      }
    };
  </script>





</head>

<body>
  <!-- NAVBAR -->
  <center>

  </center>
  <?php
  if ($insert == true) {
    echo "<div class='alert alert-danger' role='alert'>
            Thanks for Submitting the Registration Form!
          </div>";
  }
  ?>
 

  <form name="contactForm" onsubmit="return validateForm()" action="registration.php" method="post">

    <h1 style="font-size: 35px; font-weight: 800; text-align: center;">Order Now!</h1>
    <div class="row">
      <label>Full Name</label>
      <input type="text" name="name">
      <div class="error" id="nameErr"></div>
    </div>
    <div class="row">
      <label>Email Address</label>
      <input type="email" name="email">
      <div class="error" id="emailErr"></div>
    </div>
    <div class="row">
      <label>Phone Number</label>
      <input type="text" name="phone" maxlength="10">
      <div class="error" id="phoneErr"></div>
    </div>

    <div class="row">
      <label>Order</label>
      <select name="deg">
        <option>Select</option>
        <option>Homemade --> Rs. 100/-</option>
        <option>Noodles --> Rs. 200/-</option>
        <option>Egg --> Rs. 30/-</option>
        <option>Sushi Dizzy --> Rs. 400/-</option>
        <option>The Coffee Break --> Rs. 500/-</option>
        <option>Spicy Burger --> Rs. 300/-</option>
        <option>Egg Tosh --> Rs. 200/-</option>
        <option>Pizza --> Rs. 300/-</option>
      </select>
      <div class="error" id="degErr"></div>
    </div>
    <div class="row">
      <label>Message</label>
      <input type="text" name="aff">
      <div class="error" id="affErr"></div>
    </div>
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>

  <br>

  <center><a href="index.html"><p class="go-back">Go Back -></p></a></center>
  <br><br>



  <style>
    body {
      font-size: 16px;
      background: #f9f9f9;
      font-family: "Segoe UI", "Helvetica Neue", Arial, sans-serif;
    }

    h2 {
      text-align: center;
    }

    form {
      width: 50%;
      background: #fff;
      padding: 15px 40px 40px;
      border: 1px solid #ccc;
      margin: 50px auto 0;
      border-radius: 5px;
    }

    label {
      display: block;
      margin-bottom: 5px
    }

    label i {
      color: #999;
      font-size: 80%;
    }

    input,
    select {
      border: 1px solid #ccc;
      padding: 10px;
      display: block;
      width: 100%;
      box-sizing: border-box;
      border-radius: 2px;
    }

    .row {
      padding-bottom: 10px;
    }

    .form-inline {
      border: 1px solid #ccc;
      padding: 8px 10px 4px;
      border-radius: 2px;
    }

    .form-inline label,
    .form-inline input {
      display: inline-block;
      width: auto;
      padding-right: 15px;
    }

    .error {
      color: red;
      font-size: 90%;
    }

    input[type="submit"] {
      font-size: 110%;
      font-weight: 100;
      background: #006dcc;
      border-color: #016BC1;
      box-shadow: 0 3px 0 #0165b6;
      color: #fff;
      margin-top: 10px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background: #0165b6;
    }
  </style>


  <style>
    @media only screen and (max-width: 720px) {

      /* For phone phones: */
      form {
        width: 100%;
      }
    }
  </style>




  <br>




  <!-- <img src="blogimg\ionic.png " class="img-thumbnail mx-auto d-block" width="600" height="600" >  -->



















  <style>
    $card-height: 100% .brand {
      height: 5px;
    }


    footer {
      text-align: center;
      padding: 0px;
      background-color: #263131;
      color: white;
    }


    body {
      overflow-x: hidden;
    }
  </style>







  <!-- Footer -->
  <!-- <footer class="page-footer font-small indigo">
    <div class="container text-center text-md-left" id=fotr>
      <div class="row">
        <div class="col-md-3 mx-auto">
          <h4 class="font-weight-bold text-uppercase mt-3 mb-4">About Us</h4>
          <ul class="list-unstyled" style="text-align:justify;">
            <li>
              <h6>CACLD is a premier Technical and Computer Training Institute in Odisha. CACLD is pioneering Technical, Computer and Soft skill training since 2015. CACLD is basically driven by educational intellectuals who understand the requirements of Industry.<h6>
            </li>
        </div>
        <hr class="clearfix w-100 d-md-none">
        <div class="col-md-3 mx-auto">
          <h4 class="font-weight-bold text-uppercase mt-3 mb-4">BLOG POSTS</h4>
          <ul class="list-unstyled">
            <li>
              <h6> Hybrid phone App Development using Ionic</h6>
            </li>
            <hr>
            <li>
              <h6>CACLD Intellectuals Meetings</h6>
            </li>
            <li>
        </div>
        <hr class="clearfix w-100 d-md-none">
        <div class="col-md-3 mx-auto">
          <h4 class="font-weight-bold text-uppercase mt-3 mb-4">REACH US</h4>
          <ul class="list-unstyled">
            <li>
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14968.371752740335!2d85.821865!3d20.2964199!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5cbb55e1cba85c9b!2sYUVODAYA!5e0!3m2!1sen!2sin!4v1590156294953!5m2!1sen!2sin" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        <hr class="clearfix w-100 d-md-none">
        <div class="col-md-3 mx-auto">
          <h4 class="font-weight-bold text-uppercase mt-3 mb-4">CONTACT US</h4>
          <ul class="list-unstyled" id="aboutsec" style="text-align:justify;">
            <li>
              <h6> Land Mark: Yuvodaya Tutorial, Biju Pattanaik College Road, Jaydev Vihar, Bhubaneswar, Odisha 751013</h6>
            </li>
            <li>
              <h6>Phon no.- +91-9437101721</h6>
            </li>
            <li>
              <h6>Email- info@cacld.co.in</h6>
            </li>
          </ul>
        </div>
      </div>
      <div class="footer-copyright text-center py-3">
        <h6>Our GSTIN Number: 21AJVPB5804F1ZI</h6>
        <h6>Copyright © 2019. All Rights Reserved. Developed by : <a href="http://www.cacld.in/">CACLD</a></h6>

      </div>
    </div>


  </footer> -->







  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>





</body>

</html>