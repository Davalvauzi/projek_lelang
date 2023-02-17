<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Home Dafa</title>

<!-- fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">

<!-- feather icons -->
<script src="https://unpkg.com/feather-icons"></script>

<!-- my stle -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- navbar start -->

    <nav class="navbar">
        <a href="#" class="navbar-logo">Lelang<span> Santai</span></a>

        <div class="navbar-nav">
            <a href="#home">Home</a>
            <a href="#about">Tentang Kami</a>
            <a href="#menu">Daftar Barang</a>
            <a href="#contact">Kontak</a>
            <a href="/login">Masuk</a>
        </div>

        <div class="navbar-extra">
            <a href="#" id="search"><i data-feather="search"></i></a>
            <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
        </div>
    </nav>

    <!-- navbar end -->

    <!-- hero section start -->

    <section class="hero" id="home">
        <main class="content">
            <h1>Lelang Barang Anda <span>Disini</span></h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
        </main> 
    </section>

    <!-- hero section end -->

    <!-- about section start -->

    <section id="about" class="about">
        <h2><span> Tentang</span> Kami</h2>

        <div class="row">
            <div class="about-img">
                <img src="img/tentang-kami.jpg " alt="Tentang-kami">
            </div>
            <div class="content">
                <h3>kenapa memilih Website kami</h3>
                <p>Website kami memiliki fitur yang cukup lengkap untuk program lelang.</p>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi ducimus numquam iste necessitatibus delectus temporibus voluptas tempora optio. Exercitationem tempora quas modi quasi consequuntur mollitia deleniti atque! Aut, nesciunt qui.</p>
            </div>
        </div>
    </section>

    <!-- about section end -->

    <!-- menu section start -->

    <section id="menu" class="menu">
        <h2><span> Koleksi Barang</span> Kami</h2>
        <p>Disini anda bisa melihat barang yang akan kami lelang.</p>

        <div class="row">
            {{-- <div class="menu-card">
                @foreach ($lelangs as $item)
                <div class="menu-card" class="menu-card-img">
                    @if ($item -> barang -> image)
                    <img src="{{ asset('storage/' . $item->barang->image) }}" alt="{{ $item->barang->image }}" class="img-fluid mt-3" style="width:25%;">
                    @endif
                </div>
                @endforeach
            </div> --}}
            @foreach ($barangs as $item)
            <div class="menu-card">
                <div class="menu-card" class="menu-card-img">
                    @if ($item -> image)
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->image }}" class="img-fluid mt-3">
                    @endif
                </div>
            </div>
            @endforeach
            <div class="menu-card">
                <img src="img/menu/1.jpg" alt="Espresso" class="menu-card-img">
                <h3 class="menu-card-title">- Espresso -</h3>
                <p>IDR 15k</p>
                <p class="menu-card-price"></p>
            </div>
            <div class="menu-card">
                <img src="img/menu/1.jpg" alt="Espresso" class="menu-card-img">
                <h3 class="menu-card-title">- Espresso -</h3>
                <p>IDR 15k</p>
                <p class="menu-card-price"></p>
            </div>
            <div class="menu-card">
                <img src="img/menu/1.jpg" alt="Espresso" class="menu-card-img">
                <h3 class="menu-card-title">- Espresso -</h3>
                <p>IDR 15k</p>
                <p class="menu-card-price"></p>
            </div>
            <div class="menu-card">
                <img src="img/menu/1.jpg" alt="Espresso" class="menu-card-img">
                <h3 class="menu-card-title">- Espresso -</h3>
                <p>IDR 15k</p>
                <p class="menu-card-price"></p>
            </div>
            <div class="menu-card">
                <img src="img/menu/1.jpg" alt="Espresso" class="menu-card-img">
                <h3 class="menu-card-title">- Espresso -</h3>
                <p>IDR 15k</p>
                <p class="menu-card-price"></p>
            </div>
        </div>
    </section>

    <!-- menu section end -->

    <!-- contact section start -->

    <section id="contact" class="contact">
        <h2><span> Kontak</span> Kami</h2>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Optio, aliquam!</p>
    
        <div class="row">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.4580481644844!2d107.3200353142699!3d-6.334660663743015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x70af66934fb9102c!2zNsKwMjAnMDQuOCJTIDEwN8KwMTknMjAuMCJF!5e0!3m2!1sid!2sid!4v1673966999890!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
        <form action="">
            <div class="input-group">
                <i data-feather="user"></i>
                <input type="text" placeholder="masukan nama">
            </div>
            <div class="input-group">
                <i data-feather="mail"></i>
                <input type="text" placeholder="email">
            </div>
            <div class="input-group">
                <i data-feather="phone"></i>
                <input type="text" placeholder="no hp">
            </div>
            <button type="submit" class="btn">kirim pesan</button>
        </form>
        
        </div>
    </section>

    <!-- contact section end -->

    <!-- feather icons js -->
    <script>
        feather.replace()
    </script>

    <!-- my javascript -->
    <script src="js/script.js"></script>
</body>
</html>