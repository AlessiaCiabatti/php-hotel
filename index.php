<?php

$hotels = [

  [
      'name' => 'Hotel Belvedere',
      'description' => 'Hotel Belvedere Descrizione',
      'parking' => true,
      'vote' => 4,
      'distance_to_center' => 10.4
  ],
  [
      'name' => 'Hotel Futuro',
      'description' => 'Hotel Futuro Descrizione',
      'parking' => true,
      'vote' => 2,
      'distance_to_center' => 2
  ],
  [
      'name' => 'Hotel Rivamare',
      'description' => 'Hotel Rivamare Descrizione',
      'parking' => false,
      'vote' => 1,
      'distance_to_center' => 1
  ],
  [
      'name' => 'Hotel Bellavista',
      'description' => 'Hotel Bellavista Descrizione',
      'parking' => false,
      'vote' => 5,
      'distance_to_center' => 5.5
  ],
  [
      'name' => 'Hotel Milano',
      'description' => 'Hotel Milano Descrizione',
      'parking' => true,
      'vote' => 2,
      'distance_to_center' => 50
  ],

];

// foreach($hotels as $x){
//   $name = $x['name'];
//   echo "<h2> $name </h2>";
//   var_dump($x);
//   }

$parcheggio = $_POST['parcheggio'] ?? '';
// echo $parcheggio;

// filtro array con solo parking === true
if(isset($parcheggio) && $parcheggio === 'parcheggio'){
$hotels_filtrati = array_filter($hotels, function($hotel) {
  return $hotel['parking'] === true;
});
}else{
  $hotels_filtrati = $hotels;
}

// var_dump($hotels_filtrati);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!--  -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel</title>
</head>

<body>

<div class="container my-5">

  <h1>Cards Hotels</h1>

  <form action="index.php" method="post">
    <h5 class="mb-3">scrivi parcheggio</h5>
    <input class="mb-5" type="text" placeholder="Parcheggio" name="parcheggio">
    <button class="btn btn-primary" type="submit">Invia</button>
  </form>

  <div class="row">

    <?php foreach($hotels_filtrati as $item): ?>

      <div class="col-md-4">
        <div class="card mb-3">
          <div class="card-body">
            <h3 class="card-title"><?php echo $item['name'] ?></h3>
            <h5 class="card-subtitle mb-2 text-body-secondary"><?php echo $item['description'] ?></h5>
            <p class="card-text">
              <h5>Informazioni:</h5>
              <p>
                <?php 
                if($item['parking'] === true) 
                  echo "Parcheggio: Libero";
                else{
                  echo "Parcheggio: Occupato";
                }
                ?>
              </p>
              <p>Voto: <?php echo $item['vote'] ?></p>
              <p>Distanza dal centro: <?php echo $item['distance_to_center']?> km</p>
            </p>
          </div>
        </div>
      </div>
      
    <?php endforeach; ?>

  </div>

</div>


</body>
</html>