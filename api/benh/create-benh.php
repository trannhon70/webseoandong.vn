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
header('Content-Type: application/json'); // Đảm bảo phản hồi dưới dạng JSON
$data = json_decode(file_get_contents("php://input"), true);


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($data)) {
    // Xử lý và chuẩn bị dữ liệu
    $id_khoa = isset($data['id_khoa']) ? htmlspecialchars(strip_tags($data['id_khoa'])) : '';
    $user_id = isset($data['user_id']) ? htmlspecialchars(strip_tags($data['user_id'])) : '';
    $name = isset($data['name']) ? htmlspecialchars(strip_tags($data['name'])) : '';
    $slug = isset($data['slug']) ? htmlspecialchars(strip_tags($data['slug'])) : '';
    $created_at = $fm->created_at();

   if($name !== '' && $id_khoa !== '' ){
        $checkName = "SELECT * FROM `admin_benh` WHERE name = '$name'";
        $check_result = $db->select($checkName);
        if ($check_result && $check_result->num_rows > 0) {
            echo json_encode(['status' => 'error', 'message' => 'Hiện tại bệnh này đã tồn tại!']);
            exit();
        } else {
            $sql = "INSERT INTO admin_benh (name, id_khoa, created_at, slug, hidden, user_id) 
            VALUES ('$name','$id_khoa','$created_at','$slug',0,'$user_id')";
            $result = $db->insert($sql);
            if ($result) {
                echo json_encode(['status' => 'success', 'message' => 'Tạo bệnh lý thành công!']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Lỗi khi lưu dữ liệu']);
            }
        }
   }else {
    echo json_encode(['status' => 'error', 'message' => 'Tất cả các trường không được bỏ trống!']);
   }

    
} else {
    echo json_encode(['status' => 'error', 'message' => 'Yêu cầu không hợp lệ']);
}
