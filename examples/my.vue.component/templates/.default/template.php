<?php

use Bitrix\Main\UI\Extension;

defined('B_PROLOG_INCLUDED') || die;

/**
 * @var array $arResult
 */

Extension::load(['ui.vue']);
?>

<div id="my-vue-component-app"></div>

<script>
    (function () {
        const props = <?= json_encode($arResult);?>;
        new BX.MyVueComponent({
            el: '#my-vue-component-app',
            data () {
                return props;
            }
        });
    })();
</script>
