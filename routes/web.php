<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProfileController,
    StockController,
    CategorieController,
    CommandeController,
    ResponsableController,
    PointVenteController,
    ProduitController,
    SettingController,
    ActivityController,
    RoleController,
    StatistiqueController,
    HomeController,
    SearchController,
    MessageController,
    AlertController
};

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware(['auth', 'verified'])->group(function () {
    // Routes pour l'administrateur
    Route::middleware(['role:admin'])->group(function () {
        // Gestion des stocks
        Route::get('/Admin/stocks', [StockController::class, 'index'])->name('Admin.stock.index');
        Route::get('/Admin/stocks/create', [StockController::class, 'create'])->name('Admin.stock.create');
        Route::post('/Admin/stocks/store', [StockController::class, 'store'])->name('Admin.stock.store');
        Route::get('/Admin/stocks/{id}/edit', [StockController::class, 'edit'])->name('Admin.stock.edit');
        Route::put('/Admin/stocks/update', [StockController::class, 'update'])->name('Admin.stock.update');
        Route::delete('/Admin/stocks/destroy', [StockController::class, 'destroy'])->name('Admin.stock.destroy');

        // Gestion des responsables
        Route::get('/Admin/responsable', [ResponsableController::class, 'index'])->name('Admin.responsable.index');
        Route::get('/Admin/responsable/create', [ResponsableController::class, 'create'])->name('Admin.responsable.create');
        Route::post('/Admin/responsable/store', [ResponsableController::class, 'store'])->name('Admin.responsable.store');
        Route::get('/Admin/responsable/{id}/edit', [ResponsableController::class, 'edit'])->name('Admin.responsable.edit');
        Route::put('/Admin/responsable/update', [ResponsableController::class, 'update'])->name('Admin.responsable.update');
        Route::delete('/Admin/responsable/destroy', [ResponsableController::class, 'destroy'])->name('Admin.responsable.destroy');

        // Statistiques et commandes globales
        Route::get('/Admin/commandes', [CommandeController::class, 'index'])->name('Admin.commandes.index');
        Route::get('/Admin/statistiques', [StatistiqueController::class, 'index'])->name('Admin.statistiques.index');
    });

    // Routes pour le responsable
    Route::middleware(['role:responsable'])->group(function () {
        // Gestion de son point de vente
        Route::get('/Responsable/stocks', [StockController::class, 'viewOwnStock'])->name('Responsable.stock.index');

        // Commandes et statistiques liées au point de vente
        Route::get('/Responsable/commandes', [CommandeController::class, 'create'])->name('Responsable.commandes.create');
        Route::get('/Responsable/statistiques', [StatistiqueController::class, 'viewOwnStats'])->name('Responsable.statistiques.index');
    });

    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Gestion des points de vente
    Route::get('/Admin/pointVente', [PointVenteController::class, 'index'])->name(('Admin.pointVente.index'));
    Route::get('/Admin/pointVente/ create', [PointVenteController::class, 'create'])->name(('Admin.pointVente.create'));
    Route::get('/Admin/pointVente/edit', [PointVenteController::class, 'edit'])->name(('Admin.pointVente.edit'));
    Route::post('/Admin/pointVente/update', [PointVenteController::class, 'update'])->name(('Admin.pointVente.update'));
    Route::post('/Admin/pointVente/store', [PointVenteController::class, 'store'])->name(('Admin.pointVente.store'));
    Route::get('/Admin/pointVente/destroy', [PointVenteController::class, 'destroy'])->name(('Admin.pointVente.destroy'));
    Route::get('/Admin/pointVente/show', [PointVenteController::class, 'show'])->name(('Admin.pointVente.show'));

    // Gestion des produits
    Route::get('/Admin/produit/create', [ProduitController::class, 'create'])->name('Admin.produit.create');
    Route::get('/Admin/produit', [ProduitController::class, 'index'])->name('Admin.produit.index');
    Route::get('/Admin/produit/{id}/edit', [ProduitController::class, 'edit'])->name('Admin.produit.edit');
    Route::post('/Admin/produit/store',[ProduitController::class,'store'])->name('Admin.produit.store');
    Route::POST('/Admin/produit/update',[ProduitController::class,'update'])->name('Admin.produit.update');
    Route::get('/Admin/produit/destroy',[ProduitController::class,'destroy'])->name('Admin.produit.destroy');
    Route::get('/Admin/produit/show',[ProduitController::class,'show'])->name('Admin.produit.show');

    // Gestion du Stock
    Route::get('/Admin/stock', [StockController::class, 'index'])->name('Admin.stock.index');
    Route::get('/Admin/stock/create', [StockController::class, 'create'])->name('Admin.stock.create');
    Route::post('/Admin/stock/store', [StockController::class, 'store'])->name('Admin.stock.store');
    Route::get('/Admin/stock/{id}/edit', [StockController::class, 'edit'])->name('Admin.stock.edit');
    Route::put('/Admin/stock/update',[StockController::class,'update'])->name('Admin.stock.update');
    Route::delete('/Admin/stock/destroy',[StockController::class,'destroy'])->name('Admin.stock.destroy');
    Route::get('/Admin/stock/show',[StockController::class,'show'])->name('Admin.stock.show');

    // Gestion des commandes
    Route::get('/Admin/commande', [CommandeController::class, 'index'])->name('Admin.commande.index');
    Route::get('/Admin/commande/create ', [CommandeController::class, 'create'])->name('Admin.commande.create');
    Route::put('/Admin/commande/update', [CommandeController::class, 'update'])->name('Admin.commande.update');
    Route::get('/Admin/commande/{id}/edit', [CommandeController::class, 'edit'])->name('Admin.commande.edit');
    Route::post('/Admin/commande/store',[CommandeController::class,'store'])->name('Admin.commande.store');
    Route::delete('/Admin/commande/destroy',[CommandeController::class,'destroy'])->name('Admin.commande.destroy');
    Route::get('/commande/{id}/livrer', [CommandeController::class, 'livrer'])->name('commande.livrer');
    Route::get('/commande/{id}/refuser', [CommandeController::class, 'refuser'])->name('commande.refuser');
    Route::resource('commande', CommandeController::class);
    Route::get('/Admin/commande/show',[CommandeController::class,'show'])->name('Admin.commande.show');


    // Gestion des Catégories
    Route::get('/Admin/categorie', [CategorieController::class]);
    Route::get('/Admin/categorie', [CategorieController::class, 'index'])->name('Admin.categorie.index');
    Route::get('/Admin/categorie/create', [CategorieController::class, 'create'])->name('Admin.categorie.create');
    Route::post('/Admin/categorie/store',[CategorieController::class, 'store'])->name('Admin.categorie.store');
    Route::get('/Admin/categorie/edit',[CategorieController::class, 'edit'])->name('Admin.categorie.edit');
    Route::put('/Admin/categorie/update',[CategorieController::class, 'update'])->name('Admin.categorie.update');
    Route::get('/Admin/categorie/show',[CategorieController::class, 'show'])->name('Admin.categorie.show');
    Route::delete('/Admin/categorie/destroy',[CategorieController::class, 'destroy'])->name('Admin.categorie.destroy');
 

    // Gestion du profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/', [HomeController::class, 'index'])->name('welcome');
    Route::get('/Admin/responsable/dashboard', [ResponsableController::class, 'index'])->name('Admin.responsable.dashboard');
 

    // Gestion des activités
    Route::get('/Admin/Activitys', [ActivityController::class, 'index'])->name('Admin.activitys.index');
    Route::get('/Admin/activitys', [ActivityController::class, 'create'])->name('Admin.activitys.create');
    Route::post('/Admin/activitys', [ActivityController::class, 'store'])->name('Admin.activitys.store');

    //  Paramètres;
    Route::get('/Admin/Settings', [SettingController::class, 'index'])->name('Admin.Settings.index');
    Route::post('/Admin/Settings', [SettingController::class, 'update'])->name('Admin.Settings.update');
    // Rôles et permissions
    Route::get('/users/{id}/roles', [RoleController::class, 'showAssignRoleForm'])->name('roles.showForm');
    Route::post('/users/{id}/roles', [RoleController::class, 'assignRole'])->name('roles.assign');
    Route::post('/users/{id}/permissions', [RoleController::class, 'assignPermission'])->name('permissions.assign');
    // Statistiques
    Route::get('/Admin/statistiques', [StatistiqueController::class, 'index'])->name('Admin.statistiques.index');
    Route::get('/statistiques/export', [StatistiqueController::class, 'export'])->name('statistiques.export');

    // Recherches
    Route::get('/search', [SearchController::class, 'search'])->name('search');

    // Message
    Route::get('/messages', [MessageController::class, 'fetchMessages'])->name('messages.fetch');
    Route::post('/messages/read/{id}', [MessageController::class, 'markAsRead'])->name('messages.read');

    //Notifications
    Route::get('/alerts', [AlertController::class, 'showAlerts'])->name('alerts.index');




});

require __DIR__ . '/auth.php';
