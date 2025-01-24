<?php
include 'inc/header.php';
include '../classes/role.php';

if (Session::get('role') === '1') {
    $hoTen = "";
    $hoTen = isset($_GET['name']) ? $_GET['name'] : '';


?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tài khoản</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cập nhật mật khẩu</li>
        </ol>
    </nav>
    <div id="form-create-user" style="padding: 0px 25%;" class="row g-3 needs-validation">
        <div style="display: flex; align-items:center; justify-content: center; text-transform: capitalize; font-size: 25px; font-weight: 600; color: seagreen; "><?php echo $hoTen; ?></div>

        <label for="validationCustom02" class="form-label">Nhập mật khẩu mới</label>
        <div style="margin-top: 0px;" class="input-group ">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
            <input class="form-control" type="password" id="password" name="password" placeholder="Password" value="">
            <span class="input-group-text"><i class="far fa-eye-slash" id="togglePassword"></i></span>
        </div>

        <label for="validationCustom02" class="form-label">Nhập lại mật khẩu mới</label>
        <div style="margin-top: 0px;" class="input-group ">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
            <input class="form-control" type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" value="">
            <span class="input-group-text"><i class="far fa-eye-slash" id="togglePasswordConfirm"></i></span>
        </div>

        <div class="col-12 mt-4">
            <button class="btn btn-primary" name="submit-update-password">Cập nhật mật khẩu</button>
            <a href="user-list.php" class="btn btn-warning">Thoát</a>
        </div>
    </div>

    <script src="js/users.min.js" >
        
        </script>

    <?php include 'inc/footer.php'; ?>

<?php } else { ?>
    <div style="display: flex; align-items: center; justify-content: center; font-size: 30px; text-transform: uppercase; font-weight: 600; height: 90vh; color: red;">Trang này không tồn tại</div>
<?php } ?>