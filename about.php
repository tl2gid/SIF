<?php
    include "inc/dbcon.php";

    $sql="select * from history;";
    $result=mysqli_query($dbcon,$sql);

    $array=mysqli_fetch_array($result);
    $total=mysqli_num_rows($result);

    // paging : 한 페이지 당 보여질 목록 수
    $list_num = 40;

    // paging : 한 블럭 당 페이지 수
    $page_num = 3;

    // paging : 현재 페이지
    $page = isset($_GET["page"])? $_GET["page"] : 1;

    // paging : 전체 페이지 수 = 전체 데이터 / 페이지 당 목록 수,  ceil : 올림값, floor : 내림값, round : 반올림
    $total_page = ceil($total / $list_num);
    // echo "전체 페이지수 : ".$total_page;
    // exit;

    // paging : 전체 블럭 수 = 전체 페이지 수 / 블럭 당 페이지 수
    $total_block = ceil($total_page / $page_num);

    // paging : 현재 블럭 번호 = 현재 페이지 번호 / 블럭 당 페이지 수
    $now_block = ceil($page / $page_num);

    // paging : 블럭 당 시작 페이지 번호 = (해당 글의 블럭 번호 - 1) * 블럭 당 페이지 수 + 1
    $s_pageNum = ($now_block - 1) * $page_num + 1;
    if($s_pageNum <= 0){
        $s_pageNum = 1;
    };

    // paging : 블럭 당 마지막 페이지 번호 = 현재 블럭 번호 * 블럭 당 페이지 수
    $e_pageNum = $now_block * $page_num;
    // 블럭 당 마지막 페이지 번호가 전체 페이지 수를 넘지 않도록
    if($e_pageNum > $total_page){
        $e_pageNum = $total_page;
    };

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" swiper-slideent="IE=edge">
    <meta name="viewport" content="widthhistory.htmldevice-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1">
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
        <div class="a-wrap">
        <div class="wrap">
        <div class="s_title ko">
            <h1>THE SEOUL<br>ILLUSTRATION<br>FAIR</h1>
            <h1 style="text-align:right">일러스트레이션이<br>그리는<br>NEW WAVE</h1>
        </div>
        <div style="display:none" class="s_title en">
            <h1>THE SEOUL<br>ILLUSTRATION<br>FAIR</h1>
            <h1 style="text-align:right">A NEW WAVE<br>OF<br>ILLUSTRATION</h1>
        </div>
            <div class="info ko">
                    서울일러스트레이션페어는 일러스트레이션분야를 대표하는 전문 전시회로
                    일러스트레이션, 그래픽디자인, 캘리그라피, 타이포그라피 등 관련 분야의 다양한 아티스트들이 참가하여
                    자신들의 작품을 알리고, 대중과 소통하는 아트 축제입니다.
                    <br>
                    <br>
                    때로는 단순한 그림 한 장이 열 장의 글보다 더 찡한 마음의 울림을 줄 때가 있습니다.
                    이처럼 일러스트레이션은 언어를 초월하여, 일상에 특별함을 선사하는 작품뿐만 아니라 더 나아가
                    트렌드를 선도하는 콘텐츠로 재생산되고
                    다양한 산업으로 확장할 수 있는 가능성을 가진 문화 콘텐츠입니다.<br>
                    <br>
                    매년 여름과 겨울, 서울일러스트레이션페어에서 ‘요즘의 일러스트레이션’을 만나고,
                    일러스트레이션의 NEW WAVE를 느껴 보시기를 바랍니다.
            </div>
            <div class="info en">
                Seoul Illustration Fair is a professional exhibition representing the field of illustration
                Various artists from related fields such as illustration, graphic design, calligraphy, and typography participated.
                It is an art festival that promotes their work and communicates with the public.
                <br>
                <br>
                Sometimes a simple picture resonates with you more than ten pieces of writing.
                In this way, illustration transcends language, and not only works that present speciality in daily life, but also
                It's reproduced as a content that leads the trend
                It is a cultural content that has the potential to expand into various industries.
                <br>
                <br>
                Every summer and winter, I meet "Illustration of the Day" at the Seoul Illustration Fair
                Please feel the new wave of illustration.
            </div>
        </div>
        </div>
        <div class="history">
            <div class="wrap">
                <aside class="arrow_title">
                    <h2 class="purple">HISTORY</h2>
                    <img src="images/arrow.png">
                </aside>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                    <?php
                    // paging : 해당 페이지의 글 시작 번호 = (현재 페이지 번호 - 1) * 페이지 당 보여질 목록 수
                    $start = ($page - 1) * $list_num;

                    // paging : 시작번호부터 페이지 당 보여질 목록수 만큼 데이터 구하는 쿼리 작성
                    // limit 몇번부터, 몇 개 //최신순order by
                    $sql = "select * from history order by idx desc limit $start, $list_num;";
                    // echo $sql;
                    /* exit; */

                    // DB에 데이터 전송
                    $result = mysqli_query($dbcon, $sql);

                    // DB에서 데이터 가져오기
                    // pager : 글번호(역순)
                    //전체데이터 - ((현재페이지-1) * 페이지당 목록 수)
                    $i = $total-(($page-1)*$list_num);
                    while($array = mysqli_fetch_array($result)){
                    ?>
                        <div class="swiper-slide">
                            <a href="history.php?n_idx=<?php echo $array["idx"]; ?>#<?php echo $array["id"]; ?>">
                                <img src="images/poster/<?php echo $array["img"]; ?>" alt="">
                                <h4><?php echo $array["year"]; ?></h4>
                            </a>
                        </div>
                    <?php
                        $i--;
                    };
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>
</body>
</html>