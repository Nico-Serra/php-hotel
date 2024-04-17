<?php

/*

Partiamo da questo array di hotel. https://www.codepile.net/pile/OEWY7Q1G 
Stampare tutti i nostri hotel con tutti i dati disponibili.
Iniziate in modo graduale. 
Prima stampate in pagina i dati, senza preoccuparvi dello stile.
 Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.
Bonus:
1 - Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.

*/

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

//var_dump($_GET);

if ($_GET['yesParking']) {
    $hotels = array_filter($hotels, fn ($hotel) => $hotel["parking"]);
}



//var_dump($newHotels)


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <main>

        <div class="container">
            <h1>Hotels</h1>

            <form action="" method="get">
                <p>Vuoi filtrare gli hotel in base al parcheggio</p>
                <input type="checkbox" name="yesParking" id="yesParking" value="true">si
                <button type="submit" class="btn btn-primary">Filtra</button>


            </form>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome Hotel</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Voto</th>
                        <th scope="col">Parcheggio</th>
                        <th scope="col">Distanza dal centro</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($hotels as $hotel) : ?>
                        <tr>
                            <th scope="row"><?php echo $hotel["name"] ?></th>
                            <td> <?php echo $hotel["description"] ?></td>
                            <td> <?php echo $hotel["vote"] ?></td>
                            <td> <?php if ($hotel["parking"] === true) {
                                        echo 'Si';
                                    } else {
                                        echo 'No';
                                    } ?></td>
                            <td> <?php echo $hotel["distance_to_center"] . ' km' ?></td>
                        </tr>
                    <?php endforeach ?>




                </tbody>
            </table>
        </div>
    </main>

</body>

</html>