<?php
require_once 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$faker = Faker\Factory::create('fr_FR');
for ($i = 0; $i < 3; $i++) {
    echo $faker->name() . "\n";
}

try {
    $pdo = new PDO('mysql:host=localhost;dbname=webstart_framework;', 'root','root');
    
} catch (PDOException $e) {
    die($e->getMessage());

}

$statement = $pdo->query('SELECT * FROM users');
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_OBJ);

foreach($users as $user){
    echo $user->name;
}