<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Stock Management</title>

    <!-- Custom fonts for this template-->
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('welcome')}}">
                <div class="sidebar-brand-icon rotate-n-15"> 
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Stock  <sup>Management</sup></div> 
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('welcome') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Accueil</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Stock-->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Stocks</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--<h6 class="collapse-header">Ajouter un prduit:</h6>-->
                        <a class="collapse-item" href="{{ route('Admin.stock.index') }}">Nos stocks</a>
                        <a class="collapse-item" href="{{ route('Admin.stock.create') }}">Ajouter un prduit</a>
                        <a class="collapse-item" href="{{ route('Admin.stock.edit', ['id' => 1]) }}">Modifier un produit</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">
            <!-- Commandes -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Commandes</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--<h6 class="collapse-header">Custom Utilities:</h6>-->
                        <a class="collapse-item" href="{{route('Admin.commande.index') }}">Nos commande</a>
                        <a class="collapse-item" href="{{route('Admin.commande.index') }}">Passer une commande</a>
                        <a class="collapse-item" href="{{route('Admin.commande.edit',['id'=>1])}}">Modifier une commande</a>
                        <a class="collapse-item" href="{{route('Admin.produit.create')}}">Nouveau un produit</a>
                        <a class="collapse-item" href="{{route('Admin.categorie.create')}}">Nouvelle catégories</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Point de vente -->
            <div class="sidebar-heading">
                Point de vente
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Responsables</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--<h6 class="collapse-header">Connexion:</h6>-->
                        <a class="collapse-item" href="{{route('Admin.pointVente.index')}}">Point de vente</a>
                        <a class="collapse-item" href="{{route('Admin.pointVente.create')}}">Nouveau point de vente</a>
                        <a class="collapse-item" href="{{route('Admin.responsable.index')}}">Nos responsable</a>
                        <a class="collapse-item" href="{{route('Admin.responsable.create')}}">Nouveau responsable</a>
                
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
        

            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            
        </ul>
        
        
           