"use strict"

let btnG1 = document.getElementById('graph1')
let btnG2 = document.getElementById('graph2')
let btnG3 = document.getElementById('graph3')

let secG1 = document.getElementById('graphS1')
let secG2 = document.getElementById('graphS2')
let secG3 = document.getElementById('graphS3')

btnG1.addEventListener('click', (ev) => {
    secG1.classList.remove('fantome')
    secG2.classList.add('fantome')
    secG3.classList.add('fantome')
})

btnG2.addEventListener('click', (ev) => {
    secG2.classList.remove('fantome')
    secG1.classList.add('fantome')
    secG3.classList.add('fantome')
})

btnG3.addEventListener('click', (ev) => {
    secG3.classList.remove('fantome')
    secG1.classList.add('fantome')
    secG2.classList.add('fantome')
})
