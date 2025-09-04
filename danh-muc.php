<?php include_once "inc/header.php" ?>
<?php
$DanhmucCss = file_get_contents('css/danh-muc.min.css'); // Đọc nội dung file CSS
?>
<style amp-custom>
    <?= $DanhmucCss ?><?= $indexCss ?>
</style>
<?php
$current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
$current_url .= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$slug = basename(parse_url($current_url, PHP_URL_PATH), '.html');

$getPostDetail = null;

$postDetail = $bai_viet->getBaiViet_bySlug($slug);
$listQuanTam = $benh->getDSBaiVietLienQuan($slug);

if (isset($postDetail) && isset($postDetail['name_khoa'])) {
    $getPostDetail = $postDetail;
} else {
    $postTinTuc = $bai_viet->getBaiVietDauTienByBenh($slug);
    if ($postTinTuc) {
        $getPostDetail = $postTinTuc;
    } else {
        $getPostDetail = null;
    }
}
function setTitleAndScroll()
{
    global $getPostDetail; // Đảm bảo truy cập biến toàn cục
    if ($getPostDetail && isset($getPostDetail['tieu_de'])) {
        // Lấy các giá trị từ $getPostDetail
        $title = isset($getPostDetail['tieu_de']) ? $getPostDetail['tieu_de'] : 'Default Title';
        $description = isset($getPostDetail['descriptions']) ? $getPostDetail['descriptions'] : 'Default Description';
        $keywords = isset($getPostDetail['keyword']) ? $getPostDetail['keyword'] : 'default, keywords';
        $image = isset($getPostDetail['img']) ? $getPostDetail['img'] : '/path/to/default-image.jpg';

        // Chuyển đổi các giá trị sang dạng an toàn cho HTML và JavaScript
        $safeTitle = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
        $safeDescription = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');
        $safeKeywords = htmlspecialchars($keywords, ENT_QUOTES, 'UTF-8');
        $safeImage = htmlspecialchars($image, ENT_QUOTES, 'UTF-8');

        // Đảm bảo rằng bạn chèn vào trong thẻ <head>
        echo "<title>$safeTitle</title>\n";
        echo "<meta name='description' content='$safeDescription'>\n";
        echo "<meta name='keywords' content='$safeKeywords'>\n";
        echo "<meta property='og:title' content='$safeTitle'>\n";
        echo "<meta property='og:description' content='$safeDescription'>\n";
        echo "<meta property='og:image' content='https://andongclinic.vn/admin/uploads/$safeImage'>\n";
        echo "<meta property='og:image:width' content='1200'>\n";
        echo "<meta property='og:image:height' content='630'>\n";
        echo "<meta property='og:type' content='article'>\n";
        echo "<meta property='og:url' content='https://andongclinic.vn/{$getPostDetail['slug']}.html'>\n";
    }
}
setTitleAndScroll();
?>


</head>

<body>

    <?php if (isset($getPostDetail)) { ?>
        <?php include "layout/header_layout.php" ?>
        <main>
            <article>
                <div class="category">
                    <div id="category__left" class="category__left">


                        <div class="category__left-questions">
                            <div class="category__left-questions-title">
                                Câu hỏi mới nhất
                            </div>
                            <span></span>
                            <a href="<?php echo $local ?>" class="category__left-questions-item">
                                <span>1</span>
                                <div>Khám nam khoa ở đâu uy tín?</div>
                            </a>
                            <a href="<?php echo $local ?>" class="category__left-questions-item">
                                <span>2</span>
                                <div>Cắt bao quy đầu bao nhiêu tiền?</div>
                            </a>
                            <a href="<?php echo $local ?>" class="category__left-questions-item">
                                <span>3</span>
                                <div>Cách điều trị xuất tinh sớm hiệu quả?</div>
                            </a>
                            <a href="<?php echo $local ?>" class="category__left-questions-item">
                                <span>4</span>
                                <div>Dương vật không cương là bệnh gì?</div>
                            </a>
                            <a href="<?php echo $local ?>" class="category__left-questions-item">
                                <span>5</span>
                                <div>Chi phí chữa sùi mào gà bao nhiêu?</div>
                            </a>
                        </div>
                        <a href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en"
                            class="category__left-promotion">
                            <img width="100%" height="auto" loading="lazy"
                                src="<?php echo $local ?>/images/background/bg_khuyenmai.webp" alt="...">
                        </a>
                    </div>
                    <div class="category__right">
                        <!-- <div id="category__right-breadcrumb" class="category__right-breadcrumb">
                            Trang chủ > <?php echo $getPostDetail['name_khoa'] ?> > <?php echo $getPostDetail['name_benh'] ?>
                        </div> -->
                        <?php if ($getPostDetail !== 'Hiện tại dữ liệu này chưa có bài viết!') { ?>
                            <h1 id="titleBaiViet" class="category__right-title">
                                <?php echo $getPostDetail['tieu_de'] ?>
                            </h1>



                            <div style="padding-top:10px">
                                <?php if (Session::get('role') === '1' || Session::get('role') === '2') {
                                ?>
                                    <?php if (isset($getPostDetail) && isset($getPostDetail['name_khoa'])) { ?>
                                        <a class="chinh-sua"
                                            href="<?php echo $local ?>/admin/bai-viet-edit.php?edit=<?php echo $getPostDetail['id'] ?>"><i
                                                style="font-size:19px" class="bx bxs-pencil"></i>chỉnh sửa</a>
                                    <?php } else { ?>
                                        <a class="chinh-sua"
                                            href="<?php echo $local ?>/admin/tin-tuc-edit.php?edit=<?php echo $getPostDetail['id'] ?>">
                                            <i style="font-size:19px" class="bx bxs-pencil"></i>chỉnh sửa</a>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                            <div id="bai-viet" class="body-placeholder">

                            </div>
                            <div class="bai-viet-footer">Nội dung bài viết cung cấp nhằm mục đích tham khảo thêm kiến thức y tế,
                                một số nội dung có thể không thuộc nghiệp vụ của phòng khám chúng tôi, Hiệu quả của việc hỗ trợ
                                điều trị phụ thuộc vào cơ địa của mỗi người. Cần biết thông tin liên hệ để được tư vấn trực
                                tuyến miễn phí.<a href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en">[TƯ VẤN
                                    TRỰC TUYẾN]</a>
                            </div>
                    </div>
                <?php } else { ?>
                    <div><?php echo $getPostDetail ?></div>
                <?php } ?>
                </div>
                <?php include_once './layout/comment_layout.php' ?>
            </article>
        </main>

        <?php include_once "inc/footer.php" ?>

        <script defer>
            function applyCSSandJS() {
                //images gây shock
                const shockElements = document.querySelectorAll('.shock_img');
                shockElements.forEach(shockElement => {
                    shockElement.classList = 'hiden_img'
                    const viewdiv = document.createElement('div');
                    viewdiv.id = 'viewdiv';
                    viewdiv.className = 'view';
                    viewdiv.textContent = 'Hình ảnh có nội dung gây shock !! cân nhất trước khi xem';

                    const viewbutton = document.createElement('button');
                    viewbutton.id = 'viewbutton';
                    viewbutton.className = 'view_button';
                    viewbutton.textContent = 'click vào xem';
                    // Append the button to the parent of the shockElement (image-container)
                    shockElement.appendChild(viewdiv);
                    shockElement.appendChild(viewbutton);

                    // Add click event listener to the button
                    viewbutton.addEventListener('click', () => {
                        // Remove the blur effect
                        shockElement.classList.remove('blurred');
                        shockElement.classList.remove('hiden_img');
                        // Hide the button
                        viewdiv.classList.add('hidden');
                        viewbutton.classList.add('hidden');
                    });
                })

                let baiVietElement = document.getElementById('bai-viet');
                if (baiVietElement) {
                    let pElements = baiVietElement.getElementsByTagName('p');
                    for (let i = 0; i < pElements.length; i++) {
                        pElements[i].style.color = '#000000'; // Ghi đè CSS trước đó
                        pElements[i].style.fontWeight = 400;
                        pElements[i].style.fontSize = '13px';
                        pElements[i].style.lineHeight = '27px';
                    }
                }

                let imgElements = baiVietElement.getElementsByTagName('img');
                if (imgElements) {
                    for (let i = 0; i < imgElements.length; i++) {
                        // convert link img
                        if (imgElements[i].src.startsWith('<?php echo $local ?>/ckeditor/uploads/') == true) {
                            let urlParts = imgElements[i].src.split('/');
                            let fileName = urlParts[urlParts.length - 1];
                            imgElements[i].src = '<?php echo $local ?>/admin/ckeditor/uploads/' + fileName;
                        }



                        //hiển thị css img chatbox
                        // if (imgElements[i].src.startsWith('<?php echo $local ?>/ckfinder/userfiles/images/Chat/Chat-Dakhoa.gif') ==
                        if (imgElements[i].src.startsWith('http://localhost/ckfinder/userfiles/images/Chat/Chat-Dakhoa.gif') ==
                            true) {
                            imgElements[i].style.borderRadius = '8px';
                            imgElements[i].style.setProperty('display', 'block', 'important');
                            let divWrapper = document.createElement('a');
                            divWrapper.className = 'glow-on-hover';
                            divWrapper.href = "https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en";
                            imgElements[i].parentNode.insertBefore(divWrapper, imgElements[i]);
                            divWrapper.appendChild(imgElements[i])
                        }

                    }

                }

                if (baiVietElement) {
                    let h2Elements = baiVietElement.getElementsByTagName('h2');
                    for (let i = 0; i < h2Elements?.length; i++) {

                        h2Elements[i].classList.add('custom-h2-style');

                    }

                    let h3Element = baiVietElement.getElementsByTagName('h3');

                    for (let i = 0; i < h3Element.length; i++) {
                        h3Element[i].style.color = '#00D8D8';
                        h3Element[i].style.fontWeight = '700';
                        h3Element[i].style.fontSize = '18px';
                        h3Element[i].style.textTransform = 'capitalize';
                        h3Element[i].style.background =
                            'url("<?php echo $local ?>/images/icons/icon_mui.gif") no-repeat left center';
                        h3Element[i].style.backgroundSize = '21px 21px';
                        h3Element[i].style.paddingLeft = '25px';
                        h3Element[i].style.margin = '7px 0px';
                    }
                }

                var rightBottom = document.querySelector('.category__left-promotion');
                var containerRow = document.querySelector('.category');
                var rightColumn = document.querySelector('.category__left');
                var rightCenter = document.querySelector('.category__left-questions');
                var baiViet = document.getElementById('bai-viet');

                if (rightBottom && containerRow && rightColumn && baiViet) {
                    window.addEventListener('scroll', function() {
                        var containerRowRect = containerRow.getBoundingClientRect();
                        var rightColumnRect = rightColumn.getBoundingClientRect();
                        var rightBottomHeight = rightBottom.offsetHeight;
                        var rightCenterRect = rightCenter.getBoundingClientRect();
                        var baiVietRect = baiViet.getBoundingClientRect();

                        // Kiểm tra khi scroll đến hết nội dung của id="bai-viet"
                        if (baiVietRect.bottom > window.innerHeight) {
                            if (containerRowRect.bottom - (rightBottomHeight - 700) <= window.innerHeight) {
                                rightBottom.style.position = 'absolute';
                                rightBottom.style.bottom = '0';
                                rightBottom.style.top = 'unset';
                            } else if (rightColumnRect.top + rightCenterRect.height <= 0) {
                                rightBottom.style.position = 'fixed';
                                rightBottom.style.top = '20px';
                                rightBottom.style.bottom = 'unset';
                                rightBottom.style.width = '275px';
                            } else {
                                rightBottom.style.position = 'relative';
                                rightBottom.style.top = 'unset';
                                rightBottom.style.bottom = 'unset';
                            }
                        } else {
                            rightBottom.style.position = 'relative';
                            rightBottom.style.top = 'unset';
                            rightBottom.style.bottom = 'unset';
                        }
                    });
                } else {
                    console.warn("One or more elements were not found in the DOM.");
                }
            }
        </script>

        <script>
            const bodyPlaceholder = document.getElementById("bai-viet");

            const loadBody = () => {
                let content = `<?php echo htmlspecialchars_decode($getPostDetail['content']); ?>`;

                bodyPlaceholder.innerHTML = content;
                bodyPlaceholder.classList.add("loaded");
                observer.unobserve(bodyPlaceholder);
            };
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {

                        loadBody();
                        applyCSSandJS();
                        checkImgMobile();
                    }
                });
            });

            // Khởi tạo tải content ban đầu và bắt đầu quan sát bodyPlaceholder

            observer.observe(bodyPlaceholder);
        </script>
    <?php } else { ?> <div
            style="display:flex;align-items:center;justify-content:center;color:red;font-size:30px;height:100vh">link bài
            viết này không tồn tại!</div> <?php } ?>