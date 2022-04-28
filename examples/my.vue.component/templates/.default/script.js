BX.namespace('BX.MyVueComponent');

BX.MyVueComponent = BX.Vue.extend({
    name: 'MyVueComponent',

    template: `
        <div>
            <h3>{{ componentName }}</h3>
            <ul>
                <li
                    v-for="item in items"
                    :key="'item_' + item.ID"
                >
                    {{ item.NAME }}
                </li>
            </ul>
        </div>
    `,

    data () {
        return {
            componentName: '',
            items: [],
        }
    },
});
