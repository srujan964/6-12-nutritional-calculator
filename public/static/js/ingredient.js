document.addEventListener('DOMContentLoaded', async () => {
    const params = new URLSearchParams(window.location.search)
    const store = sessionStorage.getItem('store')

    const response = await fetch(`/calculator/menu/${params.get('item_id')}/ingredients?location=${store}`)
    const data = await response.json()

    const category = data.category

    const imageTemplate = document.querySelector(".tmpl-item-image")
    const image = imageTemplate.content.cloneNode(true)

    image.querySelector('.item-image-header').src = data.image_url

    const sizes = {
        'hoagies': ['6 inch', '12 inch'],
        'sides': ['Regular', 'Large'],
        'beverages': ['Regular', 'Large']
    }

    sizes[category].forEach((size) => {
        const template = document.querySelector('.tmpl-size-selectors')
        const clone = template.content.cloneNode(true)

        clone.querySelector('.size-selector-radio').id = size
        clone.querySelector('.size-selector-radio').value = size
        clone.querySelector('.size-selector-radio').name = 'size'

        if (size === sizes[category][0]) {
            clone.querySelector('.size-selector-radio').checked = true
        }

        clone.querySelector('.size-selector-radio-label').for = size
        clone.querySelector('.size-selector-radio-label').textContent = size
        document.querySelector('.size-selector-fieldset').append(clone)
    })

    document.querySelector('div.image-placeholder').append(image)

    for (const ingredient of data.ingredients) {
        const template = document.querySelector(".tmpl-item-ingredient")
        const ingredientElement = template.content.cloneNode(true)

        const label = ingredientElement.querySelector("label")
        label.textContent = ingredient.name
        label.setAttribute("for", `ingredient-checkbox-${ingredient.ingredient_id}`)

        const ingredientCheckbox = ingredientElement.querySelector("input")
        ingredientCheckbox.checked = ingredient.is_default ?? false
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

    const selectedRadio = document.querySelector('input[name="size"]:checked')
    const size = selectedRadio.value

    let mealSelections = { selections: [] }
    const itemWithSelections = {
        id: uid(),
        item_id: item.item_id,
        image_url: item.image_url,
        name: item.name,
        size: size,
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
