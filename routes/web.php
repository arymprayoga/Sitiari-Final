<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'GuestController@showPembantu')->name('show-pembantu');
Route::get('/pembantu', 'GuestController@showPembantu')->name('show-pembantu');
Route::get('/perawat', 'GuestController@showPerawat')->name('show-perawat');
Route::get('/babysitter', 'GuestController@showBabysitter')->name('show-babysitter');

// Route::post('/finish', function(){
//     return redirect()->route('welcome');
// })->name('donation.finish');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('/daftar-admin', 'HomeController@showDaftarAdminPage')->name('user.show-daftar-admin-page');
Route::post('/tambah-admin', 'HomeController@tambahAdmin')->name('user.tambah-admin');
Route::post('/edit-admin', 'HomeController@editAdmin')->name('user.edit-admin');
Route::post('/delete-admin', 'HomeController@deleteAdmin')->name('user.delete-admin');
Route::get('/search-admin', 'HomeController@searchAdmin')->name('user.search-admin');
Route::get('/daftar-majikan', 'HomeController@showDaftarMajikanPage')->name('user.show-daftar-majikan-page');
Route::post('/tambah-majikan', 'HomeController@tambahMajikan')->name('user.tambah-majikan');
Route::post('/edit-majikan', 'HomeController@editMajikan')->name('user.edit-majikan');
Route::post('/delete-majikan', 'HomeController@deleteMajikan')->name('user.delete-majikan');
Route::get('/search-majikan', 'HomeController@searchMajikan')->name('user.search-majikan');
Route::get('/daftar-pekerja', 'HomeController@showDaftarPekerjaPage')->name('user.show-daftar-pekerja-page');
Route::post('/tambah-pekerja', 'HomeController@tambahPekerja')->name('user.tambah-pekerja');
Route::post('/edit-pekerja', 'HomeController@editPekerja')->name('user.edit-pekerja');
Route::post('/delete-pekerja', 'HomeController@deletePekerja')->name('user.delete-pekerja');
Route::get('/search-pekerja', 'HomeController@searchPekerja')->name('user.search-pekerja');
Route::get('/pendaftaran-pekerja', 'HomeController@showPendaftaranPekerjaPage')->name('user.show-pendaftaran-pekerja-page');
Route::post('/terima-pekerja', 'HomeController@terimaPekerja')->name('user.terima-pekerja');
Route::post('/tolak-pekerja', 'HomeController@tolakPekerja')->name('user.tolak-pekerja');
Route::get('/penggajian-pekerja', 'HomeController@showPenggajianPekerjaPage')->name('user.show-penggajian-pekerja-page');
Route::post('/gaji-pekerja', 'HomeController@gajiPekerja')->name('user.gaji-pekerja');
Route::get('/rekap-gaji', 'HomeController@showRekapGajiPage')->name('user.show-rekap-gaji-page');
Route::get('/resign-pekerja', 'HomeController@showResignPekerjaPage')->name('user.show-resign-pekerja-page');
Route::post('/terima-resign-pekerja', 'HomeController@resignPekerja')->name('user.resign-pekerja');
Route::post('/tolak-resign-pekerja', 'HomeController@tolakResignPekerja')->name('user.tolak-resign-pekerja');
Route::get('/daftar-pemesanan', 'HomeController@showDaftarPemesananPage')->name('user.show-daftar-pemesanan-page');
Route::post('/transaksi-pekerja', 'HomeController@transaksiPekerja')->name('user.detail-transaksi-pekerja');
Route::post('/transaksi-majikan', 'HomeController@transaksiMajikan')->name('user.detail-transaksi-majikan');
Route::get('/claim-garansi-page', 'HomeController@showClaimGaransiPage')->name('user.show-claim-garansi-page');
Route::get('/riwayat-claim-garansi-page', 'HomeController@showRiwayatClaimGaransiPage')->name('user.show-riwayat-claim-garansi-page');
Route::post('/tolak-garansi', 'HomeController@tolakGaransi')->name('user.tolak-garansi');
Route::post('/terima-garansi', 'HomeController@terimaGaransi')->name('user.terima-garansi');
Route::post('/show-terima-garansi', 'HomeController@showTerimaGaransiPage')->name('user.show-terima-garansi-page');
Route::get('/blacklist-pekerja', 'HomeController@showBlacklistPekerjaPage')->name('user.blacklist-pekerja-page');
Route::get('/blacklist-majikan', 'HomeController@showBlacklistMajikanPage')->name('user.blacklist-majikan-page');
Route::post('/blacklistPekerja', 'HomeController@blacklistPekerja')->name('user.blacklist-pekerja');
Route::post('/blacklistMajikan', 'HomeController@blacklistMajikan')->name('user.blacklist-majikan');
// Route::get('/testing', 'HomeController@testing');

Route::prefix('majikan')->group(function(){
    Route::get('/login', 'Auth\MajikanLoginController@showLoginForm')->name('majikan.login');
    Route::post('/login', 'Auth\MajikanLoginController@login')->name('majikan.login.submit');
    Route::get('/logout', 'Auth\MajikanLoginController@logout')->name('majikan.logout');
    Route::get('/register', 'Auth\MajikanRegisterController@showRegistrationForm')->name('majikan.register');
    Route::post('/register', 'Auth\MajikanRegisterController@register')->name('majikan.register.submit');
    Route::get('/pesan-babysitter', 'MajikanController@showPesanBabysitterPage')->name('majikan.show-pesan-babysitter-page');
    Route::get('/pesan-pembantu', 'MajikanController@showPesanPembantuPage')->name('majikan.show-pesan-pembantu-page');
    Route::get('/pesan-perawat', 'MajikanController@showPesanPerawatPage')->name('majikan.show-pesan-perawat-page');
    Route::get('/', 'MajikanController@index')->name('majikan.dashboard');
    Route::post('/pemesanan/store', 'PemesananController@submitPesanan')->name('pemesanan.store');
    Route::get('/riwayat-pemesanan', 'MajikanController@showRiwayatPemesananPage')->name('majikan.show-riwayat-pemesanan-page');
    Route::get('/rating-pekerja-page', 'MajikanController@showRatingPekerjaPage')->name('majikan.show-rating-pekerja-page');
    Route::get('/perpanjang-pekerja-page', 'MajikanController@showPerpanjangPekerjaPage')->name('majikan.show-perpanjang-pekerja-page');
    Route::post('/rating-pekerja', 'MajikanController@ratingPekerja')->name('majikan.rating-pekerja');
    Route::post('/perpanjang', 'MajikanController@perpanjangPekerja')->name('majikan.perpanjang');
    Route::get('/claim-garansi-page', 'MajikanController@showClaimGaransiPage')->name('majikan.show-claim-garansi-page');
    Route::post('/claim-garansi', 'MajikanController@claimGaransi')->name('majikan.claim-garansi');
    Route::get('/riwayat-garansi', 'MajikanController@showRiwayatGaransiPage')->name('majikan.show-riwayat-garansi-page');
    Route::get('/edit-profil', 'MajikanController@showEditMajikanPage')->name('majikan.show-edit-profil-page');
});

Route::prefix('pekerja')->group(function(){
    Route::get('/login', 'Auth\PekerjaLoginController@showLoginForm')->name('pekerja.login');
    Route::post('/login', 'Auth\PekerjaLoginController@login')->name('pekerja.login.submit');
    Route::get('/logout', 'Auth\PekerjaLoginController@logout')->name('pekerja.logout');
    Route::get('/register', 'Auth\PekerjaRegisterController@showRegistrationForm')->name('pekerja.register');
    Route::post('/register', 'Auth\PekerjaRegisterController@register')->name('pekerja.register.submit');
    Route::get('/', 'PekerjaController@index')->name('pekerja.dashboard');
    Route::get('/riwayat-pemesanan', 'PekerjaController@showRiwayatPemesananPage')->name('pekerja.show-riwayat-pemesanan-page');
    Route::get('/riwayat-penggajian', 'PekerjaController@showRiwayatPenggajianPage')->name('pekerja.show-riwayat-penggajian-page');
    Route::get('/pengajuan-resign', 'PekerjaController@showPengajuanResignPage')->name('pekerja.show-pengajuan-resign-page');
    Route::post('/resign', 'PekerjaController@resign')->name('pekerja.resign');
});

Route::post('/notification/handler', 'PemesananController@notificationHandler')->name('notification.handler');

