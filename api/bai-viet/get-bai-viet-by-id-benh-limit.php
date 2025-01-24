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
    // Lấy id từ query string
    $id_benh = isset($_GET['id_benh']) ? htmlspecialchars(strip_tags($_GET['id_benh'])) : null;

    if ($id_benh) {
        // Truy vấn để lấy thông tin của khoa theo id
        $sql = "SELECT * FROM admin_baiviet WHERE id_benh = $id_benh ORDER BY admin_baiviet.id DESC LIMIT 5"; 
        $result = $db->select($sql);

        if ($result && $result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            echo json_encode(['status' => 'success', 'data' => $data]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Không tìm thấy khoa với id đã cho','data'=> []]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Thiếu tham số id']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Yêu cầu không hợp lệ']);
}
?>
