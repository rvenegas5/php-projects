<html>
  <head>
    <title>PHP Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body style="text-align:center;font-family: Arial, Helvetica, sans-serif;margin:15px;">
    <h1>Traductor PHP</h1>
    <p>Debe colocar el idioma de origen y el idioma de destino</p>
    <form action="traducir.php" method="GET" class="d-flex flex-column justify-content-around">
      <div class="container d-flex mb-2">
        <label for="origen">Elige el idioma de origen:</label>
        <select class="form-select" style="cursor:pointer;" name="origen" id="origen">
          <option value="">--Idioma--</option>
          <option value="es">Español</option>
          <option value="en">Inglés</option>
          <option value="pt">Portugés</option>
          <option value="it">Italiano</option>
        </select>
      </div>
      <div class="container d-flex mb-2">
        <label for="destino">Elige el idioma de destino:</label>
        <select class="form-select" name="destino" id="destino">
          <option value="">--Idioma--</option>
          <option value="es">Español</option>
          <option value="en">Inglés</option>
          <option value="pt">Portugés</option>
          <option value="it">Italiano</option>
        </select>
      </div>
      <br><br>
      <div class="container d-flex ">
        <input class="form-control me-1" name="palabras" type="text" placeholder="Traducir" required>
        <input class="btn btn-outline-primary" style="cursor:pointer;" type="submit" value="Traducir" >
      </div>
    </form>
    <hr>
    <h3>Agregar palabras</h3>
    <p>Debe colocar una palabra con la traducción en los 4 idiomas</p>
    <form action="agregar.php" method="GET">
      <div class="container d-flex mb-2">
        <input class="form-control me-1" name="es" type="text" placeholder="Español" required>
      </div>
      <div class="container d-flex mb-2">
        <input class="form-control me-1" name="en" type="text" placeholder="Inglés" required>
      </div>
      <div class="container d-flex mb-2">
        <input class="form-control me-1" name="pt" type="text" placeholder="Postugués" required>
      </div>
      <div class="container d-flex mb-2">
        <input class="form-control me-1" name="it" type="text" placeholder="Italiano" required>
      </div>
      <div class="container d-flex mb-2">
        <input class="btn btn-outline-primary" style="cursor:pointer;" type="submit" value="Agregar al diccionario" >
      </div>
    </form>
  </body>
</html>