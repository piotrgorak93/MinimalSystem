<?php
/**
 * Class login
 * handles the user's login and logout process
 */
include 'views/popup.php';
include 'config/functions.php';
class Login
{

    /**
     * @var object The database connection
     */
    private $db_connection;

    /**
     * @return object
     */
    public function getDbConnection()
    {
        return $this->db_connection;
    }

    /**
     * @param object $db_connection
     */
    public function setDbConnection($db_connection)
    {
        $this->db_connection = $db_connection;
    }
    /**
     * @var array Collection of error messages
     */
    public $errors = array();
    /**
     * @var array Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     * you know, when you do "$login = new Login();"
     * @param $param if set, then doLogout();
     */
    public function __construct($param)
    {
        // create/read session, absolutely necessary
        session_start();


        // check the possible login actions:
        // if user tried to log out (happen when user clicks logout button)
        if (isset($_GET["logout"])) {
            $this->doLogout();
        }
        // login via post data (if user just submitted a login form)
        elseif (isset($_POST["login"])) {
            $this->dologinWithPostData();
        }
    }

    /** function saves current user's data to database
     * @param $user_name
     * @param $user_email
     */
    public function addToCurrentLogged($user_name, $user_email){
        if(!$this->isInCurrentUsersTable()){
        $address=get_client_ip();
       $sql = "INSERT INTO currentUsers (name, time, email, ip_address)
                            VALUES('$user_name',now(),'$user_email','$address')";
        //$query_new_user_insert = $this->getDbConnection()->query($sql);
       $this->getDbConnection()->query($sql);
        }


    }

    /** function removes current user's data from database
     * @param $username
     */
    public function removeFromCurrentLogged($username){
        $connection= new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        $sql = "DELETE FROM currentUsers WHERE name='$username'";
      if ($connection->query($sql) === TRUE) {

        } else {
            echo "Error deleting record: " . $connection->error;
        }

    }
    /**
     * log in with post data
     */
    public function dologinWithPostData()
    {
        $is_logged=$this->checkIfLogged();
        if ($is_logged){
            new Popup("Jesteś już zalogowany","");
            exit();

        }
        // check login form contents
        if (empty($_POST['user_name'])) {
            $this->errors[] = "Username field was empty.";
        } elseif (empty($_POST['user_password'])) {
            $this->errors[] = "Password field was empty.";
        } elseif (!empty($_POST['user_name']) && !empty($_POST['user_password'])) {

            // create a database connection, using the constants from config/db.php (which we loaded in index.php)
            $this->setDbConnection(new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME));

            // change character set to utf8 and check it
            if (!$this->getDbConnection()->set_charset("utf8")) {
                $this->errors[] = $this->getDbConnection()>error;
            }

            // if no connection errors (= working database connection)
            if (!$this->getDbConnection()->connect_errno) {

                // escape the POST stuff
                $user_name = $this->getDbConnection()->real_escape_string($_POST['user_name']);
                // database query, getting all the info of the selected user (allows login via email address in the
                // username field)
                $sql = "SELECT user_name, user_email, user_password_hash
                        FROM users
                        WHERE user_name = '" . $user_name . "' OR user_email = '" . $user_name . "';";
                $result_of_login_check = $this->getDbConnection()->query($sql);

                // if this user exists
                if ($result_of_login_check->num_rows == 1) {

                    // get result row (as an object)
                    $result_row = $result_of_login_check->fetch_object();

                    // using PHP 5.5's password_verify() function to check if the provided password fits
                    // the hash of that user's password
                    if (password_verify($_POST['user_password'], $result_row->user_password_hash)) {

                        // write user data into PHP SESSION (a file on your server)
                        $_SESSION['user_name'] = $result_row->user_name;
                        $_SESSION['user_email'] = $result_row->user_email;
                        $_SESSION['user_login_status'] = 1;
                        $user_name2 = $this->getDbConnection()->real_escape_string($_POST['user_name']);
                        $sql2 = "SELECT user_email FROM users WHERE user_name= '". $user_name2 ."';";
                        $res = $this->getDbConnection()->query($sql2);

                        $my_id_array=mysqli_fetch_assoc($res);
                        $user_email=$my_id_array['user_email'];


                        $this->addToCurrentLogged($user_name, $user_email);
                    } else {
                        new Popup("Błedne hasło","index.php");
                      //  $this->errors[] = "Złe hasło.";
                    }
                } else {
                    new Popup("Ten użytkownik nie istnieje","index.php");
                    //$this->errors[] = "Ten użytkownik nie istnieje.";
                }
            } else {
                new Popup("Problem z połączeniem z bazą danych","index.php");
               // $this->errors[] = "Database connection problem.";
            }
        }
    }

    /**
     * perform the logout
     *
     */
    public function doLogout()
    {
        $user=$_SESSION['user_name'];
        // delete the session of the user
        $_SESSION = array();

        session_destroy();
        $this->removeFromCurrentLogged($user);

        // return a little feeedback message
        //$this->messages[] = "Zostałeś wylogowany!";


    }

    /**
     * simply return the current state of the user's login
     * @return boolean user's login status
     */
    public function isUserLoggedIn()
    {
        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
            return true;
        }
        // default return
        return false;
    }


    public function checkIfLogged(){
        if (isset($_SESSION['user_name'])){
            return true;
        }
            else
            return false;
        }
    public function isInCurrentUsersTable(){
        $search = $_SESSION['user_name'] ;
        $sql_query ="SELECT * FROM currentUsers WHERE name= '". $search ."';";
       // $this->setDbConnection(new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME));
        $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $result_of_login_check = $connection->query($sql_query);
        if ($result_of_login_check->num_rows == 0) {
            return false;
        }
        else
            return true;
    }


}
