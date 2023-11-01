<?php
require_once __DIR__.'/env.php';


function cleanFirstname($firstName)
{

    return ucwords(strtolower(trim($firstName)));
}



function cleanLastname($lastName)
{

    return strtoupper(trim($lastName));
}

function cleanEmail($email)
{

    return strtolower(trim($email));
}



function connectDB()
{

    try {
        $connection = new PDO("mysql:host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_DATABASE."", DB_USERNAME, DB_PASSWORD);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {

        die("Erreur SQL " . $e->getMessage());
    }

    return $connection;
}



function isConnected()
{

    if (!empty($_SESSION['email']) && !empty($_SESSION['login'])) {

        return true;
    }

    return false;
}

function redirectIfNotConnected()
{

    if (!isConnected()) {

        header("Location: index.php");
    }
}

function Delete_record($conn, $table_name, $id)
{

    if ($table_name === "reports") {

        $sql = "DELETE FROM " . $table_name . " WHERE email=:id";
    } else {

        $sql = "DELETE FROM " . $table_name . " WHERE id=:id";
    }



    $query = $conn->prepare($sql);

    $query->execute([':id' => $id]);

    return true;
}


function test_input($data)
{
    if (!isset($data)) {
        $data = "";
    }
    $data = trim($data);

    $data = stripslashes($data);

    $data = htmlspecialchars($data);

    return $data;
}


function Read_record($conn, $table_name, $id)
{

    if ($id == "") {

        $sql = "SELECT * FROM " . $table_name;
    } else {

        $sql = "SELECT * FROM " . $table_name . " WHERE id='" . $id . "'";
    }

    $result = $conn->query($sql);

    // $row = $result->fetchALL(PDO::FETCH_ASSOC);

    $row = $result->fetchALL();

    return $row;
}


function generate_csrf_token() {

    if (!isset($_SESSION)) {

        session_start();
    }

    if (empty($_SESSION['token'])) {

        $_SESSION['token'] = bin2hex(random_bytes(32));
    }
}

function insert_csrf_token() {

    generate_csrf_token();

    echo '<input type="hidden" name="token" value="' . $_SESSION['token'] . '" />';
}
