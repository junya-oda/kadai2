<!-- ③管理ユーザーを変更（更新画面、更新処理） -->
<?php
require_once('funcs.php');
$pdo = db_conn();
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM gs_user_table WHERE id =' . $id . ';');
$status = $stmt->execute();

if ($status == false) {
    sql_error($status);
} else {
    $result = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ一覧</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <!-- <form method="POST" action="insert.php"> -->
    <form method="POST" action="Update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>会員詳細</legend>
                <label>名前：<input type="text" name="name" value="<?= $result['name'] ?>"></label><br>
                <label>ID：<input type="text" name="lid" value="<?= $result['lid'] ?>"></label><br>
                <label>PW：<input type="password" name="lpw" value="<?= $result['lpw'] ?>"></label><br>
                <!-- <label>管理者：<input type="checkbox" name="kanri_flg"></label><br> -->
                <!-- □ 上記にするために、まず分かりやすく以下のように数字で表記の切り替えを行う -->
                <label>管理者：<input type="number" name="kanri_flg" value="<?= $result['kanri_flg'] ?>" min="0" max="1"></label><br>
                <label>退職者：<input type="number" name="life_flg" value="<?= $result['life_flg'] ?>" min="0" max="1"></label><br>
                <input type="hidden" name="id" value="<?= $result['id'] ?>">
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</body>

</html>
