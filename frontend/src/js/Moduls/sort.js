document.addEventListener('DOMContentLoaded', function () {
    select();
});

var filter = "По умолчанию"
let select = function () {
    let selectHeader = document.querySelectorAll('.select__header');
    let selectItem = document.querySelectorAll('.select__item');

    selectHeader.forEach(item => {
        item.addEventListener('click', selectToggle)
    });

    selectItem.forEach(item => {
        item.addEventListener('click', selectChoose)
    });

    function selectToggle() {
        this.parentElement.classList.toggle('is-active');
    }

    function selectChoose() {
        let text = this.innerText,
            select = this.closest('.select'),
            currentText = select.querySelector('.select__current');
        currentText.innerText = text;
        select.classList.remove('is-active');
        filter = currentText.innerText
        let itemsMain = document.querySelector('.items_main');
        if (filter == "По умолчанию") {
            for (let i = 0; i < itemsMain.children.length; i++) {
                for (let j = i; j < itemsMain.children.length; j++) {
                    if (Number(itemsMain.children[j].getAttribute('data-price')) >= Number(itemsMain.children[i].getAttribute('data-price'))) {
                        let replacedNode = itemsMain.replaceChild(itemsMain.children[j], itemsMain.children[i]);
                        insertAfter(replacedNode, itemsMain.children[i])
                    }
                }
            }
            function insertAfter(elem, refElem) {
                return refElem.parentNode.insertBefore(elem, refElem.nextSibling);
            }
        }

        if (filter == "Сначала новые") {
            console.log("Сначалa новые")
            var item = [...itemsMain.children]
            var itemsArr = [];

            for (var i in item){
                if(item[i].nodeType == 1){
                    itemsArr.push(item[i]);
                    console.log([...itemsMain.children])
                }
            }
            itemsArr.sort(function(a, b){
                return a.getAttribute('data-day') == b.getAttribute('data-day') ? 0 : (a.getAttribute('data-day') > b.getAttribute('data-day') ? -1: 1 );
            });

            for(i= 0; i < itemsArr.length; i++){
                itemsMain.appendChild(itemsArr[i])
            }
            
        }

        if (filter == "Дешевле") {
            for (let i = 0; i < itemsMain.children.length; i++) {
                for (let j = i; j < itemsMain.children.length; j++) {
                    if (Number(itemsMain.children[i].getAttribute('data-price')) > Number(itemsMain.children[j].getAttribute('data-price'))) {
                        let replacedNode = itemsMain.replaceChild(itemsMain.children[j], itemsMain.children[i]);
                        insertAfter(replacedNode, itemsMain.children[i])
                    }
                }
            }
            function insertAfter(elem, refElem) {
                return refElem.parentNode.insertBefore(elem, refElem.nextSibling);
            }
        }

        if (filter == "Дороже") {
            for (let i = 0; i < itemsMain.children.length; i++) {
                for (let j = i; j < itemsMain.children.length; j++) {
                    if (Number(itemsMain.children[i].getAttribute('data-price')) < Number(itemsMain.children[j].getAttribute('data-price'))) {
                        let replacedNode = itemsMain.replaceChild(itemsMain.children[j], itemsMain.children[i]);
                        insertAfter(replacedNode, itemsMain.children[i])
                    }
                }
            }
            function insertAfter(elem, refElem) {
                return refElem.parentNode.insertBefore(elem, refElem.nextSibling);
            }
        }
        return filter
    }
}