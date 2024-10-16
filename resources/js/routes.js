const URI = "http://localhost:80/magatest/";

const routes = {
    'getUserById': 'user/', 
    'getUserByName': 'users/', 

    'postUser': 'user/create',
    'editUser': 'user/edit',
    'deleteUser': 'user/delete/',

    'deleteContact': 'contact/delete/',
    'postContact': 'contact/create',
    'editContact': 'contact/edit',
}

export { URI, routes };