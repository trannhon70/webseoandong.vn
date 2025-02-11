<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'lib/session.php';
Session::init();

header("Content-Type: application/xml; charset=utf-8");

// In XML declaration đúng cách
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";

include_once 'classes/bai_viet.php';
spl_autoload_register(function ($className) {
    include_once "classes/" . $className . ".php";
});

// Khởi tạo đối tượng bài viết
$bai_viet = new post();

// Lấy dữ liệu bài viết từ database
$data = $bai_viet->getAllDSBaiViet();

?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
    <?php if(!empty($data)) { 
        foreach ($data as $post) { ?>
    <url>
        <loc>https://www.vnbacsionline.com/<?php echo $post['slug'] ?>.html</loc>
        <lastmod><?php echo $post['created_at'] ?></lastmod>
    </url>
  <?php } }?>

</urlset>
