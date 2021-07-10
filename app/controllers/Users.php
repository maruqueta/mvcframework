<?php
class Users extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function register() {
        $data = [
            'username' => '',
            'name' => '',
            'apellido' => '',
            'autor' => '',
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'usernameError' => '',
            'nameError' => '',
            'apellidoError' => '',
            'autorError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
        ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
       
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              $data = [
                'username' => trim($_POST['username']),
                'name' => trim($_POST['name']),
                'apellido' => trim($_POST['apellido']),
                'autor' => trim($_POST['autor']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'usernameError' => '',
                'nameError' => '',
                'apellidoError' => '',
                'autorError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];

            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

        
            if (empty($data['username'])) {
                $data['usernameError'] = 'Ingresa tu nombre de usuario';
            } elseif (!preg_match($nameValidation, $data['username'])) {
                $data['usernameError'] = 'El nombre solo puede tener letras y numeros';
            }

        
            if (empty($data['email'])) {
                $data['emailError'] = 'Ingresa tu email';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Ingresa tu email en el formato correcto';
            } else {
                //Check if email exists.
                if ($this->userModel->findUserByEmail($data['email'])) {
                $data['emailError'] = 'Email ya esta siendo usado.';
                }
            }

        
            if(empty($data['password'])){
              $data['passwordError'] = 'Ingresa tu contraseña.';
            } elseif(strlen($data['password']) < 6){
              $data['passwordError'] = 'El password tiene que tener 8 caracteres';
            } elseif (preg_match($passwordValidation, $data['password'])) {
              $data['passwordError'] = 'La contraseña tiene que tener al menos un numero.';
            }

        
             if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Entra tu contraseña';
            } else {
                if ($data['password'] != $data['confirmPassword']) {
                $data['confirmPasswordError'] = 'Las contraseñas no coinciden';
                }
            }


            if (empty($data['usernameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        
                if ($this->userModel->register($data)) {
                   
                    header('location: ' . URLROOT . '/users/login');
                } else {
                    die('Algo no funciono');
                }
            }
        }
        $this->view('users/register', $data);
    }

    public function login() {
        $data = [
            'username' => '',
            'password' => '',
            'usernameError' => '',
            'passwordError' => ''
        ];

        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'usernameError' => '',
                'passwordError' => '',
            ];
           
            if (empty($data['username'])) {
                $data['usernameError'] = 'Ingresa tu nombre de usuario.';
            }

           
            if (empty($data['password'])) {
                $data['passwordError'] = 'Ingresa tu contraseña.';
            }

           
            if (empty($data['usernameError']) && empty($data['passwordError'])) {
                $loggedInUser = $this->userModel->login($data['username'], $data['password']);

                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['passwordError'] = 'Usuario o contraseña incorrecto';

                    $this->view('users/login', $data);
                }
            }

        } else {
            $data = [
                'username' => '',
                'password' => '',
                'usernameError' => '',
                'passwordError' => ''
            ];
        }
        $this->view('users/login', $data);
    }

    public function createUserSession($user) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['username'] = $user->username;
        $_SESSION['autor'] = $user->autor;
        $_SESSION['email'] = $user->email;
        header('location:' . URLROOT . '/pages/index');
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['autor']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        header('location:' . URLROOT . '/users/login');
    }
}