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
    .maincontainer{
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
  <div class="container maincontainer">
  <div class="row">
  <?php
  function addListEntry($entryname,$inputVal){
    if(!is_null($inputVal)){
      $tag = "<li>" . $entryname . " " . $inputVal . "</li>";
      echo $tag;
    }

    }
    function outputBook($author,$bookTitle,$isbn,$binding,$pages,$releasedate,$languageBook,$publisher,$weight,$imageLink,$category,$shortdescription,$status){
      echo "<div class=\"col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xl-4\">";
      echo "<img class=\"img-responsive\" src=\"".$imageLink."\">";
      echo "</div>";
      echo "<div class=\"col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xl-6\">";
      echo "<h1>" . $bookTitle ."</h1>";
      echo "<h2>" . $author . "</h2>";
      echo "<ul>";
      addListEntry("ISBN ", $isbn);
      addListEntry("Binding ",$binding);
      addListEntry("Pages ",$pages);
      addListEntry("Release Date ",$releasedate);
      addListEntry("Language ",$languageBook);
      addListEntry("Publisher ",$publisher);
      addListEntry("Weight ",$weight);
      addListEntry("Status ",$status);
      echo "</ul>";
      echo "</div>";
      echo "<div class=\"row\">";
      echo "<div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xl-12\">";
      echo "<article>" . $shortdescription . "<article>";
      echo "</div>";
      echo "</div>";


    }

    if(isset($_POST['bookid'])){
    $bookId = $_POST['bookid'];
    $sqlquerry = "SELECT Book.bookid,Book.booktitle,Book.isbn,Book.shortdescription,Book.binding,Book.pages,Book.releasedate,Book.languageBook,Book.publisher,Book.weight,Book.imageLink,Category.categoryname,Author.firstname,Author.lastname,Book.status FROM Book, Author,Category WHERE Book.categoryid = Category.categoryid and Book.authorid = Author.authorid and Book.bookid=" .$bookId;
    $res = mysqli_query($conn, $sqlquerry);
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
    while(!is_null($row)){
      echo "<div class=\"row\">";
      $author = $row['firstname'] ." ". $row['lastname'];
      echo outputBook($author,$row['booktitle'],$row['isbn'],$row['binding'],$row['pages'],$row['releasedate'],$row['languageBook'],$row['publisher'],$row['weight'],$row['imageLink'],$row['categoryname'],$row['shortdescription'],$row['status']);
      echo "</div>";
      $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
    }
    if(isset($_SESSION['role']) && $_SESSION['role'] == "admin"){
    echo "<form action=\"updateBook.php\" method=\"post\">";
    echo "<button class=\"btn btn-link\" type=\"submit\" name=\"updateBookid\" value=\"".$bookId."\">".Bearbeiten."</button>";
    echo "</form>";
    }


    }








  ?>
  </div>


</body>
</html>
<?php ob_end_flush(); ?>
