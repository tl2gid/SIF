<?php
    include "inc/dbcon.php";

    $n_idx = $_GET["n_idx"];

    $sql= "select * from painters where idx=$n_idx;";

    $result=mysqli_query($dbcon,$sql);
    $array=mysqli_fetch_array($result);

    mysqli_close($dbcon);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" swiper-slideent="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1">
    <title>SIF-소개</title>
    <link href="css/reset.css" rel="stylesheet">
    <link href="css/css.css" rel="stylesheet">
    <link href="css/swiper.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/js.js" type="text/javascript"></script>
    <script src="js/swiper.min.js"></script>
</head>
<body>
<!--nav menu-->
<div class="wrap">
<nav class="nav" style="display:none;">
    <ul>
        <li><a href="about.php">About</a></li>
        <li><a href="SIFV.14.php">SIFV.14</a></li>
        <li><a href="visit.html">Visit</a></li>
        <li><a href="recruit.html">Recruit</a></li>
        <li><a href="FAQ.html">FAQ</a></li>
    </ul>
    <img class="m_logo" src="images/logo.png">
</nav>
</div>

<section class="section">

    <header class="header">
    <div class="wrap">
        <div class="h-wrap">
            <div class="home_btn"><a href="index.html"></a></div>
            <div class="menu_btn"><a href="#"></a></div>
            <div class="lang_btn"><a href="#"></a></div>
        </div>
    </div>
    </header>

<main class="content">
    <div class="p-wrap">
            <div class="p-profile">
            <div class="p-img">
                <img src="images/painters/<?php echo $array["p_img"]; ?>" alt="">
            </div>
                <hr>
                <h1><?php echo $array["painter"]; ?></h1>
                <hr>
                <div class="into">
                    <h2>profile</h2>
                    <p><?php echo $array["profile"]; ?></p>
                </div>
                <div class="p-info">
                    <h2>contact</h3>
                    <p>
                        <?php echo $array["mail"]; ?>
                        <br>
                        <a href="https://<?php echo $array["instar"]; ?>"><?php echo $array["instar"]; ?></a>
                    </p>
                </div>
            </div>
            <div class="p-txt">
                <h2>interview</h2>
                <hr>
                <?php if($array['info_1']){ ?>
                <h3>자기소개 부탁드립니다!</h3>
                <p><?php echo $array["info_1"]; ?></p>
                <?php };?>
                
                <?php if($array['info_2']){ ?>
                <h3>작품을 만들 때 주로 어디서 영감을 받나요?</h3>
                <p><?php echo $array["info_2"]; ?></p>
                <?php };?>
                
                <?php if($array['info_3']){ ?>
                <h3>작가님의 작품만의 특별한 점은 무엇인가요?</h3>
                <p><?php echo $array["info_3"]; ?></p>
                <?php };?>

                <?php if($array['info_4']){ ?>
                <h3>같이 콜라보 하고 싶은 작가님 혹은 브랜드가 있나요?</h3>
                <p><?php echo $array["info_4"]; ?></p>
                <?php };?>

                <?php if($array['info_5']){ ?>
                <h3>메타버스에서 서일페가 개최된다면, 어떤 모습의 아바타로 참가하고 싶나요?</h3>
                <p><?php echo $array["info_5"]; ?></p>
                <?php };?>

                <?php if($array['info_6']){ ?>
                <h3>안녕 2022년! 열심히 살아온 2022년의 '나'에게 한마디!</h3>
                <p><?php echo $array["info_6"]; ?></p>
                <?php };?>
            </div>
                <input type="button" class="back-btn" value="<-" onClick="history.go(-1)"> 
    </div>         
    </main>
</section>
</body>
</html>