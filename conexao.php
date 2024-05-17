<?php
class Database {
    private $host = "localhost:3307";
    private $user = "root";
    private $pass = "";
    private $db = "alura";
    private $pdo;

    // função para conetar ao banco e se der erro volta p erro no try
    // s enão ele volta  a coneção setada em pdo
    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}
?>
