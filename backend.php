<?php
include 'config.php';

// Register
if (isset($_POST['register'])) {
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];
    $p1 = $_POST['p1'];
    $p2 = $_POST['p2'];

    if ($p1 == $p2) {
        $hash = password_hash($p1, PASSWORD_DEFAULT);

        $insertUser = $conn->prepare("INSERT INTO users(userFirstName, userLastName, userEmail, userPassword) VALUES(?, ?, ?, ?)");
        $insertUser->execute([
            $f_name,
            $l_name,
            $email,
            $hash
        ]);

        header("Location: login.php");
        exit();
    } else {
        header("Location: register.php");
    }
}

// logout
if (isset($_GET['logout'])) {
    session_start();
    unset($_SESSION['logged_in']);
    unset($_SESSION['u_id']);

    header('Location: home.php');
}

// add data
if (isset($_POST['create'])) {

    $userID = $_POST['userID'];
    $item = $_POST['item'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $insertData = $conn->prepare("INSERT INTO accessories(userID, items, price, quantity) VALUES(?, ?, ?, ?)");
    $insertData->execute([$userID, $item, $price, $quantity]);

    header("Location: index.php");
    exit();
}

// update data
if (isset($_POST['update'])) {
    $pID = $_POST['pID'];
    $userItem = $_POST['item'];
    $userPrice = $_POST['price'];
    $quantity = $_POST['quantity'];

    $updateList = $conn->prepare("UPDATE accessories SET items=?, price=?, quantity=? WHERE p_id=?");
    $updateList->execute([$userItem, $userPrice, $quantity, $pID]);

    $msg = 'Successfully Updated!';
    header("Location: index.php?msg=$msg");
    exit();
}

// delete data from items
if (isset($_GET['delete'])) {
    $id = $_GET['id'];

    $delete = $conn->prepare("DELETE FROM accessories WHERE p_id=?");
    $delete->execute([$id]);

    header("Location: index.php");
    exit();
}

?>
