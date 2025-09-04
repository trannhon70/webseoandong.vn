(function () {
    let local = 'http://localhost/_andong/webseoandong.vn'
    // let local = 'https://www.vnbacsionline.com'
    const url = window.location.href.toLowerCase();
    const allowedDomains = ["vnbacsionline", "bvdkht", "localhost"];
    const currentUrl = window.location.href.toLowerCase();

    if (!allowedDomains.some(d => currentUrl.includes(d))) return;

    // Thêm file CSS vào <head>
    function loadCSS(href) {
        if (!document.querySelector(`link[href="${href}"]`)) {
            let link = document.createElement("link");
            link.rel = "stylesheet";
            link.href = href;
            document.head.appendChild(link);
        }
    }
    // gọi hàm loadCSS
    loadCSS("../../css/giao_dien.min.css");

    // Xác định base URL dựa vào môi trường
    const baseUrl = `${local}/load/bvdkht.vn/get_post.php?slug=`

    async function loadFiles() {
        const res = await fetch(`${local}/load/bvdkht.vn/files.json`);
        const data = await res.json();
        return data.files;
    }

    function applyCSSandJS() {
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
                if (imgElements[i].src.startsWith(`${local}/ckeditor/uploads/`) == true) {
                    let urlParts = imgElements[i].src.split('/');
                    let fileName = urlParts[urlParts.length - 1];
                    imgElements[i].src = `${local}/admin/ckeditor/uploads/` + fileName;
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
                    `url('${local}/images/icons/icon_mui.gif') no-repeat left center`;
                h3Element[i].style.backgroundSize = '21px 21px';
                h3Element[i].style.paddingLeft = '25px';
                h3Element[i].style.margin = '7px 0px';
            }
        }
    }
    loadFiles().then(result => {
        function cleanContent(str) {
            return str.replace(/\\r\\n/g, ""); // bỏ ký tự xuống dòng \r\n
        }
        result.forEach(function (file) {
            if (url.includes(file.toLowerCase())) {
                const xhr = new XMLHttpRequest();
                const slug = file.replace(".html", "");
                xhr.open("GET", baseUrl + slug, true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && (xhr.status === 200 || xhr.status === 0)) {
                        try {
                            const json = JSON.parse(xhr.responseText);
                            const content = cleanContent(json.data.content);
                            const title = cleanContent(json.data.title);
                            // Xoá toàn bộ HTML cũ
                            document.open();
                            document.write(`
                                <!DOCTYPE html>
                                <html lang="vi">
                                <head>
                                    <meta charset="UTF-8">
                                    <title>${title}</title>
                                    <link rel="stylesheet" href="${local}/css/giao_dien.min.css">
                                </head>
                                <body>
                                    <h1 id="title">${title}</h1>
                                    <div id="bai-viet">${content}</div>
                                    <script src="https://chatai.andongclinic.vn/chat-box-ai.js"></script>
                                </body>
                                </html>
                            `);
                            document.close();
                            // Chờ một chút để DOM mới load xong rồi apply CSS/JS
                            setTimeout(applyCSSandJS, 100);

                        } catch (error) {
                            console.log("Response is HTML, not JSON");
                            document.open();
                            document.write(xhr.responseText);
                            document.close();
                        }
                    }
                };
                xhr.send(null);
            }
        });
    });

})();
