
   <div class="product-search">
                <form id="product-search-form" action="index.php?page_layout=search_filter&&inverter=<?php echo $inverter ?>&&type=<?php echo $type ?>" method="POST"><br>
                    <fieldset>
                        <legend>Bộ lọc sản phẩm:</legend>
                        
                        Công nghệ Inverter:      <input name="inverter" selected type="checkbox" value=1>

                               <div style="margin-left: 150px;margin-top: -23px;">    
                        Kiểu máy:    <select name="type">
                        <option value=0>Hai chiều</option>
                                        <option value=1>Một chiều</option>       
                                    </select>
                                    
                        <input  type="submit" value="Tìm" name ="loc" /></div> 
                    </fieldset>
                </form>
            </div>
       
<!--	List Product	-->
<div class="products">
    <?php
    $sql = "SELECT*FROM product WHERE cat_id=1 ORDER BY prd_id DESC LIMIT 1";
    $query = mysqli_query($conn, $sql);
    ?>
    <h3> hiện có <?php echo mysqli_num_rows(mysqli_query($conn, "SELECT*FROM product WHERE cat_id=1 ORDER BY prd_id DESC  LIMIT 1"))?> sản phẩm</h3>
    <div class="product-list row">
        <?php
        while($row = mysqli_fetch_array($query)){
        ?>
        <div class="col-lg-3 col-md-6 col-sm-12 mx-product">
            <div class="product-item card text-center">
                <a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id'] ?>"><img class="img-fluid" src="admin/img/products/2962_12000_inv_2chieu.jpg"></a>
                <h4><a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id'] ?>"><?php echo 'Điều hòa Casper inverter 2 chiều 12000b'?></a></h4>
                <p>Giá Bán: <span><?php echo number_format($row['prd_price'] )?></span></p>
            </div>   
        </div>
        <?php } ?> 
    </div>
</div>
<!--	End List Product	-->

