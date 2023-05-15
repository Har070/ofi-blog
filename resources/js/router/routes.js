export default [
    {
        path: '/',
        redirect: '/home',
    },
    {
        path: '/home',
        name: 'homePage',
        component: () => import('../components/Pages/Home')
    },
    {
        path: '/bio',
        name: 'bioPage',
        component: () => import('../components/Pages/Bio')
    },
    {
        path: '/videos',
        name: 'videosPage',
        component: () => import('../components/Pages/Videos')
    },
]
