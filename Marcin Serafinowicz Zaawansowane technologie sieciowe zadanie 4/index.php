<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require "config.php";
$sql="SELECT * FROM uprawy ";
$result=$db->query($sql);
while($row=$result->fetchArray()){
    $dataZasiewu=$row['data_zasiewu'];
    $kosztZasiewu=$row['koszt_zasiewu'];
    $bogactwo=$row['bogactwo'];
    $ostanieSprawdzenie=$row['data_sprawdzenia'];
    $terminZbioru=$row['data_zbioru'];
    $dataOstatniegoZbioru=$row['data_ostatniego_zbioru'];
    $max=$row["max_limit"];
}
if($terminZbioru=="0")
$zarobiono=strtotime($dataOstatniegoZbioru)-strtotime($dataZasiewu);
else
$zarobiono=strtotime("now")-strtotime($dataZasiewu);
$z=0;
if( $zarobiono<=100 & $terminZbioru=="0"){
    $z=$max*0.25;
}
if( $zarobiono>100 & $zarobiono<200){
    $z=$max*0.50+$bogactwo;
}
if( $zarobiono>200 &$zarobiono<300){
    $z=$max*0.75;
}
if( $zarobiono>300 & $zarobiono<400){
    $z=$max*1;
}
if( $zarobiono>400 &$zarobiono<500){
    $z=0-$max*0.25;
}
if( $zarobiono>500 & $zarobiono<600){
    $z=0-$max*0.50;
}
if( $zarobiono>600 & $zarobiono<700){
    $z=0-$max*0.75;
}
if( $zarobiono>700 &$zarobiono<800){
    $z=0-$max*1;;
}

?>


<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zafdanie IV</title>

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="/4/css/style.css" rel="stylesheet">
    <link href="/4/Arctext-master/css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    <h1 class="text-center">Zadanie IV</h1>
    <p id="info"></p>
    <div class="container">
        <div class="jumbotron" style="background-color: rgba(245, 168, 10,0.25)">
            <form action="reset.php" id="formReset">
                <p onclick="document.getElementById('formReset').submit()" id="btn-reset">Reset</p>
            </form>

            <div class="container">

                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="min-height: 55px;">
                        <h1 id="title" class="text-center " style="color:green;font-family: 'Luckiest Guy', cursive;">Witamy w grze <strong><i>`Farma`</i></strong></h1>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="min-height: 85px;">
                        <h2 id="subtitle" class="text-center">Rachunek Farmy</h2>

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="min-height: 250px;">


                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="min-height: 20vh;border-right:1px solid #777877;">
                            <h3 id="zasiewTitle" class="text-center">Zasiew uprawy</h3>
                            <p style="font-size:small;">Data zasiewu:&nbsp;<?=$dataZasiewu?></p>
                            <hr>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="min-height: 18vh;">

                                <table class="table table-bordered table-hover" style="border-color:peru;">
                                    <thead style="border-color:peru;">
                                        <tr>
                                            <th>Nazwa</th>
                                            <th>Kwota</th>
                                        </tr>
                                    </thead>
                                    <tbody style="border-color:peru;">
                                        <tr>
                                            <td>Koszt zasiewu</td>
                                            <td><?=$kosztZasiewu?></td>
                                        </tr>
                                        <tr>
                                            <th>Bogactwo</th>
                                            <th><?=$bogactwo?></th>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                            <hr>
                            <p class="text-center">
                                <form action="zasiew.php" method="POST" id="formZasiew">
                                    <a class="btn btn-primary btn-sm" onclick="document.getElementById('formZasiew').submit()" id="btn-zasiej">Zasiej uprawę</a>
                                </form>
                            </p>
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <h3 id="podgladTitle" class="text-center">Podgląd uprawy</h3>
                            <p style="font-size:small;">Ostatnie sprawdzenie:&nbsp;<?=$ostanieSprawdzenie?></p>
                            <hr>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="min-height: 18vh;">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                           
                                            <th>Nazwa</th>
                                            <th>Kwota</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Czas uprawy</td>
                                            <td><?=(strtotime($ostanieSprawdzenie)-strtotime($dataZasiewu)<0)?0:strtotime($ostanieSprawdzenie)-strtotime($dataZasiewu)?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <p class="text-center">
                                <form action="sprawdz.php" method="POST" id="formSprawdz">
                                    <a class="btn btn-warning btn-sm" onclick="document.getElementById('formSprawdz').submit()" id="btn-sprawdz">Sprawdź uprawę</a>
                                </form>
                            </p>
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="border-left:1px solid #777877;min-height: 20vh;">
                            <h3 id="zbiorTitle" class="text-center">Zbiór uprawy</h3>
                            <p style="font-size:small;">Do końca zbioru:&nbsp;<?=$terminZbioru?></p>
                            <hr>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="min-height: 18vh">
                            <table class="table table-bordered table-hover" style="border-color:peru;">
                                    <thead style="border-color:peru;">
                                        <tr>
                                            <th>Nazwa</th>
                                            <th>Kwota</th>
                                        </tr>
                                    </thead>
                                    <tbody style="border-color:peru;">
                                        <tr>
                                            <td>Zarobiono</td>
                                            <td><?=$z?></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                            <hr>
                            <p class="text-center">
                            <form action="zbior.php" method="POST" id="formZbior">
                                <a class="btn btn-success btn-sm"onclick="document.getElementById('formZbior').submit()" id="btn-zbior">Zbierz uprawę</a>
                            </form>
                            </p>
                        </div>

                    </div>



                </div>


            </div>
        </div>
    </div>



    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="/4/Arctext-master/js/jquery.arctext.js"></script>
    <script>
        $(function() {
            $("#title").arctext({
                radius: 850
            });
            $("#subtitle").arctext({
                radius: 850
            });
            
            console.log('<?=$terminZbioru?>');
        });
        var btn=document.getElementById("btn-zbior");
        var btnS=document.getElementById("btn-sprawdz");
        var btnZ=document.getElementById("btn-zasiej");
            if('<?=$terminZbioru?>'!=='0'){
                btn.removeAttribute("disabled","enable");
                btnS.removeAttribute("disabled","enable");
                btnZ.setAttribute("disabled","disabled");
            }else{
                btn.setAttribute("disabled","disabled");
                btnS.setAttribute("disabled","disabled");
                btnZ.removeAttribute("disabled","enable");
            }
    </script>
</body>

</html>