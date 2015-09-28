<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$app->get('/', function() use ($app) {
    return $app->welcome();
});

$app->get('documento', [
    'as' => 'documento.index', 'uses' => 'DocumentoController@index'
]);
$app->get('documento/all', [
    'as' => 'documento.all', 'uses' => 'DocumentoController@all'
]);
$app->get('documento/allbyid/{id}', [
    'as' => 'documento.allbyid', 'uses' => 'DocumentoController@allById'
]);
$app->post('documento', [
    'as' => 'documento.store', 'uses' => 'DocumentoController@store'
]);
$app->patch('documento/{id}', [
    'as' => 'documento.update', 'uses' => 'DocumentoController@update'
]);

$app->delete('documento/{id}', [
    'as' => 'documento.destroy', 'uses' => 'DocumentoController@destroy'
]);

 # passo
$app->post('passo', [
    'as' => 'passo.store', 'uses' => 'PassoController@store'
]);

$app->get('passo/all/{id}', [
    'as' => 'passo.all', 'uses' => 'PassoController@all'
]);

$app->patch('passo/{id}', [
    'as' => 'passo.update', 'uses' => 'PassoController@update'
]);

$app->delete('passo/{id}', [
    'as' => 'passo.destroy', 'uses' => 'PassoController@destroy'
]);
# fim passo

# Fluxo
$app->post('fluxo', [
    'as' => 'fluxo.store', 'uses' => 'FluxoController@store'
]);
$app->get('fluxo/all/{id}', [
    'as' => 'fluxo.all', 'uses' => 'FluxoController@all'
]);
$app->patch('fluxo/{id}', [
    'as' => 'fluxo.update', 'uses' => 'FluxoController@update'
]);
$app->delete('fluxo/{id}', [
    'as' => 'fluxo.destroy', 'uses' => 'FluxoController@destroy'
]);
# fim passo

# passofluxos
$app->post('passofluxos', [
    'as' => 'passofluxos.store', 'uses' => 'PassoFluxosController@store'
]);

$app->get('passofluxos/all/{id}', [
    'as' => 'passo.all', 'uses' => 'PassoFluxosController@all'
]);

$app->patch('passofluxos/{id}', [
    'as' => 'passo.update', 'uses' => 'PassoFLuxosController@update'
]);

$app->delete('passofluxos/{fluxo_id}/{passo_id}', [
    'as' => 'passo.destroy', 'uses' => 'PassoFluxosController@destroy'
]);
# fim passofluxos

# Regra Negocios
$app->post('regranegocio', [
    'as' => 'regranegocio.store', 'uses' => 'RegraNegocioController@store'
]);

$app->get('regranegocio/all', [
    'as' => 'regranegocio.all', 'uses' => 'RegraNegocioController@all'
]);

$app->get('regranegocio/allbyid/{id}', [
    'as' => 'regranegocio.allbyid', 'uses' => 'RegraNegocioController@allById'
]);

$app->get('regranegocio/{id}', [
    'as' => 'regranegocio.show', 'uses' => 'RegraNegocioController@show'
]);

$app->patch('regranegocio/{id}', [
    'as' => 'regranegocio.update', 'uses' => 'RegraNegocioController@update'
]);

$app->delete('regranegocio/{id}', [
    'as' => 'regranegocios.destroy', 'uses' => 'RegraNegocioController@destroy'
]);
# fim regra negocios

# Passo Regra Negocios
$app->post('passoregranegocio', [
    'as' => 'passoregranegocio.store', 'uses' => 'PassoRegraNegocioController@store'
]);

$app->get('passoregranegocio/all', [
    'as' => 'passoregranegocio.all', 'uses' => 'PassoRegraNegocioController@all'
]);

$app->get('passoregranegocio/allbyid/{id}', [
    'as' => 'passoregranegocio.allbyid', 'uses' => 'PassoRegraNegocioController@allById'
]);

$app->patch('passoregranegocio/{id}', [
    'as' => 'passoregranegocio.update', 'uses' => 'PassoRegraNegocioController@update'
]);

$app->delete('passoregranegocio/{id}', [
    'as' => 'passoregranegocios.destroy', 'uses' => 'PassoRegraNegocioController@destroy'
]);
# fim regra negocios

# Passo Regra Negocios
$app->post('mensagem', [
    'as' => 'mensagem.store', 'uses' => 'MensagemController@store'
]);

$app->get('mensagem/all', [
    'as' => 'mensagem.all', 'uses' => 'MensagemController@all'
]);

$app->get('mensagem/allbyid/{id}', [
    'as' => 'mensagem.allbyid', 'uses' => 'MensagemController@allById'
]);

$app->patch('mensagem/{id}', [
    'as' => 'mensagem.update', 'uses' => 'MensagemController@update'
]);

$app->delete('mensagem/{id}', [
    'as' => 'mensagem.destroy', 'uses' => 'MensagemController@destroy'
]);
# fim regra negocio

# Passo Regra Negocios
$app->post('passomensagem', [
    'as' => 'passomensagem.store', 'uses' => 'PassoMensagemController@store'
]);

$app->get('passomensagem/all', [
    'as' => 'passomensagem.all', 'uses' => 'PassoMensagemController@all'
]);

$app->get('passomensagem/allbyid/{id}', [
    'as' => 'passomensagem.allbyid', 'uses' => 'PassoMensagemController@allById'
]);

$app->patch('passomensagem/{id}', [
    'as' => 'passomensagem.update', 'uses' => 'PassoMensagemController@update'
]);

$app->delete('passomensagem/{id}', [
    'as' => 'passomensagem.destroy', 'uses' => 'PassoMensagemController@destroy'
]);
# fim regra negocios

# Tela
$app->post('tela', [
    'as' => 'tela.store', 'uses' => 'TelaController@store'
]);

$app->get('tela/all', [
    'as' => 'tela.all', 'uses' => 'TelaController@all'
]);

$app->get('tela/allbyid/{id}', [
    'as' => 'tela.allbyid', 'uses' => 'TelaController@allById'
]);

$app->patch('tela/{id}', [
    'as' => 'tela.update', 'uses' => 'TelaController@update'
]);

$app->delete('tela/{id}', [
    'as' => 'tela.destroy', 'uses' => 'TelaController@destroy'
]);
# fim regra negocio

# Tela
$app->post('campo', [
    'as' => 'campo.store', 'uses' => 'CampoController@store'
]);

$app->get('campo/all', [
    'as' => 'campo.all', 'uses' => 'CampoController@all'
]);

$app->get('campo/allbyid/{id}', [
    'as' => 'campo.allbyid', 'uses' => 'CampoController@allById'
]);

$app->patch('campo/{id}', [
    'as' => 'campo.update', 'uses' => 'CampoController@update'
]);

$app->delete('campo/{id}', [
    'as' => 'campo.destroy', 'uses' => 'CampoController@destroy'
]);
# fim

$app->post('passotela', [
    'as' => 'passotela.store', 'uses' => 'PassoTelaController@store'
]);

$app->get('passotela/all', [
    'as' => 'passotela.all', 'uses' => 'PassoTelaController@all'
]);

$app->get('passotela/allbyid/{id}', [
    'as' => 'passotela.allbyid', 'uses' => 'PassoTelaController@allById'
]);

$app->patch('passotela/{id}', [
    'as' => 'passotela.update', 'uses' => 'PassoTelaController@update'
]);

$app->delete('passotela/{passo_id}/{tela_id}', [
    'as' => 'passotela.destroy', 'uses' => 'PassoTelaController@destroy'
]);
# Proejto
$app->post('projeto', [
    'as' => 'projeto.store', 'uses' => 'ProjetoController@store'
]);

$app->get('projeto/all', [
    'as' => 'projeto.all', 'uses' => 'ProjetoController@all'
]);

$app->get('projeto/allbyid/{id}', [
    'as' => 'projeto.allbyid', 'uses' => 'ProjetoController@allById'
]);

$app->patch('projeto/{id}', [
    'as' => 'projeto.update', 'uses' => 'ProjetoController@update'
]);

$app->delete('projeto/{id}', [
    'as' => 'projeto.destroy', 'uses' => 'ProjetoController@destroy'
]);
