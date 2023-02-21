<?php
$painter = $_GET["painter"];

// DB 연결
$dbcon = mysqli_connect("localhost", "root", "", "sif") or die("접속에 실패하였습니다.");
mysqli_set_charset($dbcon, "utf8");

//json을 php에서 사용하기 위해 필요한 구문
header("Content-Type: application/json");

// 쿼리 작성
// $sql = "select * from members where painter like '%$painter%';";
$sql = "select painter from painters where painter like '%$painter%';";

// 쿼리 실행
$result = mysqli_query($dbcon, $sql);

// DB에서 가져온 데이터를  저장할 배열변수 생성
$db_name = array();

// 전송할 데이터 출력
if(strlen($painter)>0){ // 입력된 글자가 있는 경우에만 검색 실행
  while($row = mysqli_fetch_array($result)) {
      // array_push($db_idx, $row['idx']);
      array_push($db_name, $row['painter']);
      // array_push($db_age, $row['mobile']);
      // array_push($db_email, $row['email']);
  }
}

//  최종 데이터를 JSON으로 변환
// echo(json_encode(array("mode" => $_REQUEST['mode'], "idx" => $db_idx, "name" => $db_name, "mobile" => $db_mobile, "email" => $db_email)));
echo(json_encode(array("name" => $db_name)));
mysqli_close($dbcon);
?> 