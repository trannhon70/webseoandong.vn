<footer id="footer" class="footer">
    <div class="footer__container">
        <div class="footer__container-title">đặt lịch tư vấn ngay</div>
        <div class="footer__container-text">Để giải đáp những thắc mắc về sức khỏe</div>
        <div class="footer__container-body">
            <div class="footer__container-body-left">
                <img loading="lazy" width="100%" height="auto" src="<?php echo $local ?>/images/users/chuyenmuc.webp" alt="...">
            </div>
            <div class="footer__container-body-right">
                <img loading="lazy" width="100%" height="auto" src="<?php echo $local ?>/images/users/bacsi.webp" alt="...">
            </div>
        </div>
        <div class="footer__container-bottom">
            <a href="<?php echo $local ?>">
                <img loading="lazy" width="250px" height="auto" src="<?php echo $local ?>/images/icons/icon_dangky.webp" alt="...">
            </a>
            <a href="<?php echo $local ?>">
                <img loading="lazy" width="250px" height="auto" src="<?php echo $local ?>/images/icons/icon_tuvan.webp" alt="...">
            </a>
            <a href="<?php echo $local ?>">
                <img loading="lazy" width="250px" height="auto" src="<?php echo $local ?>/images/icons/icon_chatzalo.webp" alt="...">
            </a>
        </div>
    </div>
    <div class="footer__bg">

    </div>
</footer>

<footer id="footer__mobile" class="footer__mobile">
    <div class="footer__mobile-title">
        Đặt lịch tư vấn ngay
    </div>
    <div class="footer__mobile-body">
        <span>Để giải đáp những thắc mắc về sức khỏe</span>
        <div class="footer__mobile-body-list">
            <div class="footer__mobile-body-list-item">
                <img loading="lazy" width="100%" height="auto" src="<?php echo $local ?>/images/background/camket.webp" alt="...">
            </div>
            <div class="footer__mobile-body-list-item">
                <img loading="lazy" width="100%" height="auto" src="<?php echo $local ?>/images/background/tructuyen.webp" alt="...">
            </div>
        </div>
        <img loading="lazy" width="100%" height="auto" src="<?php echo $local ?>/images/background/group_bacsi.webp" alt="...">
    </div>
    <div class="footer__mobile-bottom">
        <div class="footer__mobile-bottom-list">
            <div class="footer__mobile-bottom-list-item">
                <div style="background-color: #FF7E00;" class="footer__mobile-bottom-list-item-card">
                    <img loading="lazy" width="35px" height="35px" src="<?php echo $local ?>/images/icons/icon_book.webp" alt="...">
                    Đăng kí khám online
                </div>
                <div style="background-color: #FA326A;" class="footer__mobile-bottom-list-item-card">
                    <img loading="lazy" width="35px" height="35px" src="<?php echo $local ?>/images/icons/icon_phone.webp" alt="...">
                    Nhận tư vấn online
                </div>
                <div style="background-color: #3F7AFF;" class="footer__mobile-bottom-list-item-card">
                    <img loading="lazy" width="35px" height="35px" src="<?php echo $local ?>/images/icons/icon_zalo.webp" alt="...">
                    chat zalo cùng bác sĩ
                </div>
            </div>
            <div class="footer__mobile-bottom-list-item">
                <img loading="lazy" width="100%" height="auto" src="<?php echo $local ?>/images/users/user_2.webp" alt="...">
            </div>
        </div>
    </div>
    <div style="background-color: #131A85; height:50px; width: 100%;" ></div>
</footer>

<script defer>
     function updateHeaderScripts() {
         // Xóa các script cũ nếu có
         const existingMobileScripts = document.querySelectorAll('script[id^="mobile-"]');
         const existingDesktopScripts = document.querySelectorAll('script[id^="desktop-"]');
         existingMobileScripts.forEach(script => script.remove());
         existingDesktopScripts.forEach(script => script.remove());

         // Thêm script mới dựa trên kích thước cửa sổ
         if (window.innerWidth < 1000) {
             const mobileScripts = [
                {
                     src: 'js/checkImgMobile.min.js',
                     id: 'mobile-0'
                 },
             ];
             mobileScripts.forEach(({
                 src,
                 id
             }) => {
                 const script = document.createElement('script');
                 script.src = src;
                 script.id = id;
                 script.defer = true;
                 document.body.appendChild(script);
             });
         } else {
             const desktopScripts = [
                 // {
                 //     src: 'js/slider.min.js',
                 //     id: 'desktop-0'
                 // },

             ];
             desktopScripts.forEach(({
                 src,
                 id
             }) => {
                 const script = document.createElement('script');
                 script.src = src;
                 script.id = id;
                 document.body.appendChild(script);
             });
         }
     }

     updateHeaderScripts();

     window.addEventListener('resize', () => {
                console.log('Window resized to:', window.innerWidth);
                updateHeaderScripts();
              
            });
 </script>
</body>

</html>