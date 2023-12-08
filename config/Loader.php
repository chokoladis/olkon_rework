<?
function autoload($class)
{
    // Префикс из пространства имен
    $prefix = 'config\\';
    // Базовая директория для префикса пространства имен
    $base_dir = __DIR__ . '/';
    // Проверяем, соответствует ли префикс пространства имен
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // Если нет, переходим к следующему автозагрузчику
        return;
    }
    // Получаем относительное имя класса
    $relative_class = substr($class, $len);
    // Заменяем префикс пространства имен на базовую директорию
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    // Если файл существует, подключаем его
    if (file_exists($file)) {
        require $file;
    }
}
// Регистрируем функцию autoload()
spl_autoload_register('autoload');