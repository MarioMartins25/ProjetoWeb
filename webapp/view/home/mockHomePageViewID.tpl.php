
<?php
global $APP_Router;
global $APP_ViewDisp;
global $APP_WebAsset;
/*************************************************************
*
*           Prepare Data for usage in View
*
*************************************************************/

$dataWithID = $APP_ViewDisp->dataComposer->getDataForView('dataWithID');

//***********************************************************

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LOGIC-MVC HOME</title>
</head>
<body>

<div>
 <img src="<?php echo $APP_WebAsset->ImageFileURL('logiclogo.png')?>">
 <h1> LogicMVC HomePage <h1>
 <h4> You've made it! </h4>
</div>

<div>
 <img src="<?php echo $APP_WebAsset->ImageFileURL('logiclogo.png')?>">
 <h1> LogicMVC HomePage <h1>
 <h4> You've made it! </h4>
</div>

<a href="<?php echo $APP_Router->buildURL('mockuphome@index')?>"> Link 1 </a> (This is a link to this home page)

<br><br>

Detailed Page info for following Item:
<ul>
<?php foreach ($dataWithID as $key => $dataItem){
    echo '<li> Key = ' . $key . ' ; Data = ' . $dataItem . '</li>';
} ?>
</ul>

<hr>

<div>
<small>
<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">LOGIC MVC Framework</span> by <span xmlns:cc="http://creativecommons.org/ns#" property="cc:attributionName">Silvio Priem Mendes, PhD</span> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License</a>.
</small>
</div>

</body>
</html>