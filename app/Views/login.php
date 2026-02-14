<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in | Pink Automotive</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="stylesheet" href="<?= base_url('template/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700">

  <style>
    body, html {
      height: 100%;
      margin: 0;
      font-family: 'Poppins', sans-serif;
      overflow: hidden;
    }

    .login-container {
      display: flex;
      height: 100vh;
      width: 100%;
    }

    
    .login-right {
      flex: 1.5;
      background: linear-gradient(45deg, rgba(225, 133, 179, 0.41), rgba(0, 0, 0, 0.7)), 
                  url('<?= base_url("file_gambar/porsche.jpg") ?>'); /* Pastikan ekstensi filenya benar .jpg/.png */
      background-size: cover;
      background-position: center;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
    }

    /* SISI KIRI: GLASSMORPHISM AREA */
    .login-left {
      flex: 1;
      background: #df8f9c; /* Pink Base */
      background: linear-gradient(135deg, #df8f9c 0%, #da9fa6 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px;
      position: relative;
    }

    /* EFEK KACA (GLASSMORPHISM) */
    .glass-box {
      background: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(15px);
      -webkit-backdrop-filter: blur(15px);
      border-radius: 20px;
      border: 1px solid rgba(255, 255, 255, 0.3);
      padding: 40px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3);
      color: white;
    }

    .welcome-text h2 {
      font-weight: 700;
      margin-bottom: 5px;
      color: #fff;
    }

    .welcome-text p {
      color: rgba(255, 255, 255, 0.8);
      margin-bottom: 30px;
    }

    /* STYLING INPUT */
    .form-group label { color: white; font-weight: 400; }
    
    .form-control {
      background: rgba(255, 255, 255, 0.9) !important;
      border: none;
      height: 45px;
      border-radius: 10px;
      color: #333;
    }

    .btn-login {
      background: #c93e61;
      color: #fff;
      border: none;
      height: 45px;
      border-radius: 10px;
      font-weight: 600;
      margin-top: 20px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
      transition: 0.3s;
    }

    .btn-login:hover {
      background: #fff;
      color: #fdbeff;
      transform: scale(1.02);
    }

    .brand-logo h1 {
      font-size: 5rem;
      font-weight: 900;
      color: white;
      text-shadow: 0 10px 20px rgba(0,0,0,0.4);
      letter-spacing: 10px;
    }

    .brand-logo p {
      color: white;
      text-align: center;
      letter-spacing: 5px;
    }

    @media (max-width: 768px) {
      .login-right { display: none; }
    }
  </style>
</head>
<body>

<div class="login-container">
  
  <div class="login-left">
    <div class="glass-box">
      <div class="welcome-text">
        <h2>Welcome Back!</h2>
        <p>Sign in to continue your session</p>
      </div>

      <form action="login_action" method="post">
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" name="username" placeholder="Username" required>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        
        <button type="submit" class="btn btn-login btn-block">LOGIN NOW</button>
      </form>

      <div style="margin-top: 25px; text-align: center;">
        <a href="register" style="color: rgba(255,255,255,0.9); font-size: 13px;">Create new account? <b>Register</b></a>
      </div>
    </div>
  </div>

  <div class="login-right">
    <div class="brand-logo">
      <h1>AMAN BANGET</h1>
      <p>RENTAL MOBIL PALING AMAN DAN MUDAH</p>
    </div>
  </div>

</div>

</body>
</html>