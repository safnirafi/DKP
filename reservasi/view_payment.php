<?php
$imagePath = $_GET['imagePath'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Payment Proof</title>
    <style>
        /* CSS untuk styling gambar */
        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <img src="<?= $imagePath ?>" alt="Bukti Pembayaran">
</body>
</html>
