@extends('client.layouts.app')

@section('title', 'Nasi Kulit')

@section('content')
<section class="carousel-section border-bottom">
  <div class="container py-3">
    <div class="row">
      <!-- Logo and Text Overlay on the Left -->
      <div class="col-md-4 d-flex flex-column justify-content-center align-items-start">
        <div class="carousel-header text-start">
          <img src="{{ asset('client/img/logo.png') }}" alt="Logo" class="carousel-logo">
          <h2 class="carousel-text">Raja Nasi Kulit</h2>
        </div>
      </div>

      <!-- Carousel on the Right -->
      <div class="col-md-8">
        <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{ asset('client/img/banner-4.jpg') }}" class="d-block w-100 carousel-image" alt="Banner image">
            </div>
            <div class="carousel-item">
              <img src="{{ asset('client/img/banner-4.jpg') }}" class="d-block w-100 carousel-image" alt="Banner image">
            </div>
            <div class="carousel-item">
              <img src="{{ asset('client/img/banner-4.jpg') }}" class="d-block w-100 carousel-image" alt="Banner image">
            </div>
          </div>
          <!-- Add controls for carousel navigation -->
          <a class="carousel-control-prev" href="#carouselExampleControlsNoTouching" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControlsNoTouching" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="py-5 d-flex justify-content-center align-items-center" style="background-color: #f8f9fa;">
  <div class="container d-flex justify-content-between">
    <!-- Box Kiri -->
    <div class="half-screen-box p-4 bg-white shadow-lg animate-slideInLeft">
      <div class="icon-section d-flex align-items-center">
        <i class="bi bi-cup-hot-fill fs-1 text-primary me-3"></i> <!-- Food icon -->
        <div>
          <h3 class="fw-bold text-dark mb-2">Makanan Lezat dengan Sentuhan Tradisional</h3>
          <p class="text-muted mb-4">Nikmati setiap hidangan yang kami sajikan dengan penuh cinta dan bahan-bahan berkualitas terbaik.</p>
        </div>
      </div>
      <div class="icon-section d-flex align-items-center">
        <i class="bi bi-egg-fried fs-1 text-success me-3"></i> <!-- Egg icon -->
        <div>
          <h3 class="fw-bold text-dark mb-2">Makanan Lezat dengan Sentuhan Tradisional</h3>
          <p class="text-muted">Nikmati setiap hidangan yang kami sajikan dengan penuh cinta dan bahan-bahan berkualitas terbaik.</p>
        </div>
      </div>
    </div>

    <!-- Box Kanan -->
    <div class="half-screen-box p-4 bg-white shadow-lg animate-slideInRight">
      <div class="icon-section d-flex align-items-center">
        <i class="bi bi-cup fs-1 text-danger me-3"></i> <!-- Knife icon -->
        <div>
          <h3 class="fw-bold text-dark mb-2">Peralatan Dapur Terbaik</h3>
          <p class="text-muted mb-4">Gunakan peralatan dapur berkualitas untuk pengalaman memasak yang luar biasa.</p>
        </div>
      </div>
      <div class="icon-section d-flex align-items-center">
        <i class="bi bi-cup-straw fs-1 text-info me-3"></i> <!-- Straw cup icon -->
        <div>
          <h3 class="fw-bold text-dark mb-2">Minuman Segar</h3>
          <p class="text-muted">Nikmati minuman segar untuk melengkapi setiap hidangan Anda.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="py-5 bg-light border-bottom" style="background-color: #fffefb;">
  <div class="container my-5 py-5 text-center">
    <h4 class="text-dark mb-4 animate-fadeIn">Produk Terbaru</h4>
    <div class="row justify-content-center">
      @foreach ($products as $product)
        <div class="col-md-4 mb-4">
          <div class="card product-card shadow-sm border-0 h-100">
            <div class="image-wrapper">
              <img src="{{ $product->image !== 'null' ? asset('storage/products/' . $product->image) : asset('client/img/' . $product->id . '.jpg') }}" class="card-img-top img-fluid product-image" alt="{{ $product->product_name }}">
            </div>
            <div class="card-body">
              <h5 class="card-title fw-bold text-dark fs-5">
                {{ $product->product_name }} - {{ optional($product->category)->category_name }}
              </h5>
              
              @if($product->price_discount > 0)
                <p class="card-text text-dark fs-6">
                  <span class="text-decoration-line-through">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                </p>
                <p class="card-text text-dark fs-6">
                  Rp {{ number_format($product->price_discount, 0, ',', '.') }}
                </p>
              @else
                <p class="card-text text-dark fs-6">
                  Rp {{ number_format($product->price, 0, ',', '.') }}
                </p>
              @endif
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
<!-- 
<section class="bg-primary" style="background-color: #fffefb;">
  <div class="container py-5 mb-5">
    <div class="row d-flex gap-3 justify-content-center">
      <div class="col-md-9 mx-auto">
        <div class="card border-left-primary shadow h-100 py-2 bg-secondary">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="h5 mb-0 font-weight-bold text-gray-800 text-light">
                  <span class="text-uppercase">
                    {{ $profile[0]->company_name }} -
                  </span> {{ $profile[0]->address }}
                </div>
                <div class="text-xs font-weight-bold text-light mb-1">
                  {{ $profile[0]->number }} - {{ $profile[0]->email }}
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-2x text-white-300"></i>
                <i class="bi bi-cup-hot-fill fs-2"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->
<section class="py-5 bg-light border-bottom" 
 style="background-color: #fffefb;">
<div class="container my-5 py-5 text-center" >
    <h4 class="text-dark mb-4">Lokasi Kami</h4>
    <div class="row">
      <div class="col-md-6 mb-4">
        <div class="map-container">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.0773038024176!2d105.24639487362676!3d-5.405195153997295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40dba17ab8ded9%3A0x797c61eee471cb43!2sRAJA%20NASI%20KULIT!5e0!3m2!1sid!2sid!4v1725552544948!5m2!1sid!2sid&markers=latlng:-5.405195153997295,105.24639487362676" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="address mt-3">
          <h5 class="text-dark"><i class="bi bi-geo-alt"></i> Alamat 1</h5>
          <p class="text-dark mb-0">
            RAJA NASI KULIT<br>
            Jl. Contoh No.123,<br>
            Sumoharjo, Kecamatan XYZ,<br>
            Kota ABC, 12345<br>
            Indonesia
          </p>
        </div>
      </div>
      <div class="col-md-6 mb-4">
        <div class="map-container">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1986.0826681153774!2d105.27928093820529!3d-5.391758028302204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40db2601df0e9b%3A0x5def24b420b1c1ca!2sRAJA%20NASI%20KULIT%20URIP%20SUMOHARJO!5e0!3m2!1sid!2sid!4v1725552352996!5m2!1sid!2sid&markers=latlng:-5.391758028302204,105.27928093820529" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="address mt-3">
          <h5 class="text-dark"><i class="bi bi-geo-alt"></i> Alamat 2</h5>
          <p class="text-dark mb-0">
            RAJA NASI KULIT URIP SUMOHARJO<br>
            Jl. Contoh 2 No.456,<br>
            Sumoharjo, Kecamatan XYZ,<br>
            Kota ABC, 67890<br>
            Indonesia
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5 bg-light border-bottom">
  <div class="container">
    <h4 class="text-dark mb-4">FAQ</h4>
    <div class="accordion" id="faqAccordion">
      <div class="accordion-item mb-2 border rounded-3">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            Apa itu Nasi Kulit?
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Nasi Kulit adalah hidangan khas yang menggunakan nasi sebagai bahan utama dengan berbagai topping dan bumbu khas.
          </div>
        </div>
      </div>
      <div class="accordion-item mb-2 border rounded-3">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Bagaimana cara memesan?
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Anda dapat memesan Nasi Kulit melalui website kami atau langsung datang ke lokasi kami. Untuk pemesanan online, klik tombol "Pesan" di halaman produk.
          </div>
        </div>
      </div>
      <div class="accordion-item mb-2 border rounded-3">
        <h2 class="accordion-header" id="headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Apakah ada pilihan vegetarian?
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Ya, kami menyediakan pilihan vegetarian untuk beberapa menu kami. Silakan cek menu untuk detailnya atau hubungi kami untuk informasi lebih lanjut.
          </div>
        </div>
      </div>
      <!-- Add more accordion items as needed -->
    </div>
  </div>
</section>

<style>
   .image-wrapper {
    position: relative;
    width: 100%;
    padding-top: 75%; /* Adjust this percentage to control the aspect ratio */
    overflow: hidden;
    background-color: #f7f7f7; /* Background color for the box */
    display: flex;
    align-items: center;
    justify-content: center;
  }
  section.border-bottom {
    border-bottom: 2px solid #ccc; /* Adjust the color and thickness as needed */
    padding-bottom: 1rem; /* Adds some space between content and border */
}
/* CSS Animations for Carousel */
.carousel-inner .carousel-item img {
  object-fit: cover;
  height: 400px; /* Adjust height as needed */
  transition: transform 0.5s ease-in-out;
}
.carousel-inner .carousel-item {
  transition: transform 1s ease-in-out;
  display: flex;
  align-items: center;
}
.carousel-section {
  background-color: #ffffff; /* Background color for the section */
  padding-top: 2rem; /* Adjust top padding as needed */
}
.carousel-header {
  margin-bottom: 1rem; /* Space between the header and carousel */
}

.carousel-logo {
  max-width: 150px; /* Adjust size as needed */
  margin-bottom: 10px;
}

.carousel-text {
  font-size: 2rem; /* Adjust font size as needed */
  font-weight: bold;
  color: #333; /* Dark text color */
}

.carousel-image {
  max-height: 400px; /* Adjust height as needed */
  object-fit: cover; /* Ensure the image covers the area without distortion */
  width: 100%;
}
.carousel-control-prev-icon,
.carousel-control-next-icon {
  background-color: rgba(0,0,0,0.5);
  border-radius: 50%;
}

/* Product Card Hover Animation */
.product-card {
  border-radius: 8px; /* Rounded corners */
  overflow: hidden; /* Hide overflow for rounded corners */
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  display: flex;

}

.product-card:hover {
  transform: translateY(-10px); /* Slight lift effect */
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

/* Product Image Animation */
.product-image {
  position: absolute;
    top: 50%;
    left: 50%;
    width: 100%;
    height: 100%;
    object-fit: contain; /* Ensures the image maintains its aspect ratio */
    transform: translate(-50%, -50%);
}

.product-card:hover .product-image {
  opacity: 0.8;
}

/* Map Container Styling */
.map-container {
  overflow: hidden;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.map-container iframe {
  border: 0;
  width: 100%;
  height: 100%;
  border-radius: 8px;
}
.card-title {
  font-size: 1.25rem; /* Adjust font size */
}
.card-text {
  font-size: 1rem; /* Adjust font size */
}

/* Optional: Add some padding and margin adjustments */
.mb-4 {
  margin-bottom: 1.5rem;
}

.text-dark {
  color: #333;
}
.card-body {
  padding: 1.25rem;
  background-color: #ffffff; /* White background */
  color: #000000; /* Black text */
}
h4 {
  color: #000000; /* Black text */
}
/* Add subtle hover effect on product image */
.product-image:hover {
  transform: scale(1.1);
  transition: transform 0.3s ease;
}
@media (max-width: 768px) {
  .map-container iframe {
    height: 250px;
  }
}

@media (min-width: 768px) {
  .map-container iframe {
    height: 300px;
  }
}

@media (min-width: 992px) {
  .map-container iframe {
    height: 450px;
  }
}

/* Address Styling */
.address {
  text-align: center;
}

.address h5 {
  font-size: 1.25rem;
}

.icon-section {
    margin-bottom: 20px;
  }
.icon-section i {
  transition: transform 0.3s ease-in-out;
}

.icon-section i:hover {
    transform: scale(1.2);
  }
  .icon-section i.text-primary {
    color: #007bff;
  }

  .icon-section i.text-success {
    color: #28a745;
  }

  .icon-section i.text-danger {
    color: #dc3545;
  }

  /* Adjust text styling */
  .text-muted {
    color: #6c757d !important;
  }

  h3 {
    font-size: 1.75rem; /* Adjust heading size */
  }

  p {
    font-size: 1rem; /* Adjust paragraph size */
  }
.address p {
  font-size: 1rem;
}

/* FAQ Section Styling */
.accordion-button {
  background-color: #f8f9fa;
  color: #000;
  border: 1px solid #dee2e6;
  border-radius: 0.375rem;
}

.accordion-button:not(.collapsed) {
  color: #000;
  background-color: #e9ecef;
}

.accordion-body {
  background-color: #ffffff;
}


.row {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.animate-fadeIn {
    animation: fadeIn 1.5s ease-in-out;
}
.half-screen-box {

  width: 50%;
    border-radius: 8px;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }
  .animate-slideInLeft {
    animation: slideInLeft 1s ease-in-out;
  }
  .animate-slideInRight {
    animation: slideInRight 1s ease-in-out;
  }
  @keyframes slideInLeft {
    from {
      opacity: 0;
      transform: translateX(-100%);
    }
    to {
      opacity: 1;
      transform: translateX(0);
    }
  }
  @keyframes slideInRight {
    from {
      opacity: 0;
      transform: translateX(100%);
    }
    to {
      opacity: 1;
      transform: translateX(0);
    }
  }

  @media (max-width: 768px) {
    .half-screen-box {
      width: 100%;
      margin-bottom: 20px;    }
      .container {
      flex-direction: column;
    }
    .icon-section i {
      margin: 0 1rem;
    }
  }
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

@endsection