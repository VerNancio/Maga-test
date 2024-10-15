<?php

extract($data);

require_once __DIR__.'./layouts/header.php';


?>

<script type="module" src="resources\pages\Home\js\index.js"></script>



<div class="container">

    <div class="row">

        <!-- <form> -->
        <div class="bg-primary" style="display: flex; justify-contect: center; padding: 20px; border-radius: 6px; margin: 10px; gap: 20px">

            <div class="bg-light" style="display: flex; flex-direction: column; padding: 8px; border-radius: 6px;">
                <label for="name">Nome do usuário</label>
                <input id="nameInput" type="text" name="name" placeholder="Digite o nome do usuário ">
            </div>
                
            <div class="bg-light" style="display: flex; flex-direction: column; padding: 8px; border-radius: 6px;">
                <label for="cpf">CPF do usuário</label>
                <input id="cpfInput" type="number" name="cpf" placeholder="Digite o cpf (válido) ">
            </div>

            <button class="btn btn-success my-2 my-sm-0" id="createUserBttn" value=""><span>Criar usuário</span></button>
        </div>
        <!-- </form> -->

    </div>

    <h2 style="margin-top:40px; margin-bottom:20px">Lista de usuários</h2>

    <div class="row allUsersContainer">

        <?php foreach($data['users'] as $user) { ?>
    
            <div class="col-md-3 preload" style="margin-top: 20px;">
                <div href="#" class="card 
                " style="width: 18rem;">
                    <img class="card-img-top" src="..." style="background-color: red;" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $user->getName() ?></h5>
                        <p class="card-text">CPF: <?php echo $user->getCpf() ?></p>
                        <div>
                            <a>
                                <button class="btn btn-danger my-2 my-sm-0 deleteUserBttn" value="<?php echo $user->getId() ?>" href="<?php echo "#"?>">Excluir</button>
                            </a>
                            <a href="<?php echo "./page/user/" . $user->getId() ?>">
                                <button class="btn btn-warning my-2 my-sm-0">Editar</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
