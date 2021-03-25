"use strict";


let select = document.getElementById('linkSelect')
let input = document.getElementById('linkInput')
let ghost = document.getElementById('linkInputGhost')

select.addEventListener('change', (ev) => {
    let ex = ev.target.value

    if(ex === 'ex1'){
        input.value = 'https://www.bbc.com/news/newsbeat-56264594'
        ghost.value = 'Ex1'
    }

    if(ex === 'ex2'){
        input.value = 'https://www.bbc.com/news/technology-56357526'
        ghost.value = 'Ex2'
    }

    if(ex === 'ex3'){
        input.value = 'https://www.bbc.com/news/world-asia-56252695'
        ghost.value = 'Ex3'
    }
})
