<?php
@include 'config.php';

if (isset($_POST['delete_flight'])) {
    $flightId = $_POST['delete_flight'];

   
    $sql = "DELETE FROM events WHERE events_id = '$flightId'";

    if ($conn->query($sql) === TRUE) {
        echo "Let je uspješno izbrisan.";
    } else {
        echo "Greška prilikom brisanja leta: " . $conn->error;
    }
}


$conn->close();
?>