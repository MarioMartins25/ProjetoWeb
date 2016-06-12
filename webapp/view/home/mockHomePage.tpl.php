<?php
global $APP_Router;
global $APP_ViewDisp;
global $APP_WebAsset;
/*************************************************************
*
*           Prepare Data for usage in View
*
*************************************************************/

$viewData = $APP_ViewDisp->dataComposer->getDataForView('viewData');
$dataWithID = $APP_ViewDisp->dataComposer->getDataForView('dataWithID');

//***********************************************************

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jogo da Forca</title>
    <link rel="stylesheet" href="../public/css/main.css" type="text/css">
     <script src="../public/js/game.js"></script>
</head>
<body>
  <!-- JOGO COMEÇA AQUI -->
  <div class="wrapper">
     <h1>Jogo da Forca</h1>
      <h2>Jogo da Forca em Javascript</h2>
      <p>Use o alfabeto em baixo para adivinhar a palavra, ou peça uma ajuda...</p>

  </div>
  <div class="wrapper">
      <div id="buttons">
      </div>
      <p id="catagoryName"></p>
      <div id="hold">
      </div>
      <p id="mylives"></p>
      <p id="clue">Clue -</p>
       <canvas id="stickman">This Text will show if the Browser does NOT support HTML5 Canvas tag</canvas>
      <div class="container">
        <button id="hint">Hint</button>
        <button id="reset">Play again</button>
      </div>
  </div>
  <!-- JOGO ACABA AQUI -->
</body>
</html>
