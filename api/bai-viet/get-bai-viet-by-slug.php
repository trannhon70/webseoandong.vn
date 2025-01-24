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
    $slug = isset($_GET['slug']) ? htmlspecialchars(strip_tags($_GET['slug'])) : null;
    if ($slug) {
        
        $query = "SELECT * FROM admin_baiviet WHERE slug = '$slug' LIMIT 1";
       
        $result = $db->select($query);
        if ($result && $result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $data = $row;
            }
            echo json_encode(['status' => 'success', 'data' => $data]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Không tìm thấy khoa với slug đã cho']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Thiếu tham số slug']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Yêu cầu không hợp lệ']);
}
