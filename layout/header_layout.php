<header class="header">
    <div class="header__top">
        <a href="<?php echo $local ?>">
            Hỏi bác sĩ miễn phí từ xa
        </a>
    </div>
    <div class="header__bottom">
        <div class="header__bottom-container">
            <ul class="header__bottom-container-ul">
                <li style="border-right: 2px solid white;" class="header__bottom-container-ul-li">
                    <a href="<?php echo $local ?>">
                        <img width="35px" height="35px" loading="lazy" src="<?php echo $local ?>/images/icons/icon_home.webp" alt="...">
                    </a>
                </li>
                <li class="header__bottom-container-ul-li">
                    <a href="<?php echo $local ?>">
                        danh mục bệnh <img style="transform: translate(0px , -5px);" width="20px" height="25px" loading="lazy" src="<?php echo $local ?>/images/icons/icon_down.webp" alt="...">
                    </a>
                </li>
                <li class="header__bottom-container-ul-li">
                    <a href="<?php echo $local ?>">
                        giới thiệu chung
                    </a>
                </li>
                <li class="header__bottom-container-ul-li">
                    <a href="<?php echo $local ?>">
                        đội ngũ y bác sĩ
                    </a>
                </li>
                <li class="header__bottom-container-ul-li">
                    <a href="<?php echo $local ?>">
                        cơ sở vật chất
                    </a>
                </li>
                <li style="border-left: 2px solid white;" class="header__bottom-container-ul-li">
                    <a href="<?php echo $local ?>">
                        <img width="35px" height="35px" loading="lazy" src="<?php echo $local ?>/images/icons/icon_chat.webp" alt="...">
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="header__carousel">
        <div class="owl-carousel owl-theme">
            <div class="item">
               <img width="100%" height="100%" loading="lazy" src="<?php echo $local ?>/images/banner/banner_1.webp" alt="...">
            </div>
            <div class="item">
               <img width="100%" height="100%" loading="lazy" src="<?php echo $local ?>/images/banner/banner_2.webp" alt="...">
            </div>
            <div class="item">
               <img width="100%" height="100%" loading="lazy" src="<?php echo $local ?>/images/banner/banner_3.webp" alt="...">
            </div>
        </div>
    </div>
</header>
<div id="toast-container"></div>

<script>
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
            items: 1, // Số item hiển thị
            margin: 10,
            loop: true, // Vòng lặp vô hạn
            nav: false, // Hiển thị nút điều hướng
            autoplay: true, // Bật tự động chạy
            autoplayTimeout: 3000, // 3 giây chuyển slide
            autoplayHoverPause: true // Dừng khi di chuột vào
        });
    });
</script>