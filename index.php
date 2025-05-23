
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>IDIM</title>

    <!-- Bootstrap core CSS -->
    <<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style>
      html,
      body {
        height: 100%;
      }

      body {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
      }

      .form-signin .checkbox {
        font-weight: 400;
      }

      .form-signin .form-floating:focus-within {
        z-index: 2;
      }

      .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }

      .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

  </head>
  <body class="text-center">
    
    <main class="form-signin">
      <form action="controller/login.php" method="POST">
        <h1 class="h3 mb-3 fw-normal">Silahkan masuk</h1>

        <div class="form-floating">
          <input type="text" class="form-control" id="username" placeholder="nama pengguna" name="username">
          <label for="floatingInput">Nama Pengguna</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="password" placeholder="Password" name="password">
          <label for="floatingPassword">Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Masuk</button>
      </form>

      <?php 
          if(isset($_GET["sError"])) {
            echo '<div class="alert alert-danger" role="alert">';
            echo $_GET["sError"];
            echo "</div>";
          }
        ?>
    </main>

    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
