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
        <section class="post">
            <div class="post__list">
                <div class="post__list-item">
                    <div class="post__list-item-title">sức khỏe nam giới</div>
                    <a href="<?php echo $local ?>" class="post__list-item-card">
                        <div class="post__list-item-card-left">
                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus officia sed similique recusandae libero incidunt soluta, ipsum animi. Enim totam delectus distinctio doloribus dolorem, soluta incidunt in atque cupiditate provident.</h5>
                            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt amet, atque maiores labore voluptatem excepturi repellat iusto dolorem quis, dolore voluptates sequi fugiat eius corrupti accusantium recusandae unde illo quas!</span>
                        </div>
                        <div class="post__list-item-card-right">
                            <img width="100%" height="auto" loading="lazy" src="images/card/card2.png" alt="...">
                        </div>
                    </a>
                    <a href="<?php echo $local ?>" class="post__list-item-card">
                        <div class="post__list-item-card-left">
                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus officia sed similique recusandae libero incidunt soluta, ipsum animi. Enim totam delectus distinctio doloribus dolorem, soluta incidunt in atque cupiditate provident.</h5>
                            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt amet, atque maiores labore voluptatem excepturi repellat iusto dolorem quis, dolore voluptates sequi fugiat eius corrupti accusantium recusandae unde illo quas!</span>
                        </div>
                        <div class="post__list-item-card-right">
                            <img width="100%" height="auto" loading="lazy" src="images/card/card2.png" alt="...">
                        </div>
                    </a>
                    <button>Xem thêm >></button>
                </div>
                <div class="post__list-item">
                    <div class="post__list-item-title">Dinh dưỡng cho mọi nhà</div>
                    <a href="<?php echo $local ?>" class="post__list-item-card">
                        <div class="post__list-item-card-left">
                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus officia sed similique recusandae libero incidunt soluta, ipsum animi. Enim totam delectus distinctio doloribus dolorem, soluta incidunt in atque cupiditate provident.</h5>
                            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt amet, atque maiores labore voluptatem excepturi repellat iusto dolorem quis, dolore voluptates sequi fugiat eius corrupti accusantium recusandae unde illo quas!</span>
                        </div>
                        <div class="post__list-item-card-right">
                            <img width="100%" height="auto" loading="lazy" src="images/card/card2.png" alt="...">
                        </div>
                    </a>
                    <a href="<?php echo $local ?>" class="post__list-item-card">
                        <div class="post__list-item-card-left">
                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus officia sed similique recusandae libero incidunt soluta, ipsum animi. Enim totam delectus distinctio doloribus dolorem, soluta incidunt in atque cupiditate provident.</h5>
                            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt amet, atque maiores labore voluptatem excepturi repellat iusto dolorem quis, dolore voluptates sequi fugiat eius corrupti accusantium recusandae unde illo quas!</span>
                        </div>
                        <div class="post__list-item-card-right">
                            <img width="100%" height="auto" loading="lazy" src="images/card/card2.png" alt="...">
                        </div>
                    </a>
                    <button>Xem thêm >></button>
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
    <script defer src="<?php echo $local ?>/js/carousel.min.js" ></script>



    <?php include_once "./inc/footer.php" ?>