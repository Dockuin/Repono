<?php
// Creates the class - named dbQS [database Query System]
class dbQS {
    // Creates a number of attributes for the class with various levels of permissions
    // Private = Cannot be accessed anywhere other than the dbQS class
    // Protected = Can be accessed by dbQS and child classes
    protected $table;
    private $DATABASE_HOST;
    private $DATABASE_USER;
    private $DATABASE_PASS;
    private $DATABASE_NAME;
    protected $stmt;
    protected $conn;
    private $partID;

    // Constructor method
    // Various data for accessing the database is input (or passed by default where an = is used)
    function __construct($DATABASE_HOST = 'localhost', $DATABASE_USER = 'root', $DATABASE_PASS = '', $DATABASE_NAME) {
        // Stores the parameters as some of the attributes defined above
        $this->DATABASE_HOST = $DATABASE_HOST;
        $this->DATABASE_USER = $DATABASE_USER;
        $this->DATABASE_PASS = $DATABASE_PASS;
        $this->DATABASE_NAME = $DATABASE_NAME;
    }

    // Method which sets which table in the relevant database to be connecting to
    public function set_table($table_name) {
        $this->table = $table_name;
    }

    // 
    function connect() {
        $this->conn = mysqli_connect($this->DATABASE_HOST, $this->DATABASE_USER, $this->DATABASE_PASS, $this->DATABASE_NAME);
        if (mysqli_connect_errno()) {
            exit('Failed to connect to MySQL: ' . mysqli_connect_error());
        }
    }


    protected function destroy_connection() {
        $this->conn->close();
    }

    function query($heading, $input = '') {
        $this->connect();
        $this->stmt = $this->conn->prepare("SELECT $heading FROM $this->table WHERE Barcode = ?");
        $this->stmt->bind_param("s", $input);
        $this->stmt->execute();
        $this->stmt->bind_result($this->partID);
        $this->stmt->fetch();
        $this->stmt->close();

        $this->destroy_connection();

        return $this->partID;

    }

}

class account extends dbQS {

    protected $password;

    function __construct($DATABASE_HOST = 'localhost', $DATABASE_USER = 'root', $DATABASE_PASS = '', $DATABASE_NAME = 'userData') {
        parent::__construct($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
        $this->set_table('accounts');
    }

    function get_password($username = "") {

        $this->connect();
        $this->stmt = $this->conn->prepare("SELECT password FROM accounts WHERE username = ?");
        $this->stmt->bind_param("s", $username);
        $this->stmt->execute();
        $this->stmt->bind_result($this->password);
        $this->stmt->fetch();
        $this->stmt->close();

        $this->destroy_connection();

        return $this->password;
    }

    function generate_data($username, $HashedPW, $email, $role = "Null", $organisation = '') {
        $organisation = $organisation ? $organisation : $username;
        $this->connect();
        $this->stmt = $this->conn->prepare("INSERT INTO `accounts`(`Uid`, `username`, `password`, `email`, `role`, `organisations`) VALUES (Null, ?, ?, ?, ?, ?)");
        $this->stmt->bind_param('sssss', $username, $HashedPW, $email, $role, $organisation);
        $this->stmt->execute();
        $this->stmt->close();

        $this->destroy_connection();
    }
}

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'inventory';

$classTest = new dbQS($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
$classTest->set_table('parts');
$res = $classTest->query('Part_Description',635963686499);

echo $res;
echo "\n";

$accountTest = new account();
$accountTest->generate_data("User1", password_hash("Testing", PASSWORD_DEFAULT), "test@test.com");
$res = $accountTest->get_password("Test");



echo $res;
 