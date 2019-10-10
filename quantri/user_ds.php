
<div class="container-fluid">

    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        QUẢN TRỊ USER
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                            <tr>
                                 <th>idUser</th>
                                <th>Họ Tên</th>
                                <th>User Name</th>
                                <th>Password</th>
                                <th>Địa chỉ</th>
                                <th>Email</th>
                                <th>Điện Thoại</th>
                                <th>Cập nhật/Xóa</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $kq = $qt->ListUser(); ?>
                            <?php while ($rowTL = $kq->fetch_assoc() ) { ?>
                            <tr>
                                <td><?=$rowTL['idUser']?></td>
                                <td><?=$rowTL['HoTen']?></td>
                                <td><?=$rowTL['Username']?></td>
                                <td><?=$rowTL['Password']?></td>
                                <td><?=$rowTL['DiaChi']?></td>
                                <td><?=$rowTL['Email']?></td>
                                <td><?=$rowTL['DienThoai']?></td>
                                <td>
                                    <a href="?p=theloai_sua&idTL=<?=$rowTL['idTL']?>" class="btn bg-blue waves-effect">Cập nhật</a> &nbsp;
                                    <a href="theloai_xoa.php?idTL=<?=$rowTL['idTL']?>" class="btn bg-red waves-effect" onClick="return confirm('Xóa hả')">Xóa</a>

                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->
    <!-- Exportable Table -->
    <!-- #END# Exportable Table -->
</div>

<!-- JQuery DataTable Css -->
<link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
<!-- JQuery DataTable Css -->
<link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
<!-- Jquery DataTable Plugin Js -->
<script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
<!-- Custom Js -->
<script src="js/pages/tables/jquery-datatable.js"></script>

