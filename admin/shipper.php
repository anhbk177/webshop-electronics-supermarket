<script>
    function del_bill(name) {
        return confirm('Bạn muốn xóa người dùng: ' + name + ' ?');
    }
</script>
<?php
if (!defined("security")) {
    die("Bạn không có quyền truy cập");
}
// require 'PHPExcel/Classes/PHPExcel.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$row_per_page = 5;
$per_row = $page * $row_per_page - $row_per_page;
$total_row = mysqli_num_rows(mysqli_query($conn, "SELECT*FROM shipper"));
$total_page = ceil($total_row / $row_per_page);
$list_page = "";
$prev = $page - 1;
if ($prev <= 0) {
    $prev = 1;
}
$list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=shipper&page=' . $prev . '">&laquo;</a></li>';
for ($i = 1; $i <= $total_page; $i++) {
    if ($i == $page) {
        $active = 'active';
    } else {
        $active = '';
    }
    $list_page .= '<li class="page-item ' . $active . ' "><a class="page-link" href="index.php?page_layout=shipper&page=' . $i . '">' . $i . '</a></li>';
}
$next = $page + 1;
if ($next >= $total_page) {
    $next = $total_page;
}
$list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=shipper&page=' . $next . '">&raquo;</a></li>';
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Quản lý Shipper</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách Shipper</h1>
        </div>
    </div>
      
    <!--/.row-->
    <div id="toolbar" class="btn-group">
        <a href="index.php?page_layout=add_shipper" class="btn btn-success">
            <i class="glyphicon glyphicon-plus"></i> Thêm Shipper
        </a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table data-toolbar="#toolbar" data-toggle="table">

                        <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="name" data-sortable="true">Họ & Tên</th>
                                <th data-field="price" data-sortable="true">Số điện thoại</th>
                                <th data-field="g" data-sortable="true">Email</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                          
                                $sql = "SELECT*FROM shipper LIMIT $per_row,$row_per_page";                         
                            $query = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td style=""><?php echo $row['shipper_id'] ?></td>
                                    <td style=""><?php echo $row['shipper_name'] ?></td>
                                    <td style=""><?php echo $row['phone'] ?></td>
                                    <td style=""><?php echo $row['shipper_name'] ?></td>
                                   
                                    
                                    <td><?php if ($row['status'] == 0) {
                                            echo '<span class="label label-danger">Đang bận</span>';
                                        } elseif ($row['status'] == 1) {
                                            echo '<span class="label label-success">Sẵn sàng</span>';
                                        }?>
                                    </td>
                                    <td class="form-group">
                                        <a href="index.php?page_layout=edit_shipper&shipper_id=<?php echo $row['shipper_id'] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a onclick="return del_bill('<?php echo $row['shipper_id']; ?>')" href="del_shipper.php?shipper_id=<?php echo $row['shipper_id'] ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div class="panel-footer">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php echo $list_page ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>
<!--/.main-->