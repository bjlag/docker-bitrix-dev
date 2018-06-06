<?php

ini_set( 'display_errors', 'off' );

$error = false;
$message = '';

if ( isset( $_GET[ 'action' ] ) ) {
    switch ( $_GET[ 'action' ] ) {
        case 'phpinfo': {
            phpinfo();
            exit();
            break;
        }

        case 'restore': {
            $path = $_SERVER[ 'DOCUMENT_ROOT' ] . DIRECTORY_SEPARATOR . 'restore.php';
            $url = 'http://www.1c-bitrix.ru/download/scripts/restore.php';

            if ( !file_exists( $path ) ) {
                $data = file_get_contents( $url );
                if ( $data === false || file_put_contents( $path, $data ) === false ) {
                    $error = true;
                }
            }

            if ( !$error ) {
                header( 'Location: http://' . $_SERVER[ 'HTTP_HOST' ] . '/restore.php' );
                exit();
            } else {
                $message = 'Не удалось получить файл restore.php';
            }

            break;
        }
    }
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
<div>
    <?= $message ?>
</div>

<p>
    <a href="/?action=phpinfo" target="_blank">PHP info</a><br>
    <a href="/?action=restore">Восстановить 1С-Битрикс</a>
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