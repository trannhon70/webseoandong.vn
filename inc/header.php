<?php
session_start();
include 'lib/session.php';
Session::init();

ob_start("ob_gzhandler");
header("Timing-Allow-Origin: *");
header("Cache-Control: public, max-age=31536000, must-revalidate");
// Danh sách IP bị chặn
$blocked_ips = ['115.78.128.131'];

function getClientIp() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

$client_ip = getClientIp();

if (in_array($client_ip, $blocked_ips)) {
    header('HTTP/1.0 403 Forbidden');
    header('Location: /404.php');
    exit();
}

setcookie(
    "myCookie",                // Tên cookie
    "value",                   // Giá trị cookie
    [
        "expires" => time() + 3600, // Thời gian hết hạn (1 giờ)
        "path" => "/",              // Đường dẫn
        "domain" => "https://www.vnbacsionline.com",  // Tên miền (tuỳ chỉnh)
        "secure" => true,           // Chỉ gửi qua HTTPS
        "httponly" => true,         // Chỉ gửi cookie qua HTTP (không JavaScript)
        "samesite" => "None"        // SameSite=None
    ]
);


    include_once 'classes/bai_viet.php';
    include_once 'classes/tin_tuc.php';
    include_once 'classes/benh.php';
    include_once 'classes/khoa.php';

    spl_autoload_register(function ($className) {
        include_once "classes/" . $className . ".php";
    });
    $dbReadStarTime = hrtime(true);
    $khoas = new Khoa();
    $bai_viet = new post();
    $tin_tuc = new news();
    $benh = new Benh();

    $getMenuMobile = $benh->getMenuMobile();

    $dbReadEndTime = hrtime(true);
    $dbReadTotalTime = ($dbReadEndTime - $dbReadStarTime) / 1e+6;
   
    header('Server-Timing: db;desc="Database";dur=' . $dbReadTotalTime);

    // $local ='http://localhost/_andong/webseoandong.vn'
    $local ='https://www.vnbacsionline.com'
    ?>
<!DOCTYPE html>
<html ⚡ lang="en">

<head>
    <title>VNBACSIONLINE - Chăm Sóc Sức Khỏe Y Tế</title>
    <meta name='description' content='VNBACSIONLINE - Trang cung cấp thông tin y học, cập nhật những kiến thức y học chuẩn xác và đáng tin cậy. Với đội ngũ chuyên gia giàu kinh nghiệm, chúng tôi mong muốn mang lại những nguồn thông tin hữu ích đến với người đọc về các chủ đề bệnh lý đa dạng về Nam Khoa, Bệnh Xã Hội, Sản Phụ Khoa, Da Liễu, Bệnh Trĩ,...'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="google-site-verification" content="BcfKZyCch1ub8p7xuoJRoiY8YIxrqDIWOoSGCC-xZdc" />
    <link rel="canonical" href="https://www.vnbacsionline.com<?php echo $_SERVER['REQUEST_URI']; ?>" />

    <!-- <link rel="icon" href="<?php echo $local ?>/images/icons/icon_logo.webp" type="image/x-icon"> -->
    <link rel="preload" href="css/index.min.css" as="style" onload='this.onload=null,this.rel="stylesheet"'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <noscript>
        <link rel="stylesheet" href="css/index.min.css">
    </noscript>
    <script>
        function updateHeaderStylesheet() {
            // Xóa các stylesheet cũ nếu có
            const existingMobile = document.querySelectorAll('link[id^="mobile-"]');
            const existingDesktop = document.querySelectorAll('link[id^="desktop-"]');
            existingMobile.forEach(mobile => mobile.remove());
            existingDesktop.forEach(desktop => desktop.remove());

            // Thêm stylesheet mới dựa trên kích thước cửa sổ
            if (window.innerWidth < 999) {
                const mobileLink = [
                    {
                        href: 'css/header_mobile.min.css',
                        id: 'mobile-0'
                    },
                    // {
                    //     href: 'css/trang_chu_mobile.min.css',
                    //     id: 'mobile-1'
                    // },
                    {
                        href: 'css/footer_mobile.min.css',
                        id: 'mobile-1'
                    },

                ];
                mobileLink.forEach(({
                    href,
                    id
                }) => {
                    const link = document.createElement('link');
                    link.rel = 'preload';
                    link.href = href;
                    link.id = id;
                    link.as = 'style';
                    link.onload = function () {
                        this.rel = 'stylesheet'; // Khi preload xong, đổi sang stylesheet
                    };
                    document.head.appendChild(link);
                });

            } else {
                const desktopLink = [
                    {
                        href: 'css/header.min.css',
                        id: 'desktop-0'
                    },
                    {
                        href: 'css/footer.min.css',
                        id: 'desktop-1'
                    },

                ];
                desktopLink.forEach(({
                    href,
                    id
                }) => {
                    const link = document.createElement('link');
                    link.rel = 'stylesheet';
                    link.href = href;
                    link.id = id;
                    document.head.appendChild(link);
                });
            }
        }

        updateHeaderStylesheet();
        window.addEventListener('resize', () => {
                console.log('Window resized to:', window.innerWidth);
                updateHeaderStylesheet();
              
            });
        
    </script>





