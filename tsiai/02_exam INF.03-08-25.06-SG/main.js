const divFirstE = document.querySelector('div.first');
const divSecondE = document.querySelector('div.second');
const divThreeE = document.querySelector('div.three');
const sectionFirstE = document.querySelector('section.first');
const sectionSecondE = document.querySelector('section.second');
const sectionThreeE = document.querySelector('section.three');

console.log(clear);

function clear(){
    divFirstE.style.backgroundColor = '#FFAEA5';
    divSecondE.style.backgroundColor = '#FFAEA5';
    divThreeE.style.backgroundColor = '#FFAEA5';

    sectionFirstE.style.display = 'none';
    sectionSecondE.style.display = 'none';
    sectionThreeE.style.display = 'none';
}

divFirstE.addEventListener('click', (e) => {
    clear()
    divFirstE.style.backgroundColor = 'MistyRose';
    sectionFirstE.style.display = 'block';
})

divSecondE.addEventListener('click', (e) => {
    clear()
    divSecondE.style.backgroundColor = 'MistyRose';
    sectionSecondE.style.display = 'block';
})

divThreeE.addEventListener('click', (e) => {
    clear()
    divThreeE.style.backgroundColor = 'MistyRose';
    sectionThreeE.style.display = 'block';
})