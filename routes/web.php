<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\PointVenteController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatistiqueController;

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');





Route::middleware(['auth', 'verified'])->group(function () {

    // Accueil
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    // Gestion des responsables
    Route::get('/Admin/responsable', [ResponsableController::class], 'index')->name('Admin.responsable.index');
    Route::get('/Admin/responsable/create', [ResponsableController::class], 'create')->name('Admin.responsable.create');


    // Gestion des points de vente
    Route::get('/Admin/pointVente', [PointVenteController::class, 'index'])->name(('Admin.pointVente.index'));
    Route::get('/Admin/pointVente/ create', [PointVenteController::class, 'create'])->name(('Admin.pointVente.create'));

    // Gestion des produits
    Route::get('/Admin/produit/create', [ProduitController::class, 'create'])->name('Admin.produit.create');
    Route::get('/Admin/produit', [ProduitController::class, 'index'])->name('Admin.produit.index');
    Route::get('/Admin/produit/{id}/edit', [ProduitController::class, 'edit'])->name('Admin.produit.edit');

    // Gestion du Stock
    Route::get('/Admin/stock', [StockController::class, 'index'])->name('Admin.stock.index');
    Route::get('/Admin/stock/create', [StockController::class, 'create'])->name('Admin.stock.create');
    Route::get('/Admin/stock/store', [StockController::class, 'store'])->name('Admin.stock.store');
    Route::get('/Admin/stock/{id}/edit', [StockController::class, 'edit'])->name('Admin.stock.edit');

    // Gestion des commandes
    Route::get('/Admin/commande', [CommandeController::class, 'index'])->name('Admin.commande.index');
    Route::get('/Admin/commande/create', [CommandeController::class, 'create'])->name('Admin.commande.create');
    Route::get('/Admin/commande/update', [CommandeController::class, 'create'])->name('Admin.commande.update');
    Route::get('/Admin/commande/{id}/edit', [CommandeController::class, 'edit'])->name('Admin.commande.edit');


    // Gestion des Catégories
    Route::get('/Admin/categorie', [CategorieController::class]);
    Route::get('/Admin/categorie', [CategorieController::class], 'index')->name('Admin.categorie.index');
    Route::get('/Admin/categorie/create', [CategorieController::class], 'create')->name('Admin.categorie.create');


    // Gestion du profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Gestion des activités
    Route::get('/Admin/activity', [ActivityController::class, 'index'])->name('Admin.activity.index');
    Route::post('/Admin/activity', [ActivityController::class, 'store'])->name('Admin.activity.store');

    //  Paramètres;
    Route::get('/Admin/settings', [SettingController::class, 'index'])->name('Admin.settings.index');
    Route::post('/Admin/settings', [SettingController::class, 'update'])->name('Admin.settings.update');
    // Rôles et permissions
    Route::get('/users/{id}/roles', [RoleController::class, 'showAssignRoleForm'])->name('roles.showForm');
Route::post('/users/{id}/roles', [RoleController::class, 'assignRole'])->name('roles.assign');
Route::post('/users/{id}/permissions', [RoleController::class, 'assignPermission'])->name('permissions.assign');
// Statistiques
Route::get('/statistiques', [StatistiqueController::class, 'index'])->name('statistiques.index');

});

require __DIR__ . '/auth.php';
