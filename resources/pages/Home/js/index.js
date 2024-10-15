import User from '../../../js/User.js' 

window.onload = () => {

    const nameInput = document.querySelector("#nameInput");
    const cpfInput = document.querySelector("#cpfInput");

    const createUserBttn = document.querySelector('#createUserBttn');
    
    const deleteUserBttns = document.querySelectorAll('.deleteUserBttn');

    // Ao clicar cria usuario
    createUserBttn.addEventListener('click', e => {
        
        e.preventDefault();
        
        let userName = nameInput.value;
        let userCpf = cpfInput.value;

        if (User.create(userName, userCpf)) {
            alert('User cadastrado com sucesso');
            window.location.reload();
        }
    });

    // Ao clicar vai ser deletado o usuario
    deleteUserBttns.forEach(e => {
        
        let id = e.value;

        e.addEventListener('click', e => {

            e.preventDefault();

            if (User.delete(id) == "Usuário deletado") {
                alert('User deletado');
                window.location.reload();
            } else {
                alert("Usuário já deletado ou não existe.")
            }
        });
    })
    
};
