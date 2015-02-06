<div class="jumbotron" style="background: papayawhip">

<div class="container">

    <h1>Witaj <?php echo $_SESSION['user_name'];?>!</h1>
    <p>Data i godzina zalogowania: <?php echo date('Y-m-d H:i:s');?></p>
    <p><a href="index.php?logout">Wyloguj się</a></p>
</div>
</div>