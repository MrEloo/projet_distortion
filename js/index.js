console.log('hello World')

const modale = document.querySelector('.modale')
const modale2 = document.querySelector('.modale2')
const addCategory = document.querySelector('.addCategory')
const closeModale = document.querySelector('.close')
const closeModale2 = document.querySelector('.close2')
const addChannel = document.querySelector('.addChannel')
const form = document.querySelector('form')
const form2 = document.querySelector('.form2')

form2.addEventListener('submit', (e) => {
})

form.addEventListener('submit', (e) => {
})

closeModale.addEventListener('click', () => {
    console.log('hello')
    console.log(closeModale)
    modale.classList.add('modale')
    modale.classList.remove('modale-visible')
})

closeModale2.addEventListener('click', () => {
    console.log('hello')
    console.log(closeModale)
    modale2.classList.add('modale2')
    modale2.classList.remove('modale2-visible')
})


addCategory.addEventListener('click', () => {
    console.log('hello')
    modale.classList.remove('modale')
    modale.classList.add('modale-visible')
})

addChannel.addEventListener('click', () => {
    console.log('hello')
    modale2.classList.remove('modale2')
    modale2.classList.add('modale2-visible')
})

console.log('hello World')