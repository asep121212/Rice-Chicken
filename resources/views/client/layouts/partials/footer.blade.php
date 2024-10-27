<style>
html,
body {
    height: 100%;
}

body {
    display: flex;
    flex-direction: column;
}

footer {
    margin-top: auto;
    background-color: #f8f9fa;
}

.footer-section {
    padding: 2rem 0;
}

.footer-section h1 {
    font-size: 1.25rem;
    margin-bottom: 1rem;
    border-left: 2px solid #dee2e6;
    padding-left: 1rem;
    color: #343a40;
}

.footer-section ul {
    list-style: none;
    padding: 0;
}

.footer-section ul li {
    margin-bottom: 0.5rem;
}

.footer-section ul li a {
    text-decoration: none;
    color: #343a40;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.footer-section ul li a:hover {
    color: #28a745;
    transform: scale(1.02);
    transition: all 0.3s;
}

.footer-section img {
    max-height: 5rem;
}

.social-icons a {
    color: #343a40;
    transition: color 0.3s, transform 0.3s;
}

.social-icons a:hover {
    color: #28a745;
    transform: scale(1.1);
}

.credit {
    border-top: 1px solid #dee2e6;
    padding: 1rem 0;
}

.credit p {
    margin: 0;
}

.credit .social-icons a {
    margin-right: 1rem;
}
</style>

<footer id="contact">
    <!-- About Section -->
    <div class="container footer-section">
        <div class="row">
            <div class="col-12 col-lg-4">
                <h1>About</h1>
                <ul>
                    <li><a href="#about">Produk Nasi Kulit</a></li>
                    <li><a href="#kegiatan">Tentang Kami</a></li>
                </ul>
            </div>
            <div class="col-12 col-lg-4">
                <h1>Contact</h1>
                <ul>
                    <li><a href="https://api.whatsapp.com/send?phone=" target="_blank">
                            <i class="bi bi-whatsapp"></i>{{ $profile[0]->number }}
                        </a></li>
                    <li><a href="mailto:company@gmail.com">
                            <i class="bi bi-envelope"></i> {{ $profile[0]->email }}
                        </a></li>
                </ul>
            </div>
            <div class="col-12 col-lg-4 text-center">
                <img src="{{ asset('client/img/logo.png') }}" alt="Logo">
            </div>
        </div>
    </div>

    <!-- Credit Section -->
    <div class="container credit text-center">
        <div class="row">
            <div class="col-12 col-lg-4 d-flex justify-content-center justify-content-lg-start align-items-center">
                <a href="https://www.tiktok.com/" class="social-icons"><i class="bi bi-tiktok"></i> Nasi Kulit</a>
            </div>
            <div class="col-12 col-lg-4 text-lg-start">
                <a href="https://www.facebook.com" class="social-icons"><i class="bi bi-facebook"></i> Nasi Kulit</a>
            </div>
            <div class="col-12 col-lg-4 text-lg-start">
                <a href="https://www.instagram.com/" class="social-icons"><i class="bi bi-instagram"></i>Nasi Kulit</a>
            </div>
        </div>
    </div>
</footer>