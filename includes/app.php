<?php 

use Dotenv\Dotenv;
use Models\ActiveRecord;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

require 'funciones.php';
require 'database.php';

// Conect to database
ActiveRecord::setDB($db);

// Iniciar sesión antes de enviar cualquier salida o encabezado
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}