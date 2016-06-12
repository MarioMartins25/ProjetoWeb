<?php

class AuthController extends BaseController
{

    public function index(){
        $this->APP_Views->getView('auth.loginPage', ['Erro' => false]);
    }

    public function login(){

      $username = $_POST['username'];
      $password = md5($_POST['password']);

      $user = User::find_by_username_and_password($username, $password);

      if(!isset($user->id)){
        $this->APP_Views->getView('auth.loginPage', ['Erro' => true]);
      }else{
        session_start();
        $_SESSION['UserID'] = $user->id;
        $_SESSION['Permissoes'] = $user->permissoes;
        header('Location: ?route=dashboard&action=inicio');
      }
    }

    public function logout(){
      session_start();
      session_destroy();
      header('Location: ?route=auth&action=index');
    }

    public function registar(){
      $this->APP_Views->getView('auth.registar', ['Erro' => false]);
    }

    public function validar(){
      session_start();
      $primeiro_nome = ltrim(rtrim($_POST['primeiro_nome']));
      $ultimo_nome = ltrim(rtrim($_POST['ultimo_nome']));
      $email = ltrim(rtrim($_POST['email']));
      $password = ltrim(rtrim($_POST['password']));
      $repeat_password = ltrim(rtrim($_POST['repeat_password']));
      $username = ltrim(rtrim($_POST['username']));
      $data_nascimento = ltrim(rtrim($_POST['data_nascimento']));

      if($primeiro_nome != "" && $ultimo_nome != "" && $email != ""
        && $password != "" && $username != "" && $data_nascimento != "" &&
        $repeat_password != ""){
          if($password == $repeat_password){
            $user = new User();
            $user->primeiro_nome = $primeiro_nome;
            $user->ultimo_nome = $ultimo_nome;
            $user->username = $username;
            $user->password = md5($password);
            $user->email = $email;

            
            $user->data_nascimento = date("Y-m-d", strtotime($data_nascimento));

            if($user->save()){
              $_SESSION['Sucesso'] = 1;
            }else{
              $_SESSION["erro"] = 3;
            }
          }else{
            $_SESSION["erro"] = 2;
          }
        }else{
          $_SESSION["erro"] = 1;
        }

        header("Location: " . $_SERVER['HTTP_REFERER']);
    }

}
