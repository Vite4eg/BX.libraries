Всплывающее окно
================

Объект для работы со всплывающим окном.

<a name="dependence"><h2>Зависимости</h2></a>

Для использования необходимо подключить библиотеку **popup**:

```php
CJSCore::Init(['popup']);
```

<a name="create"><h2>Создание объекта</h2></a>

```javascript
/**
 * @constructor
 * @param {string}       uniquePopupId  Уникальный Id, который будет присвоен DOM-элементу
 * @param {HTMLElement}  bindElement    Указание, около какого элемента позиционировать окно
 * @param {object}       params         Параметры
 */
oPopup = new BX.PopupWindow(uniquePopupId, bindElement, params);
```

<a name="params"><h2>Параметры</h2></a>

* **params** — объект. Дополнительные параметры
    * **titleBar** {boolean} — показывать ли заголовок
    * **autoHide** {boolean} — автоскрытие при клике вне окна
    * **offsetTop** {integer}
    * **offsetLeft** {integer}
    * **zIndex** {integer}
    * **closeIcon** {object} — положение кнопки Закрыть
        * **right** {string} — например, `'15px'`
        * **top** {string} — например, `'15px'`
    * **closeByEsc** {boolean} — закрытие окна клавишей Escape
    * **draggable** {boolean} — возможность перетаскивания окна
    * **overlay** {object} — настройки заднеего фона
        * **opacity** {string} — прозрачность
    * **buttons** {array} — массив кнопок. Содержит объекты BX.PopupWindiwButton или BX.PopupWindowButtonLink
    * **events** {objetc} — регистрация [обработчиков событий](#events)


<a name="events"><h2>События</h2></a>

* **onPopupClose**
* **onPopupFirstShow**
* **onPopupShow**
* **onAfterPopupShow**
* **onPopupDestroy**
* **onPopupDragStart**
* **onPopupDrag**
* **onPopupDragEnd**



<a name="example"><h2>Пример</h2></a>

```javascript
oPopup = new BX.PopupWindow(
    'call_feedback',
    window.body,
    {
        titleBar: true,     // показывать заголовок
        autoHide: false,    // скрывать если кликнули вне окна
        offsetTop: 1,
        offsetLeft: 0,
        zIndex: 1000,
        lightShadow: true,
        closeIcon: {   // положение кнопки "Закрыть"
            right: '15px',
            top: '10px'
        },
        closeByEsc: true,
        draggable: true,
        overlay: {
            opacity: '75'
        },   // прозрачность заднего фона
        buttons: arPopupButtons,	// массив кнопок BX.PopupWindowButton или BX.PopupWindowButtonLink
        events: {
            onPopupClose : function(){
                //this.contentContainer.innerHTML = '';
            }
        }
    }
);
```


<a name="methods"><h2>Методы</h2></a>

* `setContent(content)` — Если передается нода, то она перемещается. То есть если передать узел DOM структуры, то он удалится
* `setButtons(buttons)`
* `show()`
* `close(event)`
* `setBindElement(node)` — К чему привязать всплывашку
* `setAngle(params)` — Задать свойства уголка