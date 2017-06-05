Календарь
=========

Объект для работы с календарем.

[Официальная документация](https://dev.1c-bitrix.ru/api_help/js_lib/data/calendar.php)

<a name="dependence"><h2>Зависимости</h2></a>

Для использования необходимо подключить библиотеку **date**:

```php
CJSCore::Init(['date']);
```



<a name="create"><h2>Создание и показ объекта</h2></a>

```javascript
/**
 * @constructor
 * @param  {object}  params  Параметры
 */
oPopup = new BX.calendar(params);
```


<a name="params"><h2>Параметры</h2></a>

* **params** — объект
    * **node** {HTMLElement} — DOM-элемент, около которого показывать календарь
    * **value** {string} — начальное значение в [формате сайта](#additional)
    * **field** {HTMLElement} — DOM-элемент, из которого брать и в который записывать значение
    * **form** — 
    * **callback** {callable} — обработчик выбора даты. Можно вернуть **false** для того чтоб запретить закрытие календаря
    * **callback_after** {callable} — 
    * **bTime** {boolean} — dключать ли контрол выбора времени
    * **bHideTime** {boolean} — скрывать ли включенный контрол выбора времени по умолчанию
    * **currentTime** — 
    * **weekStart** — первый день недели. По умолчанию будет взят из настроек сайта/языка




<a name="example"><h2>Пример</h2></a>

При клике на input показать календарь
```html
<div>
    <input type="text" id="calendar_input">

    <script>
        BX.bind(BX('calendar_input'), 'click', function () {
            BX.calendar({
                node: this,
                field: this,
                bTime: true
            });
        });
    </script>
</div>
```




<a name="methods"><h2>Методы</h2></a>
* `BX.calendar.InsertDaysBack(input, days)` — 
* `BX.calendar.ValueToString(value, bTime, bUTC)` — 



<a name="additional"><h2>Дополнительно</h2></a>
* `BX.message('FORMAT_DATE')` — вернет строку - формат сайта