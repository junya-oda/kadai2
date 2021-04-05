<!-- ④管理ユーザーを削除（削除処理） -->
<?php
require_once('funcs.php');
$pdo = db_conn();

$id = $_GET["id"];

$stmt = $pdo->prepare('DELETE FROM gs_user_table WHERE id = :id;');

$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}