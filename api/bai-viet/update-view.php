<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

include_once('../../lib/database.php');
include_once('../../helpers/format.php');

$fm = new Format();
$db = new Database();
$data = json_decode(file_get_contents("php://input"), true);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($data)) {
    // Xử lý và chuẩn bị dữ liệu
    $slug = isset($data['slug']) ? htmlspecialchars(strip_tags($data['slug'])) : '';
    if ($slug) {
        // Truy vấn bài viết theo slug
        $sql = "SELECT * FROM `admin_baiviet` WHERE slug = '$slug'";
        $result = $db->select($sql);
        if ($result) {
            $post = $result->fetch_assoc();
            $currentViews = $post['view'];
            $newViews = $currentViews + 1;
            // Cập nhật số lượt xem mới
            $updateSql = "UPDATE `admin_baiviet` SET view = '$newViews' WHERE slug = '$slug'";
            $updateResult = $db->update($updateSql);
            if ($updateResult) {
                echo json_encode(['status' => 'success', 'message' => 'Cập nhật thành công!', 'data' => ['slug' => $slug, 'new_views' => $newViews]]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Lỗi khi cập nhật số lượt xem']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Không tìm thấy bài viết']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'ID không được bỏ trống']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Yêu cầu không hợp lệ']);
}
