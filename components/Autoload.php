<?php
/*
function __autoload($class_name)
{
    # List all the class directories in the array.
    $array_paths = array(
        '/models/',
        '/services/',
        '/components/'
    );

    foreach ($array_paths as $path) {
        $path = ROOT . $path . $class_name . '.php';
        if (is_file($path)) {
            include_once $path;
            return;
        }
    }
}
*/



spl_autoload_register(function ($class_name) {
    # List all the class directories in the array.
    $array_paths = array(
       '/models/',
       '/services/',
       '/components/',
       '/controllers/'
   );

   foreach ($array_paths as $path) {
       $path = ROOT . $path . $class_name . '.php';
       if (is_file($path)) {
           include_once $path;
           return;
       }
   }
});
