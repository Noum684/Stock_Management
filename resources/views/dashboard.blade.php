@extends('layouts.app')

@section('content')
<div class="home-container">

    <!-- Menu burger mobile -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm px-4 py-2 sticky-top">
        <a class="navbar-brand fw-bold" href="#">StockManager</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="#hero">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">À propos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Connexion</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero -->
    <section id="hero" class="hero d-flex align-items-center justify-content-center text-center text-white">
        <div class="content">
            <h1 class="animate_animated animate_fadeInDown">Bienvenue sur <span class="highlight">StockManager</span></h1>
            <p class="animate_animated animatefadeInUp animate_delay-1s">Gérez vos stocks facilement et efficacement</p>
            <a href="{{ route('register') }}" class="btn btn-light mt-4 animate_animated animatezoomIn animate_delay-2s">Créer un compte</a>
        </div>
    </section>

    <!-- Carrousel -->
    <section class="carousel-section py-5 bg-white text-center">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/stock1.jpg') }}" class="d-block w-100 rounded" alt="Stock 1">
                        <p class="mt-3">Suivez vos produits en temps réel</p>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/stock2.jpg') }}" class="d-block w-100 rounded" alt="Stock 2">
                        <p class="mt-3">Visualisez vos entrées/sorties</p>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/stock3.jpg') }}" class="d-block w-100 rounded" alt="Stock 3">
                        <p class="mt-3">Prenez des décisions éclairées</p>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </section>

    <!-- À propos -->
    <section id="about" class="about py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 animate_animated animate_fadeInLeft">
                    <img src="{{ asset('images/stock-illustration.png') }}" alt="StockManager" class="img-fluid rounded shadow">
                </div>
                <div class="col-md-6 animate_animated animate_fadeInRight">
                    <h2>Pourquoi choisir StockManager ?</h2>
                    <p>StockManager est pensé pour simplifier la gestion de vos produits. Il vous accompagne dans toutes vos tâches de stock.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Chatbot -->
    <div class="chatbot-icon position-fixed bottom-0 end-0 p-4">
        <a href="#" class="btn btn-success rounded-circle shadow-lg" title="Discuter">
            <i class="bi bi-chat-dots fs-4"></i>
        </a>
    </div>

</div>
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<style>
    .hero {
        height: 100vh;
        background: linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%);
    }
    .highlight {
        color: #fdf497;
    }
    .carousel img {
        max-height: 400px;
        object-fit: cover;
    }
    .chatbot-icon a {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
@endsection