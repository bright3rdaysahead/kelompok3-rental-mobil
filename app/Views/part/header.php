<!DOCTYPE html>
<html lang="en">

<head>
    <style>
body {
    background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                      url('<?= base_url("file_gambar/unnamed.jpg") ?>');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    min-height: 100vh;
}

/* Membuat area konten utama lebih terbaca (Glassmorphism effect) */
.container-fluid.py-5, .container-fluid.pt-5 {
    background: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(5px);
    border-radius: 20px;
    margin-top: 20px;
    margin-bottom: 20px;
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
}

.full-page-hero {
    height: 100vh;
    display: flex;
    align-items: center;
}
</style>
    <meta charset="utf-8">
    <title>Rental Mobil - Aman Banget</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('template/lib/owlcarousel/assets/owl.carousel.min.css') ?>" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('template/css/style.css') ?>" rel="stylesheet">
</head>

<body>
    