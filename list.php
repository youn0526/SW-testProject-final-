<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>게시판 리스트</title>
	<link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic+Coding&display=swap" rel="stylesheet">
	<link rel="shortcut icon" href="./assets/icon/pencil.ico" />
	<link rel="stylesheet" href="bstyle.css"/>
</head>
<body>
<?php
	$conn=mysqli_connect("localhost","dbs0834","dbs7834!","dbs0834") or die("MySQL 접속 실패 !!");
	$sql="select * from board order by num desc";
	$ret=mysqli_query($conn, $sql);

	echo "<h1 class='title'>전체 글</h1>";
	echo "<div class='a'>";
	echo "<a href='write.html'>글쓰기</a>&nbsp;&nbsp;";
	echo "<a href='main.html'>처음화면</a>";
	echo "</div>";

	// if($ret){
	// 	echo mysqli_num_rows($ret)."건이 조회됨<br>";
	// }else{
	// 	echo "데이터 리스트 실패!!!<br>";
	// 	echo "실패 원인 :".mysqli_error($conn);
	// 	exit();
	// }
	echo "<table width='560' border='0'>";
	echo "	<tr class='list'>";
	echo "		<th>번호</th>";
	echo "		<th>제목</th>";
	echo "		<th>작성자</th>";
	echo "		<th>등록일</th>";
	echo "		<th>조회</th>";
	echo "	</tr>";

	while($row=mysqli_fetch_array($ret)){
		echo "<tr class='box'>";
		echo "   <td><a href='read.php?num=",$row['num'],"'>",$row['num'],"</a></td>";
		echo "   <td><a href='read.php?num=",$row['num'],"'>",$row['title'],"</a></td>";
		echo "   <td><a href='read.php?num=",$row['num'],"'>",$row['writer'],"</a></td>";
		echo "   <td><a href='read.php?num=",$row['num'],"'>",$row['regdate'],"</a></td>";
		echo "   <td><a href='read.php?num=",$row['num'],"'>",$row['hit'],"</a></td>";
		echo "</tr>";	}
		mysqli_close($conn); 
	echo "</table>";
?>
</body>
</html>

