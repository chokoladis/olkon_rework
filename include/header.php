<?
require_once $_SERVER['DOCUMENT_ROOT'].'/config/main.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">

    <title><?=$builder->titlePage?></title>
    <?php
        foreach ($builder->assetsHead  as $asset) {
            echo $asset;
        }
    ?>
</head>
<body>