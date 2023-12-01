<?php
session_start();

include __DIR__ . "/functions.php";

$error = passGenerator();


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- meta tags -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <!-- font-awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- link to Font-Family and CSS Files -->
  <link rel="stylesheet" href="" />
  <!-- Document Title -->
  <title>Strong Password Generator</title>
</head>

<body>
  <header class="container py-4">
    <h1>Strong Password Generator</h1>
  </header>

  <main class="container py-5">
    <?php if (isset($_GET['passLength'])) { ?>
      <div class="alert alert-danger">
        <h2>
          <?php echo $error ?>
        </h2>
      </div>
    <?php } ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
      <div>
        <input type="number" min="8" max="20" name="passLength">
        <button type="submit" name="submit">Genera </button>
        <button type="reset" name="reset">Reset</button>
      </div>
      <div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="repeated" id="yes" value="1">
          <label class="form-check-label" for="yes">
            Si
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="repeated" id="no" value="0">
          <label class="form-check-label" for="no">
            No
          </label>
        </div>
      </div>
      <div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="characters[]" value="letters" id="letters">
          <label class="form-check-label" for="letters">
            Lettere
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="characters[]" value="numbers" id="numbers">
          <label class="form-check-label" for="numbers">
            Numeri
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="characters[]" value="symbols" id="symbols">
          <label class="form-check-label" for="symbols">
            Simboli
          </label>
        </div>
      </div>
    </form>

  </main>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>