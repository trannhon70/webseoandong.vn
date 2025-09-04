<?php
header('Content-Type: application/json');

$jsonFile = __DIR__ . "/files.json";

// đọc file json
if (!file_exists($jsonFile)) {
    echo json_encode(["status" => "error", "message" => "files.json không tồn tại"]);
    exit;
}

$data = json_decode(file_get_contents($jsonFile), true);
if (!$data || !isset($data['files'])) {
    echo json_encode(["status" => "error", "message" => "Dữ liệu không hợp lệ"]);
    exit;
}

// lấy file cần xóa
$input = json_decode(file_get_contents("php://input"), true);
$fileToDelete = $input['file'] ?? '';

if (!$fileToDelete) {
    echo json_encode(["status" => "error", "message" => "Thiếu tên file"]);
    exit;
}

// xoá khỏi mảng
$data['files'] = array_values(array_filter($data['files'], function ($f) use ($fileToDelete) {
    return $f !== $fileToDelete;
}));

// ghi lại file json
if (file_put_contents($jsonFile, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))) {
    echo json_encode(["status" => "success", "message" => "Đã xoá $fileToDelete"]);
} else {
    echo json_encode(["status" => "error", "message" => "Không ghi được files.json"]);
}
