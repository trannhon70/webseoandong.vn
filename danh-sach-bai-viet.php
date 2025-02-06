<?php include_once "inc/header.php" ?>
<meta name="description"
    content="">
<title>vnbacsionline.com</title>
<link rel="stylesheet" href="css/danh-sach-bai-viet.min.css">
</head>
<?php
$current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
$current_url .= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$parsed_url = parse_url($current_url);
parse_str($parsed_url['query'], $query_params);

$khoa_slug = isset($query_params['danhmuc']) ? $query_params['danhmuc'] : null;
$benh_slug = isset($query_params['chuyende']) ? $query_params['chuyende'] : null;
$page = isset($query_params['page']) ? $query_params['page'] : 1;

$getDanhMucBenhByKhoa = $khoas->getDanhMucBenhByKhoa($khoa_slug);
$getTTBenhAndKhoa = $khoas->getTTBenhAndKhoa($khoa_slug, $benh_slug);

//danh sách bài viết theo slug bệnh
$limit = 5;
$offset = ($page - 1) * $limit;
$list_BV_pagination = $bai_viet->getPagingBaiVietTheoBenh($benh_slug, $limit, $offset);
$total_articles = $bai_viet->getTotalCountById($benh_slug);
$total_pages = ceil($total_articles / $limit);
// var_dump($list_BV_pagination);
?>

<body>

    <main>
        <?php include_once "./layout/header_layout.php" ?>

        <section class="list">
            <div class="list__container">
                <div class="list__container-left">
                    <?php foreach ($getDanhMucBenhByKhoa as $value): ?>
                        <div class="list__container-left-title">
                            <?php echo $value['name'] ?>
                        </div>
                        <ul>
                            <?php foreach ($value['danhSachBenh'] as $benh): ?>
                                <li class="<?php echo ($benh_slug === $benh['slug']) ? 'danhmuc__left-li-active' : ''; ?>">
                                    <a href="<?php echo $local ?>/danh-sach-bai-viet.php?danhmuc=<?php echo $value['slug'] ?>&chuyende=<?php echo $benh['slug'] ?>&page=1"><?php echo $benh['name']; ?></a>
                                </li>

                            <?php endforeach; ?>
                        </ul>
                    <?php endforeach; ?>
                </div>
                <div class="list__container-right">
                    <?php foreach ($list_BV_pagination as $value): ?>
                        <div class="list__container-right-title"><?php echo $value['name'] ?> </div>
                        <div class="list__container-right-list">
                            <?php foreach ($value['danhSachBaiViet'] as $item): ?>
                                <a onclick="handleClick(event,'<?php echo $item['slug']; ?>')" class="list__container-right-list-card" href="<?php echo $local ?>/<?php echo $item['slug'] ?>.html">
                                    <div class="list__container-right-list-card-left">
                                        <h5><?php echo $item['tieu_de'] ?></h5>
                                        <span> <?php echo $item['descriptions'] ?></span>
                                    </div>
                                    <div class="list__container-right-list-card-right">
                                        <img width="100%" height="auto" src="<?php echo $local ?>/admin/uploads/<?php echo $item['img'] ?>" alt="...">
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>

                    <?php endforeach; ?>
                    <div class="danhmuc__right-paging">
                        <!-- Link trang trước -->
                        <?php if ($page > 1): ?>
                            <a class="danhmuc__right-paging-prev" href="<?php echo $local . '/danh-sach-bai-viet.php' . '?danhmuc=' . $khoa_slug . '&chuyende=' . $benh_slug . '&page=' . ($page - 1); ?>">
                                <svg width="30" height="30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                    <path fill="white" d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"></path>
                                </svg>
                            </a>
                        <?php endif; ?>

                        <!-- Hiển thị số trang -->
                        <?php
                        $start_page = max(1, $page - 2);
                        $end_page = min($total_pages, $page + 2);

                        if ($start_page > 1) {
                            echo '<a class="danhmuc__right-paging-number" href="' . $local . '/danh-sach-bai-viet.php' . '?danhmuc=' . $khoa_slug . '&chuyende=' . $benh_slug . '&page=1">1</a>';
                            if ($start_page > 2) {
                                echo '<span class="danhmuc__right-paging-number">...</span>';
                            }
                        }

                        for ($i = $start_page; $i <= $end_page; $i++) {
                            $active_class = ($i == $page) ? 'danhmuc__right-paging-number-active' : '';
                            echo '<a class="danhmuc__right-paging-number ' . $active_class . '" href="' . $local . '/danh-sach-bai-viet.php' . '?danhmuc=' . $khoa_slug . '&chuyende=' . $benh_slug . '&page=' . $i . '">' . $i . '</a>';
                        }

                        if ($end_page < $total_pages) {
                            if ($end_page < $total_pages - 1) {
                                echo '<span class="danhmuc__right-paging-number">...</span>';
                            }
                            echo '<a class="danhmuc__right-paging-number" href="' . $local . '/danh-sach-bai-viet.php' . '?danhmuc=' . $khoa_slug . '&chuyende=' . $benh_slug . '&page=' . $total_pages . '">' . $total_pages . '</a>';
                        }
                        ?>

                        <!-- Link trang sau -->
                        <?php if ($page < $total_pages): ?>
                            <a class="danhmuc__right-paging-prev" href="<?php echo $local . '/danh-sach-bai-viet.php' . '?danhmuc=' . $khoa_slug . '&chuyende=' . $benh_slug . '&page=' . ($page + 1); ?>">
                                <svg width="30" height="30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                    <path fill="white" d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"></path>
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </section>
        <script defer >
        function handleClick(event, slug) {
            event.preventDefault();
            // console.log("Slug của bài viết:", slug);
            let formData = {
                slug: slug,
            };
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "<?php echo $local ?>/api/bai-viet/update-view.php", true);
            xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    let response = JSON.parse(xhr.responseText);

                }
            };
            xhr.send(JSON.stringify(formData));
            // Ví dụ: Xử lý thêm trước khi chuyển trang
            setTimeout(() => {
                window.location.href = `<?php echo $local ?>/` + slug + ".html";
            }, 500);
        }
    </script>
        <?php include_once "./inc/footer.php" ?>