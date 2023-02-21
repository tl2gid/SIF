<?php
    include "inc/dbcon.php";

    $n_idx = $_GET["n_idx"];

    $sql="select * from history;";
    //$sql= "select * from history where idx=$n_idx;";

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
    <script src="https://kit.fontawesome.com/ad420f5da6.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
        window.onload = function () {
            var elm = ".his-wrap";
            $(elm).each(function (index) {
                // 개별적으로 Wheel 이벤트 적용
                $(this).on("mousewheel DOMMouseScroll", function (e) {
                    e.preventDefault();
                    var delta = 0;
                    if (!event) event = window.event;
                    if (event.wheelDelta) {
                        delta = event.wheelDelta / 120;
                        if (window.opera) delta = -delta;
                    } 
                    else if (event.detail)
                        delta = -event.detail / 3;
                    var moveTop = $(window).scrollTop();
                    var elmSelecter = $(elm).eq(index);
                    // 마우스휠을 위에서 아래로
                    if (delta < 0) {
                        if ($(elmSelecter).next() != undefined) {
                            try{
                                moveTop = $(elmSelecter).next().offset().top;
                            }catch(e){}
                        }
                    // 마우스휠을 아래에서 위로
                    } else {
                        if ($(elmSelecter).prev() != undefined) {
                            try{
                                moveTop = $(elmSelecter).prev().offset().top;
                            }catch(e){}
                        }
                    }
                     
                    // 화면 이동 0.8초(800)
                    $("html,body").stop().animate({
                        scrollTop: moveTop + 'px'
                    }, {
                        duration: 900, complete: function () {
                        }
                    });
                });
            });
        }
    </script>
</head>
<body>
<div class="bg" style="background:rgb(238, 150, 198)">
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

        <div id="<?php echo $array["id"]; ?>" class="his-wrap">
            <div class="history-txt">
                <h1>The SeoulIllustration <?php echo $array["year"]; ?></h1>
                <table class="his-tap">
                    <tr>
                        <th><h3>행사명</h3></th>
                        <td>
                            <button type="button" class="report">
                                <a href="<?php echo $array["report"]; ?>" target="_blank">
                                    <p class="report-btn">
                                    <?php echo $array["title"]; ?>
                                        <i class="fa-solid fa-file-arrow-down"></i>
                                    </p>
                                </a>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th><h3 class="ko">일정</h3></th>
                        <td><?php echo $array["period"]; ?></td>
                    </tr>
                    <tr>
                        <th><h3>장소</h3></th>
                        <td><?php echo $array["place"]; ?></td>
                    </tr>
                    <tr>
                        <th><h3>주최</h3></th>
                        <td><?php echo $array["host"]; ?></td>
                    </tr>
                    <tr>
                        <th><h3>후원재단</h3></th>
                        <td><?php echo $array["sponsor"]; ?></td>
                    </tr>
                    <tr>
                        <th><h3>협찬</h3></th>
                        <td><?php echo $array["support"]; ?></td>
                    </tr>
                    <tr>
                        <th><h3>참가규모</h3></th>
                        <td><?php echo $array["scale"]; ?></td>
                    </tr>
                    <tr>
                        <th><h3>참관객</h3></th>
                        <td><?php echo $array["spectator"]; ?></td>
                    </tr>
                    <tr>
                        <th><h3>부대행사</h3></th>
                        <td>
                            <ul>
                                <li><?php echo $array["event1"]; ?></li>
                                <li><?php echo $array["event2"]; ?></li>
                                <li><?php echo $array["event3"]; ?></li>
                                <li><?php echo $array["event4"]; ?></li>
                                <li><?php echo $array["event5"]; ?></li>
                            </ul>
                            </td>
                    </tr>
                </table>
                
            </div>
            <div class="poster">
                <img src="images/poster/<?php echo $array["img"]; ?>" border="2" class="his-img" alt="2015년 포스터">
            </div> 
        </div>
    <?php
        $i--;
    };
    ?>
    <input type="button" class="back-btn" value="<-" onClick="history.go(-1)"> 
    </main>
</section>
</div>
</body>
</html>