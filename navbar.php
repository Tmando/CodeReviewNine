<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="home.php">Home</a></li>
            <li><a href="author.php">Autoren</a></li>
            <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){ ?> <!-- Inserting and updating is hide for non Admins -->
            <li><a href="insertBook.php">Insert Book</a></li>
            <li><a href="addcategory.php">Insert Category</a></li>
          <?php } ?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><form action="logout.php" method="post"><button class="btn btn-link" name="logout" type="submit">Logout</button></form></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
