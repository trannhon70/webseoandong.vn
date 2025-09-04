<?php
header('Content-Type: application/json');

$jsonFile = __DIR__ . "/files.json";

if (!file_exists($jsonFile)) {
    echo json_encode(["status" => "error", "message" => "files.json không tồn tại"]);
    exit;
}

$data = json_decode(file_get_contents($jsonFile), true);
if (!$data || !isset($data['files'])) {
    $data = ["files" => []]; // nếu chưa có thì tạo mới
}

$input = json_decode(file_get_contents("php://input"), true);
$newFile = $input['file'] ?? '';

if (!$newFile) {
    echo json_encode(["status" => "error", "message" => "Thiếu tên file"]);
    exit;
}

// tránh thêm trùng
if (in_array($newFile, $data['files'])) {
    echo json_encode(["status" => "error", "message" => "File đã tồn tại"]);
    exit;
}

// thêm vào mảng
$data['files'][] = $newFile;

// ghi lại file json
if (file_put_contents($jsonFile, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))) {
    echo json_encode(["status" => "success", "message" => "Đã thêm $newFile"]);
} else {
    echo json_encode(["status" => "error", "message" => "Không ghi được files.json"]);
}
