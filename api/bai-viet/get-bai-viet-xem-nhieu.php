<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
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

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $limit = isset($_GET['limit']) ? htmlspecialchars(strip_tags($_GET['limit'])) : null;
    if ($limit) {
        // Truy vấn để lấy thông tin của khoa theo id
        $query = "SELECT admin_baiviet.id,admin_baiviet.slug,admin_baiviet.title, admin_baiviet.descriptions,admin_baiviet.img,admin_baiviet.view,
        khoa.name AS khoa_name
        FROM admin_baiviet
        JOIN admin_khoa khoa ON admin_baiviet.id_khoa = khoa.id
        ORDER BY admin_baiviet.view DESC LIMIT $limit";
        $result = $db->select($query);
        if ($result && $result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            echo json_encode(['status' => 'success', 'data' => $data]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Không tìm thấy khoa với limit đã cho']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Thiếu tham số limit']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Yêu cầu không hợp lệ']);
}
