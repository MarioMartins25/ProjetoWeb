<?php


class DashboardController extends BaseController
{
  	private $user_ativo;

    public function verificarSessao(){
      session_start();
      if(!isset($_SESSION['UserID'])){
        if(isset($_SESSION))
          unset($_SESSION);
        header('Location: ?route=auth&action=logout');

      }
      $user = new User();
      $user = $user::find($_SESSION['UserID']);
      $this->user_ativo['nome'] = $user->primeiro_nome. " " .$user->ultimo_nome;
      $this->user_ativo['permissoes'] = $user->permissoes;
      $this->user_ativo['nr_users'] = count(User::find_all_by_ativo(1));
    }

    public function index(){
      //TOP 10
      $this->verificarSessao();

      $this->APP_Views->getView('dashboard.index', ['user' => $this->user_ativo]);
    }

    public function adicionarUser(){
      $this->verificarSessao();

      $this->APP_Views->getView('dashboard.adicionarUtilizador', ['user' => $this->user_ativo]);
    }

    public function listaClientes(){
      $this->verificarSessao();

      $lista = User::find_all_by_ativo(1);

      $this->APP_Views->getView('dashboard.listaClientes', ['user' => $this->user_ativo, 'users' => $lista]);
    }

    public function novaPalavra(){
      $this->verificarSessao();

      $this->APP_Views->getView('dashboard.novaPalavra', ['user' => $this->user_ativo]);

    }

    public function perfil(){
      $this->verificarSessao();

      $this->APP_Views->getView('dashboard.perfil', ['user' => $this->user_ativo]);
    }

    public function adicionarPalavra(){
      $this->verificarSessao();

      try {
        if(ltrim(rtrim($_POST['palavra'])) != ""){

          $palavra = new Palavra();

          $palavra->nome = $_POST['palavra'];
          $palavra->categoria = $_POST['categoria'];

          if($palavra->save()){
            $_SESSION['sucesso'] = 1;
          }else{
            $_SESSION['erro'] = 3;
          }
        }else{
          $_SESSION['erro'] = 1;
        }

      } catch (Exception $e) {
        $_SESSION['erro'] = 2;
      }

      header("Location: " . $_SERVER['HTTP_REFERER']);

    }

    public function listaPalavras(){
      $this->verificarSessao();

      $lista = Palavra::find_all_by_ativo(1);

      $this->APP_Views->getView('dashboard.listaPalavras', ['user' => $this->user_ativo, 'palavras' => $lista]);
    }

    public function dicasPalavras(){
      $this->verificarSessao();


      $listaPalavras = Palavra::find_all_by_ativo(1);
      $listaDicas = Dica::find_all_by_ativo(1);

      $this->APP_Views->getView('dashboard.dicasPalavras', ['user' => $this->user_ativo, 'palavras' => $listaPalavras, 'dicas' => $listaDicas]);
    }

    public function verDicas(){
      $this->verificarSessao();
      $dicasPalavra = Palavras_dica::find_all_by_palavras_id($_POST['palavra']);
      $string = "";


      foreach($dicasPalavra as $dica){
        $nome = Dica::find_by_id($dica->dicas_id);
        $string .= '<option value="'.$dica->dicas_id.'" disabled="">'.$nome->nome.'</option>';
      }

      echo $string;
    }

    public function bonito($var){
      echo "<pre>";
      echo var_dump($var);
      echo "</pre>";
      die();
    }

    public function novaDica(){
      $this->verificarSessao();

      $this->APP_Views->getView('dashboard.novaDica', ['user' => $this->user_ativo]);
    }

    public function guardarDica(){
      $this->verificarSessao();

      try {
        if(ltrim(rtrim($_POST['dica'])) != ""){

          $dica = new Dica();

          $dica->nome = $_POST['dica'];

          if($dica->save()){
            $_SESSION['sucesso'] = 1;
          }else{
            $_SESSION['erro'] = 3;
          }
        }else{
          $_SESSION['erro'] = 1;
        }

      } catch (Exception $e) {
        $_SESSION['erro'] = 2;
      }

      header("Location: " . $_SERVER['HTTP_REFERER']);

    }

    public function listaDicas(){
      $this->verificarSessao();

      $lista = Dica::find_all_by_ativo(1);

      $this->APP_Views->getView('dashboard.listaDicas', ['user' => $this->user_ativo, 'dicas' => $lista]);
    }

    public function guardarDicaPalavra(){
      $this->verificarSessao();


      foreach ($_POST['to'] as $id_dica => $valor) {
        $palavraHasDica = new Palavras_dica();

        $palavraHasDica->palavras_id = $_POST['palavra'];
        $palavraHasDica->dicas_id = $valor;
        try{
          if($palavraHasDica->save()){
            $_SESSION['sucesso'] = 1;
          }else{
            $_SESSION['erro'] = 4;
          }
        }catch(Exception $e){
          $_SESSION['erro'] = 1;
        }
      }

      header("Location: " . $_SERVER['HTTP_REFERER']);

    }

    public function eliminarCliente(){
      $this->verificarSessao();

      $user = User::find_by_id($_POST['user_id']);

      $user->ativo = 0;
      $user->save();

      $_SESSION['UserEliminado'] = 1;

      header("Location: router.php?route=dashboard&action=listaClientes");
    }

    public function eliminarDica(){
      $this->verificarSessao();

      $dica = Dica::find_by_id($_POST['dica_id']);

      $dica->ativo = 0;
      $dica->save();

      $_SESSION['DicaEliminada'] = 1;

      header("Location: router.php?route=dashboard&action=listaDicas");
    }

    public function eliminarPalavra(){
      $this->verificarSessao();

      $palavra = Palavra::find_by_id($_POST['palavra_id']);

      $palavra->ativo = 0;
      $palavra->save();

      $_SESSION['PalavraEliminada'] = 1;

      header("Location: router.php?route=dashboard&action=listaPalavras");
    }

    public function editarEmail(){

      echo "ABC";
    }
}
