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
    <meta charset="utf-8">
    <title></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
      p{
        margin-top: 10vh;
      }





    </style>
  </head>
  <body>
    <?php
    include"navbar.php";

     ?>
<?php

if(isset($_POST['submit_button']) && isset($_POST['category_input']) && !empty($_POST['category_input'])){
  echo $_POST['author_input'];

  $category_input = utf8_encode($_POST['category_input']);
  $category_input = strip_tags($category_input);
  $category_input = htmlspecialchars($category_input);

  $sqlQuerry = "INSERT INTO Category(categoryname) VALUES(?)";
  if($stmt = mysqli_prepare($conn,$sqlQuerry)){
  mysqli_stmt_bind_param($stmt,'s',$category_input);
  if(mysqli_stmt_execute($stmt)){
      echo '<p>Insert successful</p>';
      unset($_SESSION['updateBookid']);
  }else{
    unset($_SESSION['updateBookid']);
    printf("Error: %s.\n", mysqli_stmt_error($stmt));
    echo '<p>No update possible</p>';
  }
    mysqli_stmt_close($stmt);
  }
  echo "<form action=\"home.php\" method=\"post\">";
  echo "<button class=\"btn btn-link\" type=\"submit\" name=\"bookid\" value=\"".$bookId."\">"."Back"."</button>";
  echo "</form>";

}
?>
<?php ob_end_flush(); ?>
</body>
</html>
