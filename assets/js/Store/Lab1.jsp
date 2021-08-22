<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=EUC-KR" />
    <title>상품주문</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
  </head>
  <script type="text/javascript">
    function check_form(f) {
      var name_chk = document.getElementById("name_chk");
      var tel_chk = document.getElementById("tel_chk");
      var count_chk = document.getElementById("count_chk");
      var address_chk = document.getElementById("address_chk");
      var product_chk = document.getElementById("product_chk");
      name_chk.innerHTML = "";
      tel_chk.innerHTML = "";
      count_chk.innerHTML = "";
      if (f.name.value == "" || f.name.value.length == 0) {
        name_chk.innerHTML = "* 이름을 입력해주세요";
      }
      if (f.tel.value == "" || f.tel.value.length == 0) {
        tel_chk.innerHTML = "* 전화번호를 입력해주세요";
      }
      if (f.count.value == 0) {
        count_chk.innerHTML = "* 수량을 선택해주세요";
      }
      if (f.address.value == 0 || f.tel.address.length == 0) {
        address_chk.innerHTML = "* 주소를 선택해주세요";
      }
      if (f.product.value == 0) {
        product_chk.innerHTML = "* 상품을 선택해주세요";
      }
      if (
        f.name.value != "" &&
        f.tel.value != "" &&
        f.count.value != 0 &&
        f.address.value != "" &&
        f.product.value != 0
      ) {
        var result = confirm("상품을 주문 하시겠습니까?");
        if (result) return true;
      }
      return false;
    }
    function reset_ok(f) {
      var result = confirm("주문을 취소하시겠습니까?");
      if (!result) {
        return false;
      }
    }

    function name_focus(f) {
      var name_chk = document.getElementById("name_chk");
      if (f.name.value == "" && name_chk.value != "") {
        name_chk.innerHTML = "";
      }
    }
    function tel_focus(f) {
      var tel_chk = document.getElementById("tel_chk");
      if (f.tel.value == "" && tel_chk.value != "") {
        tel_chk.innerHTML = "";
      }
    }
    function address_focus(f) {
      var address_chk = document.getElementById("address_chk");
      if (f.address.value == "" && address_chk.value != "") {
        address_chk.innerHTML = "";
      }
    }
  </script>

  <body>
    <div id="container">
      <h2>상품 구매 양식</h2>
      <p style="color: red; font-size: 0.8rem">모든 항목을 모두 채워주세요.</p>
      <hr />
      <form
        action="order.php"
        name="form"
        method="post"
        onsubmit="return check_form(this)"
        onreset="return reset_ok(this)"
      >
        <p>상품</p>
        <select name="product">
          <option value="0" selected>선택하세요</option>
          <option value="안동 사과">안동 사과</option>
          <option value="사과빵">사과빵</option>
          <option value="하회탈빵">하회탈빵</option>
          <option value="안동참마보리빵">안동참마보리빵</option>
          <option value="간고등어">간고등어</option>
          <option value="안동 한우">안동 한우</option>
          <option value="국화차">국화차</option>
          <option value="안동 마">안동 마</option>
          <option value="안동 식혜">안동 식혜</option>
          <option value="안동 하회탈">안동 하회탈</option>
          <option value="안동 소주">안동 소주</option>
          <option value="안동 삼베">안동 삼베</option>
        </select>
        <p>수량</p>
        <select name="count">
          <option value="0" selected>선택하세요</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
        </select>
        <p>이름</p>
        <input type="text" id="name" name="name" onfocus="name_focus(this.form)" autofocus />
        <span id="name_chk"> </span>
        <p>전화번호</p>
        <input
          type="text"
          id="tel"
          name="tel"
          placeholder="-제외하고 입력"
          onfocus="tel_focus(this.form)"
        /><span id="tel_chk"> </span>
        <p>주소</p>
        <input type="text" id="address" name="address" onfocus="address_focus(this.form)" /><span
          id="address_chk"
        >
        </span>
        <hr />
        <p class="btn">
          <input type="submit" value="제출" /> <input type="reset" value="다시쓰기" />
        </p>
      </form>
    </div>
  </body>
</html>
