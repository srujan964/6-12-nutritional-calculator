const storeInSessionStorage = (key, val) => {
    sessionStorage.setItem(key, val)
}

let store = document.querySelector('#store-select').value

document.querySelector('#store-select').addEventListener('change', (e) => {
    store = e.target.value
    storeInSessionStorage('store', store)
})

storeInSessionStorage('store', store)
