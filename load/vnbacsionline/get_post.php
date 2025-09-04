<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Methods: GET');
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");

// Xử lý OPTIONS request cho CORS
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

include_once('../../lib/database.php');
include_once('../../helpers/format.php');

$fm = new Format();
$db = new Database();

// Lấy slug từ query string (?slug=...)
$slug = isset($_GET['slug']) ? $fm->validation($_GET['slug']) : '';

if ($slug) {
    // Dùng prepared statement cho an toàn
    $stmt = $db->link->prepare("SELECT * FROM admin_baiviet WHERE slug = ? LIMIT 1");
    $stmt->bind_param("s", $slug);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $data = $result->fetch_assoc();
        echo json_encode([
            'status' => 'success',
            'data' => $data
        ], JSON_UNESCAPED_UNICODE);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Không tìm thấy bài viết với slug đã cho'
        ], JSON_UNESCAPED_UNICODE);
    }

    $stmt->close();
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Thiếu tham số slug'
    ], JSON_UNESCAPED_UNICODE);
}
