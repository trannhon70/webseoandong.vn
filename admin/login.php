<?php
include '../classes/user.php';
Session::checkLogin();
?>
<?php
$class = new users();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = $_POST['user_name'];
    $password = md5($_POST['password']);
    $login_check = $class->login_user($user_name, $password);
}

$local ='http://localhost/_andong/webseoandong.vn'
// $local ='https://www.vnbacsionline.com'
?>

<!DOCTYPE html>
<html>

<head>
    <title>Đăng nhập</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="Phòng khám chuyên khoa">
    <meta name="google-site-verification" content="BcfKZyCch1ub8p7xuoJRoiY8YIxrqDIWOoSGCC-xZdc" />
    <link rel="icon" href="<?php echo $local ?>/images/icons/icon_logocm.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <style>
        .btn-color {
            background-color: #0e1c36;
            color: #fff;
        }
        .profile-image-pic {
            height: 200px;
            width: 200px;
            object-fit: cover;
        }
        .cardbody-color {
            background-color: #ebf2fa;
        }
        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-dark mt-5">VN Bác sĩ</h2>
                <div class="text-center mb-5 text-dark">Đăng nhập</div>
                <div class="card my-5">
                    <form method="POST" action="login.php" class="card-body cardbody-color p-lg-5">

                        <div class="text-center">
                            <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                                width="200px" alt="profile">
                        </div>
                        <span style="color:red;" ><?php
                                                if (isset($login_check)) {
                                                    echo $login_check;
                                                }
                                                ?></span>
                        <div class="mb-3">
                            <input type="text" name="user_name" class="form-control" id="Username" aria-describedby="emailHelp"
                                placeholder="User Name">
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" id="password" placeholder="password">
                        </div>
                        <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100">Login</button></div>
                        <div id="emailHelp" class="form-text text-center mb-5 text-dark">Not
                            Registered? <a href="#" class="text-dark fw-bold"> Create an
                                Account</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
   
</body>

</html>