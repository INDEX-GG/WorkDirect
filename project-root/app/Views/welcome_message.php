<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>Агрегатор</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">
    <link rel="stylesheet" href="./css/style.min.css">


    <!-- Bootstrap core CSS -->
    <!--     <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous"> -->

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src='./js/bundle.js'></script>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        .img-rounded {
            border-radius: 2em;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .preloader {
            position: fixed;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            /* фоновый цвет */
            background: #e0e0e0;
            z-index: 1001;
        }

        .preloader__image {
            position: relative;
            top: 50%;
            left: 50%;
            width: 70px;
            height: 70px;
            margin-top: -35px;
            margin-left: -35px;
            text-align: center;
            animation: preloader-rotate 2s infinite linear;
        }

        @keyframes preloader-rotate {
            100% {
                transform: rotate(360deg);
            }
        }

        .loaded_hiding .preloader {
            transition: 0.3s opacity;
            opacity: 0;
        }

        .loaded .preloader {
            display: none;
        }
    </style>
    <script>
        window.onload = function () {
            document.body.classList.add('loaded_hiding');
            window.setTimeout(function () {
                document.body.classList.add('loaded');
                document.body.classList.remove('loaded_hiding');
            }, 500);
        }


        window.onload = function () {
            var button = document.querySelectorAll(".btn__category"); //returns a 
            Array.from(button).forEach((ele, index) => ele.addEventListener("click", function () {
                for (var i = 0; i < button.length; i++) {
                    button[i].classList.remove("active_category");
                }
                ele.classList.toggle("active_category");
            }, false))
        }

        function openSorting(event) {
            var optionMainBlock = document.querySelector('.option_main_block');
            console.log(optionMainBlock)
            /* if (event.toElement.nextElementSibling.style.display === "block") {
                event.toElement.nextElementSibling.style.display = 'none';
            } */
            event.toElement.nextElementSibling.style.display = 'block';
        }


    </script>
</head>

<body>
    <header class="header-main">
        <div class="wrapper-xm">
            <div class="header">
                <a href="/" class="header_logo">
                    <img class="logo" src="/img/logo.png" alt="">
                </a>
                <button class="button btn__login">Вход</button>
            </div>
        </div>
    </header>

    <div class="main__block">
        <div class="wrapper">
            <div class="search_panel">
                <div class="search_panel_header">
                    <p>Найти проект в категории</p>
                    <div class="btns__categories">
                        <button class="btn__category"><span></span>Разработка и IT<span></span></button>
                        <button class="btn__category"><span></span>Дизайн<span></span></button>
                        <button class="btn__category"><span></span>СММ и тексты<span></span></button>
                        <button class="btn__category"><span></span>Аудио, видео,презентации<span></span></button>
                        <button class="btn__category"><span></span>Бизнес и информация</button>
                    </div>
                </div>
                <form action='/tasks'>
                    <div class="search_panel_body">
                        <div class="search_panel_input__block_title">
                            <input type="text" placeholder="Поиск по проектам" type="input" name="request">

                            <div class="search_panel_input__block_radio_boxs">
                                <span><label class="container-checkbox">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>Сохранить поиск</span>
                                <span><label class="container-checkbox">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>Подписаться на рассылку</span>
                            </div>
                        </div>
                        <div class="search_panel_input__block_price">
                            <input type="text" placeholder="Цена от">

                            <div class="search_panel_input__block_radio_boxs">
                                <span><label class="container-checkbox">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>Включая договорную цену</span>
                            </div>
                        </div>
                        <div class="search_panel_input__block_date">
                            <input type="text" placeholder="Размещено">
                        </div>
                        <button class="button btn__search" type="submit">Найти</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="wrapper">
            <div class="items">
                <div class="items__top_block">
                    <h2>Мы нашли для вас 00 подходящих проектов</h2>
                    <div class="select">
                        <div class="select__header">
                            <span class="select__current">По умолчанию</span>
                            <div class="select__icon"></div>
                        </div>

                        <div class="select__body">
                            <div class="select__item">По умолчанию</div>
                            <div class="select__item">Сначала новые</div>
                            <div class="select__item">Дешевле</div>
                            <div class="select__item">Дороже</div>
                            <div class="select__item">По удаленности</div>
                        </div>
                    </div>

                </div>
                <?php if (!empty($arr)): ?>
                <?php foreach ($arr as $item):?>
                <div class="item">
                    <div class="item__top">
                        <h3>
                            <?= $item["title"] ?>
                        </h3>
                        <button class="item-like"></button>
                    </div>
                    <div class="card-middle">
                        <?= substr($item["discription"],0,50) ?>
                        <p class="card-text">
                            <?= $item["showPrice"] ?>
                        </p>
                    </div>
                    <div class="card-down">
                        <span class="card-date">
                            Размещено
                            <?= $item["date"] ?>
                        </span>
                        <a href=<?=$item["href"] ?>>
                            <button type="button" class="btn_watch">Посмотреть</button>
                        </a>
                    </div>
                </div>
                <?php endforeach;?>
                <?php else: ?>
                <h1>Ничего не найдено :(</h1>
                <?php endif; ?>
            </div>
        </div>
    </div>

    </div>


    <footer>
        <div class="wrapper-xm">
            <div class="footer">
                <div class="footer__information">
                    <span>Агрегатор бирж фриланса WorkDirect</span>
                    <span>+7 (000) 000 - 00 - 00</span>
                    <span>WorkDirect@gmail.com</span>
                </div>
                <a class="developments" href="">Разработано студией INDEX</a>
                <div class="footer__social_network">
                    <a class="icon_fb" href=""></a>
                    <a class="icon_vk" href=""></a>
                    <a class="icon_li" href=""></a>
                </div>
            </div>
        </div>
    </footer>
    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
        crossorigin="anonymous"></script>


</body>

</html>