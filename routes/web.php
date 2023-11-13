<?php

use App\Http\Controllers\MahasiswaControler;
use App\Http\Controllers\ProdiControler;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

//Buat route ke halaman profile
Route::get("/profile", function () {
    return view("profile");
});

// //route dengan parameter
// Route::get("/mahasiswa/{nama}", function($nama = "Rafky"){
//     echo "<h1>Hallo, nama Saya $nama</h1>";
// });

//Route dengan paramaeter tidak wajib
Route::get("/mahasiswa2/{nama?}", function ($nama = "Rafky") {
    echo "<h1>Hallo, Nama Saya $nama</h1>";
});

//route dengan parameter >1
Route::get("/profile/{nama?}/{pekerjaan?}", function ($nama = "Rafky", $pekerjaan = "Mahasiswa") {
    echo "<h1>Hallo, nama Saya $nama, saya adalah seorang $pekerjaan</h1>";
});

//Redirect
Route::get("/hubungi", function () {
    echo "<h3>Hubungi kami </h3>";
});

Route::redirect("/contact", "/hubungi");

//Route Dengan nama
Route::get("/halo", function () {
    echo "<a href='" . route('call') . "'>" . route('call') . "</a>";
});

//Group
//Memudahkan
Route::prefix("/mahasiswa")->group(function () {
    Route::get("/jadwal", function () {
        echo "<h3>Jadwal Mahasiswa</h3>";
    });
    Route::get("/materi", function () {
        echo "<h4>Materi Perkuliahan</h4>";
    });
});

Route::get('/dosen', function () {
    return view('dosen');
});

Route::get('/dosen/idex', function () {
    return view('dosen.index');
});

Route::get('/fakultas', function () {
    // return view('fakultas.index', ["ilkom" => "Fakultas Ilmu Komputer dan Rekayasa"]);
    // return view('fakultas.index', ["fakultas" => ["Fakultas Ilmu Komputer dan Rekayasa" , "Fakultas Ekonomi dan Bisnis"]]);
    // return view('fakultas.index') ->with("faklutas", ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ekonomi dan Bisnis"]);

    $kampus = "Universitas Multi Data Palembang";
    // $fakultas = []
    $fakultas = ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ekonomi dan Bisnis"];
    return view('fakultas.index', compact('fakultas', 'kampus'));
});

Route::get('/prodi', [ProdiControler::class, 'index']);

//gunakan php artisan make:controller KurikulumController –-resource

Route::resource("/kurikulum", KurikulumControler::class);

//tes di browser dengan Mengunjungi:
// http://localhost/kurikulum
// http://localhost/kurikulum/create
// http://localhost/kurikulum/1000
// http://localhost/kurikulum/1000/edit

//gunaka php artisan make:controller DosenController --api
Route::apiResource("/dosen", DosenControler::class);
//tes di browser menggunakan:
// http://localhost/dosen/

Route::get("mahasiswa/insert-qb", [MahasiswaControler::class, 'insertElq']);
Route::get("mahasiswa/update-qb", [MahasiswaControler::class, 'updateElq']);
Route::get("mahasiswa/delete-qb", [MahasiswaControler::class, 'deleteElq']);
Route::get("mahasiswa/select-qb", [MahasiswaControler::class, 'selectElq']);

Route::get('/prodi/all-join-facade', [ProdiController::class, 'allJoinFacade']);

Route::get('/prodi/create', [ProdiController::class, 'create']);

Route::post('/prodi/store', [ProdiController::class, 'store']);

