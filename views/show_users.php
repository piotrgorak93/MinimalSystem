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
        $("#users").html("<?php $logged = new Admin(); $logged->showLogged()?>");
    }</script>
<script>function showRegisteredUsers() {
        $("#registered").html("<?php $registered = new Admin();$registered->showRegistered()?>");
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
                        <th>Adres IP</th>
                    </tr>
                    </thead>
                    <tbody id="users"></tbody>
                </table>
            </div>
            <button type="button" class="btn btn-info" onclick="showUsers()">Pobierz dane</button>
        <p></p>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Zarejestrowani użytkownicy: </div>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Login</th>
                    <th>Data zarejestrowania</th>
                    <th>E-mail</th>
                    <th>Adres IP</th>
                </tr>
                </thead>
                <tbody id="registered"></tbody>
            </table>
        </div>
        <button type="button" class="btn btn-info" onclick="showRegisteredUsers()">Pobierz dane</button>
            <p><a href="index.php?logout">Wyloguj się</a></p>
        </div>
</div>

