<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\PengurusesController;
use App\Http\Controllers\KaryawansController;
use App\Http\Controllers\ShusesController;
use App\Http\Controllers\BeritasController;
use App\Http\Controllers\FotoBeritasController;
use App\Http\Controllers\VideoBeritasController;
use App\Http\Controllers\UnitsController;
use App\Http\Controllers\AnggotasController;
use App\Http\Controllers\TabungansController;
use App\Http\Controllers\TransaksiTabungansController;
use App\Http\Controllers\TabunganAnggotasController;
use App\Http\Controllers\SimpanansController;
use App\Http\Controllers\TransaksiSimpanansController;
use App\Http\Controllers\SimpananAnggotasController;
use App\Http\Controllers\PembiayaansController;
use App\Http\Controllers\TransaksiPembiayaansController;
use App\Http\Controllers\PembiayaanAnggotasController;
use App\Http\Controllers\CoasController;
use App\Http\Controllers\JurnalsController;
use App\Http\Controllers\BukuBesarsController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\CategorysController;
use App\Http\Controllers\BarangsController;
use App\Http\Controllers\BbmsController;
use App\Http\Controllers\DetailPesanansController;
use App\Http\Controllers\DetailServicesController;
use App\Http\Controllers\ItemServicesController;
use App\Http\Controllers\KendaraansController;
use App\Http\Controllers\KonsumsiBbmsController;
use App\Http\Controllers\PesanansController;
use App\Http\Controllers\SatuansController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\StokopnamesController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */
Route::middleware(['auth'])->group(function () {
    Route::get('/activity-log', [ActivityLogController::class, 'index'])->name('activity-log.index');
});

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::get('/gantipassword', [UserController::class, 'getUbahPass'])->name('gantipassword');
    Route::post('/gantipasswordstore', [UserController::class, 'getUbahPassStore'])->name('getUbahPassStore');
});

Route::group(
    [
        'prefix' => 'categorys',
    ],
    function () {
        Route::get('/', [CategorysController::class, 'index'])->name('categorys.categorys.index');
        Route::get('/create', [CategorysController::class, 'create'])->name('categorys.categorys.create');
        Route::get('/show/{categorys}', [CategorysController::class, 'show'])->name('categorys.categorys.show');
        Route::get('/{categorys}/edit', [CategorysController::class, 'edit'])->name('categorys.categorys.edit');
        Route::post('/', [CategorysController::class, 'store'])->name('categorys.categorys.store');
        Route::put('categorys/{categorys}', [CategorysController::class, 'update'])->name('categorys.categorys.update');
        Route::delete('/categorys/{categorys}', [CategorysController::class, 'destroy'])->name('categorys.categorys.destroy');
    },
);

Route::group(
    [
        'prefix' => 'barangs',
    ],
    function () {
        Route::get('/', [BarangsController::class, 'index'])->name('barangs.barangs.index');
        Route::get('/create', [BarangsController::class, 'create'])->name('barangs.barangs.create');
        Route::get('/show/{barangs}', [BarangsController::class, 'show'])->name('barangs.barangs.show');
        Route::get('/{barangs}/edit', [BarangsController::class, 'edit'])->name('barangs.barangs.edit');
        Route::post('/', [BarangsController::class, 'store'])->name('barangs.barangs.store');
        Route::put('barangs/{barangs}', [BarangsController::class, 'update'])->name('barangs.barangs.update');
        Route::delete('/barangs/{barangs}', [BarangsController::class, 'destroy'])->name('barangs.barangs.destroy');
        Route::get('barangs-export', [BarangsController::class,'export'])->name('barangs.export');

        Route::post('barangs-import', [BarangsController::class,'import'])->name('barangs.import');
    },
);

Route::group(
    [
        'prefix' => 'bbms',
    ],
    function () {
        Route::get('/', [BbmsController::class, 'index'])->name('bbms.bbms.index');
        Route::get('/create', [BbmsController::class, 'create'])->name('bbms.bbms.create');
        Route::get('/show/{bbms}', [BbmsController::class, 'show'])->name('bbms.bbms.show');
        Route::get('/{bbms}/edit', [BbmsController::class, 'edit'])->name('bbms.bbms.edit');
        Route::post('/', [BbmsController::class, 'store'])->name('bbms.bbms.store');
        Route::put('bbms/{bbms}', [BbmsController::class, 'update'])->name('bbms.bbms.update');
        Route::delete('/bbms/{bbms}', [BbmsController::class, 'destroy'])->name('bbms.bbms.destroy');
    },
);

Route::group(
    [
        'prefix' => 'detail_pesanans',
    ],
    function () {
        Route::get('/', [DetailPesanansController::class, 'index'])->name('detail_pesanans.detail_pesanans.index');
        Route::get('/create', [DetailPesanansController::class, 'create'])->name('detail_pesanans.detail_pesanans.create');
        Route::get('/show/{detailPesanans}', [DetailPesanansController::class, 'show'])->name('detail_pesanans.detail_pesanans.show');
        Route::get('/{detailPesanans}/edit', [DetailPesanansController::class, 'edit'])->name('detail_pesanans.detail_pesanans.edit');
        Route::post('/', [DetailPesanansController::class, 'store'])->name('detail_pesanans.detail_pesanans.store');
        Route::put('detail_pesanans/{detailPesanans}', [DetailPesanansController::class, 'update'])->name('detail_pesanans.detail_pesanans.update');
        Route::delete('/detail_pesanans/{detailPesanans}', [DetailPesanansController::class, 'destroy'])->name('detail_pesanans.detail_pesanans.destroy');
    },
);

Route::group(
    [
        'prefix' => 'detail_services',
    ],
    function () {
        Route::get('/', [DetailServicesController::class, 'index'])->name('detail_services.detail_services.index');
        Route::get('/create', [DetailServicesController::class, 'create'])->name('detail_services.detail_services.create');
        Route::get('/show/{detailServices}', [DetailServicesController::class, 'show'])->name('detail_services.detail_services.show');
        Route::get('/{detailServices}/edit', [DetailServicesController::class, 'edit'])->name('detail_services.detail_services.edit');
        Route::post('/', [DetailServicesController::class, 'store'])->name('detail_services.detail_services.store');
        Route::put('detail_services/{detailServices}', [DetailServicesController::class, 'update'])->name('detail_services.detail_services.update');
        Route::delete('/detail_services/{detailServices}', [DetailServicesController::class, 'destroy'])->name('detail_services.detail_services.destroy');
    },
);

Route::group(
    [
        'prefix' => 'item_services',
    ],
    function () {
        Route::get('/', [ItemServicesController::class, 'index'])->name('item_services.item_services.index');
        Route::get('/create', [ItemServicesController::class, 'create'])->name('item_services.item_services.create');
        Route::get('/show/{itemServices}', [ItemServicesController::class, 'show'])->name('item_services.item_services.show');
        Route::get('/{itemServices}/edit', [ItemServicesController::class, 'edit'])->name('item_services.item_services.edit');
        Route::post('/', [ItemServicesController::class, 'store'])->name('item_services.item_services.store');
        Route::put('item_services/{itemServices}', [ItemServicesController::class, 'update'])->name('item_services.item_services.update');
        Route::delete('/item_services/{itemServices}', [ItemServicesController::class, 'destroy'])->name('item_services.item_services.destroy');
    },
);

Route::group(
    [
        'prefix' => 'kendaraans',
    ],
    function () {
        Route::get('/', [KendaraansController::class, 'index'])->name('kendaraans.kendaraans.index');
        Route::get('/create', [KendaraansController::class, 'create'])->name('kendaraans.kendaraans.create');
        Route::get('/show/{kendaraans}', [KendaraansController::class, 'show'])->name('kendaraans.kendaraans.show');
        Route::get('/{kendaraans}/edit', [KendaraansController::class, 'edit'])->name('kendaraans.kendaraans.edit');
        Route::post('/', [KendaraansController::class, 'store'])->name('kendaraans.kendaraans.store');
        Route::put('kendaraans/{kendaraans}', [KendaraansController::class, 'update'])->name('kendaraans.kendaraans.update');
        Route::delete('/kendaraans/{kendaraans}', [KendaraansController::class, 'destroy'])->name('kendaraans.kendaraans.destroy');
    },
);

Route::group(
    [
        'prefix' => 'konsumsi_bbms',
    ],
    function () {
        Route::get('/', [KonsumsiBbmsController::class, 'index'])->name('konsumsi_bbms.konsumsi_bbms.index');
        Route::get('/create', [KonsumsiBbmsController::class, 'create'])->name('konsumsi_bbms.konsumsi_bbms.create');
        Route::get('/show/{konsumsiBbms}', [KonsumsiBbmsController::class, 'show'])->name('konsumsi_bbms.konsumsi_bbms.show');
        Route::get('/{konsumsiBbms}/edit', [KonsumsiBbmsController::class, 'edit'])->name('konsumsi_bbms.konsumsi_bbms.edit');
        Route::post('/', [KonsumsiBbmsController::class, 'store'])->name('konsumsi_bbms.konsumsi_bbms.store');
        Route::post('/cekbbm', [KonsumsiBbmsController::class, 'cekbbm'])->name('konsumsi_bbms.konsumsi_bbms.cekbbm');
        Route::put('konsumsi_bbms/{konsumsiBbms}', [KonsumsiBbmsController::class, 'update'])->name('konsumsi_bbms.konsumsi_bbms.update');
        Route::delete('/konsumsi_bbms/{konsumsiBbms}', [KonsumsiBbmsController::class, 'destroy'])->name('konsumsi_bbms.konsumsi_bbms.destroy');
    },
);

Route::group(
    [
        'prefix' => 'pesanans',
    ],
    function () {
        Route::get('/', [PesanansController::class, 'index'])->name('pesanans.pesanans.index');
        Route::get('/create', [PesanansController::class, 'create'])->name('pesanans.pesanans.create');
        Route::get('/detail/{pesanans}', [PesanansController::class, 'detail'])->name('pesanans.pesanans.detail');
        Route::get('/detail/list/{pesanans}', [PesanansController::class, 'detail_list'])->name('pesanans.pesanans.detail_list');
        Route::get('/show/{pesanans}', [PesanansController::class, 'show'])->name('pesanans.pesanans.show');
        Route::get('/{pesanans}/edit', [PesanansController::class, 'edit'])->name('pesanans.pesanans.edit');
        Route::post('/', [PesanansController::class, 'store'])->name('pesanans.pesanans.store');
        Route::put('pesanans/{pesanans}', [PesanansController::class, 'update'])->name('pesanans.pesanans.update');
        Route::delete('/pesanans/{pesanans}', [PesanansController::class, 'destroy'])->name('pesanans.pesanans.destroy');
    },
);

Route::group(
    [
        'prefix' => 'satuans',
    ],
    function () {
        Route::get('/', [SatuansController::class, 'index'])->name('satuans.satuans.index');
        Route::get('/create', [SatuansController::class, 'create'])->name('satuans.satuans.create');
        Route::get('/show/{satuans}', [SatuansController::class, 'show'])->name('satuans.satuans.show');
        Route::get('/{satuans}/edit', [SatuansController::class, 'edit'])->name('satuans.satuans.edit');
        Route::post('/', [SatuansController::class, 'store'])->name('satuans.satuans.store');
        Route::put('satuans/{satuans}', [SatuansController::class, 'update'])->name('satuans.satuans.update');
        Route::delete('/satuans/{satuans}', [SatuansController::class, 'destroy'])->name('satuans.satuans.destroy');
    },
);

Route::group(
    [
        'prefix' => 'services',
    ],
    function () {
        Route::get('/', [ServicesController::class, 'index'])->name('services.services.index');
        Route::get('/create', [ServicesController::class, 'create'])->name('services.services.create');
        Route::get('/show/{services}', [ServicesController::class, 'show'])->name('services.services.show');
        Route::get('/detail/{services}', [ServicesController::class, 'detail'])->name('services.services.detail');
        Route::get('/detail/list/{services}', [ServicesController::class, 'detail_list'])->name('services.services.detail_list');
        Route::get('/{services}/edit', [ServicesController::class, 'edit'])->name('services.services.edit');
        Route::post('/', [ServicesController::class, 'store'])->name('services.services.store');
        Route::put('services/{services}', [ServicesController::class, 'update'])->name('services.services.update');
        Route::delete('/services/{services}', [ServicesController::class, 'destroy'])->name('services.services.destroy');
    },
);

Route::group(
    [
        'prefix' => 'stokopnames',
    ],
    function () {
        Route::get('/', [StokopnamesController::class, 'index'])->name('stokopnames.stokopnames.index');
        Route::get('/masuk', [StokopnamesController::class, 'index_masuk'])->name('stokopnames.stokopnames.index_masuk');
        Route::get('/create', [StokopnamesController::class, 'create'])->name('stokopnames.stokopnames.create');
        Route::get('/show/{stokopnames}', [StokopnamesController::class, 'show'])->name('stokopnames.stokopnames.show');
        Route::get('/{stokopnames}/edit', [StokopnamesController::class, 'edit'])->name('stokopnames.stokopnames.edit');
        Route::post('/', [StokopnamesController::class, 'store'])->name('stokopnames.stokopnames.store');
        Route::post('/cekstok', [StokopnamesController::class, 'cekstok'])->name('stokopnames.stokopnames.cekstok');
        Route::put('stokopnames/{stokopnames}', [StokopnamesController::class, 'update'])->name('stokopnames.stokopnames.update');
        Route::delete('/stokopnames/{stokopnames}', [StokopnamesController::class, 'destroy'])->name('stokopnames.stokopnames.destroy');
    },
);
