<!--Estructura de html-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
<!--==============FLATICON==================-->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
<!--================CSS===================-->
    <link rel="stylesheet" href="/Assets/CSS/styles.css">
<!--==============SWIPER CSS===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
</head>
    <body>
        <header class="header">
            <div class="header__top">
                <div class="header__container container">
                    <div class="header__contact">
                        <span>(+52) 336-456-5678</span>
                        <span>Localizacion</span>
                    </div>
                    <p class="header__alert-news">super ofertas - ahorra más con cupones</p>
                    <a href="login-register.php" class="header__top-action">Log In/Sign Up</a>
                </div>
            </div>

            <nav class="nav container">
                <a href="Index.php" class="nav__logo">
                    <img src="/Assets/Img/logo2.png" alt="" class="nav__logo-img">
                </a>
                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="Index.php" class="nav__link active-link">Home</a>
                        </li>

                        <li class="nav__item">
                            <a href="Shop.php" class="nav__link">Tienda</a>
                        </li>

                        <li class="nav__item">
                            <a href="Accounts.php" class="nav__link">Mi cuenta</a>
                        </li>

                        <li class="nav__item">
                            <a href="Compare.php" class="nav__link">Comparar</a>
                        </li>

                        <li class="nav__item">
                            <a href="login-register.php" class="nav__link">Login</a>
                        </li>
                    </ul>

                    <div class="header__search">
                        <input type="text" placeholder="Busca un Articulo..." class="form__input">
                        <button class="search__btn">
                            <img src="/Assets/Img/search.png" alt="">
                        </button>
                    </div>
                </div>

                <div class="header__user-actions">
                    <a href="wishlist.php" class="header__action-btn">
                        <img src="/Assets/Img/icon-heart.svg" alt="">
                        <span class="count">3</span>
                    </a>

                    <a href="Cart.php" class="header__action-btn">
                        <img src="/Assets/Img/icon-cart.svg" alt="">
                        <span class="count">3</span>
                    </a>
                </div>
            </nav>
        </header>
        <main class="main">
    <!--===============HOME==================-->
            <section class="home section--lg">
                <div class="home__container container grid">
                    <div class="home__content">
                        <span class="home__subtitle">Super Ofertas</span>
                        <h1 class="home__title">Tendencias de Moda, <span>Gran Coleccion</span></h1>
                        <p class="home__description">Ahorra mas con cupones y consigue un descuento de 20%</p>
                        <a href="Shop.php" class="btn">Compra Ahora</a>
                    </div>

                    <img src="Assets/Img/cr7.png" alt="" class="home__img">
                </div>
            </section>
    <!--===============CATEGORIES==================-->
            <section class="categories container section">
                <h3 class="section__title">Categoria: <span>Populares</span></h3>
                <div class="categories__container swiper">
                    <div class="swiper-wrapper">

                            <?php
                            $server = "localhost";
                            $pass = "";
                            $user = "root";
                            $db = "tienda";
                            $con=mysqli_connect($server, $user, $pass, $db) or die("Error al conectarse a la base de datos");
                            $query = "SELECT nombre, Img FROM popular";
                            $res= mysqli_query($con,$query);
                            while($column=mysqli_fetch_assoc($res))
                            {
                            ?>
                            <a href="Shop.php" class="category__item swiper-slide">
                                <img class="category__img" src="data:image/jpg;base64,<?php echo base64_encode($column['Img']);?>" alt="" >
                                <h3 class="category__title"><?php echo $column['nombre']?></h3>
                            </a>
                            <?php
                            }
                            ?>

                    </div>
                    <div class="swiper-button-next"><i class="fi fi-sr-angle-right"></i></div>
                    <div class="swiper-button-prev"><i class="fi fi-sr-angle-left"></i></div>

                </div>
            </section>
    <!--===============PRODUCTS==================-->
            <section class="products section container">
                <div class="tab__btns">
                    <span class="tab__btn active-tab">Destacado</span>
                    <span class="tab__btn">Popular</span>
                    <span class="tab__btn">Nuevos</span>
                </div>

                <div class="tab__items">
                    <div class="tab__item">

                        <div class="products__container grid">
                            <?php
                            $sqlProd = "SELECT * FROM productos";
                            $resProd = mysqli_query($con,$sqlProd);

                            while($columnProd=mysqli_fetch_assoc($resProd))
                            {
                            ?>
                            <div class="product__item">
                                <div class="product__banner">
                                    <a href="Details.php" class="product__images">
                                        <img src="data:<?php echo $columnProd['tipo'];?>;base64,<?php echo base64_encode($columnProd['Img']);?>" alt="" class="product__img default">

                                        <img src="data:<?php echo $columnProd['tipo'];?>;base64,<?php echo base64_encode($columnProd['Img2']);?>" alt="" class="product__img hover">
                                    </a>
                                    <div class="product__actions">
                                        <a href="#" class="action__btn" aria-label="Quick View">
                                            <i class="fi fi-rr-eye"></i>
                                        </a>
                                        <a href="#" class="action__btn" aria-label="Añadir a lista de deseados">
                                            <i class="fi fi-rr-heart"></i>
                                        </a>
                                        <a href="#" class="action__btn" aria-label="Compare">
                                            <i class="fi fi-rr-shuffle"></i>
                                        </a>
                                    </div>
                                    <div class="product__badge light-pink"><?php echo $columnProd['badge']?></div>
                                </div>
                                <div class="product__content">
                                    <span class="product-category"><?php echo $columnProd['categoria']; ?></span>
                                    <a href="Details.php">
                                        <h3 class="product__title"><?php echo $columnProd['nombre'];?></h3>
                                    </a>
                                    <div class="product__rating">
                                        <?php
                                        $rating = $columnProd['rating'];
                                        for($i=0;$i<$rating;$i++) {
                                          ?>
                                            <i class="fi fi-rs-star"></i>
                                           <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="product__price flex">
                                        <span class="new__price"><?php echo $columnProd['precio']; ?></span>
                                        <span class="new__price"><?php echo $columnProd['precioOriginal']; ?></span>
                                    </div>
                                    <a href="#" class="action__btn cart__btn" aria-label="añadir al carrito">
                                        <i class="fi fi-rr-shopping-bag-add"></i>
                                    </a>
                                </div>
                            </div>
                            <?php
                            }
                            mysqli_close($con);
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        </main>
<!--=================SWIPER JS================-->
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<!--=================MAIN JS================-->
        <script src="/Assets/JS/main.js"></script>
    </body>
</html>
