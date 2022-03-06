import '../styles/app.css';
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import {createStore} from "vuex";
import createPersistedState from 'vuex-persistedstate';
import Cookies from 'js-cookie';


const store = createStore({
    state: {
        cart: [],
        count: 0,
        cartTotal:0,
    },
    plugins: [createPersistedState({
        storage: {
            getItem: key => Cookies.get(key),
            setItem: (key, value) => Cookies.set(key, value, { expires: 3, secure: true }),
            removeItem: key => Cookies.remove(key)
        }
    })],
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
                let priceExcl = product.priceExcl.toFixed(2)
                let vat = ((priceExcl/100) * product.vat).toFixed(2)
                priceExcl = parseFloat(priceExcl)
                vat = parseFloat(vat)
                let total = priceExcl + vat
                total = parseFloat(total)
                console.log(total)
                product.quantity = 1
                product.totalPerPiece = total
                product.vatPerPiece = vat
                product.grandTotal = product.totalPerPiece
                product.totalVat = vat
                state.cartTotal += product.grandTotal
                return state.cart.push(product)
            } else {
                return state.cart.some(function (item){
                    if (item.id === product.id) {
                        let priceExcl = item.priceExcl.toFixed(2)
                        let vat = ((priceExcl/100) * item.vat).toFixed(2)
                        priceExcl = parseFloat(priceExcl)
                        vat = parseFloat(vat)
                        let total = priceExcl + vat
                        total = parseFloat(total)
                        item.grandTotal += total
                        item.totalVat += vat
                        item.quantity++
                        state.cartTotal += total
                       return item
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
        getCount: state => {
            return state.count
        },
        getCartTotal: state => {
            return state.cartTotal
        }
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
