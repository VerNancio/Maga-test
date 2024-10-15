<?php

namespace App\Controller;

use App\Model\UserModel;
use con\ORM\EntityManager;
// use Doctrine\ORM\EntityManagerInterface;


class UserController {


    public function store() {

        include __DIR__."/../../config/bootstrap.php";

        $body = file_get_contents('php://input');

        $params = json_decode($body, true);

        if (is_array($params)) {
            extract($params);
        }

        if (!is_cpf_valid($cpf)) {
            echo json_encode(['msg'=>'Cpf de usuário inválido']);
            return;
        }

        $userModel = new UserModel($entityManager);

        if (sizeof($userModel->fetchByCpf($cpf)) > 0) {
            echo json_encode(['msg'=>"Já existe usuário com esse CPF"]);
            return;
        }

        if ($userModel->create(strtolower($name), $cpf)) {
            echo json_encode(['msg'=>'Usuário criado com sucesso']);
            return;
        } 
        
        echo json_encode(['msg'=>'Falha ao criado Usuário']);
    }

    public function show($id) {

        include __DIR__."/../../config/bootstrap.php";

        $userModel = new UserModel($entityManager);

        if ($user = $userModel->fetch($id)) {
            return $user;
        }
        
        return false;
    }

    public function list($numStart = 0, $numEnd = 60) {

        include __DIR__."/../../config/bootstrap.php";

        $userModel = new UserModel($entityManager);

        if ($users = $userModel->fetchAll($numStart, $numEnd)) {
            return $users;
        } 
        
        return [];
    }

    public function update() {

        include __DIR__."/../../config/bootstrap.php";

        $body = file_get_contents('php://input');

        $params = json_decode($body, true);

        if (is_array($params)) {
            extract($params);
        }

        $userModel = new UserModel($entityManager);

        // Se editar o usuário
        if ($userModel->update($id, strtolower($name))) {
            echo json_encode(['msg'=>'Usuário editado com sucesso']);
        } 

        echo json_encode(['msg'=>'Falha ao editar Usuário']);
    }

    public function delete($id) {

        include __DIR__."/../../config/bootstrap.php";
        
        $userModel = new UserModel($entityManager);
        
        if ($user = $userModel->delete($id[0])) {
            echo json_encode(['msg' => "Usuário deletado"]);
            return true;
        } 

        echo json_encode(['msg' => "Usuário não deletado"]);
        return false;
    }

    public function search($name) {

        include __DIR__."/../../config/bootstrap.php";

        $userModel = new UserModel($entityManager);

        if ($users = $userModel->search(strtolower($name[0]))) {
            echo json_encode(['users' => $users]);
            return;
        } 

        echo json_encode(['users' => []]);
    }
}