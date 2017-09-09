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
  </head>
  <body>
    <?php
    include"navbar.php";

     ?>

<?php
if(isset($_POST['submit_button'])){
  echo $_POST['author_input'];

  $author_input = $_POST['author_input'];
  $author_input = strip_tags($author_input);
  $author_input = htmlspecialchars($author_input);
  $author_id = $authorArray[$author_input];
  echo "Author_id" . $author_id;


  $title = $_POST["title_input"];
  $title = strip_tags($title);
  $title = htmlspecialchars($title);

  $isbn = $_POST["isbn_input"];
  $isbn = strip_tags($isbn);
  $isbn = htmlspecialchars($isbn);

  $binding=$_POST["binding_input"];
  $binding=strip_tags($binding);
  $binding=htmlspecialchars($binding);

  $pages=$_POST["pages_input"];
  $pages=strip_tags($pages);
  $pages=htmlspecialchars($pages);

  $releasedate=$_POST["releasedate_input"];
  $releasedate=strip_tags($releasedate);
  $releasedate=htmlspecialchars($releasedate);

  $languageBook=$_POST["language_input"];
  $languageBook=strip_tags($languageBook);
  $languageBook=htmlspecialchars($languageBook);

  $publisher=$_POST["publisher_input"];
  $publisher=strip_tags($publisher);
  $publisher=htmlspecialchars($publisher);

  $weight=$_POST["weight_input"];
  $weight=strip_tags($weight);
  $weight=htmlspecialchars($weight);

  $imageLink=$_POST["imageLink_input"];
  $imageLink=strip_tags($imageLink);
  $imageLink=htmlspecialchars($imageLink);

  $category=$_POST["category_input"];
  $category=strip_tags($category);
  $category=htmlspecialchars($category);
  echo "Kategorie" . $category;

  $shortdescription=$_POST["shortdescription_input"];
  $shortdescription=strip_tags($shortdescription);
  $shortdescription=htmlspecialchars($shortdescription);

  $bookId = $_SESSION['updateBookid'];
  $sqlQuerry = "UPDATE Book SET Book.booktitle=?, Book.isbn=?, Book.shortdescription=?,Book.binding=?, Book.pages=?, Book.releasedate=?, Book.languageBook=?, Book.publisher=?, Book.weight=?, Book.imageLink=? WHERE Book.bookid=?";
  if($stmt = mysqli_prepare($conn,$sqlQuerry)){
  mysqli_stmt_bind_param($stmt,'ssssisssisi',$title,$isbn,$shortdescription,$binding,$pages,$releasedate,$languageBook,$publisher,$weight,$imageLink,$_SESSION['updateBookid']);
  if(mysqli_stmt_execute($stmt)){
      echo "<p style=\"margin-top:15vh\">Update sucessfully</p>";
      unset($_SESSION['updateBookid']);
  }else{
    unset($_SESSION['updateBookid']);
    echo "<p style=\"margin-top:15vh\">No update possible</p>";
  }
    mysqli_stmt_close($stmt);
  }
  echo "<form action=\"book.php\" method=\"post\">";
  echo "<button class=\"btn btn-link\" type=\"submit\" name=\"bookid\" value=\"".$bookId."\">"."Back"."</button>";
  echo "</form>";

}
?>
<?php ob_end_flush(); ?>
</body>
</html>
