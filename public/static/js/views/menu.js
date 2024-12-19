import View from './view.js'
import MenuItem from '../components/menuItem.js'

export default class extends View {
    constructor(params) {
        super(params)
        this.category = params.category
    }

    async getHtml() {
        return `<div class="menu-container">
            <strong id="category-text">${this.category}</strong>
            <div class="menu-items-container">
                ${itemListing}
            <div>
        </div>
        `;
    }

    async render() {
        const template = document.querySelector(".template-menu-category")
        const clone = template.content.cloneNode(true)

        const items = await this.fetchItems()
        items.map((item) => {
            const itemTemplate = document.querySelector(".template-menu-item-card")
            const itemElement = itemTemplate.content.cloneNode(true)

            itemElement.querySelector("button:nth-child(1):first-child").textContent = item.name
            clone.querySelector('.menu-item-card-layout-list').append(itemElement)
        })
        document.querySelector("#app").append(clone)
    }

    async fetchItems() {
        const response = await fetch(`/calculator/menu?category=${this.category}`)
        return await response.json()
    }
}