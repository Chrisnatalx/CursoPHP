<?php
#Inicializar una nueva sesion de cURL; ch = cURL
const API_URL = "https://whenisthenextmcufilm.com/api";
$ch = curl_init(API_URL);

//INDICAR QUE QUEREMOS RECIBIR EL RESULTADO DE LA PETICION Y NO MOSTRARLA EN PANTALLA

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
$data = json_decode($result, true);
curl_close($ch);
// var_dump($data)

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <title>La proxima pelicula de Marvel</title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<main class="container">
    <section>
        <img src="<?= $data["poster_url"]; ?>" width="200" alt="Poster de <?= $data["title"] ?>" style="border-radius: 16px;">
    </section>
    <hgroup>
        <h2><?= $data["title"]  ?> </h2>
        <h3>Se estrena el <?= $data["release_date"] ?> </h3>
        <p>Faltan : <?= $data["days_until"] ?> dias para el estreno</p>
        <p>Descripcion : <?= $data["overview"] ?> </p>
        <p> La siguiente pelicula de marvel es es <?= $data["following_production"]["title"] ?></p>
    </hgroup>
</main>

<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }

    img {
        margin: 0 auto;
    }

    section {
        display: flex;
        justify-content: center;
        text-align: center;
    }

    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
</style>