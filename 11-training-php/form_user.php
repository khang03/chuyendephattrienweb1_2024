<?php
// Start the session
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$_id = NULL;
$error = '';

//hàm hoá/ giải id
function encodeID($params)
{
    return base64_encode($params);
}
function decodeID($encode_id)
{
    return base64_decode($encode_id);
}
//Giải mã id từ url
if (!empty($_GET['id'])) {
    $_id = decodeID($_GET['id']);
    $user = $userModel->findUserById($_id); //Update existing user
}




if (!empty($_POST['submit'])) {

    $validateName = $_POST['name'];
    $validatePassword = $_POST['password'];
    // kiểm tra có id
    if (!empty($_id) && !empty($_POST['name']) && !empty($_POST['password'])) {
        if (preg_match("/^[a-zA-Z0-9]{5,15}$/", $validateName) && preg_match("/^[a-zA-Z0-9!@#$%^&*()\-+=?]{5,15}$/", $validatePassword)) {
            $userModel->updateUser($_POST);
            header('location: list_users.php');
        } else {
            $error = 'Nhập thông tin hợp lệ (a-z, A-Z, 0-9)';
        }
    } else {
        $error = 'Yêu cầu nhập thông tin các trường đầy đủ ';
    }
    // kiểm tra ko có id thì thêm user mới
    if (empty($_id)) {

        if (preg_match("/^[a-zA-Z0-9]{5,15}$/", $validateName) && preg_match("/^[a-zA-Z0-9!@#$%^&*()\-+=?]{5,15}$/", $validatePassword)) {
            $userModel->insertUser($_POST);
            header('location: list_users.php');
        } else {
            $error = 'Nhập thông tin hợp lệ (a-z, A-Z, 0-9)';
        }
    }else {
        $error = 'Yêu cầu nhập thông tin các trường đầy đủ ';
    }
} 





//     //Xử lí pass

//     if(empty($_POST['password'])){
//         $errors['password'] = 'vui lòng nhập mật khẩu!';

//     }else if(!preg_match('/^[A-Za-z0-9]{5,15}$/', $_POST['password'])){
//         $errors['password'] = 'Vui lòng nhập đúng điều kiện(chỉ nhập chữ cái và chữ số)!';
//     }elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()])[A-Za-z\d~!@#$%^&*()]{5,10}$/', $_POST['password'])){
//         $errors['password'] = "Mật khẩu phải chứa ít nhất một ký tự đặc biệt (~!@#$%^&*()).";
//     }
// }








?>
<!DOCTYPE html>
<html>

<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>

<body>
    <?php include 'views/header.php' ?>
    <div class="container">

        <?php if ($user || !isset($_id)) { ?>
            <div class="alert alert-warning" role="alert">
                User form
            </div>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $_id ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <?php echo '<p class="text-danger">' . $error . '</p>' ?>

                    <input class="form-control" name="name" placeholder="Name" value='<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>'>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <?php echo '<p class="text-danger">' . $error . '</p>' ?>

                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>

                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
            </form>
        <?php } else { ?>
            <div class="alert alert-success" role="alert">
                User not found!
            </div>
        <?php } ?>
    </div>
</body>

</html>