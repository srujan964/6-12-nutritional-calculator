document.addEventListener('DOMContentLoaded', async () => {
    const params = new URLSearchParams(window.location.search)

    const response = await fetch(`/calculator/menu?category=${params.get('category')}`)
    const data = await response.json();

    for (const item of data) {
        const template = document.querySelector(".tmpl-menu-item-element")
        const itemElement = template.content.cloneNode(true)
        const itemButton = itemElement.querySelector("div.menu-item form button")

        itemButton.textContent = item.name
        itemButton.setAttribute("name", "item_id")
        itemButton.setAttribute("value", item.item_id)

        const itemImage = itemElement.querySelector("img.image-placeholder")
        itemImage.src = item.image_url

        document.querySelector(".menu-item-card-layout-list").append(itemElement)
    }
})
