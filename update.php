<!-- ※データ受信、更新処理、SQLにデータ連携 -->
<?php
require_once('funcs.php');
$pdo = db_conn();

$name       = $_POST["name"];
$lid        = $_POST["lid"];
$lpw        = $_POST["lpw"];
$kanri_flg  = $_POST["kanri_flg"];
$life_flg   = $_POST["life_flg"];
$id         = $_POST["id"];

$stmt = $pdo->prepare(
    "UPDATE
        gs_user_table
    SET
        name =  :name,
        lid =  :lid,
        lpw =  :lpw,
        kanri_flg =  :kanri_flg,
        life_flg =  :life_flg
    WHERE
        id = :id
    ;"
);

$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);
$stmt->bindValue(':life_flg', $life_flg, PDO::PARAM_INT);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}