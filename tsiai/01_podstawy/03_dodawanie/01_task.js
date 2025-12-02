const formE = document.querySelector('form');
const taskE = document.querySelector('#task'); 
const ulE = document.querySelector('ul');
const error = document.querySelector('#error');

formE.addEventListener('submit', (e) => {
    e.preventDefault();
    let task = taskE.value;

    taskE.value = ``;
    
    error.textContent = ``;

    if(task.length > 2){
        let liE = document.createElement('li');
        liE.textContent = task 
        ulE.appendChild(liE)
    }else{
        error.textContent = `Zbyt krótki tekst`
    }

})