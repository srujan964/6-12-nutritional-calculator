import Menu from './views/menu.js';

// const renderView = async (event) => {
//     const views = [
//         { type: 'menu', view: Menu, key: 'category' },
//         { type: 'item', view: Menu, key: 'itemId' }
//     ]

//     const viewType = event.target.getAttribute("data-view-type")
//     const params = event.target.getAttribute("data-view-content")

//     const match = views.find((option) => option.type === viewType)

//     const view = new match.view({ [match.key]: params })

//     await view.render()
//     document.querySelector(".left-section").remove()
//     document.querySelector(".right-section").remove()
// }

// const router = async () => {
//     const routes = [
//         { path: '/', file: 'index.html' },
//         { path: '/menu?category', view: Menu },
//         { path: '/item/:id', view: '' },
//         { path: '/nutritional-info', view: '' }
//     ]

//     const path = window.location.pathname

//     const route = routes.map((route) => {
//         return {
//             path: route.path,
//             result: route.view || route.file
//         }
//     }).find((route) => route.path === path)

//     if (!route) {
//         route = routes[0]
//     }

//     new route.view()
// }

// const navigateTo = (state, url) => {
//     history.pushState(state, null, url)
//     router()
// }

// document.querySelectorAll("[data-view]")
//     .forEach((button) => {
//         button.addEventListener('click', async (e) => {
//             await renderView(e)
//         })
//     })

// window.addEventListener("popstate", router)

// document.addEventListener("DOMContentLoaded", () => {
//     document.body.addEventListener("click", () => {
//         if (e.target.matches("[data-view]")) {
//             e.preventDefault()
//             navigateTo({}, null, e.target.href)
//         }
//     })

//     router()
// })

