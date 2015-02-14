<?php
/**
 * Created by PhpStorm.
 * User: User_Piotr
 * Date: 2015-02-14
 * Time: 15:44
 */
?>
<!-- jQuery function inserts the content of "new Admin()" into element with #users id -->
<script>function showUsers() {
        $("#users").html("<?php new Admin()?>");
    }</script>
<div class="jumbotron" style="background: papayawhip">

    <div class="container">

        <h1>Witaj <?php echo $_SESSION['user_name']; ?>!</h1>

        <p>Data i godzina zalogowania: <?php echo date('Y-m-d H:i:s'); ?></p>

        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Zalogowani użytkownicy: </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Login</th>
                        <th>Data zalogowania</th>
                        <th>E-mail</th>
                    </tr>
                    </thead>
                    <tbody id="users"></tbody>
                </table>
            </div>
            <button type="button" class="btn btn-info" onclick="showUsers()">Pobierz dane</button>
            <p><a href="index.php?logout">Wyloguj się</a></p>
        </div>
</div>

