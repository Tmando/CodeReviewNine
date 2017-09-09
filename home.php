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
 $_SESSION['role'] = $userRow['Role'];

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
    }
    .maincontainer{
      margin-top: 10vh;
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
  <div class="container maincontainer">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xl-12">
      <h1>Welcome - <?php echo $userRow['firstname'] ." " . $userRow['lastname']; ?></h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xl-12">
      <h2>Available Books</h2>
    </div>
  </div>
  <?php
    $sqlquerry = "SELECT bookid,booktitle FROM Book";
    $res=mysqli_query($conn, $sqlquerry);
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
    while(!is_null($row)){
      echo "<div class=\"row\">";
      echo "<div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xl-12\">";
      echo createForm($row['bookid'],$row['booktitle']);
      echo "</div>";
      echo "</div>";
      $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
    }

    function createForm($bookId,$bookTitle){
    $tag = "<form action=\"book.php\" method=\"post\">";
    $tag .= "<button class=\"btn btn-link\" type=\"submit\" name=\"bookid\" value=\"".$bookId."\">".$bookTitle."</button>";
    $tag .= "</form>";


    // helpfunction
    return $tag;

    }








  ?>
  </div>


</body>
</html>
<?php ob_end_flush(); ?>
