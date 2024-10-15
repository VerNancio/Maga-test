import User from '../../js/User.js' 



function cardSearchedUsersTemplate(user, searchedWord) {

    let name = user.name;
    let markUpName = name.replace(searchedWord, `<b style="background-color: yellow;">${searchedWord}</b>`).trim();

    let cpf = user.cpf;
    let id = user.id;

    return (
        `
        <div class='col-md-3 searched' style='margin-top: 20px;'>
            <div href='#' class='card' style='width: 18rem;'>
                <img class='card-img-top' src='...' style='background-color: red;' alt='Card image cap'>
                <div class='card-body'>
                    <h5 class='card-title'>${markUpName}</h5>
                    <p class='card-text'>${cpf}</p>
                    <div>
                        <a>
                            <button class='btn btn-danger my-2 my-sm-0 deleteUserBttn' value='' href='#'>Excluir</button>
                        </a>
                        <a href='./page/user/${id}'>
                            <button class='btn btn-warning my-2 my-sm-0'>Editar</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        `
    )
}


// window.onload = () => {

    const searchInput = document.querySelector("#search");
    const searchBttn = document.querySelector("#searchButton");

    const usersContainer = document.querySelector('.allUsersContainer');

    // Se true mostra todos, se falso desaparecem
    // let preloadUsersDisplay = true;

    const toggleDisplay = () => {

        // console.log(document.querySelectorAll(".preload"));

        // console.log(searchInput.value)

        document.querySelectorAll(".preload").forEach(e => {
            e.style.display = searchInput.value ? "none" : "block";
        })

        // preloadUsersDisplay = preloadUsersDisplay ? false : true;
    }

    // Busca usuários
    searchBttn.addEventListener('click', async () => {


        let searchValue = searchInput.value

        // Chama a função para buscar usuários
        let searchedUsers = await User.getByName(searchValue);

        // const preLoadedUsers = document.querySelectorAll(".preload");

        // Verifica se a pesquisa retornou resultados
        if (searchedUsers) {

            let preLoadedUsers = document.querySelectorAll(".searched");

            if (preLoadedUsers) {
                preLoadedUsers.forEach((e) => {
                    e.outerHTML = null;
                })
            }

            searchedUsers.forEach((user) => {
                usersContainer.innerHTML += (cardSearchedUsersTemplate(user, searchValue));
            })
        } 

        toggleDisplay();

    });

    // // Ao clicar cria usuario
    // createUserBttn.addEventListener('click', e => {
        
    //     e.preventDefault();
        
    //     let userName = nameInput.value;
    //     let userCpf = cpfInput.value;

    //     if (User.create(userName, userCpf)) {
    //         alert('User cadastrado com sucesso');
    //         userName = '';
    //         userCpf = '';
    //     }
    // })
// };
