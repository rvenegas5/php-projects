<?php
  function agregar_palabra($es, $en, $pt, $it) {
    $espanol = array();
    $ingles = array();
    $portugues = array();
    $italiano = array();
    // Agregar las palabras a cada array de idiomas desde el diccionario
    $diccionario = "diccionario.csv";
    $handle = fopen($diccionario, "r");
    $lineNumber = 1;
    while (($raw_string = fgets($handle)) !== false) {
      $row = str_getcsv($raw_string);
      array_push($espanol, $row[0]);
      array_push($ingles, $row[1]);
      array_push($portugues, $row[2]);
      array_push($italiano, $row[3]);
      $lineNumber++;
    }
    fclose($handle);
    
    // Validar que la palabra no este repetida en espanol
    $longitud_palabras = count($espanol);
    for ($i=1; $i<$longitud_palabras; $i++){
      if ($espanol[$i] == $es) {
        return "<h1 style='color:red;'>Error</h1><p>Eror, la palabra ya pertenece al diccionario</p>";
      }
    }
    // Escribimos las palabras en el diccionario
    $fileHandle = fopen ($diccionario, 'a');
    $contenido =  "\n" . $es . ',' . $en . ',' . $pt . ',' . $it;
    fwrite ($fileHandle, $contenido);
    fclose($fileHandle);
    // Agregamos la palabras para mostrarlas
    array_push($espanol, $es);
    array_push($ingles, $en);
    array_push($portugues, $pt);
    array_push($italiano, $it);
    // Template
    $response = "<h1>Palabras en el diccionario</h1><table class='table table-striped'><tr><th>ESPAÑOL</th><th>INGLES</th><th>PORTUGUES</th><th>ITALIANO</th></tr>";
    for ($j=1; $j<$longitud_palabras + 1; $j++) {
        $response = $response . "<tr><td>" . $espanol[$j]. "</td><td>" .  $ingles[$j] . "</td><td>" . $portugues[$j] . "</td><td>" . $italiano[$j] . "</td></tr>";
    }
    $response = $response . "</table>";
    return $response;
  }

  $es = $_GET['es'];
  $en = $_GET['en'];
  $pt = $_GET['pt'];
  $it = $_GET['it'];  
  $response = agregar_palabra($es, $en, $pt, $it);
  echo $response; 
?>

<html>
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body style="text-align:center; margin:15px;">
  <form action="index.php" class="d-flex justify-content-center">
    <input class="btn btn-outline-primary" type="submit" value="Volver">
  </form>
  </body>
</html>