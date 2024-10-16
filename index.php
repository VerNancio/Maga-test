<?php

require_once __DIR__ . '/vendor/autoload.php'; 

use App\Controller\UserController;
use App\Model\UserModel; 

use App\Controller\ContactController;
use App\Model\ContactModel;

use App\helpers\View;



spl_autoload_register(function ($className) {
    $file = __DIR__ . '/src/' . str_replace('\\', '/', $className) . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
});


function run() {

    // importação das rotas da aplicação, que estao em array
    require_once __DIR__."/src/Routes/routes.php";

    //

    $url = '/';

    isset($_GET['url']) ? $url .= $_GET['url'] : '';

    ($url != '/') ? $url = rtrim($url, '/') : $url;

    //

    $routeFound = false;
    

    // Iteração sobre todas as possiveis rotas
    foreach ($routes as $path => $controllerAndmethod) {
        
      $pattern = '#^' . preg_replace('/{id}/', '([\w-]+|\d+)', $path) . '$#';


      
    //   echo json_encode(['aaa' => $url]);
    //   return ;
      // Se rota foi encontrada dado o regex
      if (preg_match($pattern, $url, $matches)) {

        array_shift($matches);


        // Separa a classe do metodo
        [$currentController, $method] = explode('->', $controllerAndmethod);

        // Namespace da classe controller
        $fullClassName =  "App\\Controller\\".$currentController;


        // Checa se a classe existe usando o namespace acima
        if (class_exists($fullClassName)) {

            // Cria a classe
            $controller = new $fullClassName();
        } else {
            echo "Classe $fullClassName não encontrada!";
        }
        
        $controller->$method($matches);

        $routeFound = true;
      }
    }

    // Se nenhuma rota foi encontrada
    if (!$routeFound) {
        View::render('NotFound', [
            'title' => "Not found"
        ]);
    }
}

run();

