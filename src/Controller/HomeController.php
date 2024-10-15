<?php

namespace App\Controller;

use App\Controller\UserController;
use App\Controller\ContactController;

use App\helpers\View;
// use con\ORM\EntityManager;
// use Doctrine\ORM\EntityManagerInterface;


class HomeController {


    public function index() {
        
        $userController = new UserController();

        $users = $userController->list(0, 60);

        return View::render('Home', [
            'title' => 'Home',
            'users' => $users
        ]);
    }

    public function editUser($id) {

        $userController = new UserController();
        $user = $userController->show($id[0]);

        $contactController = new ContactController();
        $userContacts = $contactController->list($id);

        return View::render('User', [
            'title' => 'User',
            'user' => $user,
            'contacts' => $userContacts
        ]);
    }

    // public function editContact($id) {
    //     $contactController = new ContactController();

    //     $contacts = $contactController->list($id, 0, 20);

    //     return View::render('Contact', [
    //         'title' => 'Contact',
    //         'contacts' => $contacts
    //     ]);
    // }

    public function editContact($id) {
        $contactController = new ContactController();

        $contact = $contactController->show($id);

        return View::render('Contact', [
            'title' => 'Contact',
            'contact' => $contact
        ]);
    }
}