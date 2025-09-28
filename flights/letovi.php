<!DOCTYPE html>
<html>
<head>
  <title>Letovi</title>
  <link rel="stylesheet" type="text/css" href="letovi.css">
</head>
<body>
  <header>
    <nav>
      <ul>
        <li><a href="projekat2.html">Pocetna</a></li>
        <li><a href="user_page.php">Korisnik opcije</a></li>
        <li><a href="logout.php">Odjava</a></li>
      </ul>
    </div>
    </nav>
  </header>
  <h1>Letovi</h1>
  <?php
 
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "user_db";

  
  $conn = new mysqli($servername, $username, $password, $dbname);

  
  if ($conn->connect_error) {
    die("Greška prilikom povezivanja s bazom podataka: " . $conn->connect_error);
  }

 
  $sql = "SELECT * FROM events";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo '<div class="flight">';
      echo '<div class="flight-details">';
      echo '<span>Let ID:  ' . $row['events_id'] . '</span>';
      echo '<span>Polazak: ' . $row['departure'] . '</span>';
      echo '<span>Dolazak: ' . $row['arrival'] . '</span>';
      echo '<span>Destinacija: ' . $row['destination'] . '</span>';
      echo '<span>Cijena: $' . $row['price'] . '</span>';
      echo '<span>Dostupan: ' . ($row['available'] == 1 ? 'Dostupan' : 'Nedostupan') . '</span>';
      echo '</div>';
      echo '<div class="buy-button">';
      echo '<button onclick="buyTicket(' . $row['events_id'] . ')">Kupi kartu</button>';
      echo '</div>';
      echo '</div>';
    }
  } else {
    echo 'Nema dostupnih letova.';
  }

  $conn->close();
  ?>

  <script>
    function buyTicket(eventId) {
     
      var button = document.querySelector('[onclick="buyTicket(' + eventId + ')"]');
      button.disabled = true;
      button.innerText = 'Karta uspješno kupljena';
      var message = document.createElement('div');
     
      button.parentNode.insertBefore(message, button);
    }
  </script>
</body>
</html>
