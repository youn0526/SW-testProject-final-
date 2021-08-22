<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic+Coding&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/bootstrap.css" />
    <link rel="icon" type="image/x-icon" href="./assets/icon/account.ico" />
    <title>주문현황</title>
    <h2 style="font-family: 'Nanum Gothic Coding', monospace">주문현황</h2>
    <style>
      h2 {
        margin-top: 1rem;
  margin-bottom: 1rem;
  font-weight: bold;
  color: #2f2f2f;
  font-size: 2.7rem;
      }
      body {
        background-color: #ececec;
        font-family: Consolas, monospace;
        font-family: 12px;
        text-align: center;
        position: relative;
        transform: translate(0%, 50%);
      }
      table {
        width: 100%;
        position: absolute;
      }
      th, td {
        padding: 10px;
        border-bottom: 1px solid #dadada;
      }
      th {
        font-size: 1.3rem;
        font-family: 'Nanum Gothic Coding', monospace;
      }
    </style>
  </head>
  <body>
  <table class='table'>
      <thead>
        <tr class="table">
        <th scope="col">상품</th>
          <th scope="col">수량</th>
          <th scope="col" >이름</th>
          <th scope="col" >전화번호</th>
          <th scope="col" >주소</th>
          <th scope="col" >주문일자</th>
        </tr>
      </thead>
      <tbody>
        <?php
      $jb_conn = mysqli_connect("localhost", "dbs0834", "dbs7834!", "dbs0834");
      $jb_sql = "SELECT * FROM product";
      $jb_result = mysqli_query( $jb_conn, $jb_sql );
      while( $jb_row = mysqli_fetch_array( $jb_result ) ) {
        echo '<tr><td>' . $jb_row[ '상품' ] . '</td><td>'. $jb_row[ '수량' ] . '</td><td>' . $jb_row[ '이름' ] . '</td><td>' . $jb_row[ '전화번호' ] . '</td><td>' . $jb_row[ '주소' ] . '</td><td>' . $jb_row[ '주문일자' ] . '</td><td>';
      }
    ?>
  </body>
</html>