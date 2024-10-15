<?php

namespace App\Controller;

use App\Model\ContactModel;
use con\ORM\EntityManager;

use App\Controller\UserController;


class ContactController {

    public function store() {

        require __DIR__."/../../config/bootstrap.php";

        $body = file_get_contents('php://input');

        $params = json_decode($body, true);

        if (is_array($params)) {
            extract($params);
        }

        trim($type);

        switch ($type)
        {
            case "email": 
                if (!is_email_valid($desc)) return false;

                $is_type_email = true;
                break;

            case "phone": 

                if(!is_phone_valid($desc)) return false;

                $is_type_email = false;
                break;

            default:
                return false;
        }

        $userController = new UserController();
        $ownerUser = $userController->show($owner);

        $contactModel = new ContactModel($entityManager);

        if ($contactModel->create($is_type_email, strtolower($desc), $ownerUser)) {
            echo json_encode(['msg'=>'Usuário criado com sucesso']);
            return true;
        } 

        echo json_encode(['msg'=>'Falha ao criar usuário']);
    }

    public function show($id) {

        require __DIR__."/../../config/bootstrap.php";

        $contactModel = new ContactModel($entityManager);

        if ($contact = $contactModel->fetch($id)) {
            return $contact;
        }

        return false;
    }

    public function list($ownerId, $numStart = 0, $numEnd = 80) {

        require __DIR__."/../../config/bootstrap.php";

        $contactModel = new ContactModel($entityManager);

        if ($contacts = $contactModel->fetchByUser($ownerId, $numStart, $numEnd)) {
            return $contacts;
        } 
        
        return [];
    }

    public function update() {

        require __DIR__."/../../config/bootstrap.php";

        $body = file_get_contents('php://input');

        $params = json_decode($body, true);

        if (is_array($params)) {
            extract($params);
        }
        
        trim($type);

        switch ($type)
        {
            case "email": 
                if (!is_email_valid($desc)) return false;

                $is_type_email = true;
                break;

            case "phone": 
                if(!is_phone_valid($desc)) return false;

                $is_type_email = false;
                break;

            default:
                return false;
        }

        $contactModel = new ContactModel($entityManager);

        // Se editar o contato
        if ($contactModel->update($id, $is_type_email, strtolower($desc))) {
            echo json_encode(['msg'=>'Contato editado com sucesso']);
            return true;
        } 

        echo json_encode(['msg'=>'Falha ao editar Contato']);
    }

    public function delete($id) {

        require __DIR__."/../../config/bootstrap.php";

        $contactModel = new ContactModel($entityManager);

        if ($contact = $contactModel->delete($id)) {
            echo json_encode(['msg'=>"Contato deletado com sucesso"]);
            return true;
        } 

        echo json_encode(['msg'=>"Falha ao tentar deletar contato"]);
    }

    // public function search($idOwner) {

    //     require __DIR__."/../../config/bootstrap.php";

    //     $contactModel = new ContactModel($entityManager);

    //     if ($contacts = $contactModel->search($name)) {
    //         echo json_encode(['Contacts' => $contacts]);
    //         return;
    //     } 

    //     echo json_encode(['Contacts' => []]);
    // }
}