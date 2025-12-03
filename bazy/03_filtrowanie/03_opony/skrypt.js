const o1E = document.getElementById('o1')
const o2E = document.getElementById('o2')
const o3E = document.getElementById('o3')
const imgE = document.querySelector('img')

document.querySelector('button').addEventListener('click',e => {
    if(o1E.checked){
        imgE.src='lato.png'
    }
    else if (o2E.checked){
         imgE.src='zima.png'
    }
    else {
         imgE.src='uniwer.png'
    }
})