<?php
include 'inc/header.php';
include '../classes/role.php';

if (Session::get('role') === '1') {
    $role = new Role();
    $list_role = $role->getAllRole();

?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tài khoản</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tạo tài khoản</li>
        </ol>
    </nav>
    <div id="form-create-user" style="padding: 0px 25%;" class="row g-3 needs-validation">
        <div class="col-12">
            <label for="validationCustom01" class="form-label">Tên đăng nhập</label>
            <input name="user_name" type="text" class="form-control" value="">
        </div>
        <div class="col-12">
            <label for="validationCustom02" class="form-label">Mật khẩu</label>
            <input name="password" type="password" class="form-control" value="">
        </div>
        <div class="col-12">
            <label for="validationCustom02" class="form-label">Họ và tên</label>
            <input name="full_name" type="text" class="form-control" value="">
        </div>
        <div class="col-12">
            <label for="validationCustom02" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" value="">
        </div>
        <div class="col-12">
            <label for="validationCustom04" class="form-label">Phân quyền</label>
            <select style="text-transform: capitalize;" name="role_id" class="form-select">
                <option selected disabled value="">chọn phân quyền</option>
                <?php if ($list_role) {
                    while ($result = $list_role->fetch_assoc()) {
                ?>
                        <option style="text-transform: capitalize;" value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>
                <?php }
                } ?>
            </select>
        </div>
        <div class="col-12 mt-4">
            <button class="btn btn-primary" name="submit">Tạo tài khoản</button>
            <a href="user-list.php" class="btn btn-warning">Thoát</a>
        </div>
    </div>

    <script src="js/users.min.js" >
        
    </script>

    <?php include 'inc/footer.php'; ?>

<?php } else { ?>
    <div style="display: flex; align-items: center; justify-content: center; font-size: 30px; text-transform: uppercase; font-weight: 600; height: 90vh; color: red; ">Trang này không tồn tại</div>
<?php } ?>