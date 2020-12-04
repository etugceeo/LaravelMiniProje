<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

Route::get('/', function () {
    return view('anasayfa');
});
*/


/* view yerinestring ifade de döndürebilirz
Route::get('/merhaba',function(){
    return "Merhaba";
});
*/

/*
 * json döndürmek için array dizi tanımlaması kullanabiliriz
Route::get('api/v1/merhaba', function(){
    return['mesaj'=>'Merhaba'];
});

*/


/*
 route yapısında adres satırında gönderilen değeri parametre
olarak kullanmak.
adres satırındaki {urunadi} fonk içinde parametre değişkeni
olarak urunadi verdik. yalnız farklı isimler de kullanabilrdik, adres satırı ve fonksiyon parametre sıralamasına dikkikat etmeliyiz
Not opsiyonel parametre kullanımı için yanına soru işareti koyarız.
Route::get('/urun/{urunadi}/{id?}', function($urunadi, $id=0){
    return "ürün adı: $id $urunadi";
});

 * */


/*ROUTE TANIM İSİMLENDİRME
bu şekilde route adreslerine rahat bir şekilde erişebiliriz
ve bağlantı verebiliriz.
--name() fonksiyonu kullanıyoruz.
--redirect()->   ile yönlendirme yapıyoruz
--adres de kampanya ya girdiğimizde urun_detay route tanımına gidecek
Route::get('/urun/{urunadi}/{id?}', function($urunadi, $id=0){
    return "ürün adı: $id $urunadi";
})->name('urun_detay');

Route::get('/kampanya', function(){
  return redirect()->route('urun_detay',['urunadi'=>'kalem','id'=>5]);
});


  */

/*Route tanımlarında Controller Kullanımı
get('url','NameController@metodName');
*/

Route::get('/','AnasayfaController@index')->name('anasayfa');
//Route::view('/company','company');
//Route::view('/person','person');
//Route::view('/address','address');
//Route::get('/company/{slug_companyname}', 'CompanyController@index')->name('company');
//Route::get('/company', 'CompanyController@index');//->name('company');
//Route::get('/company/{slug_personname}', 'PersonController@index')->name('person');
//Route::get('/person', 'PersonController@index');//->name('company');
//Route::get('/address/{slug_company}','AddressController@index')->name('address');
//Route::get('/address','AddressController@index');//->name('address')

Route::group(['prefix' => 'company'], function () {
    Route::get( '/', 'CompanyController@index')->name('company');
    Route::get('/yeni', 'CompanyController@form')->name('company.yeni');
    Route::get('/duzenle/{id}', 'CompanyController@form')->name('company.duzenle');
    Route::post('/kaydet/{id?}', 'CompanyController@kaydet')->name('company.kaydet');
    Route::get('/sil/{id}', 'CompanyController@sil')->name('company.sil');
});
Route::group(['prefix' => 'person'], function () {
    Route::get( '/', 'PersonController@index')->name('person');
    Route::get('/yeni', 'PersonController@form')->name('person.yeni');
    Route::get('/duzenle/{id}', 'PersonController@form')->name('person.duzenle');
    Route::post('/kaydet/{id?}', 'PersonController@kaydet')->name('person.kaydet');
    Route::get('/sil/{id}', 'PersonController@sil')->name('person.sil');
});

Route::group(['prefix' => 'address'], function () {
    Route::get( '/', 'AddressController@index')->name('address');
    Route::get('/yeni', 'AddressController@form')->name('address.yeni');
    Route::get('/duzenle/{id}', 'AddressController@form')->name('address.duzenle');
    Route::post('/kaydet/{id?}', 'AddressController@kaydet')->name('address.kaydet');
    Route::get('/sil/{id}', 'AddressController@sil')->name('address.sil');
});
