class MenuItem {
    constructor(id, name, ingredients) {
        this.id = id
        this.name = name
        this.ingredients = ingredients
    }

    async fetchIngredients() {
        const response = await fetch(`/calculator/menu/{this.id}/ingredients`)
        const menuItem = await response.json()

        this.ingredients = menuItem.ingredients
    }

    miniView() {
        return `<div class="menu-item-container">
            <div class="menu-item-image-container"></div>
            <p class="menu-item-title-container">${this.name}</p>
        </div>`
    }

    async toHtml() {
        let childElements;
        await this.fetchIngredients();
        if (this.ingredients) {
            const ingredientsHtml = this.ingredients.map((ingredient) => ingredient.toHtml()).join();
            childElements = `<div class="image-placeholder">${ingredientsHtml}</div>`;
        }
        return `<div class="menu-item-container">${this.name}${childElements}</div>`;
    }
}

export default MenuItem;