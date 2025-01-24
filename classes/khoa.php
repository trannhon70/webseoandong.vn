
<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php
class khoa
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    //thêm danh mục 
    public function getAllKhoa()
    {

        $query = "SELECT * FROM `admin_khoa` WHERE 1";
        $result = $this->db->select($query);
        return $result;
    }

    public function getAllChiTietKhoaAndBenh()
    {
        // Step 1: Get all departments (khoa)
        $queryKhoa = "SELECT * FROM `admin_khoa` ORDER BY id ASC LIMIT 6";
        $resultKhoa = $this->db->select($queryKhoa);

        $data = [];
        if ($resultKhoa) {
            while ($rowKhoa = $resultKhoa->fetch_assoc()) {
                // Step 2: For each department, get the list of diseases (benh)
                $idKhoa = $rowKhoa['id'];
                $danhSachBenh = $this->getDanhSachBenhByIdKhoa($idKhoa);
                // // Step 3: Add the department and its diseases to the data array
                $rowKhoa['danhSachBenh'] = $danhSachBenh;
                $data[] = $rowKhoa;
            }
        }

        return $data;
    }

    public function getDanhSachBenhByIdKhoa($idKhoa)
    {
        // Sanitize the input to prevent SQL injection
        $idKhoa = intval($idKhoa);
        $queryBenh = "SELECT * FROM `admin_benh` WHERE id_khoa = '$idKhoa' AND hidden = '0'";
        $resultBenh = $this->db->select($queryBenh);
        $data = [];
        if ($resultBenh) {
            while ($row = $resultBenh->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function getByIdMenuKhoa($idKhoa)
    {
        $idKhoa = intval($idKhoa);
        $query = "SELECT * FROM `admin_khoa` WHERE id = '$idKhoa' LIMIT 1 ";
        $result = $this->db->select($query);
        $khoa = $result->fetch_assoc();
        if ($khoa) {
            $queryBenh = "SELECT * FROM `admin_benh` WHERE id_khoa = '$idKhoa' AND hidden != 1";
            $resultBenh = $this->db->select($queryBenh);
            $khoa['danh_sach_benh'] = [];
            while ($benh = $resultBenh->fetch_assoc()) {
                $khoa['danh_sach_benh'][] = $benh;
            }
        }
        return $khoa;
    }

    public function getBySlugMenuKhoa($slug)
    {
        $query = "SELECT id_benh FROM `admin_baiviet` WHERE slug = '$slug' LIMIT 1";
        $result = $this->db->select($query);
        if ($result) {
            $row = $result->fetch_assoc();
            $id_benh = $row['id_benh'];

            if ($id_benh) {
                $queryBenh = "SELECT id_khoa, name FROM `admin_benh` WHERE id = '$id_benh' LIMIT 1";
                $resultBenh = $this->db->select($queryBenh);
                if ($resultBenh) {
                    $rowBenh = $resultBenh->fetch_assoc();
                    $id_khoa = $rowBenh['id_khoa'];
                    if ($id_khoa) {
                        $queryKhoa = "SELECT * FROM `admin_khoa` WHERE id = '$id_khoa' LIMIT 1";
                        $resultKhoa = $this->db->select($queryKhoa);
                        $data = $resultKhoa->fetch_assoc();
                        if ($data) {
                            $queryDSBenh = "SELECT * FROM `admin_benh` WHERE id_khoa = '$data[id]' AND hidden != 1 ";
                            $resultDSBenh = $this->db->select($queryDSBenh);
                            if ($resultDSBenh === false) {
                                $data['ds_benh'] = [];
                                error_log("Query error: ");
                            } else {
                                $data['ds_benh'] = [];
                                while ($benh = $resultDSBenh->fetch_assoc()) {
                                    $data['ds_benh'][] = $benh;
                                }
                            }
                        }
                        return $data;
                    } else {
                        echo "Không tìm thấy id_khoa.";
                    }
                } else {
                    echo "Lỗi truy vấn: " . $this->db->error;
                }
            } else {
                echo "Không tìm thấy id_benh.";
            }
        } else {
            echo "Lỗi truy vấn: " . $this->db->error;
        }
    }

    public function getBySlugActive($slug)
    {

        $query = "SELECT id_benh FROM `admin_baiviet` WHERE slug = '$slug' LIMIT 1";
        $result = $this->db->select($query);
        if ($result  && $result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return 'slug không tồn tại';
        }
    }
}

?>