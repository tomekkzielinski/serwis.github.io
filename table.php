<?php
// połączenie z bazą danych
$database = mysqli_connect('localhost', 'root', '', 'serwis');
// Sprawdzanie czy połączenie z bazą się udało
if (!$database) {
  die("blad w polaczeniu z baza danych: " . mysqli_connect_error());
}
$sql = 'SELECT * FROM visits';
$result = mysqli_query($database, $sql);
$visits = [];
while ($row = mysqli_fetch_assoc($result)) {
  array_push($visits, [
    "id" => $row['id'],
    "title" => $row['hour'] . ':00 ' . $row['name'],
    "start" => $row['date'],
    "end" => $row['date'],
    "className" => '',
  ]);
}
$visitsJson = json_encode($visits);
?>

<!DOCTYPE html>
<html lang='pl'>

<head>
  <meta charset='utf-8' />
  <script src='./fullcalendar/dist/index.global.js'></script>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script>
    var events = JSON.parse('<?= $visitsJson ?>')
    console.log(events) //test
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        themeSystem: 'bootstrap',
        editable: false,
        events: events,
      });
      calendar.render();
    });
  </script>
</head>

<body>

  <section class="h-100" style="background-color: #b2b2b2;">
 
    <div class="container py-5 h-100">


      <div id='calendar'></div>
    </div>
    <div class="d-flex justify-content-center">
    <button type="submit" style="border-radius: 1rem; background-color:#424649;" type="submit" id="calendar-button" class=" btn btn-primary btn-block mb-4 ">
    <a class="text-decoration-none text-reset" href="loginSite.php">Przejdź do strony głównej</a>
  </button>
    </div>


    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      Tomasz Zieliński K15

    </div>
  </section>





</body>

</html>