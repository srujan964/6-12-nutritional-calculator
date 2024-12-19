const populateNutritionalSummary = (data) => {
    const summary = data.summary

    document.querySelector('#nutritional-summary-calorie-element').textContent = summary.calories + ' Cal.'
    document.querySelector('#nutritional-summary-total-fat-element').textContent = summary.fats + ' g'
    document.querySelector('#nutritional-summary-total-carbs-element').textContent = summary.carbohydrates + ' g'
    document.querySelector('#nutritional-summary-protein-element').textContent = summary.protein + ' g'

    const selections = data.selections
    for (const item of selections) {
        const template = document.querySelector('.tmpl-ns-editor-list-element')
        const menuItemElement = template.content.cloneNode(true)

        menuItemElement.querySelector('.ns-editor-list-element-image').src = item.image_url
        menuItemElement.querySelector('.ns-editor-list-element-details h3').textContent = item.name
        menuItemElement.querySelector('.ns-editor-list-element-additional-info').textContent = item.total.calories + ' Cal.'

        document.querySelector('.nutritional-summary-editor-list-layout').append(menuItemElement)
    }

}


const itemSelectionsString = sessionStorage.getItem('itemSelections')
const itemSelections = JSON.parse(itemSelectionsString)

const request = new Request('/calculator/nutritional-info', {
    method: "POST",
    body: itemSelectionsString
})

const response = await fetch(request)
const data = await response.json()

populateNutritionalSummary(data)


document.querySelector(".ns-editor-restart")
    .addEventListener('click', async (e) => {
        sessionStorage.clear()
        self.location.href = e.target.href
    })
