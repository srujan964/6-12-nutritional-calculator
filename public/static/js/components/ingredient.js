import View from "../views/view";

class Ingredient extends View {
    constructor(params) {
        super(params)
        this.enabled = false
        this.id = params.id
        this.name = params.name
        this.enabled = params.enabled
    }

    async toHtml() {
        return `<div class="ingredient-container">
            <input type="checkbox" id="ingredient-${this.id}" class="ingredient-checkbox" name="${this.name}" />
            <label for="${this.name}">${this.name}</label>
        </div>
        `
    }
}