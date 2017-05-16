# BX.TagsWindow
Объект для работы со всплывающим окном создания, редактирования, выбора тегов.


## Зависимости
Для использования необходимо подключить библиотеку **tags**:
```php
CJSCore::Init(['tags']);
```

## Создание объекта
Для создания объекта используется метод **create**:
```javascript
/**
 * @constructor
 * @param  {string}  uniquePopupId  Уникальный Id, который будет присвоен DOM-элементу
 * @param  {string}  bindElement    По умолчанию null
 * @param  {array}   tags           Массив тегов
 * @param  {object}  params         Объект параметров
 */
var myPopup = BX.TagsWindow.create(uniquePopupId, bindElement, tags, params);
```


## Параметры
* **events** - object. Служит для регистрации обработчиков событий
* **editMode** - boolean. При включенном режиме появляется возможность вызова формы правки тегов (иконка карандашика)


### Список событий
* **onSaveButtonClick** - Срабатывает при нажатии кнопки «Сохранить изменения» в форме правки тегов
* **onSelectButtonClick** - Срабатывает при нажатии кнопки «Выбрать»
* **onUpdateTagLine** - Срабатывает при любом изменении списка тегов. Например при добавлении нового тега
* **onCancelButtonClick** - Обработчик нажатия кнопки «Отмена»
* **onEditButtonClick** - Обработчик события клика по Карандашику. Доступен при <code>editMode: true</code>


## Показ объекта
Для показа всплывающего окна необходимо вызвать метод **showPopup()** объекта.
Например, навесим на кнопку с <code>id=my-button</code> событие для показа всплывающего окна:
```javascript
BX.bind(BX('my-button'), 'click', function () {
    myPopup.showPopup();
});
```