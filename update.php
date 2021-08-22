<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>게시판 수정</title>
<link rel='stylesheet' href='bstyle.css' />
<link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic+Coding&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="./assets/icon/pencil.ico" />
</head>
<body>
<?php
    $num=$_GET['num'];
    $conn=mysqli_connect("localhost","dbs0834","dbs7834!","dbs0834") or die("MySQL 접속 실패 !!");
    $sql="select * from board where num=".$num;

    $ret = mysqli_query($conn, $sql);    
    if($ret) {
    //echo mysqli_num_rows($ret)."건이 조회됨<br>";
    $row = mysqli_fetch_array($ret);
    }else{
    echo "데이터 읽기 실패!!!<br>";
    echo "실패 원인 :".mysqli_error($conn);
    exit();
    }

    echo "<h1 class='title'>글 수정</h1>";
    echo "<div class='a'>";
    echo "<a href='list.php'>글 목록</a>&nbsp;&nbsp;";
    echo "<a href='index.html'>처음화면</a>";
    echo "</div>";
    echo "<form action='updateProc.php' method='post'>";
    echo "<table>";
    echo " <tr>";
    echo "    <th width='120' class='write'>글번호</th>";
    echo "    <td class='t1'>";
    echo "    <input type='hidden' name='num' value='",$row['num'],"'>",$row['num'];
    echo "    </td>";
    echo "  </tr>";
    echo "  <tr>";
    echo "   <th class='write'>글쓴이</th>";
    echo "    <td class='t1'>";
    echo "    <input type='text' name='writer' class='t2' value='",$row['writer'],"' size='12' maxlength='12' readonly>";
    echo "    </td>";
    echo "  </tr>";
    echo "  <tr>";
    echo "   <th class='write' >비밀번호</th>";
    echo "    <td class='t1'><input type='password' class='t2' name='pwd' placeholder='비밀번호를 입력해주세요' value='' size='12' maxlength='12'></td>";
    echo "  </tr>";
    echo "  <tr>";
    echo "    <th class='write'>조회수</th>";
    echo "    <td class='t1'>",$row['hit'],"</td>";
    echo "  </tr>";
    echo "  <tr>";
    echo "    <th class='write'>제목</th>";
    echo "    <td class='t1'><input type='text' class='t2' name='title' value='",$row['title'],"' size='50' maxlength='50'></td>";
    echo "  </tr>";
    echo "  <tr>";
    echo "    <th class='write'>내용</th>";
    echo "    <td class='t1'><textarea rows='5' class='t2' cols='50' name='content'>",$row['content'],"</textarea></td>";
    echo "  </tr>";
    echo "  <tr>";
    echo "    <td colspan='2' class='btn'>";
    echo "        <input type='button' value='취소' class='btn1' onclick='javascript:history.go(-1)'>";
        echo "        <input type='submit' value='수정' class='btn1'>";

    echo "    </td>";  
    echo "  </tr>";
    echo "</table>";
    echo "</form>";

    mysqli_close($conn);
?>
</body>
</html>
