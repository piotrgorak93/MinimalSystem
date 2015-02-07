<?php
/**
 * Created by PhpStorm.
 * User: User_Piotr
 * Author: Piotr Górak
 * Date: 2015-02-06
 * Time: 19:14
 */

/** receives registryDate from database */
class Admin
{
    public function __construct()
    {
        $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = "SELECT * FROM currentUsers;";
        $result = $connection->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo implode($row);
        }
    }
}

?>
<script>function showUsers() {
    $('#users').text(<?php new Admin()?>);
    }</script>
<div class="jumbotron" style="background: papayawhip">

    <div class="container">

        <h1>Witaj <?php echo $_SESSION['user_name']; ?>!</h1>

        <p>Data i godzina zalogowania: <?php echo date('Y-m-d H:i:s'); ?></p>

        <p>Zalogowani użytkownicy:

        <p id="users"></p>


        </p>
        <button type="button" class="btn btn-primary" onclick="showUsers()">Primary</button>
        <p><a href="index.php?logout">Wyloguj się</a></p>
    </div>
</div>