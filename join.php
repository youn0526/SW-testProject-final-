<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>로그인 오류</title>
        <style>
      body {
        width: auto;
        background-repeat: no-repeat;
        background-image: url("./assets/img/404mini.png");
        background-position: top center;
      }
    </style>
        
        <?php
 
        session_start();
 
        $connect = mysqli_connect("localhost", "dbs0834", "dbs7834!", "dbs0834") or die("fail");
 
        //입력 받은 id와 password
        $id=$_GET['id'];
        $pw=md5($_GET['pw']);
 
        //아이디가 있는지 검사
        $query = "select * from member where ID='$id'";
        $result = $connect->query($query);
 
 
        //아이디가 있다면 비밀번호 검사
        if(mysqli_num_rows($result)==1) {
 
                $row=mysqli_fetch_assoc($result);
 
                //비밀번호가 맞다면 세션 생성
                if($row['Password']==$pw){
                        $_SESSION['userid']=$id;
                        if(isset($_SESSION['userid'])){
                        ?>      <script>
                                        location.replace("main.html");
                                </script>
<?php
                        }
                        else{
                                echo "session fail";
                        }
                }
 
                else {
        ?>              <script>
                        setTimeout(function () {
        alert("아이디 혹은 비밀번호가 잘못되었습니다.");
        history.back();
      }, 1000);
                        </script>
        <?php
                }
 
        }
 
                else{
?>              <script>
                        setTimeout(function () {
        alert("아이디 혹은 비밀번호가 잘못되었습니다.");
        history.back();
      }, 100);
                </script>
<?php
        }
 
 
?>
</head>
<body>


</body>
        </html>