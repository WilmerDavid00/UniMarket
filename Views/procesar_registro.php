<?php
include_once 'C:\xamppWil\htdocs\UniMarketw\UniMarket-1\DataBase\conexcion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['nombre'];
    $lastname = $_POST['apellido'];
    $number = $_POST['telefono'];
    $email = $_POST['correo'];
    $user = $_POST['usuario'];
    $password = $_POST['contraseña'];

    $sql = "INSERT INTO registro (name, lastname, number, email, user, password)
            VALUES (:name, :lastname, :number, :email, :user, :password)";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':number', $number);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        echo "Registro exitoso. ¡Bienvenido!";
    } catch (PDOException $e) {
        echo "Error al registrar: " . $e->getMessage();
    }
} else {
    echo "Acceso no válido.";
}
?>

