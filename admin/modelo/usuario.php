<?php
class Usuario
{
    protected $id;
    protected $contraseña;
    protected $email;
    protected $db;

    public function __construct($id, $contraseña, $email)
    {
        $this->id = $id;
        $this->contraseña = $contraseña;
        $this->email = $email;

        // Conectar a la base de datos
        include_once("conexion.php");
        $this->db = new Conexion();
    }

    public function registrarUsuario($pa, $em)
    {
        $stmt = $this->db->prepare("INSERT INTO usuarios (password, email, estado) VALUES (?, ?, 'Activo')");
        $stmt->bind_param("ss", $pa, $em);
        $stmt->execute();
        return $stmt;
    }

    public function listaUsuarios()
    {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE estado='Activo'");
        $stmt->execute();
        $res = $stmt->get_result();
        return $res;
    }

    public function eliUsuario($cod)
    {
        $stmt = $this->db->prepare("UPDATE usuarios SET estado='inactivo' WHERE id=?");
        $stmt->bind_param("i", $cod);
        $stmt->execute();
        return $stmt;
    }

    public function buscarUsuario($cod)
    {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE id=? AND estado='Activo'");
        $stmt->bind_param("i", $cod);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res;
    }

    public function modificarUsuario($cod, $p)
    {
        $stmt = $this->db->prepare("UPDATE usuarios SET password=? WHERE id=?");
        $stmt->bind_param("si", $p, $cod);
        $stmt->execute();
        return $stmt;
    }
}
