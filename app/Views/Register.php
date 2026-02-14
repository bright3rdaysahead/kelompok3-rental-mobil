<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Register | Aman Banget</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="stylesheet" href="<?= base_url('template/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700">

  <style>
    body, html {
      height: 100%;
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #fdf2f8; /* Background Pink Soft */
      display: flex;
      flex-direction: column;
    }

    /* HEADER */
    .site-header {
      background: #fff;
      padding: 15px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
    }
    .brand-logo h1 { font-size: 22px; font-weight: 800; margin: 0; color: #333; }
    .brand-logo span { color: #ff1493; }

    /* WRAPPER TENGAH */
    .main-content {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      padding-top: 80px;
      padding-bottom: 60px;
    }

    /* CARD STYLE */
    .register-card {
      background: #fff;
      border-radius: 20px;
      padding: 40px;
      width: 100%;
      max-width: 450px;
      box-shadow: 0 15px 35px rgba(255, 20, 147, 0.1);
      border: 1px solid rgba(255, 20, 147, 0.1);
    }

    .section-title {
      font-weight: 700;
      color: #333;
      margin-bottom: 30px;
      text-align: center;
    }
    .section-title span {
      border-bottom: 3px solid #ff1493;
      padding-bottom: 5px;
    }

    /* FORM STYLING */
    .control-group { margin-bottom: 20px; }
    .form-control {
      height: 45px;
      border-radius: 10px;
      border: 1.5px solid #eee;
      padding-left: 15px;
      transition: 0.3s;
    }
    .form-control:focus {
      border-color: #ff1493;
      box-shadow: 0 0 0 3px rgba(255, 20, 147, 0.1);
    }

    .btn-register {
      background: #ff1493;
      color: white;
      border: none;
      padding: 12px;
      width: 100%;
      border-radius: 10px;
      font-weight: 600;
      transition: 0.3s;
      box-shadow: 0 4px 12px rgba(255, 20, 147, 0.3);
    }
    .btn-register:hover {
      background: #d8117d;
      transform: translateY(-2px);
      color: white;
    }

    /* FOOTER */
    .site-footer {
      background: #fff;
      padding: 20px;
      text-align: center;
      border-top: 1px solid #eee;
      color: #888;
      font-size: 12px;
    }
  </style>
</head>
<body>
  <div class="main-content">
    <div class="register-card">
      <div class="text-center mb-4">
        <h2 class="section-title"><span>Register</span></h2>
      </div>

      <div class="contact-form">
        <div id="success"></div>
        <form name="sentMessage" method="post" action="register/simpan" id="contactForm" novalidate="novalidate">
          
          <div class="control-group">
            <input type="text" class="form-control" name="username" id="username" placeholder="Username"
              required="required" data-validation-required-message="Please enter username" />
            <p class="help-block text-danger"></p>
          </div>

          <div class="control-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Your password"
              required="required" data-validation-required-message="Please enter your password" />
            <p class="help-block text-danger"></p>
          </div>

          <div>
            <button class="btn btn-register py-2 px-4" type="submit" id="sendMessageButton">Register Now</button>
          </div>

        </form>
      </div>
      
      <p class="text-center mt-4" style="font-size: 13px; color: #888;">
        Sudah punya akun? <a href="<?= base_url('login') ?>" style="color: #ff1493; font-weight: 600;">Masuk di sini</a>
      </p>
    </div>
  </div>
</body>
</html>