<?php

class JogadaController extends BaseController
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

    public function jogada(){
      $this->verificarSessao();
      $letra = strtoupper($_POST['letra']);

      $palavras_id = Jogo::find($_SESSION['JogoID'])->palavras_id;
      $palavra = Palavra::find($palavras_id)->nome;

      $jogada = new Jogada();
      $jogada->jogo_id = $_SESSION['JogoID'];

      for($i = 0; $i < strlen($palavra); $i++){
        if(strtoupper($palavra[$i]) == $letra){
          $_SESSION['PalavraOfuscada'][$i] = $letra;
        }
      }

      $jogada->letra = $letra;
      $jogada->save();

      $jogadas = Jogada::find_all_by_jogo_id($_SESSION['JogoID']);

      $aux = 0;
      $_SESSION['VidasJogo'] = 6;
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

      $correta = str_replace("-", "", $correta);
      $palavra = str_replace(" ", "", $palavra);



      if(strtoupper($correta) == strtoupper($palavra)){
        $_SESSION['GANHOU'] = 1;
      }

      $i = 0;
      foreach ($jogadas as $key => $letra) {
        $_SESSION['AllUsed'][$i] = $letra->letra;
        $i++;
      }
      header("Location: router.php?route=jogo&action=jogar");
    }

    public function pedirDica(){
      $this->verificarSessao();

      $dicas = Palavras_dica::find_all_by_palavras_id($_SESSION['PalavraID']);

      $dicasTodas = array();
      $con = 0;
      for($i = 0; $i < count($dicas); $i++){

        if(Dicas_jogo::find_by_jogo_id_and_dicas_id($_SESSION['JogoID'], $dicas[$i]->dicas_id) == NULL){
          $dicasTodas[$con] = $dicas[$i]->dicas_id;
          $con++;
        }
      }
      if($con > 0){
        if(count($dicasTodas) == 1){
          $in = 0;
        }else{
          $in = rand(0, count($dicasTodas)-1);
        }
        $dica = Dica::find($dicasTodas[$in]);

        $dica_jogo = new Dicas_jogo();

        $dica_jogo->jogo_id = $_SESSION['JogoID'];
        $dica_jogo->dicas_id = $dica->id;

        $dica_jogo->save();

        $_SESSION['Dica'] = $dica->nome;
      }

      header("Location: router.php?route=jogo&action=jogar");
    }

    public function bonito($var){
      echo "<pre>";
      echo var_dump($var);
      echo "</pre>";
      die();
    }

}
