<?php
$select_array =$_GET["select_array"];
$select_array_en =$_GET["select_array_en"];
// DB 연결
include "inc/dbcon.php";

// 쿼리 작성

$sql = "select * from painters order by painter;";
$sql2 = "select * from painters order by painter desc;";
$sql3 = "select * from painters;";

// 쿼리 실행
if($select_array=="a-z"||$select_array_en=="a-z"){
    $result = mysqli_query($dbcon, $sql);
}else if($select_array=="z-a"||$select_array_en=="z-a"){
    $result = mysqli_query($dbcon, $sql2);
}else{
    $result = mysqli_query($dbcon, $sql3);
}

// 전송할 데이터 출력
if($select_array=="a-z"||$select_array_en=="a-z"||$select_array=="z-a"||$select_array_en=="z-a"){ 
    //둘 중하나만 되면 값 출력
    while($array = mysqli_fetch_array($result)) {
        echo 
        '<div id="s-item" class="s-item '
        .$array["category"].
        '">
        <a href="painters.php?n_idx='
        .$array["idx"].
        '">
            <div class="item-tumb">
                <img src="images/painters/'.$array["p_img"].'" alt="'.$array["painter"].'">
            </div>
            <div class="item-text">'
                .$array["painter"].'
            </div>
        </a>
    </div>';
    }
}else{ //select option 정렬일때 기본값 다시 불러오기
    while($array = mysqli_fetch_array($result)) {
        echo 
        '<div id="s-item" class="s-item '
        .$array["category"].
        '">
        <a href="painters.php?n_idx='
        .$array["idx"].
        '">
            <div class="item-tumb">
                <img src="images/painters/'.$array["p_img"].'" alt="'.$array["painter"].'">
            </div>
            <div class="item-text">'
                .$array["painter"].'
            </div>
        </a>
    </div>';   
    }
}

mysqli_close($dbcon);
?>