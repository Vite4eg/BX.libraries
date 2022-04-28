<?php
defined('B_PROLOG_INCLUDED') || die;

/**
 * Пример реализации битрового компонента с использованием BX.Vue
 */
class MyVueComponent extends \CBitrixComponent
{
    public function executeComponent()
    {
        $this->arResult = [
            'componentName' => 'Мой компонент',
            'items' => [
                ['ID' => 123, 'NAME' => 'Android'],
                ['ID' => 456, 'NAME' => 'Iphone'],
            ],
        ];

        $this->includeComponentTemplate();
    }
}
