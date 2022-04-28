# Использование Vue.js

Битрикс предоставляет библиотеку Vue.js (2 версия на момент написания).

Приведённые примеры расчитаны на работу без сборщика (например, при работе с коробочной версией Б24 удобно использовать Vue не притаскивания node.js, npm и прочие проблемы со сборкой/деплоем).

[Документация](https://dev.1c-bitrix.ru/learning/course/index.php?COURSE_ID=176&INDEX=Y) по теме

[Пример готового компонента](examples/my.vue.component/)


## Использование в шаблоне компонента

```php
// template.php шаблона компонента
Bitrix\Main\UI\Extension::load(['ui.vue']);
```



## Инициализация

### Инициализация напрямую в template.php

Вариант иниализации в самом **template.php**

```php
<?php
// инициализация в template.php
Bitrix\Main\UI\Extension::load(['ui.vue']);
?>
<div id="my-component-vue"></div>
<script>
    BX.Vue.create({
        el: 'my-component-vue',
        template: `
            <div>Hello</div>
        `,
        data () {
            return {};
        }
    });
</script>
```

### Вынос описания в script.js

Вынесем Vue в **script.js** компонента. Так как **script.js** выполняется раньше, чем js, который описан в **template.php**, то на момент исполнения **script.js** DOM ещё не создал элемент для параметра `el`. И тогда либо в **script.js** вводить какой-нибудь `BX.ready`, либо в **script.js** описать Vue без параметра `el`, а примонтировать уже в шаблоне:

```javascript
// script.js шаблона
// я не указываю параметр el - Vue создаст экземпляр, но никуда его не вмонтирует. Вмонтируем его в template.php
BX.namespace('BX.myVueComponent');

BX.myVueComponent = BX.Vue.create({
    template: `<div>Hello</div>`,
    data () {
        return {};
    }
});
```

```php
<?php
// инициализация в template.php
Bitrix\Main\UI\Extension::load(['ui.vue']);
?>
<div id="my-component-vue"></div>
<script>
    // на этот момент уже DOM нода готова, можно вмонтировать Vue
    BX.myVueComponent.$mount('my-component-vue');
</script>
```

### Первоначальные данные

Если надо при создании Vue необходимы первоначальные данные, есть несколько вариантов:

* отправка ajax запроса на хук [created](https://ru.vuejs.org/v2/api/#created) экземпляра Vue. Такой вариант вызывает лишнее обращение к серверу
* использование [Vue.extend](https://ru.vuejs.org/v2/api/#Vue-extend)

#### Использование Vue.extend

Такой способ позволяет в script.js создать конструктор Vue приложения, а в шаблоне уже вызвать этот конструктор с передачей значений:
```javascript
// script.js
BX.namespace('BX.myVueComponent');

BX.myVueComponent = BX.Vue.extend({
    template: `<div>
        {{ message }}
        <ul>
            <li v-for="item in items" :key="'item_' + item.ID">{{ item.NAME }}</li>
        </ul>
    </div>`,
    data () {
        return {
            items: [],  // пока пусто, дальше сюда будут переданы конкретные значения
            message: '',
        }
    }
});
```

```php
<?php
// инициализация в template.php
Bitrix\Main\UI\Extension::load(['ui.vue']);

$arResult = [
    'items' => [
        ['ID' => 123, 'NAME' => 'Вася'],
        ['ID' => 456, 'NAME' => 'Петя'],
    ],
    'message' => 'Мой Vue компонент',
];
?>
<div id="my-component-vue"></div>
<script>
    new BX.myVueComponent({
        el: 'my-component-vue',
        data () {
            return <?= json_encode($arResult); ?>;
        }
    });
</script>
```

При использовании `Vue.extend` Vue сам производит слияние `data`, которые описаны в **script.js** и в **template.php**.

Такой способ мне нравится больше всего так как:

* Не нужен лишний запрос на получение первоначальных данных
* Не нужны никакие `BX.ready`
* Всё описание Vue вынесено в отдельный файл
* В **template.php** происходит только инициализация с передачей параметров

