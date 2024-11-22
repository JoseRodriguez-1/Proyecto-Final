<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda de Videojuegos Retro</title>
    <link rel="stylesheet" href="estilo1.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="funciones.js" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Automatización del Carrusel de Ofertas
            const carouselOfertas = document.getElementById('carousel-ofertas');
            const slideOfertas = carouselOfertas.querySelector('.carousel-slide');
            const itemsOfertas = slideOfertas.querySelectorAll('.carousel-item');
            let currentIndexOfertas = 0;

            function moveSlideAuto() {
                currentIndexOfertas++;
                if (currentIndexOfertas >= itemsOfertas.length) {
                    currentIndexOfertas = 0;
                }
                slideOfertas.style.transform = `translateX(${-currentIndexOfertas * 100}%)`;
                slideOfertas.setAttribute('data-current-index', currentIndexOfertas);
            }

            setInterval(moveSlideAuto, 3000); // Cambia de diapositiva cada 3 segundos
        });

        document.addEventListener("DOMContentLoaded", function() {
    const hamburgerMenu = document.getElementById('hamburger-menu');
    const navLinksContainer = document.getElementById('nav-links-container');

    hamburgerMenu.addEventListener('click', function() {
        navLinksContainer.classList.toggle('show');
        navLinksContainer.classList.toggle('hidden');
    });
});
    </script>
</head>
<body>
    <header>
        <div class="header-container">
            <h1>Tienda de Videojuegos Retro</h1>
            <div class="header-icons">
                <?php
                if (isset($_SESSION['username'])) {
                    echo "<p>Bienvenido, " . ($_SESSION['username']) . "</p>";
                } else {
                    echo '<a href="inicio_sesion.php"><img src="img/extra/contacto.png" alt="Usuario" class="icon"></a>';
                }
                ?>
                <div class="icon-container">
                    <a href="carrito_compra.html" title="Carrito de Compras">
                        <img src="img/extra/carrito-de-compras.png" alt="Carrito" class="icon">
                        <span id="cart-counter" class="cart-counter">0</span>
                    </a>
                </div>
            </div>
        </div>
    </header>
<nav>
    <div class="nav-container">
        <div class="nav-links-container">
            <a href="index.html" class="nav-link">
                <img src="img/extra/fogata logo.jpeg" alt="Inicio" class="nav-icon"> Inicio
            </a>
            <a href="nintendo.html" class="nav-link">
                <img src="img/extra/logo nintendo.jpeg" alt="Nintendo" class="nav-icon"> Nintendo
            </a>
            <a href="playstation.html" class="nav-link">
                <img src="img/extra/playstation logo.jpeg" alt="PlayStation" class="nav-icon"> Playstation
            </a>
            <a href="xbox.html" class="nav-link">
                <img src="img/extra/xbox logo.jpeg" alt="Xbox" class="nav-icon"> Xbox
            </a>
        </div>
    </div>
</nav>

    
    
    
    
    
    
    <section id="usuario">
        <div class="welcome-content">
            <div class="welcome-text-box">
                <div class="welcome-text">
                    <h1>¡Bienvenido a Tienda Retro Games!</h1>
                    <p>Donde los clásicos nunca mueren y la diversión revive.</p>
                    <p>En <strong>Tienda Retro Games</strong>, tenemos un gran catálogo de <strong>videojuegos y consolas</strong> de los <strong>80's, 90's y 2000's</strong>. Desde las consolas más icónicas hasta los juegos que marcaron generaciones, ¡los tenemos todos!</p>
                    <p>Revive esas tardes después de la escuela jugando con tus amigos, y lleva contigo esos momentos mágicos con nuestras consolas y títulos legendarios. ¡No importa tu edad, la nostalgia no tiene límites!</p>
                    
                </div>
            </div>
            <div class="gifs-container">
                <div class="gif-box">
                    <img src="img/extra/mario.webp" alt="Mario saltando" class="gif">
                    <p class="gif-caption">¡Es-a-me, Mario!</p>
                </div>
                <div class="gif-box">
                    <img src="img/extra/sonic.webp" alt="Sonic corriendo" class="gif">
                    <p class="gif-caption">Sonic siempre está listo para la acción</p>
                </div>
                <div class="gif-box">
                    <img src="img/extra/pikachu.webp" alt="Pikachu saludando" class="gif">
                    <p class="gif-caption">Pikachu te saluda con una sonrisa electrizante</p>
                </div>
            </div>
        </div>
    </section>
    
    <div class="container">

        <section id="ofertas">
            <h2 class="ofertas-titulo">Ofertas Especiales</h2>
            <div class="carousel-container" id="carousel-ofertas">
                <div class="carousel-slide" data-current-index="0">
                    
                    <div class="carousel-item oferta">
                        
                        <img src="img/pr/pack.nes.jpg" alt="Paquete de consola NES" class="producto-img" >
                        <h3 class="producto-titulo">Paquete NES</h3>
                        <p class="precio-antes">Antes: $250.00</p>
                        <p class="precio-ahora">Ahora: <strong>$214.00</strong></p>
                        <a href="nintendo.html">
                        <button class="button añadir-carrito" >⭐ Ir a oferta</button> 
                        </a>
                    </div>
                    <div class="carousel-item oferta">
                        <img src="img/pr/gameboy advance.jpeg" alt="Consola GameBoy Advance" class="producto-img" >
                        <h3 class="producto-titulo">Gameboy Advance</h3>
                        <p class="precio-antes">Antes: $180.00</p>
                        <p class="precio-ahora">Ahora: <strong>$150.00</strong></p>
                        <a href="nintendo.html">
                            <button class="button añadir-carrito" >⭐ Ir a oferta</button> 
                        </a>
                        <!--<button class="button añadir-carrito" onclick="addToCart('Gameboy Advance', 150, 'gameboy advance.jpeg')">⭐ Añadir al Carrito</button> !-->
                    </div>
                    <div class="carousel-item oferta">
                        <img src="img/pr/play1.jpeg" alt="Consola Playstation 1" class="producto-img">
                        <h3 class="producto-titulo">Playstation 1</h3>
                        <p class="precio-antes">Antes: $200.00</p>
                        <p class="precio-ahora">Ahora: <strong>$160.00</strong></p>
                        <a href="playstation.html">
                            <button class="button añadir-carrito" >⭐ Ir a oferta</button> 
                        </a>
                        <!-- <button class="button añadir-carrito" onclick="addToCart('Playstation 1', 160, 'play1.jpeg')">⭐ Añadir al Carrito</button> !-->
                    </div>
                    <div class="carousel-item oferta">
                        <img src="img/pr/need1.jpeg" alt="Juego Need for Speed 2" class="producto-img">
                        <h3 class="producto-titulo">Need for Speed 2</h3>
                        <p class="precio-antes">Antes: $90.00</p>
                        <p class="precio-ahora">Ahora: <strong>$70.00</strong></p>
                        <a href="playstation.html">
                            <button class="button añadir-carrito" >⭐ Ir a oferta</button> 
                        </a>
                        <!-- <button class="button añadir-carrito" onclick="addToCart('Need for Speed 2', 70, 'need1.jpeg')">⭐ Añadir al Carrito</button> !-->
                    </div>
                </div>

            </div>
        </section>
        

        <!-- Sección de Nuevos Productos -->
        <section id="ofertas">
            <h2 class="ofertas-titulo">Nuevos Productos</h2>
            <div class="carousel-container" id="carousel-ofertas">
                <div class="carousel-slide" data-current-index="0">
                    
                    <div class="carousel-item oferta">
                        
                        <img src="img/pr/xbox reach.jpg" alt="Xbox reach" class="producto-img" >
                        <h3 class="producto-titulo">Xbox Reach Edition</h3>
                       
                        <p class="precio-ahora">Precio<strong>$180.00</strong></p>
                        <a href="xbox.html">
                        <button class="button añadir-carrito" >⭐ Ir a producto</button> 
                        </a>
                    </div>
                    <div class="carousel-item oferta">
                        <img src="img/pr/gameboy advance.jpeg" alt="Consola GameBoy Advance" class="producto-img" >
                        <h3 class="producto-titulo">Gameboy Advance</h3>
                        <p class="precio-antes">Antes: $180.00</p>
                        <p class="precio-ahora">Ahora: <strong>$150.00</strong></p>
                        <!--<button class="button añadir-carrito" onclick="addToCart('Gameboy Advance', 150, 'gameboy advance.jpeg')">⭐ Añadir al Carrito</button> !-->
                    </div>
                    <div class="carousel-item oferta">
                        <img src="img/pr/play1.jpeg" alt="Consola Playstation 1" class="producto-img">
                        <h3 class="producto-titulo">Playstation 1</h3>
                        <p class="precio-antes">Antes: $200.00</p>
                        <p class="precio-ahora">Ahora: <strong>$160.00</strong></p>
                        <!-- <button class="button añadir-carrito" onclick="addToCart('Playstation 1', 160, 'play1.jpeg')">⭐ Añadir al Carrito</button> !-->
                    </div>
                    <div class="carousel-item oferta">
                        <img src="img/pr/need1.jpeg" alt="Juego Need for Speed 2" class="producto-img">
                        <h3 class="producto-titulo">Need for Speed 2</h3>
                        <p class="precio-antes">Antes: $90.00</p>
                        <p class="precio-ahora">Ahora: <strong>$70.00</strong></p>
                        <!-- <button class="button añadir-carrito" onclick="addToCart('Need for Speed 2', 70, 'need1.jpeg')">⭐ Añadir al Carrito</button> !-->
                    </div>
                </div>

            </div>
        </section>

        <!-- Sección de Blog -->
        <section id="blog">
            <h2>Blog Retro</h2>
            <div class="blog-entries-container">
                <div class="blog-entry">
                    <img src="img/extra/nintendo 64.webp" alt="Historia del Nintendo 64" class="blog-image">
                    <div class="blog-content">
                        <h3>La Historia del Nintendo 64</h3>
                        <p>Descubre cómo Nintendo revolucionó la industria con el lanzamiento del Nintendo 64 y sus icónicos títulos...</p>
                        <a href="nintendo64.html" class="button blog-button">Leer Más</a>
                    </div>
                </div>
                <div class="blog-entry">
                    <img src="img/extra/xbox.webp" alt="Retro Gaming" class="blog-image">
                    <div class="blog-content">
                        <h3>El Renacimiento de los Videojuegos Retro</h3>
                        <p>La nostalgia trae de vuelta las consolas clásicas. Exploremos el impacto de los videojuegos retro en la cultura pop actual...</p>
                        <a href="Info/historia juegos.html" class="button blog-button">Leer Más</a>
                    </div>
                </div>
                <div class="blog-entry">
                    <img src="img/extra/juegos clasicos.webp" alt="Juegos Clásicos" class="blog-image">
                    <div class="blog-content">
                        <h3>Los 10 Mejores Juegos Clásicos de Todos los Tiempos</h3>
                        <p>Repasemos los juegos más emblemáticos de la era dorada de los videojuegos. ¿Cuántos de estos conoces y has jugado?...</p>
                        <a href="top10_clasicos.html" class="button blog-button">Leer Más</a>
                    </div>
                </div>
            </div>
        </section>
        

        <!-- Sección de Galería -->
        <section id="galeria">
            <h2>Galería de la Nostalgia</h2>
            <div class="gallery">
                <img src="img/pr/retro_mario.jpg" alt="Mario" class="gallery-item">
                <img src="img/pr/zelda.jpg" alt="Zelda" class="gallery-item">
                <img src="img/pr/Super Nintendo.jpeg" alt="Gameboy" class="gallery-item">
            </div>
        </section>

        <!-- Sección de Noticias -->
        <section id="noticias">
            <h2>Noticias Retro</h2>
            <div class="noticia">
                <div class="noticia-icon">
                    <img src="logo oferta.jpeg" alt="Descuento">
                </div>
                <div class="noticia-texto">
                    <p><strong>¡El próximo fin de semana!</strong> Tendremos un <span class="highlight">20% de descuento</span> en todas las consolas de Sega. ¡No te lo pierdas!</p>
                </div>
            </div>
            <div class="noticia">
                <div class="noticia-icon">
                    <img src="Retro Logo.jpeg" alt="Torneo">
                </div>
                <div class="noticia-texto">
                    <p><strong>Próximo Evento:</strong> <span class="highlight">Torneo Mario Kart Retro</span> - 12 de diciembre. ¡Inscríbete y demuestra que eres el mejor!</p>
                </div>
            </div>
        </section>
        
        <!-- Sección de Ranking de Juegos Populares -->
        <section id="ranking">
            <h2>Juegos Más Populares</h2>
            <div class="ranking-container">
                <div class="ranking-item">
                    <img src="img/pr/ocarina of time.jpeg" alt="The Legend of Zelda: Ocarina of Time">
                    <h3>The Legend of Zelda: Ocarina of Time</h3>
                </div>
                <div class="ranking-item">
                    <img src="img/pr/mario64.jpeg" alt="Super Mario 64">
                    <h3>Super Mario 64</h3>
                </div>
                <div class="ranking-item">
                    <img src="img/pr/street 2.jpeg" alt="Street Fighter II">
                    <h3>Street Fighter II</h3>
                </div>
                <div class="ranking-item">
                    <img src="img/pr/sonic.jpeg" alt="Sonic the Hedgehog">
                    <h3>Sonic the Hedgehog</h3>
                </div>
                <div class="ranking-item">
                    <img src="img/pr/metroid prime.jpeg" alt="Metroid Prime">
                    <h3>Metroid Prime</h3>
                </div>
            </div>
        </section>
        
        <section id="testimonios">
            <h2>Testimonios de Nuestros Clientes</h2>
            <div class="testimonial">
                <p>"¡Las mejores consolas retro! Muy satisfecho con mi compra de un Nintendo 64."</p>
                <p>- Juan Pérez</p>
            </div>
            <div class="testimonial">
                <p>"Gran catálogo de juegos clásicos, me encanta revivir mi niñez con estos títulos."</p>
                <p>- María López</p>
            </div>
        </section>
    </div>
    
    <footer>
        <p>&copy; 2024 Tienda de Videojuegos Retro. Todos los derechos reservados.</p>
        <div class="footer-links">
            <a href="#">Política de Privacidad</a> | 
            <a href="#">Términos y Condiciones</a> | 
            <a href="admin.html">Contacto</a>
        </div>
        <div class="social-icons">
            <a href="#"><img src="img/extra/facebook.png" alt="Facebook"></a>
            <a href="#"><img src="img/extra/twitter.png" alt="Twitter"></a>
            <a href="#"><img src="img/extra/instagram.png" alt="Instagram"></a>
        </div> 
    </footer>
    
    <div id="notification-container"></div>

</body>
</html>
