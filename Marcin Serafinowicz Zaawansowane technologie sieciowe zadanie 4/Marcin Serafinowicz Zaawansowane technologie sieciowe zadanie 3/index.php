<?php
require "script.php";

$data= new Data();
$data= $data->index();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zadanie III</title>

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    <h1 class="text-center">Zadanie III</h1>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="min-height: 85px">
    </div>
    <div class="container">

        <div class="jumbotron">
            <div class="container">
                <p style="float:right;font-size:12px">
                    <?= $data->p[0]->id ?><br>
                    <?= $data->p[0]->autor->idProfilu ?><br>
                    Email:&nbsp;<?=$data->p[0]->autor->mail?><br>
                    <b>Autor:&nbsp;<?=$data->p[0]->autor->awatar?></b><br>
                </p>
                <h1><?= $data->p[0]->autor->nazwa ?></h1>
                <p style="display: inline-block;float:left;"><?=$data->p[0]->tresc?></p><br>
                
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="min-height: 55px">
                    
                </div>
                <p>Id postów:&nbsp;<?php foreach($data->p[0]->odpowiedzi as $v):?>
                    <?=$v?>,
                    <?php endforeach?>
                </p><br>
                <p style="font-size: 12px;"><i>Link do obrazka:</i>&nbsp;<?=$data->p[0]->plik->url?></p>
                <p style="display: inline-block;float:right;bottom:5px;font-size:12px;">
                    <?=$data->p[0]->autor->stopka?>
                </p>
            </div>
        </div>

    </div>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>