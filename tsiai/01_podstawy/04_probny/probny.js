const oneE = document.querySelector('nav img')
const oneMainE = document.querySelector('main src')
const allE = document.querySelectorAll('nav img')
const mainAllE = document.querySelectorAll('main img');
const asideSpanAllE = document.querySelectorAll('aside span')
// oneE.addEventListener('click', e=>{
//     oneE.classList.toggle('border')
 
// })

allE.forEach((imgE, index) =>{
    imgE.addEventListener('click',e=>{
        imgE.classList.toggle('border')

        if(imgE.classList.contains('border')){
            mainAllE[index].src=imgE.src
            asideSpanAllE[index].style.display='inline'
        }
        else{
            mainAllE[index].src=""
            asideSpanAllE[index].style.display='none'
        }
    })
})


