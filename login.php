<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <div class="container">
        <div class="forms-container">
          <div class="signin-signup">

            <!-- LOGIN -->
            <form action="loginKoneksi.php" method="POST" class="sign-in-form">
              <h2 class="title">Sign In</h2>
              <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username" name="username"/>
              </div>
              <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" name="password"/>
              </div>
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
              </div>
              <!-- <input type="submit" value="Login" class="btn solid" /> -->
            </form>
          </div>
        </div>

        <div class="panels-container">
          <div class="panel left-panel">
              <div class="content">
                  <h3>Landing Page</h3>
                  <p>Kembali ke landing page untuk melihat informasi pameran dan artikel budaya terbaru!</p>
                  <a href="index.php"><button class="btn transparent" id="sign-in-btn">Landing Page</button></a>
              </div>
              <img src="./img/log.svg" class="image" alt="">
          </div>
        </div>
      </div>
  
      <script src="./js/login.js"></script>
</body>
</html>
