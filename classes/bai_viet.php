
<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
include_once($filepath . '/../lib/session.php');

?>

<?php
class post
{
  private $db;
  private $fm;
  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }

  //thêm danh mục 
  public function insert_post($data, $files)
  {
    // Lấy dữ liệu từ biểu mẫu và bảo vệ chống SQL injection
    $tieu_de = mysqli_real_escape_string($this->db->link, $data['tieu_de']);
    $id_benh = isset($data['id_benh']) ? mysqli_real_escape_string($this->db->link, $data['id_benh']) : '';

    $id_khoa = mysqli_real_escape_string($this->db->link, $data['id_khoa']);
    $content = mysqli_real_escape_string($this->db->link, $data['content']);
    $title = mysqli_real_escape_string($this->db->link, $data['title']);
    $keyword = mysqli_real_escape_string($this->db->link, $data['keyword']);
    $description = mysqli_real_escape_string($this->db->link, $data['description']);
    $slug = mysqli_real_escape_string($this->db->link, $data['slug']);
    $selectedImage = mysqli_real_escape_string($this->db->link, $data['selectedImage']);
    $created_at = $this->fm->created_at();

    // Xử lý hình ảnh nếu có
    $img = $selectedImage; // Mặc định là hình ảnh đã chọn trước đó
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
      $file_name = $_FILES['image']['name'];
      $file_temp = $_FILES['image']['tmp_name'];
      $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
      $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
      $uploaded_image = "uploads/" . $unique_image;
      move_uploaded_file($file_temp, $uploaded_image);
      $img = $unique_image; // Cập nhật với hình ảnh mới
    }

    // Lấy ID bài viết mới nhất và tạo slug
    $latest_id_query = "SELECT id FROM `admin_baiviet` ORDER BY id DESC LIMIT 1";
    $latest_id_result = $this->db->select($latest_id_query);
    $latest_id = ($latest_id_result && $latest_id_result->num_rows > 0)
      ? $latest_id_result->fetch_assoc()['id']
      : 0;
    $slug .= '-' . ($latest_id);

    // Thực hiện truy vấn nếu các trường không rỗng
    if ($tieu_de && $id_benh && $id_khoa && $content &&  $title && $keyword && $description) {
      $query = "INSERT INTO admin_baiviet (title, slug, content, id_benh, id_khoa, created_at, tieu_de, keyword, descriptions, user_id, img, view)
                  VALUES ('$title', '$slug', '$content', '$id_benh', '$id_khoa', '$created_at', '$tieu_de', '$keyword', '$description', '" . Session::get('id') . "', '$img', 100)";
      $result = $this->db->insert($query);

      return $result
        ? ['status' => 'success', 'message' => 'Thêm bài viết thành công!']
        : ['status' => 'error', 'message' => 'Thêm bài viết thất bại!'];
    }

    return ['status' => 'error', 'message' => 'Tất cả các trường không được bổ trống!'];
  }

  public function delete_baiviet($id)
  {
    $query = "DELETE FROM admin_baiviet WHERE id = $id ";
    $result = $this->db->delete($query);
    if ($result) {
      return array('status' => 'success', 'message' => 'Xóa bài viết thành công!');
    } else {
      return array('status' => 'error', 'message' => 'Xóa bài viết thất bại!');
    }
  }


  public function getPaginationBaiViet($limit, $offset, $tieuDe, $IdBenh)
  {
    $tieuDe = mysqli_real_escape_string($this->db->link, $tieuDe);
    $IdBenh = mysqli_real_escape_string($this->db->link, $IdBenh);
    if ($tieuDe !== '' || $IdBenh !== '') {
      $query = "SELECT baiviet.*, user.user_name, user.email , 
      user.full_name,
      benh.name AS ten_benh,
        benh.id_khoa AS id_benh_khoa, 
        khoa.slug AS slug_khoa 
        FROM admin_baiviet baiviet 
        JOIN admin_user user ON baiviet.user_id = user.id
        JOIN admin_benh benh ON baiviet.id_benh = benh.id
       JOIN admin_khoa khoa ON benh.id_khoa = khoa.id
       WHERE baiviet.tieu_de LIKE '%$tieuDe%'";

      if (!empty($IdBenh)) {
        $query .= " AND benh.id = '$IdBenh'";
      }
      $query .= " ORDER BY baiviet.id DESC LIMIT $limit OFFSET $offset";
    } else {
      $query = "SELECT baiviet.*, user.user_name, user.email , 
      user.full_name,
      benh.name AS ten_benh,
        benh.id_khoa AS id_benh_khoa, 
        khoa.slug AS slug_khoa 
        FROM admin_baiviet baiviet 
        JOIN admin_user user ON baiviet.user_id = user.id
        JOIN admin_benh benh ON baiviet.id_benh = benh.id
       JOIN admin_khoa khoa ON benh.id_khoa = khoa.id
        ORDER BY baiviet.id DESC LIMIT $limit OFFSET $offset";
    }

    $result = $this->db->select($query);
    return $result;
  }

  public function getTotalCount($tieuDe, $IdBenh)
  {
    $tieuDe = mysqli_real_escape_string($this->db->link, $tieuDe);
    if ($tieuDe !== '' || $IdBenh !== '') {
      $query = "SELECT COUNT(*) AS total FROM admin_baiviet WHERE tieu_de LIKE '%$tieuDe%' ";
      if (!empty($IdBenh)) {
        $query .= " AND id_benh = '$IdBenh'";
      }
    } else {
      $query = "SELECT COUNT(*) AS total FROM admin_baiviet ";
    }

    $result = $this->db->select($query);
    $row = $result->fetch_assoc();
    return $row['total'];
  }

  public function getById_baiviet($id)
  {
    $id = mysqli_real_escape_string($this->db->link, $id);
    $query = "SELECT * FROM admin_baiviet WHERE id = '$id' LIMIT 1";
    $result = $this->db->select($query);
    return $result->fetch_assoc();
  }

  public function update_baiviet($data, $files, $id)
  {
    $tieu_de = mysqli_real_escape_string($this->db->link, $data['tieu_de']);
    $id_benh = mysqli_real_escape_string($this->db->link, $data['id_benh']);
    $id_khoa = mysqli_real_escape_string($this->db->link, $data['id_khoa']);
    $content = mysqli_real_escape_string($this->db->link, $data['content']);
    $title = mysqli_real_escape_string($this->db->link, $data['title']);
    $keyword = mysqli_real_escape_string($this->db->link, $data['keyword']);
    $description = mysqli_real_escape_string($this->db->link, $data['description']);
    $slug = mysqli_real_escape_string($this->db->link, $data['slug']);
    $selectedImage = mysqli_real_escape_string($this->db->link, $data['selectedImage']);



    // Xử lý hình ảnh nếu có
    $img = $selectedImage; // Mặc định là hình ảnh đã chọn trước đó
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
      $file_name = $_FILES['image']['name'];
      $file_temp = $_FILES['image']['tmp_name'];
      $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
      $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
      $uploaded_image = "uploads/" . $unique_image;
      move_uploaded_file($file_temp, $uploaded_image);
      $img = $unique_image; // Cập nhật với hình ảnh mới
    }

    if ($tieu_de !== '' && $id_benh !== '' && $content !== '') {


      if (empty($img)) {
        $query = "UPDATE admin_baiviet SET 
             tieu_de = '$tieu_de' ,
             id_benh = '$id_benh' ,
             id_khoa = '$id_khoa' ,
             content = '$content' ,
             title = '$title' ,
             keyword = '$keyword' ,
             descriptions = '$description' 
           WHERE id = '$id'";
      } else {
        $query = "UPDATE admin_baiviet SET 
        tieu_de = '$tieu_de' ,
        id_benh = '$id_benh' ,
        id_khoa = '$id_khoa' ,
        content = '$content' ,
        title = '$title' ,
        keyword = '$keyword' ,
        descriptions = '$description' ,
         img = '$img'
      WHERE id = '$id'";
      }
      $result = $this->db->update($query);


      if ($result) {
        return array('status' => 'success', 'message' => 'Cập nhật bài viết thành công!');
      } else {
        return array('status' => 'error', 'message' => 'Cập nhật bài viết thất bại!');
      }
    } else {
      return array('status' => 'error', 'message' => 'Các trường tiêu đề, chọn bênh, nội dung không được bổ trống!');
    }
  }

  //get danh sách bài viết  mới nhất
  public function getDSBaiVietNew($limit)
  {
    $query = "SELECT admin_baiviet.title, admin_baiviet.descriptions,
    khoa.name AS khoa_name
    FROM admin_baiviet
    JOIN admin_khoa khoa ON admin_baiviet.id_khoa = khoa.id
    ORDER BY admin_baiviet.id DESC LIMIT $limit";
    $result = $this->db->select($query);

    $data = [];
    if ($result) {
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
    }

    return $data;
  }

  // get danh sách bài viết liên quan 
  public function getDSBaiVietLienQuan($slug)
  {
    $query = "SELECT id_benh FROM admin_baiviet WHERE slug = '$slug' LIMIT 1 ";
    $result = $this->db->select($query);
    if ($result && $result->num_rows > 0) {
      $benh = $result->fetch_assoc();
      if ($benh) {
        $queryBaiviet = "SELECT * FROM `admin_baiviet` WHERE id_benh = '$benh[id_benh]' AND slug != '$slug' ORDER BY id DESC LIMIT 5 ";
        $resultBaiViet = $this->db->select($queryBaiviet);
        if ($resultBaiViet === false) {
          $benh['data'] = [];
          error_log("Query error: ");
        } else {
          $benh['data'] = [];
          while ($baiviet = $resultBaiViet->fetch_assoc()) {
            $benh['data'][] = $baiviet;
          }
        }
      }
      return $benh;
    } else {
      return 'slug không tồn tại';
    }
  }

  public function getBaiViet_bySlug($id)
  {
    $id = mysqli_real_escape_string($this->db->link, $id);
    $query = "SELECT baiviet.id, baiviet.title, baiviet.slug, baiviet.tieu_de, baiviet.id_benh,baiviet.id_khoa, baiviet.content,baiviet.img,baiviet.descriptions,baiviet.keyword,
    benh.name AS name_benh, 
    benh.id_khoa AS id_khoa, 
    khoa.name AS name_khoa 
    FROM admin_baiviet baiviet 
    JOIN admin_benh benh ON baiviet.id_benh = benh.id 
    JOIN admin_khoa khoa ON khoa.id = benh.id_khoa 
    WHERE baiviet.slug = '$id' 
    LIMIT 1";
    $result = $this->db->select($query);
    if ($result) {
      return $result->fetch_assoc();
    } else {
      return null;
    }
  }

  public function getBaiVietDauTienByBenh ($slug_benh){
   
    $slug_benh = mysqli_real_escape_string($this->db->link, $slug_benh);
    $querybenh = "SELECT * FROM admin_benh WHERE slug = '$slug_benh' LIMIT 1 ";
    $resultBenh = $this->db->select($querybenh);
    if($resultBenh){
      $benh = $resultBenh->fetch_assoc();
      $id = $benh['id'];
      $query = "SELECT baiviet.id, baiviet.title, baiviet.slug, baiviet.tieu_de, baiviet.id_benh,baiviet.id_khoa, baiviet.content, ,baiviet.img,baiviet.descriptions,baiviet.keyword,
      benh.name AS name_benh, 
      benh.id_khoa AS id_khoa, 
      khoa.name AS name_khoa 
      FROM admin_baiviet baiviet 
      JOIN admin_benh benh ON baiviet.id_benh = benh.id 
      JOIN admin_khoa khoa ON khoa.id = benh.id_khoa 
      WHERE baiviet.id_benh = '$id' ORDER BY baiviet.id DESC LIMIT 1";
      $result = $this->db->select($query);
      if ($result) {
        return $result->fetch_assoc();
      } else {
        return 'Hiện tại dữ liệu này chưa có bài viết!';
      }
    }
   
  }
}

?>