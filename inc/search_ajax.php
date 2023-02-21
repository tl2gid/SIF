  <?php
  
  include "dbcon.php";
 
  $search=$_GET["search"];
  
  $sql="select * from painters where painter like '%$search%'";
  echo $sql;
  
  $result=mysqli_query($dbcon, $sql);
  $num_match=mysqli_num_rows($result);

  if(!$num_match){
	echo "N";
  } else{
	 echo "Y";
  }
?>