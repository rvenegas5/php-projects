<?php 
  function translate($origen, $destino, $palabras)
  {
      // Arrays de idiomas en paralelo
      $arrayIdiomaOrigen = array();
      $arrayIdiomaDestino = array();
      $espanol = array();
      $ingles = array();
      $portugues = array();
      $italiano = array();
      
      // Agregar las palabras a cada array de idiomas desde el diccionario
      $handle = fopen("diccionario.csv", "r");
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

      // Seleccionar arrays de origen y destino
      switch ($origen) {
        case "es":
            $arrayIdiomaOrigen = $espanol;
            break;
        case "en":
            $arrayIdiomaOrigen = $ingles;
            break;
        case "pt":
            $arrayIdiomaOrigen = $portugues;
            break;
        case "it":
          $arrayIdiomaOrigen = $italiano;
          break;
      }
      
      switch ($destino) {
        case "es":
            $arrayIdiomaDestino = $espanol;
            break;
        case "en":
            $arrayIdiomaDestino = $ingles;
            break;
        case "pt":
            $arrayIdiomaDestino = $portugues;
            break;
        case "it":
          $arrayIdiomaDestino = $italiano;
          break;
      }
      
      $arrayPalabras = explode(" ", $palabras);
      $resultado = "";
      $longitudPalabras = count($arrayPalabras);
      $longitudDicc = count($arrayIdiomaOrigen);

      for($i=0; $i<$longitudPalabras; $i++){
        $palabra = $arrayPalabras[$i];
        for ($j=1; $j<$longitudDicc; $j++){
          if ($palabra == $arrayIdiomaOrigen[$j]) {
            $resultado = $resultado . $arrayIdiomaDestino[$j] . " ";
          }
        }
      }

      return $resultado;

  }
    $origen = $_GET['origen'];
    $destino = $_GET['destino'];
    $palabras = $_GET['palabras'];
    // Validadiones
    if ($origen == "") {
      echo "<h1 style='color:red;'>Error</h1><p>Error, debe seleccionar un idioma de origen</p>";
    } elseif ($destino == "") {
      echo "<h1 style='color:red;'>Error</h1><p>Error, debe seleccionar un idioma de destino</p>";
    } elseif ($palabras == "") {
      echo "<h1 style='color:red;'>Error</h1><p>Error, debe colocar alguna palabra para traducir</p>";
    } elseif ($origen == $destino) {
      echo "<h1 style='color:red;'>Error</h1><p>Error, el idioma de origen debe ser diferente al idioma de destino</p>";
    } else {
      $traduccion = translate($origen, $destino, $palabras);
      $idiomas = array(
          "es" => "Español",
          "en"  => "Inglés",
          "pt"  => "Portugués",
          "it"  => "Italiano"
      );
      
      $idiomaOrigen = $idiomas[$_GET["origen"]];
      $idiomaDestino = $idiomas[$_GET["destino"]];

      echo "<h1>Traducción</h1></p> La traducción de " . $idiomaOrigen . " a " . $idiomaDestino . " de la(s) palabra(s) " . "<b>" . $_GET["palabras"] . "</b>" . " es : " . "<p class='fs-2'>" . $traduccion . "</p>". "</p>";
    }
    
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