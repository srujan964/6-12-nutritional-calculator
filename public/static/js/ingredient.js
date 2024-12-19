document.addEventListener('DOMContentLoaded', async () => {
    const params = new URLSearchParams(window.location.search)

    const response = await fetch(`/calculator/menu/${params.get('item_id')}/ingredients`)
    const data = await response.json()

    const imageTemplate = document.querySelector(".tmpl-item-image")
    const image = imageTemplate.content.cloneNode(true)

    image.querySelector('.item-image-header').src = data.image_url

    document.querySelector('div.image-placeholder').append(image)

    for (const ingredient of data.ingredients) {
        const template = document.querySelector(".tmpl-item-ingredient")
        const ingredientElement = template.content.cloneNode(true)

        const label = ingredientElement.querySelector("label")
        label.textContent = ingredient.name
        label.setAttribute("for", `ingredient-checkbox-${ingredient.ingredient_id}`)

        const ingredientCheckbox = ingredientElement.querySelector("input")
        ingredientCheckbox.checked = ingredient.enabled_by_default ?? false
        ingredientCheckbox.name = 'ingredient_id'
        ingredientCheckbox.value = ingredient.ingredient_id
        ingredientCheckbox.id = `ingredient-checkbox-${ingredient.ingredient_id}`

        document.querySelector(".item-ingredients-selection-group").append(ingredientElement)
    }

    document.querySelector(".item-ingredient-selections-submit")
        .addEventListener('click', async (e) => {
            const updatedMeal = updateSelections(data)
            console.log(updatedMeal)
            writeToSessionStorage(updatedMeal)
            self.location.href = e.target.href
        })
})

function updateSelections(item) {
    const selections = Array.from(document.querySelectorAll('.item-ingredients-selection-group input'))
        .filter((checkbox) => checkbox.checked)
        .map((checkbox) => {
            return {
                ingredient_id: checkbox.value,
                is_selected: true
            }
        })

    let mealSelections = { selections: [] }
    const itemWithSelections = {
        id: uid(),
        item_id: item.item_id,
        image_url: item.image_url,
        name: item.name,
        ingredient_selections: selections
    }
    mealSelections.selections.push(itemWithSelections)

    if (sessionStorage.getItem('itemSelections')) {
        const existingSelections = JSON.parse(sessionStorage.getItem('itemSelections'))
        mealSelections.selections = mealSelections.selections.concat(existingSelections.selections)
    }

    return mealSelections
}

const writeToSessionStorage = (data) => {
    sessionStorage.setItem('itemSelections', JSON.stringify(data))
}

const uid = function () {
    return Date.now().toString(36) + Math.random().toString(36).substr(2);
}
