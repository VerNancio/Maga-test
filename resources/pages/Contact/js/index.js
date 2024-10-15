import Contact from '../../../js/Contact.js';


window.onload = () => {

    
    const idInput = document.querySelector('#idInput');
    const typeInput = document.querySelector("#typeInput");
    const descInput = document.querySelector("#descInput");

    const editContactBttn = document.querySelector('#editContactBttn');

    // Ao ser clicado cria novo contato
    editContactBttn.addEventListener('click', e => {

        e.preventDefault();

        // Atribuindo os valores dos inputs
        const id = idInput.value; 
        const type = typeInput.value;
        const desc = descInput.value;

        if (Contact.edit(id, type, desc)) {
            alert('User editado com sucesso');
            window.location.reload();
        }
    });
};
