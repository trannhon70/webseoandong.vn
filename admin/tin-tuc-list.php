<?php
ob_start();
include 'inc/header.php';
include '../classes/tin_tuc.php';
if (Session::get('role') === '1' || Session::get('role') === '2') {

$tin_tuc = new news();
?>

<?php
$message = null;
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $message = $tin_tuc->delete_tituc($id);
    if ($message['status'] == 'success') {
        $_SESSION['message'] = $message;
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}
?>

<?php
$tieuDe = '';
$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$tieuDe = isset($_GET['tieu-de']) ? $_GET['tieu-de'] : '';

$list_tintuc = $tin_tuc->getPaginationTinTuc($limit, $offset, $tieuDe);
$total_articles = $tin_tuc->getTotalCountTinTuc($tieuDe);
$total_pages = ceil($total_articles / $limit);
?>

<style>
    .action .action_edit {
        text-decoration: none;
        color: orange;
    }

    .action .action_delete {
        text-decoration: none;
        color: red;
    }

    .action .action_view {
        text-decoration: none;
        color: #01969a;
    }
</style>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Tin tức</a></li>
        <li class="breadcrumb-item active" aria-current="page">Danh sách tin tức</li>
    </ol>
</nav>
<form action="" method="get">
    <div class="row">

        <div class="col-sm-2">
            <div class="input-group mb-3">

                <input value="<?php echo $tieuDe; ?>" name="tieu-de" type="text" class="form-control" placeholder="Nhập tiêu đề">
            </div>
        </div>
        <div class="col-sm-3">
            <button type="submit" class="btn btn-success">Tìm kiếm</button>
            <button style="margin-left: 10px;" class="btn btn-warning ">
                <a style="text-decoration: none; color: white;  " href="<?php echo $local ?>/admin/tin-tuc-list.php">Clear</a>
            </button>

        </div>
    </div>
</form>

<div style="padding: 10px;">
    <table style="background-color: #a9c2c3; border-collapse: inherit; border-radius: 10px; " class="table table-striped table-hover">
        <thead>
            <tr>
                <th style="border-top-left-radius: 8px; " scope="col">ID</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Người viết</th>
                <th scope="col">keyword</th>
                <th scope="col">Ngày tạo</th>
                <th style="border-top-right-radius: 8px; " scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody style="border-bottom-right-radius: 8px; ">
            <?php if ($list_tintuc) {
                while ($result = $list_tintuc->fetch_assoc()) {
            ?>
                    <tr>
                        <th scope="row"><?php echo $result['id']; ?></th>
                        <td><?php echo $result['tieu_de']; ?></td>
                        <td><?php echo $result['full_name']; ?></td>
                        <td><?php echo $result['keyword']; ?></td>
                        <td><?php echo $result['created_at']; ?></td>
                        <td class="action" style="display: flex; gap: 25px; align-items: center; justify-content: center; height: 100%; ">
                            <a class="action_edit" href="tin-tuc-edit.php?edit=<?php echo $result['id'] ?>"><i style="font-size: 25px;" class="lni lni-pencil"></i></a>
                            <a onclick="return confirm('Bạn có chắc là bạn muốn xóa tin tức <?php echo $result['tieu_de']; ?>')" class="action_delete" href="?delete=<?php echo $result['id'] ?>"><i style="font-size: 25px;" class="lni lni-trash-can"></i></a>
                            <a class="action_view" href="<?php echo $local ?>/<?php echo $result['slug']; ?>.html"><i style="font-size: 25px;" class="lni lni-eye"></i></a>
                        </td>
                    </tr>
            <?php }
            } ?>
        </tbody>
    </table>
    <div style="display: flex; align-items: flex-end; justify-content: flex-end; ">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php if ($total_pages > 1) : ?>
                    <?php if ($page > 1) : ?>
                        <li class="page-item"><a class="page-link" href="?tieu-de=<?php echo $tieuDe ?>&page=<?php echo $page - 1; ?>">Previous</a></li>
                    <?php endif; ?>

                    <?php if ($page > 2) : ?>
                        <li class="page-item"><a class="page-link" href="?tieu-de=<?php echo $tieuDe ?>&page=1">1</a></li>
                    <?php endif; ?>

                    <?php if ($page > 3) : ?>
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                    <?php endif; ?>

                    <?php for ($i = max(1, $page - 1); $i <= min($page + 1, $total_pages); $i++) : ?>
                        <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>"><a class="page-link" href="?tieu-de=<?php echo $tieuDe ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php endfor; ?>

                    <?php if ($page < $total_pages - 2) : ?>
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                    <?php endif; ?>

                    <?php if ($page < $total_pages - 1) : ?>
                        <li class="page-item"><a class="page-link" href="?tieu-de=<?php echo $tieuDe ?>&page=<?php echo $total_pages; ?>"><?php echo $total_pages; ?></a></li>
                    <?php endif; ?>

                    <?php if ($page < $total_pages) : ?>
                        <li class="page-item"><a class="page-link" href="?tieu-de=<?php echo $tieuDe ?>&page=<?php echo $page + 1; ?>">Next</a></li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>

        </nav>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        <?php if ($message) : ?>
            toastr.<?php echo $message['status']; ?>('<?php echo $message['message']; ?>');
        <?php endif; ?>
    });

    function redirectToSelf() {
        location.href = "<?php echo $_SERVER['PHP_SELF']; ?>";
    }
</script>

<?php include 'inc/footer.php'; ?>

<?php } else { ?>
    <div style="display: flex; align-items: center; justify-content: center; font-size: 30px; text-transform: uppercase; font-weight: 600; height: 90vh; color: red; ">Trang này không tồn tại</div>
<?php } ?>