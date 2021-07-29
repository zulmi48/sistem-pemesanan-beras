<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v4.1.1">
  <title>UD. Ndaru Sri Jaya</title>
  <!-- Bootstrap core CSS -->
  <link href="assets\css\bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="assets\css\signin.css" rel="stylesheet">
</head>

<body class="text-center">
  <form class="form-signin" action="proses_login.php" method="post">
    <?php
    error_reporting(0);
    if ($_GET['alert']): ?>
    <div class="alert alert-danger">
      <strong>GAGAL!</strong> <?php echo $_GET['alert'] ?>
    </div>
    <?php endif; ?>
    <img class="mb-4" src="assets\img\login_logo.png" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Log In</h1>
    <input type="text" name="username" value="" class="form-control" placeholder="Nama Pengguna" required autofocus>
    <input type="password" name="password" value="" class="form-control" placeholder="Kata Sandi" required>
    <br>
    <input type="submit" name="login" value="Masuk" class="btn btn-lg btn-primary btn-block">
    <p class="mt-5 mb-3 text-muted">&copy; Ndaru Sri Jaya <?php echo date('Y') ?></p>
  </form>
</body>

</html>
