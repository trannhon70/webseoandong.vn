<?php include_once "inc/header.php" ?>
<meta name="description"
    content="Phòng khám đa khoa chuyên điều trị bệnh nam khoa, bệnh xã hội, da liễu, hậu môn - trực tràng uy tính tại thành phố Hồ Chí Minh">
<title>Phòng khám đa khoa</title>
<link rel="stylesheet" href="css/trang-chu.min.css">
</head>

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
            <!-- Nội dung từng tab -->
            <div id="new" class="tab-content tab-content-active">
                <div class="content__list">
                    <a href="<?php echo $local ?>" class="content__list-left">
                        <div class="content__list-left-img">
                            <img loading="lazy" width="100%" height="300px" src="<?php echo $local ?>/images/card/card.png" alt="...">
                        </div>
                        <div class="content__list-left-title">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur mollitia autem illum eligendi, repellat magnam cupiditate atque? Inventore pariatur, facilis sint aliquam, sunt perferendis, veniam eos facere aspernatur officia repellat.
                        </div>
                        <div class="content__list-left-text">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur mollitia autem illum eligendi, repellat magnam cupiditate atque? Inventore pariatur, facilis sint aliquam, sunt perferendis, veniam eos facere aspernatur officia repellat.
                        </div>
                    </a>
                    <div class="content__list-right">
                        <a href="<?php echo $local ?>" class="content__list-right-card">
                            <div class="content__list-right-card-left">
                                <div class="content__list-left-title">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur mollitia autem illum eligendi, repellat magnam cupiditate atque? Inventore pariatur, facilis sint aliquam, sunt perferendis, veniam eos facere aspernatur officia repellat.
                                </div>
                                <div class="content__list-left-text">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur mollitia autem illum eligendi, repellat magnam cupiditate atque? Inventore pariatur, facilis sint aliquam, sunt perferendis, veniam eos facere aspernatur officia repellat.
                                </div>
                            </div>
                            <div class="content__list-right-card-right">
                                <img loading="lazy" width="100%" height="auto" src="<?php echo $local ?>/images/card/card.png" alt="...">
                            </div>
                        </a>
                        <a href="<?php echo $local ?>" class="content__list-right-card">
                            <div class="content__list-right-card-left">
                                <div class="content__list-left-title">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur mollitia autem illum eligendi, repellat magnam cupiditate atque? Inventore pariatur, facilis sint aliquam, sunt perferendis, veniam eos facere aspernatur officia repellat.
                                </div>
                                <div class="content__list-left-text">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur mollitia autem illum eligendi, repellat magnam cupiditate atque? Inventore pariatur, facilis sint aliquam, sunt perferendis, veniam eos facere aspernatur officia repellat.
                                </div>
                            </div>
                            <div class="content__list-right-card-right">
                                <img loading="lazy" width="100%" height="auto" src="<?php echo $local ?>/images/card/card.png" alt="...">
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div id="popular" class="tab-content">
                <div class="content__list">
                    <a href="<?php echo $local ?>" class="content__list-left">
                        <div class="content__list-left-img">
                            <img loading="lazy" width="100%" height="300px" src="<?php echo $local ?>/images/card/card.png" alt="...">
                        </div>
                        <div class="content__list-left-title">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur mollitia autem illum eligendi, repellat magnam cupiditate atque? Inventore pariatur, facilis sint aliquam, sunt perferendis, veniam eos facere aspernatur officia repellat.
                        </div>
                        <div class="content__list-left-text">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur mollitia autem illum eligendi, repellat magnam cupiditate atque? Inventore pariatur, facilis sint aliquam, sunt perferendis, veniam eos facere aspernatur officia repellat.
                        </div>
                    </a>
                    <div class="content__list-right">
                        <a href="<?php echo $local ?>" class="content__list-right-card">
                            <div class="content__list-right-card-left">
                                <div class="content__list-left-title">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur mollitia autem illum eligendi, repellat magnam cupiditate atque? Inventore pariatur, facilis sint aliquam, sunt perferendis, veniam eos facere aspernatur officia repellat.
                                </div>
                                <div class="content__list-left-text">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur mollitia autem illum eligendi, repellat magnam cupiditate atque? Inventore pariatur, facilis sint aliquam, sunt perferendis, veniam eos facere aspernatur officia repellat.
                                </div>
                            </div>
                            <div class="content__list-right-card-right">
                                <img loading="lazy" width="100%" height="auto" src="<?php echo $local ?>/images/card/card.png" alt="...">
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </section>
        <section class="health">
            <div class="health__container">
                <div class="health__container-title">Chuyên đề sức khỏe</div>
                <div class="carousel-container">
                    <div class="carousel-track">
                        <div class="carousel-item">Item 1</div>
                        <div class="carousel-item">Item 2</div>
                        <div class="carousel-item">Item 3</div>
                        <div class="carousel-item">Item 4</div>
                        <div class="carousel-item">Item 5</div>
                        <div class="carousel-item">Item 6</div>
                        <div class="carousel-item">Item 7</div>
                        <div class="carousel-item">Item 8</div>
                    </div>
                    <button class="carousel-btn carousel-prev">←</button>
                    <button class="carousel-btn carousel-next">→</button>
                </div>
                <!-- <div class="health-carousel ">
                    <div class="item"><img loading="lazy" src="images/card/namgioi.webp" alt="..."></div>
                    <div class="item"><img loading="lazy" src="images/card/nugioi.webp" alt="..."></div>
                    <div class="item"><img loading="lazy" src="images/card/congdong.webp" alt="..."></div>
                    <div class="item"><img loading="lazy" src="images/card/dalieu.webp" alt="..."></div>
                </div> -->
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




    <?php include_once "./inc/footer.php" ?>