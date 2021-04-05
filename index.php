<!-- ①管理ユーザーを追加（登録画面、登録処理） -->
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

    <form method="POST" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>ユーザー登録</legend>
                <label>名前：<input type="text" name="name"></label><br>
                <label>ID：<input type="text" name="lid"></label><br>
                <label>PW：<input type="password" name="lpw"></label><br>
                <!-- <label>管理者：<input type="checkbox" name="kanri_flg"></label><br> -->
                <!-- □ 上記にするために、まず分かりやすく以下のように数字で表記の切り替えを行う -->
                <label>管理者：<input type="number" name="kanri_flg"></label><br>
                <input type="submit" value="登録">
            </fieldset>
        </div>
    </form>
</body>

</html>
