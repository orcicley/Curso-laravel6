<?php

Route::get('/contato', function (){
	return 'teste';
});

Route::get('/', function () {
    return 'welcome';
});

/*Route::get('/admin/painel', function() {
	return 'painel';
});*/

Route::get('/admin/front', function (){
	return view('front');
});
Route::get('/admin/login', function (){
	return 'Login';
})->middleware('auth');

/*Route::get('/login', function (){
	return 'login';
})->name('login');
*/
Route::get('/categoria/{flag}/jr', function ($flag){
return "Produtos da Lista 1(um): {$flag}";
});

Route::get('/produtos/{IdProduct}/linformatica', function ($IdProduct){

	return "Produto(s): {$IdProduct}";

});
#Urls amigaveis com o uso de padrão
Route::get('/produto/{IdProduct?}', function ($IdProduct = "Não Obrigatório"){
		return "Produto (s) :{$IdProduct} ";

});
#Urls amigaveis redirecionando para outros lugares
Route::get('/redirect', function(){
 	return redirect('/login');
});
Route::get('/redirect2', function(){
	return "Olá sou uma URL que mudou de lugar por name";
})->name('url.name');

Route::get('/mudanca', function(){
	return redirect()->route('url.name');
});

#rotas com autenticação com uso em grupo

Route::middleware(['auth'])->group(function () {
	route::get('admin/painel', function() {
		return "Rota autenticada";
	});
});

Route::prefix('Admin')->group( function () {
	Route::get('/centro', function (){
		return "Centro de Finanças";
	});

	Route::get('/deposito', function(){
		return "Deposito de remédios";
	});

	Route::get('/', 'Admin\TesteController@teste');
 		 
	
});