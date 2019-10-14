<?php
if (isset($_POST['Ten'])) {
    $Ten = $_POST['Ten'];
    $user = $_POST['User_Name'];
    $Pasword = md5($_POST['Password']);
    $DiaChi = $_POST['DiaChi'];
    $email = $_POST['Email'];
    $qt->User_Them($Ten, $user,$Pasword, $DiaChi, $email);
    echo "<script>document.location='index.php?p=user_ds';</script>";
    exit();


}
?>


<div class="row clearfix">
    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 center-block" style="float:none">
        <div class="card">
            <div class="header">
                <h2>
                    THÊM USER
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">
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
                <form class="form-horizontal" method="post" action="" id="adduser">
                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                            <label for="Ten">Họ Tên</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="Ten" name="Ten" class="form-control"
                                           placeholder="Nhập họ tên" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                            <label for="User_Name">User Name</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="User_Name" name="User_Name" class="form-control"
                                           placeholder="Nhập user name" required>
                                   
                                </div>
                                <span id="thongbao_username"></span>
                            </div>
                        </div>

                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                            <label for="Password">Password</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" id="Password" name="Password" class="form-control"
                                           placeholder="Nhập Password" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                            <label for="DiaChi">Địa Chỉ</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="DiaChi" name="DiaChi" class="form-control"
                                           placeholder="Nhập địa chỉ">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                            <label for="Email">Email</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="email" id="Email" name="Email" class="form-control"
                                           placeholder="Nhập Email">
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">THÊM USER</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

