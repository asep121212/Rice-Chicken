@extends('client.layouts.app')

@section('title', 'Nasi Kulit')

@section('content')
  <section class="about-section">
    <div class="container my-5 py-5">
      <h4 class="text-light mb-5">Tentang Kami</h4>
      <div class="row align-items-center">
        <div class="col-md-6">
          <h5 class="text-white">{{ $profile[0]->company_name }}</h5>
          <p class="text-white">- {{ $profile[0]->address }}</p>
          <p class="text-white">- {{ $profile[0]->number }}</p>
          <p class="text-white">- {{ $profile[0]->email }}</p>
        </div>
        <div class="col-md-6">
          <img src="{{ asset('client/img/logo.jpg') }}" alt="Tentang Kami" class="img-fluid rounded">
        </div>
      </div>
    </div>
  </section>
@endsection
