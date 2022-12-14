<?php
$isPark = $_GET['parking'];
$isVote = $_GET['vote'];
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
   if($isPark != 'choose'){
    if($isPark == 'true')
     {
        $with_park = array_filter($hotels, function($data){
            return ($data['parking'] == true);
        });
        $hotels = $with_park;
        
    } else if($isPark == 'false'){
        $without_park = array_filter($hotels, function($data){
            return ($data['parking'] == false);
        });
        $hotels = $without_park;
    }
}

if($isVote != 'choose'){
    if($isVote == '1'){
        $one_star_more = array_filter($hotels, function($data){
            return ($data['vote'] >= 1);
        });
        $hotels = $one_star_more;
    }
    else if($isVote == '2'){
        $two_star_more = array_filter($hotels, function($data){
            return ($data['vote'] >= 2);
        });
        $hotels = $two_star_more;
    }    
    else if($isVote == '3'){
        $three_star_more = array_filter($hotels, function($data){
            return ($data['vote'] >= 3);
        });
        $hotels = $three_star_more;
    }
    else if($isVote == '4'){
        $four_star_more = array_filter($hotels, function($data){
            return ($data['vote'] >= 4);
        });
        $hotels = $four_star_more;
    }  
    else if($isVote == '5'){
       $five_star_more = array_filter($hotels, function($data){
           return ($data['vote'] >= 5);
       });
       $hotels = $five_star_more;
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php Hotel</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <h1>I NOSTRI HOTEL</h1>
<!-- FORM -->
    <form action="index.php" method="GET">
        <label for="park">Parcheggio:</label>
        <select name="parking" id="park">
            <option default value="choose">Scegli:</option>
            <option value="true">Con parcheggio</option>
            <option value="false">Senza parcheggio</option>
        </select>
        <label for="stars">Per voto:</label>
        <select name="vote" id="stars">
            <option default value="choose">Scegli:</option>
            <option value="1">1 Stella</option>
            <option value="2">2 Stelle</option>
            <option value="3">3 Stelle</option>
            <option value="4">4 Stelle</option>
            <option value="5">5 Stelle</option>
        </select>
        <button type="submit">Invia</button>
    </form>
<!-- TABELLA -->
    <table class="table">
    <thead><tr>
        <th scope="col">#</th>
        <?php foreach ($hotels as $hotel) { ?>        
            <th scope="col"><?php echo $hotel['name'] ?></th>
        <?php }  ?>
        </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">Descrizione</th>
         <?php foreach ($hotels as $hotel) { ?>
            <th scope="col"><?php echo $hotel['description'] ?></th>
        <?php }  ?>
    </tr>
    <tr>
        <?php if($isPark == true) { ?>
            <th scope="row">Parcheggio</th>
            <?php foreach ($hotels as $hotel) { ?>
                <th scope="col"><?php 
                if($hotel['parking'] == true){
                    echo 'Si';
                } else {
                    echo 'No';
                } ?></th>
            <?php }  ?>
        <?php } ?>
    </tr>
    <tr>
        <th scope="row">Voto</th>
         <?php foreach ($hotels as $hotel) { ?>
            <th scope="col"><?php echo $hotel['vote'] ?></th>
        <?php }  ?>
    </tr>
    <tr>
        <th scope="row">Distanza dal centro</th>
         <?php foreach ($hotels as $hotel) { ?>
            <th scope="col"><?php echo $hotel['distance_to_center'] ?> km</th>
        <?php }  ?>
    </tr>
    </tbody>
</table>

</body>
</html>