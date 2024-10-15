import User from '../../../js/User.js';
import Contact from '../../../js/Contact.js';



window.onload = () => {

    const idInput = document.querySelector('#idInput');
    const nameInput = document.querySelector("#nameInput");
    const cpfInput = document.querySelector("#cpfInput");

    const typeInput = document.querySelector("#typeInput");
    const descInput = document.querySelector("#descInput");

    const editUserBttn = document.querySelector('#editUserBttn');
    const createContactBttn = document.querySelector('#createContactBttn');

    const deleteContactsBttns = document.querySelectorAll('.deleteContactsBttns');

    // Ao ser clicado cria novo contato
    editUserBttn.addEventListener('click', e => {

        e.preventDefault();

        // Atribuindo os valores dos inputs
        const userId = idInput.value; 
        const userName = nameInput.value;
        const userCpf = cpfInput.value;

        // Fazendo a chamada para a função edit
        // console.log(User.edit(userId, userName, userCpf));

        if (User.edit(userId, userName)) {
            alert('User editado com sucesso');
            window.location.reload();
        }
    });

    // Ao ser clicado cria novo contato
    createContactBttn.addEventListener('click', e => {

        e.preventDefault();

        // Atribuindo os valores dos inputs
        const ownerId = idInput.value; 
        const type = typeInput.value;
        const desc = descInput.value;

        // Fazendo a chamada para a função edit
        // console.log(User.edit(userId, userName, userCpf));

        if (Contact.create(type, desc, ownerId)) {
            alert('Contato criado com sucesso');
            window.location.reload();
        }
    });
    

    // Ao clicar vai ser deletado o contato
    deleteContactsBttns.forEach(e => {
        
        let id = e.value;

        e.addEventListener('click', e => {

            alert(id)

            e.preventDefault();

            if (Contact.delete(id) == "Contato deletado com sucesso") {
                alert('User deletado');
                window.location.reload();
            } 
        });
    })
};
