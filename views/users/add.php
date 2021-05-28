<?php
use App\User;

require_once "../../vendor/autoload.php";

$database = new \App\Database();

//chuan bi cau lenh truy van
$sql = 'SELECT * FROM `groups`';

$stmt = $database->connect()->query($sql);
$result = $stmt->fetchAll();

$groups = [];
foreach ($result as $item) {
    $group = new \App\Group($item);
    $group->setId($item['id']);
    array_push($groups, $group);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //chuan bi cau lenh sql
    $sql = 'INSERT INTO `users`(`username`, `email`, `address`, `password`, `group_id`) VALUES (?,?,?,?,?)';
    $stmt = $database->connect()->prepare($sql);

    //gan du lieu
    $stmt->bindParam(1, $_REQUEST['username']);
    $stmt->bindParam(2, $_REQUEST['email']);
    $stmt->bindParam(3, $_REQUEST['address']);
    $password = $_REQUEST['password'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt->bindParam(4, $password_hash);
    $stmt->bindParam(5, $_REQUEST['group_id']);
    //thuc thi
    $stmt->execute();

    header('location: list.php');


}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>Group</td>
            <td>
                <select name="group_id" id="">
                    <?php foreach ($groups as $group): ?>
                        <option value="<?php echo $group->id ?>"><?php echo $group->name ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password"></td>

        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" name="address"></td>
        </tr>

        <tr>
            <td></td>
            <td>
                <button type="submit">Luu</button></td>
        </tr>
    </table>
</form>

</body>
</html>
