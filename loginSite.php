<?php
// połączenie z bazą danych
$database = mysqli_connect('localhost', 'root', '', 'serwis');
// Sprawdzanie czy połączenie z bazą się udało
if (!$database) {
  die("blad w polaczeniu z baza danych: " . mysqli_connect_error());
}

$errors = "";

if (isset($_POST['Signin'])) {
  //var_dump($_POST); die(); TEST
  $hour = mysqli_real_escape_string($database, $_POST['hour']);
  $date = mysqli_real_escape_string($database, $_POST['date']);
  $name = mysqli_real_escape_string($database, $_POST['name']);
  $phone = mysqli_real_escape_string($database, $_POST['phone']);
  $email = mysqli_real_escape_string($database, $_POST['email']);
  $purpose = mysqli_real_escape_string($database, $_POST['purpose']);



  $query = "SELECT * FROM visits WHERE hour ='$hour' AND date = '$date'";
  $queryResult = mysqli_query($database, $query);
  if (mysqli_num_rows($queryResult) == 0) // jeśli nie znalazło wiersza z konkretną godziną, wtedy zapisz wizytę, w innym wypadku wyświetl błąd
  {
    $sqlInsert = "INSERT INTO `visits` (`hour`, `date`, `name`,`phone`,`email`,`purpose`) VALUES ('$hour','$date','$name','$phone','$email','$purpose')";
    mysqli_query($database, $sqlInsert);
  } else {
    $errors = "W tym czasie nie mamy już wolnych terminów. Wybierz inną godzinę";
  }
}
//Funkcja przekierowująca na stronę table.php po kliknięciu przycisku.
if (isset($_POST['Signin'])) {
  // formularz zostal kliknięty
  header('Location: table.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="allJavaScript.js"></script>
  <title>Strona Główna</title>
</head>

<body>


  <section class="h-100" style="background-color: #b2b2b2;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-25">
          <div class="card h-100" style="border-radius: 1rem;">
            <div class="row g-0">

              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="tools.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="h-100 col-md-5 col-lg-12 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                  <form method="POST" autocomplete="off">

                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                      <span class="h1 fw-bold mb-0">Serwis samochodowy</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Umawianie wizyt</h5>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example17">Email</label>
                      <input value="" name="email" required type="email" id="email" class="form-control form-control-lg" />
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example27">Imię</label>
                      <input value="" name="name" type="text" required id="name" class="form-control form-control-lg" />

                      <label class="form-label" for="form2Example27">Cel wizyty</label>
                      <input value="" name="purpose" type="text" required id="purpose" class="form-control form-control-lg" />
                    </div>
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example27">Numer telefonu(format: xxxxxxxxx)</label>
                      <input name="phone" type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{3}" required id="phone" class="form-control form-control-lg" />

                    </div>

                    <?php if ($errors != '') : ?>

                      <div class="alert alert-danger" role="alert">
                        Wybierz inny termin wizyty!

                      </div>

                    <?php endif; ?>

                    <div style="display: none;" class="alert alert-danger" role="alert" id="alert">
                      Wypełnij poprawnie wszystkie pola.
                    </div>

                    <div>
                      <div>
                        <label for="start">Data wizyty:</label>

                        <input type="date" id="datePicker" name="date">
                      </div>
                      <br>
                      <div>
                        <p>Godzina wizyty:</p>
                      </div>
                      <select class="visit-hour" name="hour">
                        <optgroup label="Godzina wizyty">
                          <option value="10">10:00</option>
                          <option value="11">11:00</option>
                          <option value="12">12:00</option>
                          <option value="13">13:00</option>
                          <option value="14">14:00</option>
                          <option value="15">15:00</option>
                          <option value="16">16:00</option>
                          <option value="17">17:00</option>
                          <option value="18">18:00</option>
                        </optgroup>
                      </select>
                    </div>
                    <br>
                    <br>
                    <br>

                    <button type="submit" style="border-radius: 1rem; background-color:#424649;" name="Signin" type="submit" id="form-button" class="btn btn-primary btn-block mb-4">
                      Umów wizytę
                    </button>
                    <button  type="submit" style="border-radius: 1rem; background-color:#424649;"  type="submit" id="calendar-button" class="btn btn-primary btn-block mb-4">
                     <a class="text-decoration-none text-reset" href="table.php">Przejdź do kalendarza</a> 
                    </button>

                  </form>

                  <div class="float-end mx-4 text-decoration-none">
                   <a class="text-decoration-none text-reset" href="aboutUs.html">O nas</a> 
                  </div>
                  <div class="float-end mx-4 text-decoration-none" class="float-end">
                    Kontakt
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      Tomasz Zieliński K15
        
      </div>

  </section>

</body>

</html>