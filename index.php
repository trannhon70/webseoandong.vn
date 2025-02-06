<?php include_once "inc/header.php" ?>
<meta name="description"
    content="">
<title>vnbacsionline.com</title>
<link rel="stylesheet" href="css/trang-chu.min.css">
</head>
<?php
$limit = 5;

$limitSuckhoe = isset($_GET['suckhoe']) ? $_GET['suckhoe'] : 5;
$limitdinhDuong = isset($_GET['dinhduong']) ? $_GET['dinhduong'] : 5;
$postNew = $bai_viet->getDSBaiVietNew($limit);
$postView = $bai_viet->getDSBaiVietView($limit);

$postSuckhoe = $bai_viet->getDSBaiVietByIdBenh(27, $limitSuckhoe);
$postdinhDuong = $bai_viet->getDSBaiVietByIdBenh(28, $limitdinhDuong);
?>

<body>

    <main>
        <?php include_once "./layout/header_layout.php" ?>
        <section class="post">
            <ul class="post__ul">
                <li class="post__ul-li post__ul-li-active" data-tab="new">
                    <img loading="lazy" width="20px" height="20px" src="<?php echo $local ?>/images/icons/icon_new.webp" alt="..."> Bài viết mới nhất
                </li>
                <li class="post__ul-li" data-tab="popular">
                    <img loading="lazy" width="20px" height="20px" src="<?php echo $local ?>/images/icons/icon_docnhieu.webp" alt="..."> Đọc nhiều
                </li>
            </ul>
            <div id="new" class="tab-content tab-content-active">
                <?php if (!empty($postNew)) { ?>
                    <div class="content__list">
                        <a
                            href="<?php echo $local ?>/<?php echo $postNew[0]['slug'] ?>.html"
                            class="content__list-left"
                            onclick="handleClick(event,'<?php echo $postNew[0]['slug']; ?>')">
                            <div class="content__list-left-img">
                                <img loading="lazy" width="100%" height="300px" src="<?php echo $local ?>/admin/uploads/<?php echo $postNew[0]['img'] ?>" alt="...">
                            </div>
                            <div class="content__list-left-title">
                                <?php echo $postNew[0]['title'] ?>
                            </div>
                            <div class="content__list-left-text">
                                <?php echo $postNew[0]['descriptions'] ?>
                            </div>
                        </a>
                        <div class="content__list-right">
                            <?php if (!empty($postNew) && count($postNew) > 1) {
                                foreach (array_slice($postNew, 1) as $post) {
                            ?>
                                    <a href="<?php echo $local ?>/<?php echo $post['slug'] ?>.html" class="content__list-right-card" onclick="handleClick(event,'<?php echo $post['slug']; ?>')">
                                        <div class="content__list-right-card-left">
                                            <div class="content__list-left-title">
                                                <?php echo $post['title'] ?>
                                            </div>
                                            <div class="content__list-left-text">
                                                <?php echo $post['descriptions'] ?>
                                            </div>
                                        </div>
                                        <div class="content__list-right-card-right">
                                            <img loading="lazy" width="100%" height="auto" src="<?php echo $local ?>/admin/uploads/<?php echo $post['img'] ?>" alt="...">
                                        </div>
                                    </a>
                            <?php }
                            } ?>
                        </div>
                    </div>
                <?php } else { ?>
                    <div style="display: flex; align-items: center; justify-content: center; height: 300px; ">Chưa có bài viết nào</div>
                <?php } ?>
            </div>

            <div id="popular" class="tab-content">
                <?php if (!empty($postView)) { ?>
                    <div class="content__list">
                        <a
                            href="<?php echo $local ?>/<?php echo $postView[0]['slug'] ?>.html"
                            class="content__list-left"
                            onclick="handleClick(event,'<?php echo $postView[0]['slug']; ?>')">
                            <div class="content__list-left-img">
                                <img loading="lazy" width="100%" height="300px" src="<?php echo $local ?>/admin/uploads/<?php echo $postView[0]['img'] ?>" alt="...">
                            </div>
                            <div class="content__list-left-title">
                                <?php echo $postView[0]['title'] ?>
                            </div>
                            <div class="content__list-left-text">
                                <?php echo $postView[0]['descriptions'] ?>
                            </div>
                        </a>
                        <div class="content__list-right">
                            <?php if (!empty($postView) && count($postView) > 1) {
                                foreach (array_slice($postView, 1) as $view) {
                            ?>
                                    <a href="<?php echo $local ?>/<?php echo $view['slug'] ?>.html" class="content__list-right-card" onclick="handleClick(event,'<?php echo $view['slug']; ?>')">
                                        <div class="content__list-right-card-left">
                                            <div class="content__list-left-title">
                                                <?php echo $view['title'] ?>
                                            </div>
                                            <div class="content__list-left-text">
                                                <?php echo $view['descriptions'] ?>
                                            </div>
                                        </div>
                                        <div class="content__list-right-card-right">
                                            <img loading="lazy" width="100%" height="auto" src="<?php echo $local ?>/admin/uploads/<?php echo $view['img'] ?>" alt="...">
                                        </div>
                                    </a>
                            <?php }
                            } ?>
                        </div>
                    </div>
                <?php } else { ?>
                    <div style="display: flex; align-items: center; justify-content: center; height: 300px; ">Chưa có bài viết nào</div>
                <?php } ?>
            </div>
            </div>
        </section>
        <section class="health">
            <div class="health__container">
                <div class="health__container-title">Chuyên đề sức khỏe</div>
                <div class="carousel-container">
                    <div class="carousel-track">
                        <div class="carousel-item">
                            <img width="100%" height="auto" loading="lazy" src="images/card/namgioi.webp" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img width="100%" height="auto" loading="lazy" src="images/card/nugioi.webp" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img width="100%" height="auto" loading="lazy" src="images/card/congdong.webp" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img width="100%" height="auto" loading="lazy" src="images/card/dalieu.webp" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img width="100%" height="auto" loading="lazy" src="images/card/namgioi.webp" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img width="100%" height="auto" loading="lazy" src="images/card/nugioi.webp" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img width="100%" height="auto" loading="lazy" src="images/card/congdong.webp" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img width="100%" height="auto" loading="lazy" src="images/card/dalieu.webp" alt="...">
                        </div>
                    </div>

                </div>
                <hr>
                <div class="health__container-bottom">
                    <button class="health__container-bottom-left">
                        Xem tất cả chuyên đề
                        <img width="13px" height="13px" loading="lazy" src="<?php echo $local ?>/images/icons/icon_next.webp" alt="...">
                    </button>
                    <div>
                        <button class="carousel-btn carousel-prev">←</button>
                        <button class="carousel-btn carousel-next">→</button>
                    </div>
                </div>
            </div>
        </section>
        <section class="banner__ngang">
            <img width="100%" height="auto" src="<?php echo $local ?>/images/banner/banner_4.webp" alt="...">
        </section>

        <section class="health">
            <div class="health__container">
                <div class="health__container-title">Đội ngũ chuyên gia của chúng tôi</div>
                <div class="carousel-container">
                    <div class=" carousel-track-2">
                        <div class="carousel-item1">
                            <img width="100%" height="auto" loading="lazy" src="images/card/namgioi.webp" alt="...">
                        </div>
                        <div class="carousel-item1">
                            <img width="100%" height="auto" loading="lazy" src="images/card/nugioi.webp" alt="...">
                        </div>
                        <div class="carousel-item1">
                            <img width="100%" height="auto" loading="lazy" src="images/card/congdong.webp" alt="...">
                        </div>
                        <div class="carousel-item1">
                            <img width="100%" height="auto" loading="lazy" src="images/card/dalieu.webp" alt="...">
                        </div>
                        <div class="carousel-item1">
                            <img width="100%" height="auto" loading="lazy" src="images/card/namgioi.webp" alt="...">
                        </div>
                        <div class="carousel-item1">
                            <img width="100%" height="auto" loading="lazy" src="images/card/nugioi.webp" alt="...">
                        </div>
                        <div class="carousel-item1">
                            <img width="100%" height="auto" loading="lazy" src="images/card/congdong.webp" alt="...">
                        </div>
                        <div class="carousel-item1">
                            <img width="100%" height="auto" loading="lazy" src="images/card/dalieu.webp" alt="...">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="health__container-bottom">
                    <button class="health__container-bottom-left">
                        Đặt lịch tư vấn
                        <img style="margin-left: 5px;" width="30px" height="30px" loading="lazy" src="images/icons/icon_heat.webp" alt="...">
                    </button>
                    <div>
                        <button class="carousel-btn  carousel-prev-2">←</button>
                        <button class="carousel-btn  carousel-next-2">→</button>
                    </div>
                </div>
            </div>
        </section>
        <section class="post" id="targetSection">
            <div class="post__list">
                <div class="post__list-item">
                    <div class="post__list-item-title">sức khỏe nam giới</div>
                    <?php if (!empty($postSuckhoe)) {
                        foreach ($postSuckhoe as $post) {
                    ?>
                            <a href="<?php echo $local ?>/<?php echo $post['slug'] ?>" class="post__list-item-card" onclick="handleClick(event,'<?php echo $post['slug']; ?>')">
                                <div class="post__list-item-card-left">
                                    <h5><?php echo $post['title'] ?></h5>
                                    <span><?php echo $post['descriptions'] ?></span>
                                </div>
                                <div class="post__list-item-card-right">
                                    <img width="100%" height="auto" loading="lazy" src="<?php echo $local ?>/admin/uploads/<?php echo $post['img'] ?>" alt="...">
                                </div>
                            </a>
                        <?php }
                    } else { ?>
                        <div style="display: flex; align-items: center; justify-content: center; height: 300px; ">Chưa có bài viết nào</div>
                    <?php } ?>
                    <a href="<?php echo $local ?>?suckhoe=<?php echo $limitSuckhoe + 5 ?>&dinhduong=<?php echo $limitdinhDuong?>#targetSection" class="button" >Xem thêm >></a>
                </div>
                <div class="post__list-item">
                    <div class="post__list-item-title">Dinh dưỡng cho mọi nhà</div>
                    <?php if (!empty($postdinhDuong)) {
                        foreach ($postdinhDuong as $post) {
                    ?>
                            <a href="<?php echo $local ?>/<?php echo $post['slug'] ?>" class="post__list-item-card" onclick="handleClick(event,'<?php echo $post['slug']; ?>')">
                                <div class="post__list-item-card-left">
                                    <h5><?php echo $post['title'] ?></h5>
                                    <span><?php echo $post['descriptions'] ?></span>
                                </div>
                                <div class="post__list-item-card-right">
                                    <img width="100%" height="auto" loading="lazy" src="<?php echo $local ?>/admin/uploads/<?php echo $post['img'] ?>" alt="...">
                                </div>
                            </a>
                        <?php }
                    } else { ?>
                        <div style="display: flex; align-items: center; justify-content: center; height: 300px; ">Chưa có bài viết nào</div>
                    <?php } ?>
                    <a href="<?php echo $local ?>?suckhoe=<?php echo $limitSuckhoe?>&dinhduong=<?php echo $limitdinhDuong  + 5 ?>#targetSection" class="button" >Xem thêm >></a>
                </div>
            </div>
        </section>

    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tabs = document.querySelectorAll(".post__ul-li");
            const contents = document.querySelectorAll(".tab-content");

            tabs.forEach(tab => {
                tab.addEventListener("click", function() {
                    // Xóa class active khỏi tất cả tabs
                    tabs.forEach(t => t.classList.remove("post__ul-li-active"));
                    contents.forEach(c => c.classList.remove("tab-content-active"));

                    // Thêm class active vào tab được click
                    this.classList.add("post__ul-li-active");

                    // Hiển thị nội dung tab tương ứng
                    const tabId = this.getAttribute("data-tab");
                    document.getElementById(tabId).classList.add("tab-content-active"); // Sửa lỗi ở đây
                });
            });
        });
    </script>
    <script defer src="<?php echo $local ?>/js/carousel.min.js"></script>
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