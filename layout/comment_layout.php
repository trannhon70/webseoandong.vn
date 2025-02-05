
<div class="comment">
    <div class="quantam">
        <div class="quantam__title">có thể bạn quan tâm</div>
        <img width="100%" height="auto" src="<?php echo $local ?>/images/icons/icon_line.webp" alt="line">
        <ul>
            <?php if (is_array($listQuanTam) && isset($listQuanTam['data'])) : ?>
                <?php foreach ($listQuanTam['data'] as $item) : ?>
                    <li>
                        <a href="<?php echo $local ?>/<?php echo $item['slug'] ?>.html"><?php echo $item['tieu_de'] ?></a>
                    </li>
                <?php endforeach ?>
            <?php else: ?>
                <p>Không có bài viết liên quan.</p>
            <?php endif; ?>

        </ul>
    </div>
    <div class="comment__body">
        <div class="comment__body-title">
            Bình luận :
        </div>
        <div id="form__comment" class="comment__body-form">
            <textarea name="trieuchung" id="" rows="4" placeholder="Để lại bình luận"></textarea>
            <div class="comment__body-form-div">
                <input name="sdt" type="number" placeholder="Số điện thoại">
                <button type="button">Gửi bình luận</button>
            </div>
            <hr>
        </div>
        <ul class="comment__body-ul">
            <li class="comment__body-ul-li">
                <div class="comment__body-ul-li-body">
                    <img width="60px" height="60px" src="<?php echo $local ?>/images/icons_chat/chat_user.webp" alt="...">
                    <div>
                        <strong>Nam khánh</strong>
                        <p>26.11.2024</p>
                    </div>
                </div>
                <div class="comment__body-ul-li-content">Em được bạn giới thiệu phòng khám bên mình nên em muốn ghé thăm khám. Cho em hỏi phòng khám sau 18g còn làm việc không, vì em bận đi làm giờ hành chính, khó xin nghỉ phép ạ. Bác sĩ tư vấn giúp em nhé!</div>
                <div class="comment__body-ul-li-icon">
                    <div>
                        Trả lời <img width="15px" height="15px" loading="lazy" src="<?php echo $local ?>/images/icons_chat/icon_chat.webp" alt="...">
                    </div>
                    <div>
                        Thích <img width="15px" height="15px" loading="lazy" src="<?php echo $local ?>/images/icons_chat/icon_like.webp" alt="...">
                    </div>
                    <div>
                        Chia sẽ <img width="10px" height="10px" loading="lazy" src="<?php echo $local ?>/images/icons_chat/icon_share.webp" alt="...">
                    </div>
                </div>
                <div class="comment__body-ul-li-replay">
                    <ul class="comment__body-ul-li-replay-ul">
                        <li class="comment__body-ul-li-replay-ul-li">
                            <div class="comment__body-ul-li-replay-ul-li-body">
                                <img width="60px" height="60px" src="<?php echo $local ?>/images/icons/icon_logo.webp" alt="...">
                                <div>
                                    <strong>Phòng Khám Đa Khoa An Đông</strong>
                                    <p>Chào bạn! Cảm ơn bạn đã quan tâm đến phòng khám. Phòng khám làm việc từ 8g-20g kể cả ngày Lễ, Tết nên tan làm bạn vẫn có thể ghé thăm khám nhé! Bạn check tin nhắn để trao đổi và đặt lịch hẹn chi tiết nhé!</p>
                                </div>
                            </div>
                        </li>
                        <li class="comment__body-ul-li-replay-ul-li">
                            <div class="comment__body-ul-li-replay-ul-li-body1">
                                <div class="comment__body-ul-li-body">
                                    <img width="60px" height="60px" src="<?php echo $local ?>/images/icons_chat/chat_user.webp" alt="...">
                                    <div>
                                        <strong>Nam khánh</strong>
                                        <p>26.11.2024</p>
                                    </div>
                                </div>
                                <div class="comment__body-ul-li-content">Oke cảm ơn ạ, em thấy tin nhắn rồi.</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="comment__body-ul-li">
                <div class="comment__body-ul-li-body">
                    <img width="60px" height="60px" src="<?php echo $local ?>/images/icons_chat/chat_user1.webp" alt="...">
                    <div>
                        <strong>Bình Minh</strong>
                        <p>03.11.2024</p>
                    </div>
                </div>
                <div class="comment__body-ul-li-content">Mình thấy nhiều bạn review rất tốt về cắt bao quy đầu bên mình. Bao quy đầu của mình đang có hiện tượng bị lở loét và sưng phồng, và đau nhức nên mình muốn khám kĩ hơn. Có thể giới thiệu qua giúp mình được không?</div>
                <div class="comment__body-ul-li-icon">
                    <div>
                        Trả lời <img width="15px" height="15px" loading="lazy" src="<?php echo $local ?>/images/icons_chat/icon_chat.webp" alt="...">
                    </div>
                    <div>
                        Thích <img width="15px" height="15px" loading="lazy" src="<?php echo $local ?>/images/icons_chat/icon_like.webp" alt="...">
                    </div>
                    <div>
                        Chia sẽ <img width="10px" height="10px" loading="lazy" src="<?php echo $local ?>/images/icons_chat/icon_share.webp" alt="...">
                    </div>
                </div>
                <div class="comment__body-ul-li-replay">
                    <ul class="comment__body-ul-li-replay-ul">
                        <li class="comment__body-ul-li-replay-ul-li">
                            <div class="comment__body-ul-li-replay-ul-li-body">
                                <img width="60px" height="60px" src="<?php echo $local ?>/images/icons/icon_logo.webp" alt="...">
                                <div>
                                    <strong>Phòng Khám Đa Khoa An Đông</strong>
                                    <p>Vâng, chào bạn! Cảm ơn bạn đã quan tâm. Theo như tình trạng bạn đã miêu tả thì có thể bạn đã bị viêm bao quy đầu. Nhưng bạn cần thăm khám trực tiếp kĩ lưỡng hơn để bác sĩ có kết luận chính xác.</p>
                                </div>
                            </div>
                        </li>
                        <li class="comment__body-ul-li-replay-ul-li">
                            <div class="comment__body-ul-li-replay-ul-li-body">
                                <img width="60px" height="60px" src="<?php echo $local ?>/images/icons/icon_logo.webp" alt="...">
                                <div>
                                    <strong>Phòng Khám Đa Khoa An Đông</strong>
                                    <p>Bạn kiểm tra tin nhắn nhé, bên mình sẽ tư vấn cụ thể hơn.</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        <div class="comment__body-see">
            xem thêm <img width="10px" height="10px" loading="lazy" src="<?php echo $local ?>/images/icons_chat/icon_share.webp" alt="...">
        </div>
    </div>
</div>

<script defer>
    function showToast(message, type = 'info') {
        const toastContainer = document.getElementById('toast-container');
        if (!toastContainer) return;

        // Create toast element
        const toast = document.createElement('div');
        toast.classList.add('toast', type);
        toast.innerHTML = ` ${message}`;

        // Append toast to container
        toastContainer.appendChild(toast);

        // Remove toast after 3 seconds
        setTimeout(() => {
            toast.remove();
        }, 3000);
    }

    document.querySelector('button').addEventListener('click', function() {
        const sdtInput = document.querySelector('input[name="sdt"]'); // Phần tử input
        const trieuchungTextarea = document.querySelector('textarea[name="trieuchung"]'); // Phần tử textarea

        const sdt = sdtInput.value; // Lấy giá trị
        const trieuchung = trieuchungTextarea.value; // Lấy giá trị
        const url = new URL(window.location.toLocaleString());
        let formData = {
            sdt: sdt,
            trieuchung: trieuchung,
            url: url.href
        };

        if (formData.sdt !== '') {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "<?php echo $local ?>/api/khach-hang/create-form-comment.php", true); // PHP local variable
            xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    let response = JSON.parse(xhr.responseText);
                    if (response.status === 'success') {
                        showToast(response.message, 'success');
                        // Reset giá trị đúng cách
                        trieuchungTextarea.value = '';
                        sdtInput.value = '';
                    } else {
                        showToast(response.message, 'error');
                    }
                }
            };

            xhr.send(JSON.stringify(formData));
        } else {
            showToast('Số điện thoại không được bỏ trống!', 'warning');
        }
    });

    // Usage examples
    // showToast('This is an info message!', 'info');
    // showToast('This is a success message!', 'success');
    // showToast('This is a warning message!', 'warning');
    // showToast('This is an error message!', 'error');
</script>