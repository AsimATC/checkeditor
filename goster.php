<?php include "db.php" ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php 

$sorgu = $db->prepare("SELECT * FROM metin");
$sorgu->execute(array());

$yaz=$sorgu->fetchAll();

foreach ($yaz as $write) {
    echo $write['icerik'] ."<hr>";
}

?>

</body>
</html>