<?php include_once 'header.html';?>
    <div class="container">

      <p>Hello <?php echo $_SESSION['user_name'];?>!</p>
        <p><a href="index.php?logout">Logout</a></p>

    </div>


<?php include_once 'footer.html';?>