
<div class="jumbotron" style="background: papayawhip">

<div class="container">
    <?php
    class Time{
        public function __construct()
        {
            $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $name = $_SESSION['user_name'];

            try {
                $sql = "SELECT time FROM currentUsers WHERE name='$name';";
            } catch (Exception $e) {
                print_r($e);
            }

            $result = $connection->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo implode(" ", $row);
            }
        }
    }
    ?>

    <h1>Witaj <?php echo $_SESSION['user_name'];?>!</h1>
    <p>Data i godzina zalogowania: <?php new Time();?></p>
    <p>Data i godzina rejestracji:

        <?php
        /** receives registryDate from database */
        $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $name = $_SESSION['user_name'];

        try {
            $sql = "SELECT registry_date FROM users WHERE user_name='$name';";
        } catch (Exception $e) {
            print_r($e);
        }

        $result = $connection->query($sql);
        while ($row = $result->fetch_assoc()) {
        echo implode(" ",$row);
}       ?>

    </p>
    <p><a href="index.php?logout">Wyloguj się</a></p>
</div>
</div>