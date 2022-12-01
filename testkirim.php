<?php
require_once 'functions/penting.php';
$id_user = 500;
$hasil = $file_penting->curl_get_contents('http://kitkabackend.eastus.cloudapp.azure.com:5010/shared/' . $id_user . '/live');
$data = json_decode($hasil, TRUE);
// var_dump($data);
// var_dump($data['MatchmakingPools'][0]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <td>ID BOT</td>
            <td>Kesusahan Bot</td>
            <td>Maksimal Player bot</td>
        </tr>
        <tr>
            <?php
            foreach ($data['MatchmakingPools'] as $id_player) {
                $id = $id_player['ID'];
                $MAXBOT = $id_player['MaxBotDifficulty'];
                foreach ($data['MatchmakingPools'] as $hasil_bot) {
                    echo '<td> ' . $id . '</td>';
                    echo '<td>' . $MAXBOT . '</td>';
                }
            ?>

            <?php

            } ?>
        </tr>
    </table>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>
<!-- <script>
    var mydata = JSON.parse($data);
    console.log(mydata[0].ID);
</script> -->