<?php
$host = 'localhost';
$user = 'dbs0834';
$pw = 'dbs7834!';
$dbName = 'dbs0834';
$mysqli = new mysqli($host, $user, $pw, $dbName);

$name=$_POST['name'];
$contents=$_POST['answer'];

if($name==NULL )
{
    echo '<script> alert("닉네임을 적어주세요");
    history.back();
     </script>';
     exit();
}

if($contents==NULL )
{
    echo '<script> alert("내용을 적어주세요"); 
    history.back();
    </script>';
    exit();
}

$mysqli=mysqli_connect("localhost", "dbs0834", "dbs7834!", "dbs0834");

$insert=mysqli_query($mysqli,"INSERT INTO servey (Name, Contents, Date) 
VALUES ('$name', '$contents', NOW())");
if($insert){
    echo '<script> 
    alert("소중한 의견 감사합니다!");
    location.replace("./Tour.html");
    </script>';
} else {
    echo("쿼리오류" . mysqli_error($mysqli));
}
?>