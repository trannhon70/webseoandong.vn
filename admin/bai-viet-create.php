<?php
include 'inc/header.php';
include '../classes/bai_viet.php';
if (Session::get('role') === '1' || Session::get('role') === '2') {
    $bai_viet = new post();
?>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $message = null;
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $message = $bai_viet->insert_post($_POST, $_FILES);
        if ($message['status'] == 'success') {
            $_SESSION['message'] = $message;
        }
    }

    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        unset($_SESSION['message']);
    }
    ?>
    <style>
        .list-img.activeImg {
            border: 4px solid red;
            transform: scale(1.1);
        }
        .list-img {
            cursor: pointer;
            transition: transform 0.3s;
            border: 1px solid black;
            width: 125px;
            height: 125px;
        }
    </style>
    <form action="bai-viet-create.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Bài viết</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tạo bài viết</li>
                </ol>
            </nav>
            <div class="row">
                <div class="mb-3 col-sm-6">
                    <label for="titleInput" class="form-label">Tiêu đề bài viết</label>
                    <input name="tieu_de" type="text" id="titleInput" class="form-control" placeholder="Nhập tiêu đề bài viết">
                </div>
                <div class="mb-3 col-sm-6">
                    <label for="slugInput" class="form-label">slug</label>
                    <input type="hidden" name="slug" id="slugHiddenInput">
                    <input disabled type="text" id="slugInput" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-sm-6">
                    <label for="idKhoa" class="form-label">Chọn khoa:</label>
                    <select id="idKhoa" class="form-select" name="id_khoa">
                    </select>
                </div>
                <div class="mb-3 col-sm-6">
                    <label for="id_benh" class="form-label">Chọn bệnh:</label>
                    <select id="id_benh" class="form-select" name="id_benh">
                        
                    </select>

                </div>
            </div>
            <div style="height: 350px;" class="row">
                <div class="mb-3 col-sm-6">
                    <label for="image" class="form-label">Hình ảnh:</label>
                    <input accept="image/*" type="file" id="image" name="image" class="form-control" placeholder="">
                    <input type="hidden" id="selectedImageInput" name="selectedImage">
                    <div id="selectedImageContainer" style="margin-top: 10px; height: 200px; width: 200px;  ">
                        <!-- Nút xóa sẽ được thêm vào đây -->
                    </div>
                </div>
                <div class="mb-3 col-sm-6">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Xem hình ảnh
                    </button>

                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-sm-12">
                    <label for="disabledSelect" class="form-label">Nội dung bài viết:</label>
                    <textarea id="content" name="content" class="tinymce"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-sm-12">
                    <label for="title" class="form-label">Title: </label>
                    <input name="title" type="text" id="title" class="form-control" placeholder="Nhập title">
                </div>
                <div class="mb-3 col-sm-12">
                    <label for="keyword" class="form-label">keyword :</label>
                    <input name="keyword" type="text" id="keyword" class="form-control" placeholder="Nhập keyword">
                </div>
                <div class="mb-3 col-sm-12">
                    <label for="description" class="form-label">Description :</label>
                    <input name="description" type="text" id="description" class="form-control" placeholder="Nhập description">

                </div>
            </div>

            <button name="submit" type="submit" class="btn btn-primary">Tạo bài viết</button>
        </fieldset>
    </form>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hình ảnh</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="image" class="form-label">Chọn hình ảnh:</label>
                    <div style="height: 400px; display: flex; gap:10px; flex-wrap: wrap; overflow: auto; padding :10px;">
                        <?php foreach ($images as $image) : ?>
                            <img class="list-img" src="<?php echo htmlspecialchars($image); ?>" alt="Image" onclick="selectImage(this)">
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" onclick="saveSelectedImage()" data-bs-dismiss="modal">Lưu</button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/baiviet.min.js">
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php if ($message) : ?>
                toastr.<?php echo $message['status']; ?>('<?php echo $message['message']; ?>');
            <?php endif; ?>
        });
    </script>

    ﻿<?php include 'inc/footer.php'; ?>

<?php } else { ?>
    <div style="display: flex; align-items: center; justify-content: center; font-size: 30px; text-transform: uppercase; font-weight: 600; height: 90vh; color: red; ">Trang này không tồn tại</div>
<?php } ?>