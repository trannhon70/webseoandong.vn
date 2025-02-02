<?php
// header('Access-Control-Allow-Origin: *');
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
    $sdt = isset($data['sdt']) ? htmlspecialchars(strip_tags($data['sdt'])) : '';
    $trieuchung = isset($data['trieuchung']) ? htmlspecialchars(strip_tags($data['trieuchung'])) : '';
    $nguon = isset($data['url']) ? htmlspecialchars(strip_tags($data['url'])) : '';

    $created_at = $fm->created_at();
    $formatted_date = date('Y-m-d', strtotime($created_at));
    if (!empty($sdt)  ) {
        $check_created = "SELECT * FROM `admin_khachhang` WHERE sdt = '$sdt' AND DATE(created_at) = '$formatted_date'";
        $check_result = $db->select($check_created);
        if ($check_result && $check_result->num_rows > 0) {
            echo json_encode(['status' => 'error', 'message' => 'Số điện thoại này đã được đăng ký trong ngày hôm nay']);
            exit();
        } else {
            
            $sql = "INSERT INTO admin_khachhang (hoten, ngaysinh, sdt, trieuchung,ngaykham,giokham, status, note, ketqua, nguon, user_tuvan, created_at,form) 
                VALUES ('', '', '$sdt', '$trieuchung','','$created_at', 0, '', 0, '$nguon', 0, '$created_at', '')";

            $result = $db->insert($sql);

            if ($result) {
                echo json_encode(['status' => 'success', 'message' => 'Tạo bình comment thành công!']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Lỗi khi lưu dữ liệu']);
            }
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Số điện thoại không được trống!']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Yêu cầu không hợp lệ']);
}
