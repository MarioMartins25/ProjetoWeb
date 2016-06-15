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

      $foto = Fotos_perfi::find_by_user_id($_SESSION['UserID'], array('order' => 'data desc'));

      $this->user_ativo['foto'] = ($foto == NULL)? "user.png" : "".$foto->url;

    }

    public function index(){
      //TOP 10
      $this->verificarSessao();

      $jogos = Jogo::find_all_by_terminado(1);

      $tabela = array();
      $j = 0;
      $nr = 0;
      foreach($jogos as $jogo){
        $jogadas = Jogada::find_all_by_jogo_id($jogo->id);
        $palavra = Palavra::find_by_id($jogo->palavras_id);
        $palavra = $palavra->nome;
        $vidas = 0; //a.k.a letras jogadas
        $aux = 0;
        $pontuacao = 0;

        foreach($jogadas as $key => $letra_jogadas){
          for($i = 0; $i < strlen($palavra); $i++){
            if($letra_jogadas->letra == strtoupper($palavra[$i])){
              $aux++;
            }
          }
          if($aux == 0){
            $vidas++; //nao houve acerto da jogada
          }
          $aux = 0;
        }

        switch($vidas){
          case 0:
            $pontuacao = 6;
          break;
          case 1:
            $pontuacao = 5;
          break;
          case 2:
            $pontuacao = 4;
          break;
          case 3:
            $pontuacao = 3;
          break;
          case 4:
            $pontuacao = 2;
          break;
          case 5:
            $pontuacao = 1;
          break;
          case 6:
            $pontuacao = 0;
          break;
        }

        $igual = false;

        if($j == 0){
          $tabela[0]['user_id'] = $jogo->user_id;
          $tabela[0]['pontuacao'] = $pontuacao;
          $nome_user = User::find_by_id($jogo->user_id);
          $tabela[0]['nome'] = $nome_user->primeiro_nome . " " . $nome_user->ultimo_nome;

        }else{
          $nr = count($tabela);
          for($k = 0; $k < $nr; $k++){
            if(!$igual){
              if($tabela[$k]['user_id'] == $jogo->user_id){
                $tabela[$k]['pontuacao'] += $pontuacao;
                $igual = true;
              }
            }
          }
        }

        if(!$igual){
          $tabela[$nr]['user_id'] = $jogo->user_id;
          $nome_user = User::find_by_id($jogo->user_id);
          $tabela[$nr]['nome'] = $nome_user->primeiro_nome . " " . $nome_user->ultimo_nome;
          $tabela[$nr]['pontuacao'] = $pontuacao;
        }
        $j++;
      }

      for($i = 0; $i < count($tabela); $i++){
        $tabela[$i]['pontuacao'] = $tabela[$i]['pontuacao'] / Jogo::count(array('conditions' => 'user_id = '.$tabela[$i]['user_id']));
      }

      asort($tabela);

      $tabela = array_slice($tabela, 0, 9);

      

      $this->APP_Views->getView('dashboard.index', ['user' => $this->user_ativo, 'tabela' => $tabela]);
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

      $user = User::find_by_id($_SESSION['UserID']);

      $campos = array();
      $campos['primeiro_nome'] = $user->primeiro_nome;
      $campos['ultimo_nome'] = $user->ultimo_nome;
      $campos['email'] = $user->email;
      $campos['password'] = $user->password;
      $campos['data_nascimento'] = $user->data_nascimento;

      $this->APP_Views->getView('dashboard.perfil', ['user' => $this->user_ativo, 'campos' => $campos]);
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

    public function atualizarImg(){
      $this->verificarSessao();

      $foto = new Fotos_Perfi();

      $dir =  '../public/images/users/';
      $path = $_FILES['image']['name'];
      $ext = pathinfo($path, PATHINFO_EXTENSION);
      $nome = sha1($path . rand(11111,99999)) .".". $ext;
      $final = $dir . $nome;

      $foto->user_id = $_SESSION['UserID'];
      $foto->url = $nome;

      $foto->save();

      move_uploaded_file($_FILES['image']['tmp_name'], $final);
      header("Location: router.php?route=dashboard&action=perfil");
    }

    public function atualizarPerfil(){
      $this->verificarSessao();

      $primeiro_nome = ltrim(rtrim($_POST['primeiro_nome']));
      $ultimo_nome = ltrim(rtrim($_POST['ultimo_nome']));
      $email = ltrim(rtrim($_POST['email']));
      $password = ltrim(rtrim($_POST['password']));
      $repeat_password = ltrim(rtrim($_POST['repeat_password']));
      $data_nascimento = ltrim(rtrim($_POST['data_nascimento']));

      if($password == "" || $password == ""){
        $password = "EOF";
        $repeat_password = "EOF";
      }

      if($primeiro_nome != "" && $ultimo_nome != "" && $email != "" && $data_nascimento != ""){
          if($password == $repeat_password){

            $user = User::find_by_id($_SESSION['UserID']);

            $user->primeiro_nome = $primeiro_nome;
            $user->ultimo_nome = $ultimo_nome;
            if($password != "EOF"){
              $user->password = md5($password);
            }
            $user->email = $email;

            $user->data_nascimento = date("Y-m-d", strtotime($data_nascimento));

            $user->save();
          }
        }
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }

    public function editarEmail(){
      $this->verificarSessao();

      $user = User::find_by_id($_POST['pk']);
      if (filter_var($_POST['value'], FILTER_VALIDATE_EMAIL)) {
          $user->email = $_POST['value'];
      }
      $user->save();
    }

    public function editarData(){
      $this->verificarSessao();

      $user = User::find_by_id($_POST['pk']);
      $user->data_nascimento = $_POST['value'];
      $user->save();
    }

    public function editarNomeDica(){
      $this->verificarSessao();

      $dica = Dica::find_by_id($_POST['pk']);
      $dica->nome = $_POST['value'];
      $dica->save();
    }

    public function editarPalavra(){
      $this->verificarSessao();

      $palavra = Palavra::find_by_id($_POST['pk']);
      $palavra->nome = $_POST['value'];
      $palavra->save();
    }
    public function editarCategoria(){
      $this->verificarSessao();

      $palavra = Palavra::find_by_id($_POST['pk']);
      $palavra->categoria = $_POST['value'];
      $palavra->save();
    }



}
