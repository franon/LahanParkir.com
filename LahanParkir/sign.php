<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign Now</title>
    <link rel="stylesheet" href="source/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="source/css/bootstrap.min.css.map">
    <link rel="stylesheet" href="source/css/styleSign.css">
  </head>
  <body>
    <div class="sign-form">
      <div class="row sign-logo">
        <div class="col-md-3 text-center">
          <a href="../LahanParkir/">
            <strong>LahanParkir.com</strong>
          </a>
        </div>
        <div class="col-md-6"></div>
        <div class="col-md-3 text-center">
          <a href="../LahanParkir/">
            <strong>Kembali ke HomePage</strong>
          </a>
        </div>
      </div>
      <h1 class="text-center">Login</h1>
      <small class="text-center">Sudah punya akun ? Silahkan login...</small>
      <div class="row container-form-signin">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <form id="signin" action="index.html" method="post">
            <div class="form-group">
              <input class="form-control" type="text" name="username" placeholder="Username">
            </div>
            <div class="form-group">
              <input class="form-control" type="password" name="password" placeholder="Password">
              <small class="show-password text-center"><label for="show-password">Show Password </label>
              <input id="show-password" type="checkbox" name="show-password"> </small>
            </div>
            <div class="form-group text-center">
              <input class="btn btn-primary" type="submit" name="signin" value="Login">
            </div>
          </form>
        </div>
        <div class="col-md-3"></div>
      </div><br><br>
      <div class="text-center row">
        <div class="col-md-3"></div>
        <a class="col-md-3" href="lupa_password.php"><small>Lupa Password ?</small></a>
        <a class="col-md-3"  href="sign.php?r=signup"><small>Belum Daftar ? Klik di sini ..</small></a>
        <div class="col-md-3"></div>
      </div>
    </div>
    <script src="source/js/jquery-3.3.1.min.js"></script>
    <script src="source/js/popper.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="source/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script defer src="source/js/fontawesome-all.min.js"></script>
  </body>
</html>
