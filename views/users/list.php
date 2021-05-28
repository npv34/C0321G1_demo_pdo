<?php

use App\Model\UserDB;

require_once "../../vendor/autoload.php";

$userDb = new UserDB();
$users = $userDb->getAll();

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
<div class="container">
    <a href="add.php">Them moi</a>
    <table width="300">
        <tr>
            <td>STT</td>
            <td>Username</td>
            <td>Email</td>
            <td>Address</td>
            <td>Group</td>
        </tr>

        <?php foreach ($users as $key => $user): ?>
            <tr>
                <td><?php echo $key + 1 ?></td>
                <td><?php echo $user->username ?></td>
                <td><?php echo $user->email ?></td>
                <td><?php echo $user->address ?></td>
                <td><?php echo $user->group ?></td>
            </tr>

        <?php endforeach; ?>
    </table>
</div>
</body>
</html>

