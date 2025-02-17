<?php
$getAllChiTietKhoaAndBenh = $khoas->getAllChiTietKhoaAndBenh();
?>
<header id="header" class="header">
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
                        <img width="35px" height="35px" loading="lazy"
                            src="<?php echo $local ?>/images/icons/icon_home.webp" alt="...">
                    </a>
                </li>
                <li class="header__bottom-container-ul-li header__bottom-container-menu">
                    <a href="<?php echo $local ?>">
                        danh mục <img style="transform: translate(0px , -5px);" width="20px" height="25px"
                            loading="lazy" src="<?php echo $local ?>/images/icons/icon_down.webp" alt="...">
                    </a>
                    <div class="header__menu">
                        <div></div>
                        <nav>
                            <?php foreach ($getAllChiTietKhoaAndBenh as $value) : ?>
                            <ul>
                                <li>
                                    <span><?php echo $value['name']; ?></span>
                                </li>
                                <?php foreach ($value['danhSachBenh'] as $benh) : ?>
                                <li class="header__menu-li">
                                    <a
                                        href="<?php echo $local ?>/danh-sach-bai-viet.php?danhmuc=<?php echo $value['slug'] ?>&chuyende=<?php echo $benh['slug'] ?>&page=1"><?php echo $benh['name']; ?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endforeach; ?>
                        </nav>
                    </div>
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
                        <img width="35px" height="35px" loading="lazy"
                            src="<?php echo $local ?>/images/icons/icon_chat.webp" alt="...">
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="header__carousel">
        <amp-carousel width="300" height="100" layout="responsive" type="slides" autoplay delay="3000" >
            <amp-img src="<?php echo $local ?>/images/banner/banner_1.webp" width="100%" height="auto"
                layout="responsive"></amp-img>
            <amp-img src="<?php echo $local ?>/images/banner/banner_2.webp" width="100%" height="auto"
                layout="responsive"></amp-img>
            <amp-img src="<?php echo $local ?>/images/banner/banner_3.webp" width="100%" height="auto"
                layout="responsive"></amp-img>
        </amp-carousel>
    </div>
</header>

<header id="header__mobile" class="header__mobile">
    <div class="header__mobile-top">
        <a href="<?php echo $local ?>">
            <img width="25px" height="25px" loading="lazy" src="<?php echo $local ?>/images/icons/icon_home.webp"
                alt="...">
        </a>
        <div class="header__mobile-top-center">
            <div class="header__mobile-top-center-title">Hỏi bác sĩ từ xa miễn phí</div>
            <a href="<?php echo $local ?>">
                <img width="35px" height="35px" loading="lazy" src="<?php echo $local ?>/images/icons/icon_chat.webp"
                    alt="...">
            </a>
        </div>
        <div>
            <img onclick="showSidebar()" class="header__mobile-top-left-icon" width="25px" height="25px" loading="lazy"
                src="<?php echo $local ?>/images/icons/icon_menu.webp" alt="...">
            <img onclick="hidenSidebar()" class="header__mobile-top-left-icon-close" width="25px" height="25px"
                loading="lazy" src="<?php echo $local ?>/images/icons/icon_close.webp" alt="...">
        </div>
    </div>
    <img width="100%" height="auto" loading="lazy" src="<?php echo $local ?>/images/banner/banner-mobile.webp"
        alt="...">
    <nav>
        <ul class="sidebar_mobile">
            <li>
                <a href="<?php echo $local ?>/trang-chu.html">Trang chủ</a>
            </li>
            <li class="sidebar_mobile_li">
                <div>
                    <span>danh mục</span>
                    <!-- <img src="<?php echo $local ?>/images/icons/icon_down.png" alt=""> -->
                </div>
                <ul class="sidebar_mobile_li-option">
                    <?php foreach ($getMenuMobile as $value) : ?>
                    <li class="sidebar_mobile_li-option-li">
                        <div data-option="<?php echo $value['id'] ?>" class="sidebar_mobile_li-option-li-div">
                            <span><?php echo $value['name'] ?></span>
                            <img src="<?php echo $local ?>/images/icons/add.webp" alt="">
                        </div>
                        <ul>
                            <?php foreach ($value['dsBenh'] as $item) : ?>
                            <li>
                                <a
                                    href="<?php echo $local ?>/danh-sach-bai-viet.php?danhmuc=<?php echo $value['slug'] ?>&chuyende=<?php echo $item['slug'] ?>&page=1"><?php echo $item['name']; ?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <li>
                <a href="<?php echo $local ?>/tin-tuc-y-khoa.html">giới thiệu chung</a>
            </li>
            <li>
                <a href="<?php echo $local ?>/tin-tuc-y-khoa.html">đội ngũ y bác sĩ</a>
            </li>
            <li>
                <a href="<?php echo $local ?>/tin-tuc-y-khoa.html">cơ sở vật chất</a>
            </li>
        </ul>
    </nav>
</header>
<div id="toast-container"></div>
<script>
function showSidebar() {
    const sidebar = document.querySelector('.sidebar_mobile');
    const icons_menu = document.querySelector('.header__mobile-top-left-icon');
    const icons_sclose = document.querySelector('.header__mobile-top-left-icon-close');
    sidebar.classList.add('active_mobile');
    sidebar.classList.remove('inactive_mobile');
    icons_menu.style.display = "none";
    icons_sclose.style.display = "block"
}

function hidenSidebar() {
    const sidebar = document.querySelector('.sidebar_mobile');
    const icons_menu = document.querySelector('.header__mobile-top-left-icon');
    const icons_sclose = document.querySelector('.header__mobile-top-left-icon-close');
    sidebar.classList.add('inactive_mobile');
    setTimeout(() => {
        sidebar.classList.remove('active_mobile');
    }, 500);
    icons_menu.style.display = "block";
    icons_sclose.style.display = "none"
}

function showOption(optionId) {
    const allOptions = document.querySelectorAll('.sidebar_mobile_li-option-li ul');
    const allItems = document.querySelectorAll('.sidebar_mobile_li-option-li');

    allOptions.forEach(option => {
        option.classList.remove('option__show');
        option.classList.add('option__hidden');
    });

    allItems.forEach(item => {
        item.style.borderBottom = ""; // Reset border
    });

    const optionToShow = document.querySelector(`.sidebar_mobile_li-option-li div[data-option="${optionId}"]`);
    const menuToShow = optionToShow ? optionToShow.nextElementSibling : null;
    const parentItem = optionToShow ? optionToShow.parentElement : null;

    if (menuToShow) {
        menuToShow.classList.remove('option__hidden');
        menuToShow.classList.add('option__show');
    }

    if (parentItem) {
        parentItem.style.borderBottom = "0px";
    }
}

document.addEventListener('DOMContentLoaded', () => {
    showOption(1);

    document.querySelectorAll('.sidebar_mobile_li-option-li-div').forEach(div => {
        div.addEventListener('click', () => {
            const optionId = div.getAttribute('data-option');
            showOption(optionId);
        });
    });
});
</script>
