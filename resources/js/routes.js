const Index = () => import('./components/Index.vue' /* webpackChunkName: "resource/js/components/welcome" */)
const PokemonList = () => import('./components/pokemon/List.vue' /* webpackChunkName: "resource/js/components/pokemon/list" */)
const PokemonRead = () => import('./components/pokemon/Read.vue' /* webpackChunkName: "resource/js/components/pokemon/read" */)
const PokemonEdit = () => import('./components/pokemon/Edit.vue' /* webpackChunkName: "resource/js/components/pokemon/edit" */)

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Index
    },
    {
        name: 'pokemonList',
        path: '/pokemons',
        component: PokemonList
    },
    {
        name: 'pokemonEdit',
        path: '/pokemon/:id/edit',
        component: PokemonEdit
    },
    {
        name: 'pokemonRead',
        path: '/pokemon/:id/read',
        component: PokemonRead
    }
]
