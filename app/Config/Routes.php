$routes->get('/', 'Home::index');
$routes->get('/like/(:num)', 'Home::like/$1');
$routes->post('/comment/(:num)', 'Home::comment/$1');
$routes->get('/login', 'Auth::login');
$routes->post('/auth/loginSubmit', 'Auth::loginSubmit');
$routes->get('/logout', 'Auth::logout');