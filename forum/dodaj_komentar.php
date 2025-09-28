<?php

@include 'config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $comment = $_POST["comment"];

    
    $sql = "SELECT id FROM user_form WHERE name = '$name'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = $row['id'];

     
        $sql = "INSERT INTO comments (user_id, comment) VALUES ('$user_id', '$comment')";
        if ($conn->query($sql) === TRUE) {
           
            header("Location: forum.php");
            exit();
        } else {
            echo "Greška prilikom dodavanja komentara: " . $conn->error;
        }
    } else {
        echo "Korisnik nije pronađen.";
    }
}

$conn->close();
?>


