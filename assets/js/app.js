import '../styles/app.css';
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import {createStore} from "vuex";
import {isNumber, isSet} from "lodash";
import {number} from "tailwindcss/lib/util/dataTypes";


const store = createStore({
    state: {
        cart: [],
        count: 0
    },
    mutations: {
        increment (state) {
            state.count++
        },
        decrement (state) {
            state.count--
        },
        addProduct(state,product){
            let productInserted = (state, product) => {
                return state.cart.some(function (item){
                    return item.id === product.id
                })
            }
            if (!productInserted(state, product)){
                product.quantity = 1
                return state.cart.push(product)

            } else {
                return state.cart.some(function (item){
                    if (item.id === product.id) {
                       return item.quantity++
                    }
                })
            }
        },
        removeProduct(state,product){
            state.cart = state.cart.filter((p)=> p.id !== id )

            state.cart.map((p) =>{
                if ( p.id === product.id) {
                    p.quantity++                 }
            })
        },
    },
    actions: {
        increment: ({ commit }) => commit('increment'),
        decrement: ({ commit }) => commit('decrement'),
        addProduct({commit},product){
            commit('addProduct',product)
        },
        removeProduct({commit},id){
            commit('removeProduct',id)
        },
    },
    getters: {
        getCart: state => {
            return state.cart
        },
    }

})

createInertiaApp({
    resolve: name => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(store)
            .mixin({ methods: { route: window.route } })
            .mount(el)
    },
})
