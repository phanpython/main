//Работа с ajax BEGIN

if(document.querySelector('.responsible__tree')) {
    

}


//Удаление ответственного из страницы добавления разрешения
if(document.querySelector('.permission-add__responsible')) {
    let responsibles = document.querySelectorAll('.permission-add__responsible');

    responsibles.forEach(e => {
        e.querySelector('.permission__del_user').addEventListener('click', () => {
            let id = e.querySelector('.responsible__id').value;
            delResponsible(e, id);
        });
    });
}

function delResponsible(elem, id) {
    let xmlhttp = new XMLHttpRequest();
    let params = 'id_responsible_for_preparation=' + encodeURIComponent(id);

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            elem.remove();
        }
    };
    xmlhttp.open("GET", "?" + params, true);
    xmlhttp.send();
}

if(document.querySelector('.responsible__tree')) {
    let pluses = document.querySelectorAll('.tree__plus_active');
    let texts = document.querySelectorAll('.tree__text');
    let input = document.querySelector('.tree-send__input');
    let table = document.querySelector('.responsible__table');
    let buttonSaveResponsibles = document.getElementById('save-responsibles');
    let tableActive = 'responsible__table_active';
    let nameInputChoice = '.input-choice';
    let typePerson = document.getElementById('type_person_id').value;
    let arrResponsiblesId = [];

    //Этот скрипт сработает, если ответственные были ранее добавлены
    if(document.querySelector('.table-row')) {
        let choiceBlock = document.querySelector('.responsible__choice');
        let rows = document.querySelectorAll('.table-row');


        rows.forEach(e => {
            let userId = e.querySelector('.input-choice').value;

            //Добавляем в массив id текущих ответственных
            arrResponsiblesId.push(userId);

            addListenerForColChoice(e.querySelector('.input-choice'));
            addListenerForCheckbox(e.querySelector('.input-choice'));
        })

        //Делаем видимой таблицу выбранных ответственных
        choiceBlock.classList.add('responsible__choice_active');
    }

    buttonSaveResponsibles.addEventListener('click', () => {
        let inputKeysResponsibles = document.getElementById('keys-responsibles');

        for (let i = 0; i < arrResponsiblesId.length; i++) {
            if(i === 0) {
                inputKeysResponsibles.value = arrResponsiblesId[i];
            } else {
                inputKeysResponsibles.value = inputKeysResponsibles.value + ' ' + arrResponsiblesId[i];
            }
        }
    })

    pluses.forEach(e => {
        setEventListenerForPlus(e, input);
    });

    texts.forEach(e => {
        setEventListenerForText(e, input);
    });

    // function setEventListenerForText(e) {
    //     e.addEventListener('click', () => {
    //         let item = e.parentElement.parentElement;
    //
    //         input.value = item.querySelector('.tree__input').value;
    //         setUsersForTree(input.value, item, table, tableActive);
    //     });
    // }

    // function setEventListenerForPlus(e) {
    //     e.addEventListener('click', (event) => {
    //         let item = e.parentElement.parentElement;
    //
    //         if(item.querySelector('.tree__list')) {
    //             delSubdivisionsFromParent(item.querySelectorAll('.tree__list'));
    //         } else {
    //             input.value = item.querySelector('.tree__input').value;
    //             setSubdivisionsForTree(input.value, item, table);
    //             event.stopPropagation();
    //         }
    //     });
    // }

    function setUsersForTree(id, elem, table, tableActive) {
        if (id > 0) {
            let xmlhttp = new XMLHttpRequest();
            let params = 'id_for_user=' + encodeURIComponent(id);

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let json = this.responseText;

                    responsibles = JSON.parse(json);
                    clearRowsFromTable(table);
                    createTableTree(responsibles, table, tableActive);
                }
            };
            xmlhttp.open("GET", "?" + params, true);
            xmlhttp.send();
        }
    }

    // function setSubdivisionsForTree(id, elem){
    //     if (id > 0) {
    //         let xmlhttp = new XMLHttpRequest();
    //         let params = 'id_for_sub=' + encodeURIComponent(id);
    //         let subdivisions;
    //
    //         xmlhttp.onreadystatechange = function() {
    //             if (this.readyState == 4 && this.status == 200) {
    //                 let json = this.responseText;
    //
    //                 subdivisions = JSON.parse(json);
    //                 subdivisions.forEach(e => {
    //                     createListTree(elem, e, input);
    //                 });
    //             }
    //         };
    //         xmlhttp.open("GET", "?" + params, true);
    //         xmlhttp.send();
    //     }
    // }

    // function createListTree(elem, subdivision) {
    //     let list = document.createElement('div');
    //     let item = document.createElement('div');
    //     let block = document.createElement('div');
    //     let input = document.createElement('input');
    //     let span = document.createElement('span');
    //     let text = document.createElement('div');
    //
    //     list.setAttribute('class', 'tree__list');
    //     item.setAttribute('class', 'tree__item');
    //     block.setAttribute('class', 'tree__item-block');
    //     input.setAttribute('class', 'tree__input');
    //     input.setAttribute('hidden', 'hidden');
    //     input.setAttribute('value', subdivision.id);
    //
    //     if(subdivision.flag) {
    //         span.setAttribute('class', 'icon-square-plus-solid tree__plus tree__plus_active');
    //     } else {
    //         span.setAttribute('class', 'icon-square-plus-solid tree__plus');
    //     }
    //
    //     text.setAttribute('class', 'tree__text');
    //     text.innerHTML = subdivision.name;
    //
    //     setEventListenerForText(text);
    //     setEventListenerForPlus(span);
    //
    //     elem.appendChild(list);
    //     list.appendChild(item);
    //     item.appendChild(block);
    //     block.appendChild(input);
    //     block.appendChild(span);
    //     block.appendChild(text);
    // }

    function createTableTree(responsibles, table, tableActive, message = '') {
        if(responsibles.length === 0) {
            hiddenTable(table, tableActive);
            showMessage(message, 'message__responsible');
            return;
        } else if (message !== '') {
            clearMessage('message__responsible');
        }

        responsibles.forEach(e => {
            let row = document.createElement('div');
            let input = document.createElement('input');

            row.setAttribute('class', 'table-content__row table-row responsible__row');
            input.setAttribute('class', 'responsible-id');
            input.setAttribute('hidden', 'hidden');
            input.value = e['user_id'];

            for(let i = 1; i < 6; i++) {
                let col = document.createElement('div');
                let input = document.createElement('input');
                let value = '';

                col.setAttribute('class', 'table-content__col table-col');
                input.setAttribute('class', 'input-choice');
                input.setAttribute('readonly', 'readonly');

                if(i === 1) {
                    input.setAttribute('type', 'checkbox');
                    value = e['user_id'];
                    addListenerForCheckbox(input);

                    if(issetResponsible(e['user_id'])) {
                        input.setAttribute('checked', 'checked');
                    }
                } else if(i === 2) {
                    value = e['lastname'] + ' ' + e['name'] + ' ' + e['patronymic'];
                } else if(i === 3) {
                    value = e['user_position'];
                } else if(i === 5) {
                    value = e['email'];
                }

                input.value = value;

                row.appendChild(col);
                col.appendChild(input);

                if(i === 1) {
                    addListenerForColChoice(input);
                }
            }

            table.appendChild(row);
            row.appendChild(input);
        });

        table.classList.add(tableActive);
    }

   // Функция, проверяющая выбран или нет ответственный
    function issetResponsible(id) {
        let choiceTable = document.querySelector('.responsible__table_choice');
        let result = false;

        Array.from(choiceTable.children).forEach(e => {
            if(e.querySelector('.input-choice')) {
                if(+e.querySelector('.input-choice').value === id) {
                    result = true;
                }
            }
        });

        return result;
    }

    //Функция добавления слушателя на нажатие на ячейку чекбокса
    function addListenerForColChoice(checkbox) {
        let colChoice = checkbox.closest('.table-content__col');

        colChoice.addEventListener('click', (event) => {
            if(event.target.classList.contains('table-content__col')) {
                if(typePerson == 5) {
                    clearAllCheckedTableTree();
                }

                if(checkbox.checked) {
                    checkbox.checked = false;
                    toggleRowToChoiceTable(checkbox);
                } else {
                    checkbox.checked = true;
                    toggleRowToChoiceTable(checkbox);
                }
            }
        });
    }

    function clearAllCheckedTableTree() {
        Array.from(table.children).forEach(e => {
            if(e.querySelector('.table-content__col').querySelector('.input-choice')) {
                e.querySelector('.table-content__col').querySelector('.input-choice').checked = false;
            }
        })
    }

    function addListenerForCheckbox(checkbox) {
        checkbox.addEventListener('click', (event) => {
            if(typePerson == 5) {
                clearAllCheckedTableTree();
                checkbox.checked = true;
            }

            toggleRowToChoiceTable(checkbox);
        });
    }

    function toggleRowToChoiceTable(elem) {
        let mainTableRow = elem.parentElement.parentElement;
        let choiceTable = document.querySelector('.responsible__table_choice');
        let choiceBlock = document.querySelector('.responsible__choice');
        let col = mainTableRow.cloneNode(true);
        let id = col.querySelector('.table-content__col').querySelector('.input-choice').value;
        let fl = true;

        if(typePerson != 5) {
            Array.from(choiceTable.children).forEach(e => {
                if (e.querySelector('.input-choice') && col.querySelector('.input-choice')) {
                    if (e.querySelector('.input-choice').value === col.querySelector('.input-choice').value) {
                        let index = arrResponsiblesId.indexOf(id);
                        arrResponsiblesId.splice(index, 1);
                        fl = false;
                        e.remove();
                    }
                }
            });
        }

        if(fl) {
            if(typePerson == 5) {
                arrResponsiblesId = [];
                // clearRowsFromTable(choiceTable);
            }

            arrResponsiblesId.push(id);
            choiceTable.appendChild(col);
            addListenerForCheckbox(col.querySelector('.input-choice'));
            choiceBlock.classList.add('responsible__choice_active');
        } else if(!choiceTable.querySelector('.responsible__row')) {
            choiceBlock.classList.remove('responsible__choice_active');
        }
    }

    function hiddenTable(table, tableActive) {
        table.classList.remove(tableActive);
    }

    function clearRowsFromTable(table) {
        while (table.querySelector('.table-row')) {
            table.removeChild(table.querySelector('.table-row'));
        }
    }

    // Поиск ответственного по ФИО
    let searchResponsible = document.querySelector('.responsible__search').querySelector('.icon-search');
    let inputResponsible = document.querySelector('.responsible__search').querySelector('.input');

    inputResponsible.addEventListener('keydown', (e) => {
        if (e.keyCode === 13) {
            getResponsible(inputResponsible.value);
        }
    });

    searchResponsible.addEventListener('click', () => {
        getResponsible(inputResponsible.value);
    });

    function getResponsible(search) {
        let xmlhttp = new XMLHttpRequest();
        let params = 'search_responsible=' + encodeURIComponent(search);

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText)
                let json = this.responseText;
                responsibles = JSON.parse(json);

                clearRowsFromTable(table);
                createTableTree(responsibles, table, tableActive, 'Совпадений не найдено');
            }
        };

        xmlhttp.open("GET", "?" + params, true);
        xmlhttp.send();
    }
}

//Вывод сообщения пользователю
function showMessage(message, classElem) {
    document.querySelector('.' + classElem).innerHTML = message;
}

//Очистка сообщения пользователю
function clearMessage(classElem) {
    document.querySelector('.' + classElem).innerHTML = '';
}


if(document.querySelector('.filter-content-mask__select')) {
    let selectFilter = document.querySelector('.filter-content-mask__select');
    let formFilter = document.querySelector('.type-select');
    selectFilter.addEventListener('change', function (e) {
        //console.log(selectFilter.value);
        formFilter.submit();
    });
}

function setSelect(selectValue) {
    let xmlhttp = new XMLHttpRequest();
    let params = 'select_value=' + encodeURIComponent(selectValue);
    console.log(params);
    xmlhttp.open("GET", "?" + params, true);
    xmlhttp.send();
}

//Работа с ajax END;

