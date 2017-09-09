<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';

 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
}else{
  $_SESSION['login'] = True;
}
 // select logged-in users detail
 $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome - <?php echo $userRow['firstname'] ." " . $userRow['lastname'] ?></title>
<style>
  /*
  .imgrow{
    margin-top: 5vh;
  }
  .imgrow img{
    border:2px solid #cb2356;
  }
  .container{
    background-color: rgba(226, 61, 128,0.2);
  }
  @import url('https://fonts.googleapis.com/css?family=Raleway');
    h1{
      font-family: 'Raleway', sans-serif;
      font-size:15pt;
    }
    */
    @import url('https://fonts.googleapis.com/css?family=Lato|Patua+One');
    button{
      font-family: 'Patua One', cursive !important;
      font-size:15pt !important;
    }
    h1{
      font-size: 20pt;
      font-family: 'Patua One', cursive !important;
    }
    h2{
      font-size: 18pt;
      font-family: 'Patua One', cursive !important;
      margin-bottom: 3vh;
    }
    ul{
      list-style-type: none;
      margin-top: 10vh;
    }
    li{
      font-size: 14pt;
      font-family: 'Patua One', cursive !important;
      margin-bottom: 3vh;
    }
    article{
      font-size: 14pt;
      font-family: 'Patua One', cursive !important;
      margin-top: 5vh;
    }
    .styleAddCat{
      margin-top: 15vh;
    }









</style>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <?php
  include"navbar.php";

   ?>
  <?php

  function setOption($label,$name,$optionArray,$val){
    echo "<div class=\"form-group\">"."<label>$label</label>" ."<select value=\"$val\" class=\"form-control\" name= \"$name\" value=\"$val\">";
    for($i=0;$i<count($optionArray);$i++){
      if($val == $optionArray[$i]){
        echo "<option selected=\"selected\" value=\"$optionArray[$i]\">$optionArray[$i]</option>";
      }else{
        echo "<option value=\"$optionArray[$i]\">$optionArray[$i]</option>";
      }
    }
    echo "</select></div>";
  }

  function setForm(){
    echo "<form class=\"styleAddCat\"action=\" insertCategoryProcess.php \" method=\"post\">";
    echo "<div class=\"form-group\"><label>Category Name</label> <input class=\"form-control\" value=\"$bookTitle\" name=\"category_input\" type=\"text\"></div>";
    echo "<div class=\"form-group\"><button name=\"submit_button\" type=\"submit\">Insert</button></div>";
    echo "</form>";
  }









  ?>
  <div class="container">
  <div class="row">
  <?php
    if(isset($_SESSION['role']) && $_SESSION['role'] == "admin"){
    setForm();
  }else{
    echo "<p style=\"margin-top:15vh\">No permission</p>";
  }


  ?>
  <a href="home.php">Back</a>
  </div>
</div>


</body>
</html>
<?php ob_end_flush(); ?>
