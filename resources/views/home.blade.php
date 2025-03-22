@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/service1.jpg') }}" class="card-img-top" alt="Servicio 1">
                <div class="card-body">
                    <h5 class="card-title">Servicio 1</h5>
                    <p class="card-text">Descripción breve del servicio 1.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/service2.jpg') }}" class="card-img-top" alt="Servicio 2">
                <div class="card-body">
                    <h5 class="card-title">Servicio 2</h5>
                    <p class="card-text">Descripción breve del servicio 2.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/service3.jpg') }}" class="card-img-top" alt="Servicio 3">
                <div class="card-body">
                    <h5 class="card-title">Servicio 3</h5>
                    <p class="card-text">Descripción breve del servicio 3.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/service4.jpg') }}" class="card-img-top" alt="Servicio 4">
                <div class="card-body">
                    <h5 class="card-title">Servicio 4</h5>
                    <p class="card-text">Descripción breve del servicio 4.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/service5.jpg') }}" class="card-img-top" alt="Servicio 5">
                <div class="card-body">
                    <h5 class="card-title">Servicio 5</h5>
                    <p class="card-text">Descripción breve del servicio 5.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/service6.jpg') }}" class="card-img-top" alt="Servicio 6">
                <div class="card-body">
                    <h5 class="card-title">Servicio 6</h5>
                    <p class="card-text">Descripción breve del servicio 6.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="bg-light text-center text-lg-start mt-4">
    <div class="container p-4">
        <div class="row">
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">Contacto</h5>
                <p>Email: contacto@consultadental.com</p>
                <p>Teléfono: +123 456 7890</p>
            </div>
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">Síguenos</h5>
                <a href="#" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="me-4 text-reset">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="me-4 text-reset">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="me-4 text-reset">
                    <i class="fab fa-linkedin"></i>
                </a>
            </div>
        </div>
    </div>
</footer>
@endsection
