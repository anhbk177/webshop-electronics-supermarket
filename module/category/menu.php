<?php
$sql = "SELECT*FROM category ORDER BY cat_id ASC";
$query = mysqli_query($conn, $sql);
?>
<div id="menu" class="collapse navbar-collapse">
    <ul>
        <?php while ($row = mysqli_fetch_array($query)) { ?>
            <li class="menu-item"><a href="index.php?page_layout=category&cat_id=<?php echo $row['cat_id'] ?>&cat_name=<?php echo $row['cat_name'] ?>"><?php echo $row['cat_name']; ?></a></li>
        <?php } ?>
    </ul>


    <!-- <ul>

        <li>
            <a href="#">Products ▾</a>
            <ul class="dropdown">
                <li><a href="#">Laptops</a></li>
                <li><a href="#">Monitors</a></li>
                
                <li>
                    <a href="#">Sản phẩm B</a>
                    <ul class="menu-sub">
                        <li><a href="#">Sản phẩm B - 1</a> </li>
                        <li><a href="#">Sản phẩm B - 2</a> </li>
                        <li><a href="#">Sản phẩm B - 3</a> </li>
                        <li><a href="#">Sản phẩm B - 4</a> </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Sản phẩm B</a>
                    <ul class="menu-sub">
                        <li><a href="#">Sản phẩm B - 1</a> </li>
                        <li><a href="#">Sản phẩm B - 2</a> </li>
                        <li><a href="#">Sản phẩm B - 3</a> </li>
                        <li><a href="#">Sản phẩm B - 4</a> </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
    </ul> -->

    <!-- <ul class="menu-cap3 clearfix" >
  <li><a href="#" >Trang chủ</a> </li>
  <li>
    <a href="#" >Sản phẩm</a> 
    <ul class="menu-sub" >
      <li><a href="#" >Sản phẩm A</a> </li>

      <li>
           <a href="#" >Sản phẩm B</a> 
           <ul class="menu-sub" >
               <li><a href="#" >Sản phẩm B - 1</a> </li>
               <li><a href="#" >Sản phẩm B - 2</a> </li>
               <li><a href="#" >Sản phẩm B - 3</a> </li>
               <li><a href="#" >Sản phẩm B - 4</a> </li>
           </ul>
      </li>

      <li><a href="#" >Sản phẩm C</a> </li>
      <li><a href="#" >Sản phẩm D</a> </li>
    </ul>
  </li>
  <li>
    <a href="#" >Về chúng tôi</a> 
    <ul class="menu-sub" >
      <li><a href="#" >Lịch sử hình thành</a> </li>
      <li><a href="#" >Mục tiêu và sứ mệnh</a> </li>
      <li><a href="#" >Đối tác</a> </li>
    </ul>
  </li>
  <li><a href="#" >Chính sách</a> </li>
  <li><a href="#" >Liên hệ</a> </li>
</ul> -->
</div>