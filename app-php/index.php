
<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
  <title>Mini plataforma</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
  <h1 class="mb-4">Plataforma distribuida (PHP)</h1>

  <div class="mb-3">
    <h4>Chiste del día (desde NodeJS):</h4>
    <?php
      $json = file_get_contents("http://host.containers.internal:8003");
      $data = json_decode($json);
      echo "<div class='alert alert-info'>{$data->chiste}</div>";
    ?>
  </div>

  <div>
    <h4>Calcula tu edad (desde Java):</h4>
    <form method="GET">
      <input type="number" name="nacimiento" placeholder="Año de nacimiento" required>
      <button class="btn btn-primary">Calcular</button>
    </form>

    <?php
      if (isset($_GET["nacimiento"])) {
        $año = $_GET["nacimiento"];
        $json = file_get_contents("http://host.containers.internal:8002/edad?nacimiento=$año");
        $data = json_decode($json);
        echo "<div class='alert alert-success mt-2'>Tienes {$data->edad} años.</div>";
      }
    ?>
  </div>
</body>
</html>
