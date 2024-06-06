<?php

const API_URL = "https://api-waifu.onrender.com/items/";

$ch = curl_init(API_URL);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
$data = json_decode($result, true);

curl_close($ch);
//var_dump($data);

?>


<main>
    <h1 style="text-align: center;">Catalogo de Waifus 2.0</h1>
    <div class="catalogo">
        <?php if (!empty($data)) : ?>
            <?php foreach ($data as $item) : ?>
                <div class="waifu-item">
                    <h2><?= htmlspecialchars($item['name']) ?></h2>
                    <img src="<?= htmlspecialchars($item['img']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
                    <p><?= htmlspecialchars($item['anime']) ?></p>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No se encontraron waifus.</p>
        <?php endif; ?>
    </div>
</main>

<style>
    :root {
        color-scheme: light dark;
    }

    

    img{
        width: 100%;
        height: 400px;
        display: block;
    }

    .catalogo{
        width: 90%;
        max-width: 1400px;
        margin: 20px auto;
    }

    @media(min-width: 700px){
        .catalogo{
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }

        .waifu-item{
            background-color: white;
            color: black;
            display: flex;
            flex-direction: column;
            text-align: center;
            align-items: center;
            border-radius: 7px 7px 7px 7px;
        }
    }
</style>