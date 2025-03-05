using Microsoft.AspNetCore.Mvc;
using System.Data.SqlClient;
using System;

[Route("api/user")]
public class UserController : Controller
{
    private string connectionString = "Server=localhost;Database=UniMarke;Uid=root;Pwd=;";
    
    [HttpPost("register")]
    public IActionResult Register([FromBody] User user)
    {
        using (var connection = new MySqlConnection(connectionString))
        {
            connection.Open();
            var cmd = new MySqlCommand("INSERT INTO Users (name, email, password) VALUES (@name, @email, @password)", connection);
            cmd.Parameters.AddWithValue("@name", user.Name);
            cmd.Parameters.AddWithValue("@password", user.Password);
            cmd.Parameters.AddWithValue("@email", user.Email);
            cmd.ExecuteNonQuery();
        }
        return Ok(new { message = "Usuario registrado" });
    }
    
    [HttpPost("login")]
    public IActionResult Login([FromBody] User user)
    {
        using (var connection = new MySqlConnection(connectionString))
        {
            connection.Open();
            var cmd = new MySqlCommand("SELECT * FROM Users WHERE email=@email AND password=@password", connection);
            cmd.Parameters.AddWithValue("@password", user.Password);
            cmd.Parameters.AddWithValue("@email", user.Email);
            var reader = cmd.ExecuteReader();
            if (reader.Read()) return Ok(new { message = "Inicio de sesión exitoso" });
        }
        return Unauthorized(new { message = "Credenciales incorrectas" });
    }
}