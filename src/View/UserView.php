<?php

extract($data);

require_once __DIR__.'./layouts/header.php';


?>

<script type="module" src="..\..\resources\pages\User\js\index.js"></script>

<style>

    .card {
        margin-left: 20px !important;
        margin-right:20px !important;
    }

</style>


<div class="container">

    <div class="row">

        <div class="bg-primary" style="display: flex; justify-contect: center; padding: 20px; border-radius: 6px; margin: 10px; gap: 20px">

            <?php if(isset($user)) { ?>

            <div class="bg-light" style="display: flex; flex-direction: column; padding: 8px; border-radius: 6px;">
                <label for="id">ID do Usuário</label>
                <input id="idInput" type="text" name="id" value="<?php echo $user->getId() ?>" disabled>
            </div>

            <div class="bg-light" style="display: flex; flex-direction: column; padding: 8px; border-radius: 6px;">
                <label for="cpf">CPF do Usuário</label>
                <input disabled id="cpfInput" type="number" name="cpf" value="<?php echo $user->getCpf() ?>">
            </div>

            <div class="bg-light" style="display: flex; flex-direction: column; padding: 8px; border-radius: 6px;">
                <label for="name">Nome do Usuário</label>
                <input id="nameInput" type="text" name="name" value="<?php echo $user->getName() ?>">
            </div>

            <button class="btn btn-success my-2 my-sm-0" id="editUserBttn" value=""><span>Atualizar usuário</span></button>


            <?php } else { ?>

                <h2>ID de usuário não possui registro</h2>
            
            <?php } ?>
            
        </div class="bg-primary" style="display: flex; justify-contect: center; padding: 20px; border-radius: 6px; margin: 10px; gap: 20px">
    </div>

    <div class="row">

        <!-- <form> -->
        <div class="bg-primary" style="display: flex; justify-contect: center; padding: 20px; border-radius: 6px; margin: 10px; gap: 20px">

            <div class="bg-light" style="display: flex; flex-direction: column; padding: 8px; border-radius: 6px;">
                <label for="name">Tipo de contato</label>
                <select id="typeInput" style="width:200px" name="type" id="">
                    <option value="">...</option>
                    <option value="email">E-mail</option>
                    <option value="phone">Telefone</option>
                </select>
            </div>
                
            <div class="bg-light" style="display: flex; flex-direction: column; padding: 8px; border-radius: 6px;">
                <label for="desc">Descrição</label>
                <input style="width:500px" id="descInput" type="text" name="cpf" placeholder="Descrição (Endereço de e-mail/Telefone mod(DDD + NUM))">
            </div>

            <button class="btn btn-success my-2 my-sm-0" id="createContactBttn" value=""><span>Criar Contato para Usuário</span></button>
        </div>
        <!-- </form> -->

    </div>


    <h2 style="margin-top:40px; margin-bottom:20px">Contatos do usuário</h2>
    
    <div class="row" style="gap:30px">


        <?php foreach($data['contacts'] as $contact) { ?>
    
            <div class="col-md-3">
                <div href="#" class="card" style="width: 18rem;">
                    <img class="card-img-top" src="..." style="background-color: red;" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $contact->getDescription() ?></h5>
                        <h6><?php echo $contact->getId() ?></h6>
                        <p class="card-text">Tipo: <?php echo $contact->getType() == 1 ? "E-mail" : "Telefone" ?></p>
                        <div>
                            <a>
                                <button class="btn btn-danger my-2 my-sm-0 deleteContactsBttns" value="<?php echo $contact->getId() ?>">Excluir</button>
                            </a>
                            
                            <a href="<?php echo "../../page/contact/" . $contact->getId() ?>">
                                <button class="btn btn-warning my-2 my-sm-0">Editar</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

</div>
