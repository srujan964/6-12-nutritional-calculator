const storeInSessionStorage = (key, val) => {
    sessionStorage.setItem(key, JSON.stringify(val))
}

document.querySelector('#store-select').addEventListener('change', (e) => {
    console.log('In change')
    const newStore = {
        location: e.target.value,
        selectedIndex: e.target.selectedIndex
    }
    storeInSessionStorage('store', newStore)
})

document.addEventListener('DOMContentLoaded', () => {
    const savedSelection = sessionStorage.getItem('store')
    if (savedSelection) {
        const retrievedSelection = JSON.parse(savedSelection)
        document.querySelector('#store-select').selectedIndex = retrievedSelection.selectedIndex
    }
})