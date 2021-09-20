<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="Hugo 0.83.1">
    <title>WorkDirect — Агрегатор бирж фриланса</title>
    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/"> -->
    <link rel="stylesheet" href="./css/style.min.css">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="./img/favicon.ico" sizes="180x180">
    <link rel="icon" href="./img/favicon.ico" sizes="32x32" type="image/png">
    <link rel="icon" href="./img/favicon.ico" sizes="16x16" type="image/png">
    <link rel="manifest" href="./img/favicon.ico">
    <link rel="mask-icon" href="./img/favicon.ico" color="#7952b3">
    <link rel="icon" href="./img/favicon.ico">
    <meta name="theme-color" content="#7952b3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src='./js/bundle.js'></script>
<style>
    .preloader {
      position: fixed;
      left: 0;
      top: 0;
      right: 0;
      bottom: 0;
      background: #f2f7f9;
      z-index: 1001; 
    }

    .preloader__row {
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

    .preloader__item {
      position: absolute;
      display: inline-block;
      top: 0;
      background-color: #0381a8;
      border-radius: 100%;
      width: 35px;
      height: 35px;
      animation: preloader-bounce 2s infinite ease-in-out;
    }

    .preloader__item:last-child {
      top: auto;
      bottom: 0;
      animation-delay: -1s;
    }

    @keyframes preloader-rotate {
      100% {
        transform: rotate(360deg);
      }
    }

    @keyframes preloader-bounce {

      0%,
      100% {
        transform: scale(0);
      }

      50% {
        transform: scale(1);
      }
    }

    .loaded_hiding .preloader {
      transition: 0.3s opacity;
      opacity: 0;
      z-index: -1000000;
    }

    .loaded .preloader {
      display: none;
      z-index: -1000000;
    }
  </style>

    <script>
  
  </script>
  
</head>

<body>
<!-- <div class="preloader">
    <div class="preloader__row">
      <div class="preloader__item"></div>
      <div class="preloader__item"></div>
    </div>
</div> -->

    <header class="header-main">
        <div class="wrapper-xm">
            <div class="header">
                <a href="/" class="header_logo">
                    <img class="logo" src="/img/logo.svg" alt="">
                </a>
                <!-- <button class="button btn__login">Вход</button> -->
            </div>
        </div>
    </header>

    <div class="main__block">
        <div class='main__add'>
            <!-- <img src="" alt="add" class="main__add-img"> -->
        </div>
        <div class="wrapper">
            <form class="form1">
                <div class="search_panel">
                    <div class="search_panel_header">
                        <p>Найти проект в категории</p>
                        <div class="btns__categories">
                            <input value='Разработка и IT' type="button" class="btn__category">
                            <button class="btn__category">Дизайн</button>
                            <button class="btn__category">СММ и тексты</button>
                            <button class="btn__category">Аудио, видео,презентации</button>
                            <button class="btn__category">Бизнес и информация</button>
                        </div>
                    </div>
                    <div class="search_panel_body">
                        <div class="search_panel_input__block_title">
                            <input type="text" placeholder="Поиск по проектам" type="input" class="main__input"
                                name="input">
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
                            <input type="text" class="startPrice" placeholder="Цена от" type="input"  name="startPrice">
                            <div class="search_panel_input__block_radio_boxs">
                                <span><label class="container-checkbox" >
                                        <input type="checkbox"
                                        checked class="contractual"  >
                                        <span class="checkmark"></span>
                                    </label>Включая договорную цену</span>
                            </div>
                        </div>
                        <div class="search_panel_input__block_date">
                            <div class="select">
                                <input class="select__date" value="Дата размещения" type="button"></input>

                                <div class="select__date_body">
                                    <div class="select__item">Сегодня</div>
                                    <div class="select__item" >3 дня</div>
                                    <div class="select__item">Неделя</div>
                                    <div class="select__item">За весь период</div>
                                </div>

                            </div>
                        </div>
                        <button class="button btn__search" type="submit">Найти</button>
                    </div>
                </div>
            </form>
        </div>
       

        <div class="wrapper">
            <div class="wrapper__inner">
                <div class="items">
                    <div class="items__top_block">
                        <h2 class="items__top_title"><span class="count"></span></h2>
                        <div class="select">
                            <div class="select__header">
                                <span class="select__current"></span>
                                <div class="select__icon"></div>
                            </div>
                            <div class="select__body">
                                <div class="select__item">По умолчанию</div>
                                <div class="select__item sortDate">Сначала новые</div> 
                                <div class="select__item">Дешевле</div>
                                <div class="select__item">Дороже</div>
                            </div>
                        </div>
                    </div>
                
                    <div class="placeholder_box">
                        <div class="preloader_items">
                            <div class="preloader__row">
                                <div class="preloader__item"></div>
                                <div class="preloader__item"></div>
                            </div>
                        </div>
                        <h2  class="preloader__text">Мы собираем заказы для вас</h2>
                    </div>

                    <div class="items_main">
                    </div>
                </div>
                <div class="wrapper__add">
                    <!-- <img class="main__add-img" src="" alt="add2"> -->
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="wrapper-xm">
            <div class="footer">
                <div class="footer__information">
                    <span>Агрегатор бирж фриланса WorkDirect</span>
                    <span> <a href="mailto:help@workdirect.ru" >help@workdirect.ru</a></span>
                </div>
                <a class="developments" href="https://www.instagram.com/index.ds/">Разработано студией INDEX</a>
                <div class="footer__social_network">
                    <a class="icon_fb" href="https://www.facebook.com/INDEX-103634548475412/"></a>
                    <a class="icon_vk" href="https://vk.com/index_ds"></a>
                    <a class="icon_li" href="https://www.linkedin.com/company/index-digital-studio"></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
        crossorigin="anonymous"></script>

</body>

</html>