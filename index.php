<?php include "db.php" ?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* CSS */
        .button-5 {
            align-items: center;
            background-clip: padding-box;
            background-color: #fa6400;
            border: 1px solid transparent;
            border-radius: .25rem;
            box-shadow: rgba(0, 0, 0, 0.02) 0 1px 3px 0;
            box-sizing: border-box;
            color: #fff;
            cursor: pointer;
            display: inline-flex;
            font-family: system-ui, -apple-system, system-ui, "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 16px;
            font-weight: 600;
            justify-content: center;
            line-height: 1.25;
            margin: 0;
            min-height: 3rem;
            padding: calc(.875rem - 1px) calc(1.5rem - 1px);
            position: relative;
            text-decoration: none;
            transition: all 250ms;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            vertical-align: baseline;
            width: auto;
        }

        .button-5:hover,
        .button-5:focus {
            background-color: #fb8332;
            box-shadow: rgba(0, 0, 0, 0.1) 0 4px 12px;
        }

        .button-5:hover {
            transform: translateY(-1px);
        }

        .button-5:active {
            background-color: #c85000;
            box-shadow: rgba(0, 0, 0, .06) 0 2px 4px;
            transform: translateY(0);
        }
    </style>
</head>

<body>

    <?php
    if ($_POST) {
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";

        $icerik1 = $_POST["aciklama"];


        // Veri tabanına kaydetme
        $ekle = $db->prepare("INSERT INTO metin SET
            icerik = :icerik
        ");

        $kontrol = $ekle->execute(array(
            "icerik" => $icerik1,
        ));

        if ($kontrol) {
            echo "kaydetti";
        } else {
            echo "kaydetmedi";
        }
    } else {
    }

    ?>


    <form action="" method="POST">

        <?php

        include("ckeditor/ckeditor.php");

        $ckeditor = new CKEditor();

        //ckeditor klasörümüz eğer klasörümüz aynıysa değiştirmeyelim

        $ckeditor->basePath = 'ckeditor/';

        //Ckfinder ile ilgili değişkenler eğer dosya ve klasör isimlerinde değişiklik yoksa aynen devam edelim

        $ckeditor->config['filebrowserBrowseUrl'] = 'ckfinder/ckfinder.html';

        $ckeditor->config['filebrowserImageBrowseUrl'] = 'ckfinder/ckfinder.html?type=Images';

        $ckeditor->config['filebrowserImageUploadUrl'] = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';

        //ckeditor temamız daha fazlası için ckeditor/skins klasörüne bakın

        $ckeditor->config['skin'] = 'office2003';

        //Editör genişlik değerimiz

        $ckeditor->config['width'] = 1200;

        //aciklama name yine sahip textarea oluşturuyor

        @$ckeditor->editor('aciklama', $aciklama);

        ?>


        <button class="button-5" role="button">Gönder</button>
    </form>
</body>

</html>