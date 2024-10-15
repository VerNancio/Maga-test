<?php

$routes = [
    '/' => 'HomeController->index',
    '/page/{id}' => 'HomeController->index',
  '/page/user/{id}' => 'HomeController->editUser',
  '/page/contact/{id}' => 'HomeController->editContact',


  '/users/{id}' => 'UserController->search',

  '/user' => 'UserController->index',
  '/user/create' => 'UserController->store',
  '/user/show/{id}' => 'UserController->show',
  '/user/edit' => 'UserController->update',
  '/user/delete/{id}' => 'UserController->delete',
  '/user/{id}' => 'UserController->list',
  '/user/search/{id}' => 'UserController->search',

  '/contact/delete/{id}' => 'ContactController->delete',
  '/contact/create' => 'ContactController->store',
  '/contact/edit' => 'ContactController->update',


  '/contact' => 'ContactController->index',
  '/contact' => 'ContactController->create',
  '/contact/{id}' => 'ContactController->show',
  '/contact' => 'ContactController->update',
  '/contact/{id}' => 'ContactController->delete',
  '/contact/{id}' => 'ContactController->list',
];