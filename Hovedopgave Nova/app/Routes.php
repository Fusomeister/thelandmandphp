<?php

use Helpers\Hooks;
use App\Core\View;
use Routing\Router;

/** Define static routes. */
Route::get('ProductTest', 'App\Controllers\Butik@ProductTest');
// The default Routing
//Home
Route::get('/',       'App\Controllers\Home@index');

//Butik
Route::get('butik',  'App\Controllers\Butik@index');
Route::get('butik/search{id}', 'App\Controllers\Butik@SearchProduct');
Route::get('butik/addProduct', 'App\Controllers\Butik@AddProduct');
Route::post('AddProductPost', 'App\Controllers\Butik@AddProductPost');
Route::get('DeleteProduct/{id}', 'App\Controllers\Butik@DeleteProduct');
Route::get('butik/editProduct/{id}', 'App\Controllers\Butik@EditProduct');
Route::post('editProductPost/{id}', 'App\Controllers\Butik@EditProductPost');
Route::get('butik/createCategory', 'App\Controllers\Butik@CreateCategory');
Route::post('CreateCategoryPost', 'App\Controllers\Butik@CreateCategoryPost');

Route::get('butik/deleteCategory', 'App\Controllers\Butik@deleteCategory');
Route::get('DeleteCategoryPost/{id}', 'App\Controllers\Butik@DeleteCategoryPost');

Route::get('butik/AddPicture', 'App\Controllers\Butik@AddPicture');
Route::post('AddPicturePost', 'App\Controllers\Butik@AddPicturePost');
Route::get('AddProductToCart/{id}', 'App\Controllers\Butik@AddProductToCart');
Route::get('butik/shoppingCart', 'App\Controllers\Butik@ShoppingCart');
Route::get('removeItemFromCart/{id}', 'App\Controllers\Butik@RemoveItemFromCart');

//Forum
Route::get('forum',  'App\Controllers\Forum@index');
Route::get('forum/comments/{id}', 'App\Controllers\Forum@comments');
Route::get('test', 'App\Controllers\Forum@test');
Route::post('CreateCommentPost/{id}', 'App\Controllers\Forum@CreateCommentPost');
Route::get('DeleteTopic/{id}', 'App\Controllers\Forum@DeleteTopic');
Route::post('createTopic', 'App\Controllers\Forum@createTopic');

//Links
Route::get('links',  'App\Controllers\Links@index');
Route::get('links/createLinks', 'App\Controllers\Links@CreateLinks');
Route::post('CreateLinksPost', 'App\Controllers\Links@CreateLinksPost');
Route::get('DeleteLink/{id}', 'App\Controllers\Links@DeleteLink');
Route::get('links/editlink/{id}', 'App\Controllers\Links@EditLink');
Route::post('EditLinkPost/{id}', 'App\Controllers\Links@EditLinkPost');

//Om
Route::get('om', 'App\Controllers\Om@index');

//Account routes
Route::get('login', 'App\Controllers\Account@login');
Route::post('loginPost', 'App\Controllers\Account@loginPost');
Route::get('logout', 'App\Controllers\Account@logout');
Route::get('register', 'App\Controllers\Account@register');
Route::post('registerPost', 'App\Controllers\Account@registerPost');
Route::get('profile/{username}', 'App\Controllers\Account@profile');
Route::get('profil/changePassword', 'App\Controllers\Account@changePassword');
Route::post('changePasswordPost', 'App\Controllers\Account@changePasswordPost');
Route::get('profil/changeEmail', 'App\Controllers\Account@changeEmail');
Route::post('changeEmailPost', 'App\Controllers\Account@changeEmailPost');

//Kontrolpanel
Route::get('kontrolpanel', 'App\Controllers\KontrolPanel@index');

Route::get('hello', function(){
   echo Session::get('Username'); 
});


/** End default Routes */
