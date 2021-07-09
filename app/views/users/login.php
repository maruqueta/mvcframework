<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Signin Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
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

    
    <!-- Custom styles for this template -->
    <link href=".../public/css/login.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form action="<?php echo URLROOT; ?>/users/login" method = "POST">
    <h1 class="h3 mb-3 fw-normal">Iniciar Sesion</h1>
    
    <div class="form-floating">
      <input type="username" class="form-control" id="floatingname" placeholder="name@example.com">
      <label for="floatingname">Nombre de usuario</label>
      <span class="invalidFeedback">
                <?php echo $data['usernameError']; ?>
            </span>
    </div>
    
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Contraseña</label>
      <span class="invalidFeedback">
                <?php echo $data['passwordError']; ?>
            </span>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
    <p class="options">Aun no estas registrado? <a href="<?php echo URLROOT; ?>/users/register">Crea una cuenta</a></p>
  </form>
</main>


    
  </body>
</html>
