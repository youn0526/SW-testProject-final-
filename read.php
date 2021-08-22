<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>게시판 읽기</title>
  <link rel='stylesheet' href='bstyle.css'>
  <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic+Coding&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="./assets/icon/pencil.ico" />
  <script>
    function modify(num){   //글수정
      location.href="update.php?num="+num;
    }
    function delview(){
      document.getElementById('frm1').style.display="inline";
      document.getElementById('span1').style.visibility="hidden";
    }
    function cancel(){
      document.getElementById('frm1').style.display="none";
      document.getElementById('span1').style.visibility="";
    }
    function del(){        // 글삭제
      if(document.getElementById('pwd').value==''){
        alert('비밀번호를 입력하세요!');
        document.getElementById('pwd').focus();
        return;
      }
      document.frm1.submit();
    }
  </script>
</head>
<body>
<?php
  $num=$_GET['num'];
  $conn=mysqli_connect("localhost","dbs0834","dbs7834!","dbs0834") or die("MySQL 접속 실패");
  $sql1 = "update board set hit = hit + 1 where num =".$num;
  mysqli_query($conn,$sql1);
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

  echo "<h1 class='title'>상세 보기</h1>";
  echo "<div class='a'>";
  echo "<a href='list.php'>글 목록</a>&nbsp;&nbsp;";
  echo "<a href='main.html'>처음화면</a>";
  echo "</div>";
  echo "<table>";
  echo "    <tr class='t1'>등록일 ",$row['regdate'],"&nbsp;&nbsp;&nbsp;작성자 ",$row['writer'],"&nbsp;&nbsp;&nbsp;조회수 ",$row['hit'],"</tr>";  
  echo "  <tr>";
  echo "    <th class='write' width='150'>제목 </th>";
  echo "    <td class='t1'>",$row['title'],"</td>";
  echo "  </tr>";
  echo "  <tr>";
  echo "    <th class='write'>내용</th>";
  echo "    <td class='t1'>",$row['content'],"</td>";
  echo "  </tr>";
  echo "  <tr>";
  echo "    <td colspan='2' class='btn'>";
  echo "      <span id='span1'>";
  echo "        <input type='button' class='btn1' value='글 삭제' onclick='delview()'>";

  echo "        <input type='button' class='btn1' value='글 수정' onclick='modify(",$num,")'>";
  echo "      </span>";
  echo "      <form id='frm1' name='frm1' action='deleteProc.php' method='post' style='display:inline;display:none'>";
  echo "        <input type='hidden' name='num' value='",$num,"'>";
  echo "        비밀번호 : <input type='password' id='pwd' name='pwd' size='12' maxlength='12'>";
  echo "        <input type='button' value='삭제' class='btn1' onclick='del()'>";
  echo "        <input type='button' value='취소' class='btn1' onclick='cancel()'>";
  echo "      </form>";
  echo "    </td>";  
  echo "  </tr>";
  echo "</table>";


  mysqli_close($conn);

?>


</body>
</html>
