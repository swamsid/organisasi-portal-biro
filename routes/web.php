<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KontenController;
use App\Http\Controllers\kovablik\KovablikController;
use App\Http\Controllers\kovablik\master\AspekController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\masterSoalF1;
use App\Http\Controllers\pekppp\master\TandaTanganController;
use App\Http\Controllers\pekppp\master\UnitLokusController;
use App\Http\Controllers\pekppp\master\VerifikatorController;
use App\Http\Controllers\pekppp\PekpppController;
use App\Http\Controllers\pekppp\penilaian\F1Controller;
use App\Http\Controllers\pekppp\penilaian\F2Controller;
use App\Http\Controllers\pekppp\penilaian\F3Controller;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\pekppp\master\FormPenilaianController;
use App\Http\Controllers\pekppp\master\MasterF02Controller;
use App\Http\Controllers\pekppp\master\MasterF03Controller;
use App\Http\Controllers\pekppp\master\PeriodeController;
use App\Http\Controllers\PembuatanBeritaController;
use App\Http\Controllers\PembuatanContentController;
use App\Http\Controllers\PembuatanLayananController;
use App\Http\Controllers\PembuatanMediaInformasiController;
use App\Http\Controllers\SubMenuController;
use App\Http\Controllers\superadmin\master\KabKotController;
use App\Http\Controllers\superadmin\master\KategoriController;
use App\Http\Controllers\superadmin\master\UserController;
use App\Http\Controllers\superadmin\verifikasi\KonfirmasiBeritaController;
use App\Http\Controllers\superadmin\verifikasi\KonfirmasiLayananController;
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

Route::middleware(['visitor_counter'])->group(function () {
    Route::get('/', [LandingController::class, 'landing'])->name('home');
    Route::get('/berita', [LandingController::class, 'dataSemuaBerita'])->name('hal.berita');
    Route::get('/detail-berita/{nama}', [LandingController::class, 'detailBerita'])->name('detail.berita');
    Route::get('/cari-berita', [LandingController::class, 'searchData'])->name('cari.berita');
    Route::get('/cari-berita/by-tag/{tag}', [LandingController::class, 'searchDataByTag'])->name('cari.berita.by.tag');

    Route::get('/informasi-layanan/{nama}', [LandingController::class, 'cariByKategori'])->name('informasi.layanan');
    Route::get('/detail-layanan/{nama}', [LandingController::class, 'detailLayanan'])->name('detail.layanan');
    Route::get('/cari-layanan', [LandingController::class, 'searchDataLayanan'])->name('cari.layanan');

    Route::get('/cari-layanan-berita-kabkot/{id}', [LandingController::class, 'searchDataKabkot'])->name('cari.kabkot');

    Route::get('/konten/{slug}', [KontenController::class, "kategori"])->name('dynamic.content');
    Route::get('/layanan/{slug}', [KontenController::class, 'layananDetail'])->name('dynamic.content.detail');
});

Route::prefix('rumah-inovasi')->name('rumah-inovasi.')->group(function () {
    Route::get('/login', [KovablikController::class, 'login'])->name('login');
    Route::post('/post-login', [KovablikController::class, 'postLogin'])->name('postLogin');
});

Route::prefix('pekppp')->name('pekppp.')->group(function () {
    Route::get('/login', [PekpppController::class, 'login'])->name('login');
    Route::post('/post-login', [PekpppController::class, 'postLogin'])->name('postLogin');
});

Route::prefix('portal')->name('portal.')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/post-login', [AuthController::class, 'postLogin'])->name('postLogin');
});

// PUBLIC ROUTE
Route::get('/pekppp/penilaian/formulir-f03/{jenis}/{id}', [F3Controller::class, 'index1'])->name('pekppp.penilaian.formulir.jenis');
Route::prefix('pekppp/penilaian')->name('pekppp.penilaian.')->group(function () {
    Route::resources([
        'f03' => F3Controller::class,
    ]);
});

Route::middleware(['auth'])->group(function () {

    Route::prefix('portal')->name('portal.')->group(function () {
        Route::prefix('setting')->name('setting.')->group(function () {
            Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
            Route::post('/update-profile', [AuthController::class, 'updateProfile'])->name('updateProfile');
            Route::post('/update-logo', [UserController::class, 'updateLogo'])->name('updateLogo');
        });

        Route::post('/post-logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard');

        Route::middleware(['role:superadmin'])->group(function () {

            Route::prefix('master')->name('master.')->group(function () {
                Route::resources([
                    'kategori' => KategoriController::class,
                    'kabkot' => KabKotController::class
                ]);
            });
        });

        Route::middleware(['role:superadmin|admin|opd'])->group(function () {

            Route::prefix('master')->name('master.')->group(function () {
                Route::resources([
                    'user' => UserController::class
                ]);
                Route::get('getoptid/{id}', [UserController::class, 'getOpd'])->name('getoptid');
                Route::get('user/password/edit/{id}', [UserController::class, 'editPasswordView'])->name('user.edit.password.view');
                Route::put('user/password/edit/{id}', [UserController::class, 'editPasswordAction'])->name('user.edit.password.action');
            });

            Route::prefix('verifikasi')->name('verifikasi.')->group(function () {
                Route::get('layanan/all', [KonfirmasiLayananController::class, 'verifikasiAllLayanan'])->name('all.layanan');
                Route::get('berita/all', [KonfirmasiLayananController::class, 'verifikasiAllBerita'])->name('all.berita');
                Route::resources([
                    'berita' => KonfirmasiBeritaController::class,
                    'layanan' => KonfirmasiLayananController::class,
                ]);
            });
        });

        Route::prefix('pembuatan')->name('pembuatan.')->group(function () {
            Route::resources([
                'layanans' => PembuatanLayananController::class,
                'beritas' => PembuatanBeritaController::class,
                'media-informasis' => PembuatanMediaInformasiController::class,
                'contents' => PembuatanContentController::class,
            ]);
        });
    });

    Route::prefix('rumah-inovasi')->name('rumah-inovasi.')->group(function () {
        Route::get('/dashboard-rumah-inovasi', [KovablikController::class, 'dashboard'])->name('dashboard.kova');

        Route::prefix('setting')->name('setting.')->group(function () {
            Route::get('/profile', [KovablikController::class, 'profile'])->name('profile');
            Route::post('/update-profile', [AuthController::class, 'updateProfile'])->name('updateProfile');
        });

        Route::middleware(['role:superadmin'])->group(function () {
            Route::prefix('master')->name('master.')->group(function () {
                Route::resources([
                    'aspek' => AspekController::class
                ]);
            });
        });
    });

    Route::prefix('pekppp')->name('pekppp.')->group(function () {
        Route::get('/dashboard-pekppp', [PekpppController::class, 'dashboard'])->name('dashboard.pek');

        Route::prefix('setting')->name('setting.')->group(function () {
            Route::get('/profile', [PekpppController::class, 'profile'])->name('profile');
            Route::post('/update-profile', [AuthController::class, 'updateProfile'])->name('updateProfile');
        });

        Route::middleware(['role:superadmin'])->group(function () {
            Route::prefix('master')->name('master.')->group(function () {
                Route::resources([
                    'verifikator' => VerifikatorController::class,
                    'unit-lokus' => UnitLokusController::class,
                    'periode' => PeriodeController::class,
                    'master-f02' => MasterF02Controller::class,
                    'master-f03' => MasterF03Controller::class,
                ]);
                Route::get('/master-f02-daring', [MasterF02Controller::class, 'index2'])->name('f02.daring');
                Route::get('/master-f03-daring', [MasterF03Controller::class, 'index2'])->name('f03.daring');
                Route::post('/hapus-detailf02/{id}', [MasterF02Controller::class, 'destroyDetail'])->name('hapus.detail.f02');
                Route::post('/hapus-detailf03/{id}', [MasterF03Controller::class, 'destroyDetail'])->name('hapus.detail.f02');
            });
        });

        Route::prefix('master')->name('master.')->group(function () {
            Route::resources([
                'tanda-tangan' => TandaTanganController::class,
                'form-nilai' => FormPenilaianController::class,
            ]);
        });

        Route::middleware(['role:superadmin|verifikator|opd'])->group(function () {
            Route::prefix('penilaian')->name('penilaian.')->group(function () {
                Route::get('/timeline', [F1Controller::class, 'timeline'])->name('timeline');
                Route::get('/formulir-f02/{jenis}/{id}', [F2Controller::class, 'index1'])->name('formulir2.jenis');
                Route::get('/nilai-f02/{id}', [F2Controller::class, 'nilaiF02'])->name('nilai.f02');
                Route::get('/nilai-f03/{id}', [F3Controller::class, 'nilaiF03'])->name('nilai.f03');

                Route::resources([
                    'f01' => F1Controller::class,
                    'f02' => F2Controller::class,
                ]);
            });
            Route::prefix('master')->name('master.')->group(function () {
                Route::resources([
                    'master/formf1' => masterSoalF1::class
                ]);
            });
        });

        // Route::prefix('penilaian')->name('penilaian.')->group(function () {
        //     Route::resources([
        //         'f03' => F3Controller::class,
        //     ]);
        // });
    });


    Route::prefix('menu')->name('menu.')->group(function () {
        Route::resources([
            "menu" => MenuController::class,
            "sub-menu" => SubMenuController::class
        ]);
    });
});

Route::get('sub-menu/{user_id}', [PembuatanLayananController::class, 'getSubmenu']);
