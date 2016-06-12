<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 02-05-2016
 * Time: 11:18
 */
include_once('startup\startupconfig.php');
include_once('filters\routingBootstrap.php');

/****************************************************************************
 *  URL Routing Rules
 ****************************************************************************/

ini_set('display_errors', 1);

$APP_Router->get('auth@index', 'AuthController@index');
$APP_Router->post('auth@login', 'AuthController@login');
$APP_Router->get('auth@logout', 'AuthController@logout');
$APP_Router->get('auth@registar', 'AuthController@registar');
$APP_Router->post('auth@registar', 'AuthController@validar');

$APP_Router->get('dashboard@inicio', 'DashboardController@index');
$APP_Router->get('dashboard@novoUser', 'DashboardController@adicionarUser');
$APP_Router->post('dashboard@novoUser', 'AuthController@validar');
$APP_Router->get('dashboard@listaClientes', 'DashboardController@listaClientes');
$APP_Router->post('dashboard@eliminarCliente', 'DashboardController@eliminarCliente');


$APP_Router->post('dashboard@editarCliente', 'DashboardController@editarCliente');

$APP_Router->get('dashboard@novaPalavra', 'DashboardController@novaPalavra');
$APP_Router->post('dashboard@eliminarPalavra', 'DashboardController@eliminarPalavra');
$APP_Router->post('dashboard@novaPalavra', 'DashboardController@adicionarPalavra');
$APP_Router->get('dashboard@listaPalavras', 'DashboardController@listaPalavras');
$APP_Router->get('dashboard@dicasPalavras', 'DashboardController@dicasPalavras');
$APP_Router->post('dashboard@dicasPalavras', 'DashboardController@guardarDicaPalavra');
$APP_Router->get('dashboard@perfil', 'DashboardController@perfil');


$APP_Router->get('dashboard@novaDica', 'DashboardController@novaDica');
$APP_Router->post('dashboard@eliminarDica', 'DashboardController@eliminarDica');
$APP_Router->post('dashboard@novaDica', 'DashboardController@guardarDica');
$APP_Router->get('dashboard@listaDicas', 'DashboardController@listaDicas');

$APP_Router->get('jogo@novo', 'JogoController@novo');
$APP_Router->get('jogo@jogar', 'JogoController@jogar');
$APP_Router->get('jogo@eliminarAberto', 'JogoController@eliminarAberto');
$APP_Router->post('jogo@jogada', 'JogadaController@jogada');
$APP_Router->get('jogo@dica', 'JogadaController@pedirDica');



$APP_Router->post('dicas@palavra', 'DashboardController@verDicas');
//EM TESTE

$APP_Router->post('dashboard@editarEmail', 'DashboardController@editarEmail');

/************** End of URL Routing Rules ************************************/

$APP_Router->routeNow();
