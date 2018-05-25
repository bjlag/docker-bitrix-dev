<?php
if ( isset( $_GET[ 'phpinfo' ] ) && $_GET[ 'phpinfo' ] == 'y' ) {
    phpinfo();
    exit();
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Docker Bitrix Dev</title>
</head>
<body>

<h1>Docker Bitrix Dev</h1>
<p>
    <a href="/?phpinfo=y" target="_blank">PHP info</a>
</p>
<p>
    Полезные скрипты:
</p>
<ul>
    <li><a href="http://www.1c-bitrix.ru/download/scripts/bitrixsetup.php">bitrixsetup.php</a></li>
    <li><a href="http://www.1c-bitrix.ru/download/scripts/restore.php">restore.php</a></li>
    <li><a href="http://dev.1c-bitrix.ru/download/scripts/bitrix_server_test.php">bitrix_server_test.php</a></li>
</ul>

</body>
</html>