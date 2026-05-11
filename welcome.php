<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "korisnicka_podrska";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$x = $_POST["ime"];
$y = $_POST["email"];
$z = $_POST["poruka"];

$sql = "INSERT INTO tablica_korisnicke_podrske (ime, email, poruka)
VALUES ('$x', '$y', '$z')";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/x-icon" href="Hrvatska.webp">
  <link rel="stylesheet" href="styles.css">
  <title>Poruka</title>
</head>

<body>


<div class="topnav-wrapper">
  <div class="topnav">
    <span class="toggle-btn" onclick="toggleSidebar()">☰</span>

    <a href="index.html">Početna</a>
    <a href="Zagreb.html">Zagreb</a>
    <a href="Split.html">Split</a>
    <a href="Sibenik.html">Šibenik</a>
    <a href="Rijeka.html">Rijeka</a>
    <a href="Zadar.html">Zadar</a>
    <a href="Pula.html">Pula</a>
    <a href="Dubrovnik.html">Dubrovnik</a>
  </div>
</div>


<div class="sidenav">
  <a href="index.html">🏠 Početna</a>
  <a href="OcjeneGradova.html">⭐ Ocjene gradova</a>
  <a class="active" href="KorisnickaPodrska.html">📞 Korisnička podrška</a>
  <a href="OWebStranici.html">ℹ️ O ovoj web stranici</a>
</div>


<div class="content">

<div class="card">

<?php if ($conn->query($sql) === TRUE): ?>
  
  <h1>✔ Poruka uspješno poslana</h1>
  <p>Hvala na kontaktu. Vaša poruka je zaprimljena.</p>

<?php else: ?>

  <h1>❌ Greška</h1>
  <p><?php echo $conn->error; ?></p>

<?php endif; ?>

<a href="index.html">← Povratak na početnu</a>

</div>

</div>

<script>
function toggleSidebar() {
  document.querySelector('.sidenav').classList.toggle('hidden');
  document.querySelector('.content').classList.toggle('full');
}
</script>

</body>
</html>

<?php $conn->close(); ?>