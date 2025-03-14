<?php
include_once 'C:\xamppWil\htdocs\UniMarket\DataBase\conexcion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST['cedula'];
    $name = $_POST['nombre'];
    $lastname = $_POST['apellido'];
    $carrera = $_POST['carrera'];
    $email = $_POST['correo'];
    $password = $_POST['contraseña'];
    $rol = $_POST['rol'];

    $sql_check = "SELECT COUNT(*) FROM registro WHERE email = :email";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bindParam(':email', $email);
    $stmt_check->execute();

    $user_exists = $stmt_check->fetchColumn();

    if ($user_exists > 0) {
        echo "El email ya está registrado. Por favor, utiliza otro.";
    } else {
        $sql = "INSERT INTO registro (cedula, name, lastname, carrera, email, password,rol)
                VALUES (:cedula, :name, :lastname, :carrera, :email, :password, :rol)";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':cedula', $cedula);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':carrera', $carrera);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':rol', $rol);
            $stmt->execute();

            header("Location: login.html?registro=exitoso");
            exit(); 
        } catch (PDOException $e) {
            echo "Error al registrar: " . $e->getMessage();
        }
    }
} else {
    echo "Acceso no válido.";
}
?>

