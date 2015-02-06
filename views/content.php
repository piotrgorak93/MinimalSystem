<div class="jumbotron" style="background: papayawhip">

<div class="container">

    <h1>Hello <?php echo $_SESSION['user_name'];?>!</h1>
    <p>You logged in at <?php echo date('Y-m-d H:i:s');?></p>
    <p><a href="index.php?logout">Logout</a></p>
</div>
</div>