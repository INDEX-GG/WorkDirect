

"use strict";
//Импорты
import './Moduls/sort';
import axios from 'axios';
import Post from '../../../bd.json';



document.addEventListener('DOMContentLoaded', function () {
    /* activeCategory();
    formsend(); */

});

$(window).on("scroll", function () {
    var scrolled = $(this).scrollTop();
    if (scrolled > 5) {
        $('.header-main').addClass('header-fix');
    }
    if (scrolled <= 5) {
        $('.header-main').removeClass('header-fix');
    }
});

/* var data = [Post, { startPrice: "", contractual: undefined }]; */
var index;
let posts;
let startPrice;
let contractual;
document.addEventListener('DOMContentLoaded', function () {
    let count = document.querySelector('.count');
    let title = document.querySelector('.items__top_title')
    // let countText = document.querySelector('.items__top_title');
    // let item = document.querySelector('.item');
    let card = document.querySelector('.items_main');
    /*    const btnMore = document.querySelector('.qwe');
       btnMore.addEventListener('click',  Render(index = 10) ) */



    function Render() {

        document.querySelector('.select__current').innerHTML = 'По умолчанию';
        card.innerHTML = '';
        document.querySelector('.placeholder_box').innerHTML = ''
        let addPost = 13;
        let numberPost = 1;
        // console.log(data);
        // console.log(card);
        // console.log(data);
        data[0].posts.map((post, index) => {

            // console.log(post)

            // if (numberPost == addPost) {
            //     addPost += 12;
            //     card.innerHTML += `
            //     <div class="item__add"></div>`
            //     return;
            // }

            // (data[1].contractual != true ? Number(post.price) >= Number(data[1].startPrice) && post.showPrice != null && post.showPrice != '' && post.showPrice != 'Договорная' : post.price == 0 || Number(data[1].startPrice) <= Number(post.price))

            if (true) {
                if (card) {
                    numberPost += 1
                    card.innerHTML += `
                    <a href=${post.href} target="_blank" data-price='${post.price}' data='${DateMonster(post.days)}' data-day='${Data2Main(DateMonster(post.days))} '>
                    <div class="item">
                    <div class="item__top">
                        <h3>${post.title}</h3>
                        <button class="item-like"></button>
                    </div>
                    <div class="card-middle">${post.discription.length > 60 ? post.discription.slice(0, 60) + '...' : post.discription == 'Не указано' || post.discription == 'Отсутствует' ? '' : post.discription}
                        <p class="card-text">${post.showPrice == null ? '' : post.showPrice.length == 0 ? 'Договорная' : post.showPrice}</p>
                    </div>
                    <div class="card-down">
                        <span class="card-date">Размещено  ${DataMain(DateMonster(post.days))} </span>
                        <div class="btn_watch">${((post.href).split('//')[1]).split('/')[0]}</div>
                    </div>
                    </div>
                    </a>`;
                } else {
                    // console.log('Нет')
                }
            }
            document.body.classList.add('loaded_hiding');
            document.body.classList.add('loaded');
            document.body.classList.remove('loaded_hiding');
            document.querySelector('.items__top_block .select__header').style.visibility = 'visible';
        })
        count.innerHTML = card.childElementCount;
        title.innerHTML = `Мы нашли для вас <span class="count">${card.childElementCount}</span> подходящих проектов`;
    }
    /* Render(); */

    var query;
    const form = document.querySelector('.form1');
    const checkbox = document.querySelector('.contractual');

    checkbox.addEventListener('change', function () {
        if (this.checked) {
            contractual = true;
        } else contractual = false;
    })

    form.addEventListener('submit', getPosts);
    function getPosts(e) {
        e.preventDefault()
        let elem = e.target
        let formData = {
            input: elem.querySelector('[name="input"]').value,
            startPrice: elem.querySelector('[name="startPrice"]').value,
            contractual: contractual
        }
        query = formData.input
        getData(query, formData)
    }

    var data = []
    function getData(query = 'разработка', { ...formData }) {
        
        document.querySelector('.select__current').innerHTML = ''
        title.innerHTML = ''
        document.querySelector('.placeholder_box').innerHTML = `<div class="preloader_items">
        <div class="preloader__row">
            <div class="preloader__item"></div>
            <div class="preloader__item"></div>
        </div>
    </div>
    <h2  class="preloader__text">Мы собираем заказы для вас</h2>`
        card.innerHTML = '';

        // count.innerHTML = '0';
        // console.log(query);
        // console.log(formData);
        // console.log(data);
        posts = [];



        axios.get("/tasks?request=" + query)
            .then((response) => {
                data = [{ "posts": [...response.data] }, formData]
                // console.log(data);
                Render(data);
                axios.get("/tasks1?request=" + query)
                    .then((response) => {
                        data = [{ "posts": [...data[0].posts, ...response.data] }, formData]
                        // console.log(data);
                        Render(data);
                    })
                /*  axios.get("/tasks2?request=" + query)
                     .then((response) => {
                         data = [{ "posts": [...data[0].posts, ...response.data] }, formData]
                         // console.log(data);
                         Render(data); */
                axios.get("/tasks3?request=" + query)
                    .then((response) => {
                        data = [{ "posts": [...data[0].posts, ...response.data] }, formData]
                        // console.log(data);
                        Render(data);
                    })
                axios.get("/tasks4?request=" + query)
                    .then((response) => {
                        data = [{ "posts": [...data[0].posts, ...response.data] }, formData]
                        // console.log(data);
                        Render(data);
                    })
                axios.get("/tasks5?request=" + query)
                    .then((response) => {
                        data = [{ "posts": [...data[0].posts, ...response.data] }, formData]
                        // console.log(data);
                        Render(data);
                    })

                /*  }) */


            })
    }





    getData2()
    function getData2(query = 'разработка') {
        // count.innerHTML = '0';
        // console.log(query);
        let formData = {
            input: '',
            startPrice: '',
            contractual: ''
        }
        // console.log(formData);
        // console.log(data);
        posts = [];
        // card.innerHTML = `<div class="preloader_items"><div class="preloader__row"><div class="preloader__item"></div><div class="preloader__item"></div></div></div><h2 class="preloader__text">Мы собираем заказы для вас</h2>`;

        axios.get("/tasks?request=" + query)
            .then((response) => {
                data = [{ "posts": [...response.data] }, formData]
                // console.log(data);
                Render(data);
                axios.get("/tasks1?request=" + query)
                    .then((response) => {
                        data = [{ "posts": [...data[0].posts, ...response.data] }, formData]
                        // console.log(data);
                        Render(data);
                    })
                axios.get("/tasks3?request=" + query)
                    .then((response) => {
                        data = [{ "posts": [...data[0].posts, ...response.data] }, formData]
                        // console.log(data);
                        Render(data);
                    })
                axios.get("/tasks4?request=" + query)
                    .then((response) => {
                        data = [{ "posts": [...data[0].posts, ...response.data] }, formData]
                        // console.log(data);
                        Render(data);
                    })
                axios.get("/tasks5?request=" + query)
                    .then((response) => {
                        data = [{ "posts": [...data[0].posts, ...response.data] }, formData]
                        // console.log(data);
                        Render(data);
                    })



            })
    }




})


function DateMonster(str) {
    const dateRegExp = /^\d{2}([./-])\d{2}\1\d{4}$/;
    if (str == 1) {
        return new Date();
    } else if (str.toLowerCase().indexOf('минут') !== -1) {
        let date = new Date()
        str = str.replace('~', '');
        date.setMinutes(date.getMinutes() - parseInt(str))
        return date;
    } else if (str.toLowerCase().indexOf('час') !== -1) {
        let date = new Date()
        str = str.replace('~', '');
        date.setHours(date.getHours() - parseInt(str))
        return date;
    } else if (str.toLowerCase().indexOf('дн') !== -1) {
        let date = new Date()
        str = str.replace('~', '');
        date.setHours(date.getHours() - 24 * parseInt(str))
        return date;
    } else if (str.match(dateRegExp)) {
        let res = str.split('.');
        res = [res[0], res[1], res[2]] = [res[1], res[0], res[2]];
        res = res.join('.');
        return new Date(res);
    } else {
        return new Date();
    }
};

function DataMain(str) {
    const adDate = new Date(str),
        options = {
            month: 'long',
            day: 'numeric',
            hour: 'numeric',
            minute: 'numeric'
        }
    return adDate.toLocaleString("ru", options);
}


function Data2Main(str) {
    const adDate = Math.floor(new Date(str).getTime() / 1000.0);
    return adDate;
}