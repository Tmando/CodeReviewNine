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
    .insertForm{
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

  function setForm($authorArray,$categoryArray,$author="",$bookTitle="",$isbn="",$binding="",$pages="",$releasedate="",$languageBook="",$publisher="",$weight="",$imageLink="",$category="",$shortdescription=""){
    echo "<form class=\"insertForm\" action=\" insertBookProcess.php \" method=\"post\">";
    echo "<div class=\"form-group\">" . setOption("Author", "author_input",array_keys($authorArray),$author) ."</div>";
    echo "<div class=\"form-group\"><label>Titel</label> <input class=\"form-control\" value=\"$bookTitle\" name=\"title_input\" type=\"text\"></div>";
    echo "<div class=\"form-group\"><label>ISBN</label> <input class=\"form-control\" value=\"$isbn\" name=\"isbn_input\" type=\"text\"></div>";
    echo "<div class=\"form-group\"><label>Binding</label> <input class=\"form-control\" value=\"$binding\" name=\"binding_input\" type=\"text\"></div>";
    echo "<div class=\"form-group\"><label>Pages</label> <input class=\"form-control\" value=\"$pages\" name=\"pages_input\" type=\"number\"></div>";
    echo "<div class=\"form-group\"><label>Releasedate</label> <input class=\"form-control\" value=\"$releasedate\" name=\"releasedate_input\" type=\"date\"></div>";
    echo "<div class=\"form-group\"><label>Language</label> <input class=\"form-control\" value=\"$languageBook\" name=\"language_input\" type=\"text\"></div>";
    echo "<div class=\"form-group\"><label>Publisher</label> <input class=\"form-control\" value=\"$publisher\" name=\"publisher_input\" type=\"text\"></div>";
    echo "<div class=\"form-group\"><label>Weight</label> <input class=\"form-control\" value=\"$weight\" name=\"weight_input\" type=\"number\"></div>";
    echo "<div class=\"form-group\"><label>ImageLink</label> <input class=\"form-control\" value=\"$imageLink\" name=\"imageLink_input\" type=\"text\"></div>";
    echo "<div class=\"form-group\">". setOption("Category","category_input",array_keys($categoryArray),$category) . "</div>";
    echo "<div class=\"form-group\"><label>Short Description</label><textarea rows=\"5\"class=\"form-control\" name=\"shortdescription_input\">".utf8_encode($shortdescription)."</textarea></p></div>";
    echo "<div class=\"form-group\"><button name=\"submit_button\" type=\"submit\">Insert</button></div>";
    echo "</form>";


  }
  $authorQuerry = "SELECT * FROM Author";
  $res = mysqli_query($conn, $authorQuerry);
  $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
  $authorArray = Array();
  $i = 0;
  while(!is_null($row)){
    $author = $row['firstname'] . " " . $row['lastname'];
    $authorArray[$author] = $row['authorid'];
    $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
  }

  $categoryQuerry = "SELECT * FROM Category";
  $res = mysqli_query($conn, $categoryQuerry);
  $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
  $categoryArray = Array();
  $i = 0;
  while(!is_null($row)){

    $categoryArray[$row['categoryname']] = $row['categoryid'];
    $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
  }









  ?>
  <div class="container">
  <div class="row">
  <?php
  if(isset($_SESSION['role']) && $_SESSION['role'] == "admin"){
    setForm($authorArray,$categoryArray);
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
