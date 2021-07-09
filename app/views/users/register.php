
<!DOCTYPE html>
<html>
<head>
<title>Registration Form</title>
<meta charset="utf-8">
</head>

<body>


<form action="action_page.php">
  <div class="container">
    <h1>Registrate</h1>
    <hr>

    <label for="user"><b>Usuario</b></label>
    <input type="text" placeholder="Entra un usuario" name="usuario" id="usuario" required>
    <span class="invalidFeedback">
                <?php echo $data['usernameError']; ?>
            </span>

    <label for="name"><b>Nombre</b></label>
    <input type="text" placeholder="Entra tu nombre" name="name" id="name" required>
    <span class="invalidFeedback">
                <?php echo $data['nameError']; ?>
            </span>

    <label for="apellido"><b>Apellido</b></label>
    <input type="text" placeholder="Entra tu apellido" name="apellido" id="apellido" required>
    <span class="invalidFeedback">
                <?php echo $data['apellidoError']; ?>
            </span>
    <label for="autor"><b>Autor</b></label>
    <input type="text" placeholder="Autor" name="autor" id="autor" required>
    <span class="invalidFeedback">
                <?php echo $data['autorError']; ?>
            </span>


    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>
    <span class="invalidFeedback">
                <?php echo $data['emailError']; ?>
            </span>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
    <span class="invalidFeedback">
                <?php echo $data['passwordError']; ?>
            </span>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
    <hr>
    <span class="invalidFeedback">
                <?php echo $data['confirmPasswordError']; ?>
            </span>

    <button type="submit" class="registerbtn">Registrate</button>
  </div>

  <div class="container signin">
  <p class="options">Estas registrado? <a href="<?php echo URLROOT; ?>/users/login">Ingresa a tu cuenta</a></p>

  </div>

</body>
</html>