const populateNutritionalSummary = (data) => {
    const summary = data.summary

    document.querySelector('#nutritional-summary-calorie-element').textContent = summary.calories + ' Cal.'
    document.querySelector('#nutritional-summary-total-fat-element').textContent = summary.fats + ' g'
    document.querySelector('#nutritional-summary-total-carbs-element').textContent = summary.carbohydrates + ' g'
    document.querySelector('#nutritional-summary-protein-element').textContent = summary.protein + ' g'

    const tableTemplate = document.querySelector('.tmpl-ns-nutrition-table')
    const nutritionTable = tableTemplate.content.cloneNode(true)

    const metrics = {
        'saturated_fats': 'Saturated Fats',
        'trans_fats': 'Trans Fats',
        'cholesterol': 'Cholesterol',
        'sugars': 'Total sugars',
        'added_sugars': 'Added sugars',
        'vitamin_d': 'Vitamin D',
        'calcium': 'Calcium',
        'iron': 'Iron',
        'potassium': 'Potassium',
        'sodium': 'Sodium'
    }

    for (const [key, val] of Object.entries(metrics)) {
        const tableElementTemplate = document.querySelector('.tmpl-ns-nutrition-table-list-element')
        const tableElement = tableElementTemplate.content.cloneNode(true)

        tableElement.querySelector('.metric').textContent = val
        tableElement.querySelector('.value').textContent = summary[key]
        nutritionTable.querySelector('.ns-nutrition-table-list-layout').append(tableElement)
    }

    document.querySelector('.nutritional-summary-fact-table').append(nutritionTable)


    const selections = data.selections
    for (const item of selections) {
        const template = document.querySelector('.tmpl-ns-editor-list-element')
        const menuItemElement = template.content.cloneNode(true)
        const selectionId = item.id

        menuItemElement.querySelector('.ns-editor-list-element')
            .setAttribute("id", selectionId)

        menuItemElement.querySelector('.ns-editor-list-element-image')
            .src = item.image_url
        menuItemElement.querySelector('.ns-editor-list-element-details h3')
            .textContent = item.name
        menuItemElement.querySelector('.ns-editor-list-element-additional-info')
            .textContent = item.total.calories + ' Cal.'

        menuItemElement.querySelector('.ns-editor-list-element-delete')
            .setAttribute('data-context', selectionId);

        menuItemElement.querySelector('.ns-editor-list-element-delete')
            .addEventListener('click', (e) => {
                const idToDelete = e.target.getAttribute('data-context')

                const itemSelectionString = sessionStorage.getItem('itemSelections')
                const itemSelections = JSON.parse(itemSelectionString)

                itemSelections.selections = itemSelections.selections
                    .filter((selection) => selection.id !== idToDelete)

                if (itemSelections.selections.length === 0) {
                    sessionStorage.clear()
                    self.location.href = '/'
                } else {
                    sessionStorage.setItem('itemSelections', JSON.stringify(itemSelections))
                    location.reload()
                }

                const element = document.querySelector(`#${idToDelete}`)
                element.parentElement.removeChild(element)
            })

        document.querySelector('.nutritional-summary-editor-list-layout')
            .append(menuItemElement)
    }
}

document.querySelector(".ns-editor-restart")
    .addEventListener('click', async (e) => {
        sessionStorage.clear()
        self.location.href = e.target.href
    })

const itemSelectionsString = sessionStorage.getItem('itemSelections')
const itemSelections = JSON.parse(itemSelectionsString)

const request = new Request('/calculator/nutritional-info', {
    method: "POST",
    body: itemSelectionsString
})

const response = await fetch(request)
const data = await response.json()

populateNutritionalSummary(data)
