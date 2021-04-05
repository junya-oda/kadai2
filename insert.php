<!-- ※データ受信、SQLにデータ連携 -->
<?php
require_once('funcs.php');
$pdo = db_conn();

$name       =   $_POST["name"];
$lid        =   $_POST["lid"];
$lpw        =   $_POST["lpw"];
$kanri_flg  =   $_POST["kanri_flg"];

$stmt = $pdo->prepare("INSERT INTO gs_user_table(name,lid,lpw,kanri_flg)VALUES(:name,:lid,:lpw,:kanri_flg)");

$stmt->bindValue(':name', h($name), PDO::PARAM_STR);
$stmt->bindValue(':lid', h($lid), PDO::PARAM_STR);
$stmt->bindValue(':lpw', h($lpw), PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg', h($kanri_flg), PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}