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

    public function showLogged(){
        $i=1;
        $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = "SELECT * FROM currentUsers;";
        $result = $connection->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<th>";
            echo $i++;
            echo "</th>";
            echo "<td>";
            echo implode("</td><td>",$row);
            echo "</td>";
            echo "</tr>";



        }
    }
    public function showRegistered(){
        $i=1;
        $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = "SELECT user_name,registry_date,user_email,ip_address FROM users;";
        $result = $connection->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<th>";
            echo $i++;
            echo "</th>";
            echo "<td>";
            echo implode("</td><td>",$row);
            echo "</td>";
            echo "</tr>";



        }
    }

}
include ('show_users.php');
?>