<html>
<head>
<title>Ajax 테스트</title>
<script src="http://code.jquery.com/jquery-3.6.1.min.js"></script>
<script type="text/javascript">
$( document ).ready(function() {
	// JSON을 사용하지 않고 데이터 가져오기
	$('#no1').keyup(function(){
		g_name = $("#no1").val();
		$("#input_data_title").html("<h2>JSON 사용하지 않고 데이터 출력하기</h2>");
		$.ajax({
			url: "search_db.php?u_name="+g_name,
			type: "get",
			data: $("form").serialize(),
		}).done(function(data){			
			$("#input_data").html(data);		
		});
		
	});

	// JSON을 사용하여 데이터 가져오기
	$('#no2').keyup(function(){
		g_name = $("#no2").val();
		$("#input_data_title").html("<h2>JSON 사용하여 데이터 출력하기</h2>");
		$.ajax({
			url: "search_ajax.php?u_name="+g_name,
    	  	type: "get",		
   			data: $("form").serialize(),
   			dataType:"json",
		}).done(function(data){
			 var html = "";
			// JSON을 통해 가져온 데이타를 input_data에 출력
			for(var i = 0; i<data.name.length; i++){
               			//  html += "<p>JSON - "+data.idx[i]+"</p>";
				html += "<p>JSON - "+data.name[i]+"</p>";
				// html += "<p>JSON - "+data.mobile[i]+"</p>";
				// html += "<p>JSON - "+data.email[i]+"</p>";
			}
			$("#input_data").html(html);
 		}); 
          
	});

	//데이터 초기화
	$('#no3').click(function(){
 		$("#input_data").empty();
		$('#no1').val('');
		$('#no2').val('');
	});
	
});
</script>
</head>
<body>
    <input type="text" placeholder="이름입력" id="no1">
    <input type="text" placeholder="이름입력" id="no2">
    <hr>

    <!-- Ajax를 이용해 DB에서 가져온 데이타를 이곳에 넣어주자. -->
    <div id="input_data_title"></div>
    <div id="input_data"></div>

    <hr>
    <button id="no3">리셋</button>
</body>
</html>
