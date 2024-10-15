<?php

extract($data);

require_once __DIR__.'./layouts/header.php';

?>

<script type="module" src="..\..\resources\pages\Contact\js\index.js"></script>


<div class="container">

    <div class="row">

        <div>

            <?php if(isset($contact)) { ?>

                <div class="bg-light" style="display: flex; flex-direction: column; padding: 8px; border-radius: 6px;">
                    <label for="id">ID do Contato</label>
                    <input id="idInput" type="text" name="id" id="" value="<?php echo $contact->getId() ?>" disabled>
                </div>

                <div class="bg-light" style="display: flex; flex-direction: column; padding: 8px; border-radius: 6px;">
                    <label for="owner">Nome do Dono Contato</label>
                    <input id="nameInput" type="text" name="owner" id="" disabled value="<?php echo $contact->getOwner()->getName() ?>">
                </div>

                <div class="bg-light" style="display: flex; flex-direction: column; padding: 8px; border-radius: 6px;">
                    <label for="owner">ID do Dono Contato</label>
                    <input id="idOwnerInput" type="text" name="owner" id="" disabled value="<?php echo $contact->getOwner()->getId() ?>">
                </div>

                <div class="bg-light" style="display: flex; flex-direction: column; padding: 8px; border-radius: 6px;">
                    <label for="name">Tipo de contato</label>
                    <select id="typeInput" style="width:200px" name="type" id="">
                        <option value="">...</option>
                        <option <?php echo $contact->getType() == 1 ? "selected" : "" ?> value="email">E-mail</option>
                        <option <?php echo $contact->getType() == 0 ? "selected" : "" ?> value="phone">Telefone</option>
                    </select>
                </div>
                    
                <div class="bg-light" style="display: flex; flex-direction: column; padding: 8px; border-radius: 6px;">
                    <label for="desc">Descrição</label>
                    <input style="width:400px" id="descInput" value="<?php echo $contact->getDescription() ?>" type="text" name="desc" placeholder="Descrição (Endereço de e-mail/Telefone)">
                </div>
    
                <button class="btn btn-success my-2 my-sm-0" id="editContactBttn" value=""><span>Atualizar contato</span></button>
                    
            <?php } else { ?>

                <h2>ID de contato não possui registro</h2>
            
            <?php } ?>
            
            </div>
    </div>
</div>
