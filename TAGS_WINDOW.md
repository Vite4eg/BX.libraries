BX.TagsWindow
=============

Объект для работы со всплывающим окном создания, редактирования, выбора тегов.

Логика описана в файле **/bitrix/js/main/core/core_tags.js**


<a name="dependence"><h2>Зависимости</h2></a>

Для использования необходимо подключить библиотеку **tags**:

```php
CJSCore::Init(['tags']);
```

<a name="create"><h2>Создание объекта</h2></a>
Для создания объекта используется метод **create**:
```javascript
/**
 * @constructor
 * @param  {string}       uniquePopupId  Уникальный Id, который будет присвоен DOM-элементу
 * @param  {HTMLElement}  bindElement    Указание, около какого элемента позиционировать окно
 * @param  {array}        tags           Массив тегов
 * @param  {object}       params         Объект параметров
 */
var myPopup = BX.TagsWindow.create(uniquePopupId, bindElement, tags, params);
```


<a name="params"><h2>Параметры</h2></a>

* **uniquePopupId** — уникальный идентификатор. Данный id будет присвоен DOM-элементу, содержащему код всплывашки `<div="uniquePopupId"></div>` 
* **bindElement** — Ссылка на DOM-элемент, относительно которого необходимо спозиционировать в сплывающее окно. Значение **null** означает позиционирование в центре экрана
* **tags** — массив тегов. Тег — объект, описывающий тег. Поля:
    * **id** {string} — идентификатор тега. Тегу `<input>`, отвечающего за показ тега, будет присвоен **id**, который получится конкантенацией строки, сгенерированной битриксом, и данным параметром
    * **name** {string} — Название тега
    * **selected** {boolean} — Выбран ли тег. По умолчанию **false**
* **params** — дополнительные параметры. Содержит два поля:
    * **events** — object. Служит для регистрации [обработчиков событий](#events)
    * **editMode** — boolean. При включенном режиме появляется возможность вызова формы правки тегов (иконка карандашика)



<a name="events"><h2>События</h2></a>
* **onSaveButtonClick** — Срабатывает при нажатии кнопки «Сохранить изменения» в форме правки тегов
* **onSelectButtonClick** — Срабатывает при нажатии кнопки «Выбрать»
* **onUpdateTagLine** — Срабатывает при любом изменении списка тегов. Например при добавлении нового тега
* **onCancelButtonClick** — Обработчик нажатия кнопки «Отмена»
* **onEditButtonClick** — Обработчик события клика по Карандашику. Доступен при <code>editMode: true</code>



<a name="showPopup"><h2>Показ всплывашки</h2></a>
Для показа всплывающего окна необходимо вызвать метод **showPopup()** объекта.
Например, навесим на кнопку с `id=my-button` событие для показа всплывающего окна:
```javascript
BX.bind(BX('my-button'), 'click', function () {
    myPopup.showPopup();
});
```


<a name="methods"><h2>Методы</h2></a>

* <code>[showPopup()](#showPopup)</code> — показ объекта
* <code>setBindElement(bindElement)</code> — спозиционировать окно относительно html-элемента **bindElement**. Аналогично можно задать позиционирование через передачу второго параметра в метод [create](#create)



<a name="example"><h2>Пример</h2></a>

```javascript
var tags = ['css', 'js', 'php'];
var myPopup = new BX.TagsWindow.create(
    'my-button', null, tags, {
        events: {
            onSaveButtonClick:   function () {},
            onSelectButtonClick: function () {},
            onUpdateTagLine:     function () {},
            onCancelButtonClick: function () {},
            onEditButtonClick:   function () {}
        },
        editMode: false 
    }
);

myPopup.popupWindow.setBindElement(BX('my-button'));    // спозиционируем окно

BX.bind(BX('my-button'), 'click', function () {
    // повесим click на кнопку для показа всплывашки
    myPopup.showPopup();
});
```

<a name="tagsWindowArea"><h2>TagsWindowArea</h2></a>