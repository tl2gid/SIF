<?php
    include "inc/dbcon.php";

    $sql="select * from painters;";
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIF-참가자</title>
    <link href="css/reset.css" rel="stylesheet">
    <link href="css/css.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/js.js" type="text/javascript"></script>
    <script>
    $( document ).ready(function() {
	    // JSON을 사용하지 않고 데이터 가져오기
	    $('#select_array').change(function(){
	    	select_array = $("#select_array").val();
	    	$.ajax({
	    		url: "search_db.php?select_array="+select_array,
	    		type: "get",
	    		data: $("form").serialize(),
	    	}).done(function(data){			
	    		$(".painter").html(data);		
	    	});
        
	    });

        // JSON을 사용하지 않고 데이터 가져오기
	    $('#select_array_en').change(function(){
	    	select_array = $("#select_array_en").val();
	    	$.ajax({
	    		url: "search_db.php?select_array_en="+select_array_en,
	    		type: "get",
	    		data: $("form").serialize(),
	    	}).done(function(data){			
	    		$(".painter").html(data);		
	    	});
        
	    });
    });
    </script>
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
        <div class="s-wrap">
            <div class="wrap">
                <div class="category">
                    <ul class="ko">
                        <li class="all-btn"><a href="#">ALL</a></li>
                        <li class="illust-btn"><a href="#">일러스트레이션</a></li>
                        <li class="character-btn"><a href="#">캐릭터 디자인</a></li>
                        <li class="pic-book-btn"><a href="#">그림책</a></li>
                        <li class="webtoon-btn"><a href="#">웹툰</a></li>
                        <li class="indep-pubilc-btn"><a href="#">독립출판</a></li>
                        <li class="grap-des-btn"><a href="#">그래픽 디자인</a></li>
                        <li class="game-btn"><a href="#">게임</a></li>
                        <li class="animat-btn"><a href="#">애니메이션</a></li>
                        <li class="calli-btn"><a href="#">캘리그라피</a></li>
                        <li class="convers-btn"><a href="#">회화</a></li>
                        <li class="art-toy-btn"><a href="#">아트토이</a></li>
                    </ul>
                    <ul class="en" style="display:none;">
                        <li class="all-btn"><a href="#">ALL</a></li>
                        <li class="illust-btn"><a href="#">ILLUSTRATE</a></li>
                        <li class="character-btn"><a href="#">CHARACTER</a></li>
                        <li class="pic-book-btn"><a href="#">PICTURE BOOK</a></li>
                        <li class="webtoon-btn"><a href="#">WEBTOON</a></li>
                        <li class="indep-pubilc-btn"><a href="#">INDEPENDENT PUBLICATION</a></li>
                        <li class="grap-des-btn"><a href="#">GRAPHICS</a></li>
                        <li class="game-btn"><a href="#">GAME</a></li>
                        <li class="animat-btn"><a href="#">ANIMATION</a></li>
                        <li class="calli-btn"><a href="#">CALLIGRAPHY</a></li>
                        <li class="convers-btn"><a href="#">PICTURE</a></li>
                        <li class="art-toy-btn"><a href="#">ART TOY</a></li>
                    </ul>
                </div>
                <div class="filter">
                <form action="search_form.php" id="search_form" name="search_form" method="get">
                    <fieldset style="border:none">
                    <article class="search">
                            <div class="ko">
                                <legend>검색어 입력</legend>
                                <input type="text" id="search" name="search" placeholder="검색어 입력">
                            </div>
                            <div class="en">
                                <legend>검색어 입력 영문버전</legend>
                                <input type="text" id="search-en" name="search-en" placeholder="Search For">
                            </div>
                    </article>
                    <article class="array">
                        <select id="select_array" name="select_array" onchange="change_select()" class="a_category ko">
                            <option>정렬</option>
                            <option value="a-z" >이름순 A->ㅎ</option>
                            <option value="z-a" >이름순 ㅎ->A</option>
                            <!-- <option name="g-h" >작가 이름순 ㄱ->ㅎ</option>
                            <option name="h-g" >작가 이름순 ㅎ->ㄱ</option> -->
                        </select>
                        <select id="select_array_en" name="select_array_en" class="a_category en">
                            <option>Array</option>
                            <option value="a-z" >Name order A->ㅎ</option>
                            <option value="z-a" >Name order ㅎ->A</option>
                            <!-- <option name="g-h" >Name order ㄱ->ㅎ</option>
                            <option name="h-g" >Name order ㅎ->ㄱ</option> -->
                        </select>
                    </article>
                    </fieldset>
                </form>
                </div>
                <div class="painter">
                <?php
                    // paging : 해당 페이지의 글 시작 번호 = (현재 페이지 번호 - 1) * 페이지 당 보여질 목록 수
                    $start = ($page - 1) * $list_num;

                    // paging : 시작번호부터 페이지 당 보여질 목록수 만큼 데이터 구하는 쿼리 작성
                    // limit 몇번부터, 몇 개 //최신순order by
                    $sql = "select * from painters order by idx limit $start, $list_num;";

                    $result = mysqli_query($dbcon, $sql);
                    // DB에서 데이터 가져오기
                    // pager : 글번호(역순)
                    //전체데이터 - ((현재페이지-1) * 페이지당 목록 수)
                    $i = $total-(($page-1)*$list_num);
                    while($array = mysqli_fetch_array($result)){
                    ?>
                        <div id="s-item" class="s-item <?php echo $array['category']; ?>">
                            <a href="painters.php?n_idx=<?php echo $array["idx"]; ?>">
                                <div class="item-tumb">
                                    <img src="images/painters/<?php echo $array["p_img"]; ?>" alt="<?php echo $array["painter"]; ?>">
                                </div>
                                <div class="item-text">
                                    <?php echo $array["painter"]; ?>
                                </div>
                            </a>
                        </div>
                    <?php
                        $i--;
                    };
                    ?>
                    <p style="display:none" class="dsp">검색결과가 없습니다.</p>
                    </div>
                <!-- <div class="page">
                    <?php
                    // pager : 이전 페이지
                    if($page <= 1){
                    ?>
                    <a href="SIFV.14.php?page=1"> <span><</span></a>
                    <?php } else{ ?>
                    <a href="SIFV.14.php?page=<?php echo ($page - 1); ?>"> <span><</span></a>
                    <?php }; ?>
                    
                    <?php
                    // pager : 페이지 번호 출력
                    for($print_page = $s_pageNum;  $print_page <= $e_pageNum; $print_page++){
                    ?>
                    <a href="SIFV.14.php?page=<?php echo $print_page; ?>"><?php echo $print_page; ?></a>
                    <?php }; ?>
                    
                    <?php
                    // pager : 다음 페이지
                    if($page >= $total_page){
                    ?>
                    <a href="SIFV.14.php?page=<?php echo $total_page; ?>"><span>></span></a>
                    <?php } else{ ?>
                    <a href="SIFV.14.php?page=<?php echo ($page + 1); ?>"><span>></span></a>
                    <?php }; ?>
                </div> -->
            </div><!--wrap-->
        </div><!--s-wrap-->
    </main>
</section>
</body>
</html>