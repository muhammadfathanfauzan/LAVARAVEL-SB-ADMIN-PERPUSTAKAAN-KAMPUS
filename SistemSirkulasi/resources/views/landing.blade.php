<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Perpus FTII UHAMKA | Yuk Membaca!</title>
    <meta name="description" content="Perpustakaan elektronik Indonesia, tempat membaca dan upgrade ilmu pengetahuan">

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo-eperpus.svg') }}" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/style.css') }}">
</head>

<body>
    <header>
        <div class="logo-header">
            <img src="{{ asset('assets/user/img/logo-eperpus.svg') }}" alt="logo e-perpus" title="E-Perpus Indonesia">
            <h1>E-Perpus</h1>
        </div>
        <nav class="nav-header">
            <ul>
                <li><a href="#">Beranda</a></li>
                <li><a href="#">Kategori</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#tentang">Tentang</a></li>
            </ul>
        </nav>
        <div class="login-header"> <a href="databuku">Masuk</a></div>
        <div class="menu-mobile">
            <input type="checkbox">
            <p>Menu</p>
        </div>
    </header>

    <main>
        <div class="container-landing">
            <div class="landing-kiri">
                <p>Mari baca buku dan tingkatkan ilmu</p>
                <h2>Selamat Datang <br>Di E-Perpus <br>FTII UHAMKA</h2>
                <p>Yuk, belajar dan membaca!</p>

                <div class="button-landing">
                    <button class="mulai-button"><a href="#buku">Mulai Baca!</a></button>
                    <button class="jelajahi-button"><a href="#buku">Jelajahi</a></button>
                </div>
            </div>
            <div class="landing-kanan">
                <img src="{{ asset('assets/user/img/buku-landing.svg') }}" alt="buku landing">
            </div>
        </div>

        <div class="content-sidebar" id="buku">
            <div class="content">
                @foreach ($books as $book)
                <article>
                    <div class="card-book">
                        <img src="{{ asset('assets/user/img/' . $book->image) }}" alt="{{ $book->title }}">
                        <div class="deskripsi-book">
                            <h3>{{ $book->title }}</h3>
                            <p>{{ $book->author }}</p>
                            <button>Baca</button>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
            <aside id="tentang">
                <div class="avatar">
                    <img src="{{ asset('assets/user/img/fotoku.png') }}" alt="Avatarku">
                </div>
                <h3>Author E-Perpus</h3>
                <p>Nama: Harlin Navi</p>
                <p>Usia: 29 Tahun</p>
                <p>Asal: Indonesia</p>
                <button><a href="mailto:2103015214@gmail.com">Email Me</a></button>
            </aside>
        </div>
    </main>

    <footer>
        <div class="footer-satu">
            <div class="logo-footer">
                <img src="{{ asset('assets/user/img/logo-eperpus.svg') }}" alt="logo e-perpus">
                <p>Sebuah perpustakaan online, tempat membaca dan tingkatkan pengetahuan!</p>
            </div>
            <div class="kategori-footer">
                <h2>Kategori</h2>
                <ul>
                    <li><a href="#">Pemrograman</a></li>
                    <li><a href="#">Keuangan</a></li>
                    <li><a href="#">Self Improvement</a></li>
                    <li><a href="#">Cerita Fiksi</a></li>
                </ul>
            </div>
            <div class="sosial-media">
                <h2>Sosial Media</h2>
                <ul>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">Youtube</a></li>
                </ul>
            </div>
            <div class="learn-more">
                <h2>Learn More</h2>
                <ul>
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Faq</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-dua">
            <p>Copyright &copy; HARLIAN NAVI</p>
        </div>
    </footer>

    <script src="{{ asset('assets/user/js/app.js') }}"></script>
</body>

</html>
