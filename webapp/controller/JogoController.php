<?php

class JogoController extends BaseController
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
        $this->verificarSessao();

        $this->APP_Views->getView('jogo.novoJogo', [ 'user' => $this->user_ativo]);
    }

    public function bonito($var){
      echo "<pre>";
      echo var_dump($var);
      echo "</pre>";
      die();
    }

    public function jogar(){
      $this->verificarSessao();

      $jogo_aberto = Jogo::find_by_user_id_and_terminado($_SESSION['UserID'], 0);

      if($jogo_aberto != NULL && !isset($_SESSION['JogoID'])){
        $_SESSION['JogoAberto'] = 1;
      }

      $this->APP_Views->getView('jogo.jogar', ['user' => $this->user_ativo]);
    }



    // EM TESTE

    public function eliminarAberto(){
      $this->verificarSessao();

      $jogo_aberto = Jogo::find_by_user_id_and_terminado($_SESSION['UserID'], 0);

      if(isset($_SESSION['JogoAberto']) || isset($_SESSION['JogoID']) && $jogo_aberto != NULL){

        $jogo_aberto->terminado = 1;

        $jogo_aberto->save();

        if(isset($_SESSION['JogoAberto']))
          unset($_SESSION['JogoAberto']);
        else
          unset($_SESSION['JogoID']);
      }
      $this->novo();
    }

    public function novo(){
      $this->verificarSessao();
      unset($_SESSION['AllUsed']);
      unset($_SESSION['GANHOU']);
      unset($_SESSION['Dica']);
      if(isset($_SESSION['JogoAberto'])){
        $jogo_aberto = Jogo::find_by_user_id_and_terminado($_SESSION['UserID'], 0);

        $jogo_aberto->save();
        unset($_SESSION['JogoAberto']);

        $_SESSION['JogoID'] = $jogo_aberto->id;

        $_SESSION['PalavraID'] = Jogo::find($jogo_aberto->id)->palavras_id;
        $_SESSION['Categoria'] = Palavra::find($_SESSION['PalavraID'])->categoria;



        $palavra = Palavra::find($jogo_aberto->palavras_id)->nome;

        $this->esconderPalavra($palavra);
        $this->carregarVidasELetras($palavra);



      }else{
        $jogo = new Jogo();
        $palavras = Palavra::find_all_by_ativo(1);

        $rand = rand(0, count($palavras)-1);

        $jogo->user_id = $_SESSION['UserID'];
        $jogo->palavras_id = $palavras[$rand]->id;

        if($jogo->save()){
          $_SESSION['JogoID'] = Jogo::last()->id;
          $_SESSION['PalavraID'] = $jogo->palavras_id;
          $_SESSION['VidasJogo'] = 6;
          $_SESSION['Categoria'] = Palavra::find($_SESSION['PalavraID'])->categoria;

          $palavra = Palavra::find($_SESSION['PalavraID'])->nome;

          $this->esconderPalavra($palavra);


        }
      }

      header("Location: router.php?route=jogo&action=jogar");
    }

    public function carregarVidasELetras($palavra){

      $_SESSION['VidasJogo'] = 6;
      $jogadas = Jogada::find_all_by_jogo_id($_SESSION['JogoID']);

      $aux = 0;
      foreach($jogadas as $key => $letra_jogadas){
        for($i = 0; $i < strlen($palavra); $i++){
          if($letra_jogadas->letra == strtoupper($palavra[$i])){
            $aux++;
          }
        }
        if($aux == 0){
          $_SESSION['VidasJogo']--;
        }
        $aux = 0;
      }

      if($_SESSION['VidasJogo'] == 0){
        $jogo = Jogo::find_by_id($_SESSION['JogoID']);
        $jogo->terminado = 1;
        $jogo->save();
      }

      $correta = "";
      for($a = 0; $a < strlen($palavra); $a++){
        $correta = $correta . $_SESSION['PalavraOfuscada'][$a];
      }
      if(strtoupper($correta) == strtoupper($palavra)){
        $_SESSION['GANHOU'] = 1;
      }

      $i = 0;
      foreach ($jogadas as $key => $letra) {
        $_SESSION['AllUsed'][$i] = $letra->letra;
        $i++;

        for($a = 0; $a < strlen($palavra); $a++){
          if(strtoupper($palavra[$a]) == $letra->letra){
            $_SESSION['PalavraOfuscada'][$a] = $letra->letra;
          }
        }

      }

    }

    public function esconderPalavra($palavra){
      $ofuscada = "";
      for ($i = 0; $i < strlen($palavra) ; $i++) {

        if ($palavra[$i] === "-" || $palavra[$i] === " ") {
          $ofuscada = $ofuscada . "-";
        } else {
          $ofuscada = $ofuscada . "_";
        }
      }

      $_SESSION['PalavraOfuscada'] = $ofuscada;

    }



}
