<?php


  
  class Config {
    protected const DBHOST = 'localhost';
    protected const DBUSER = 'root';
    protected const DBPASS = '';
    protected const DBNAME = 'projet';

    protected $dsn = 'mysql:host=' . self::DBHOST . ';dbname=' . self::DBNAME . '';

    protected $conn = null;

    // Method for connection to the database
    public function __construct() {
      try {
        $this->conn = new PDO($this->dsn, self::DBUSER, self::DBPASS);
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
      }
    }
  }

  class Database extends Config {
    // Insert User Into Database
    public function insert($pseudo, $mail, $password, $role) {
      $password = password_hash( $password, PASSWORD_DEFAULT);   
      $sql = "INSERT INTO utilisateur (pseudo_utilisateur, mail_utilisateur, mdp_utilisateur, role_utilisateur) VALUES (:pseudo_utilisateur, :mail_utilisateur, :mdp_utilisateur, :role_utilisateur)";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        ':pseudo_utilisateur' => $pseudo,
        ':mail_utilisateur' => $mail,
        ':mdp_utilisateur' => $password,
        ':role_utilisateur' =>$role
    
      ]);
      return true;
    }

    // Fetch All Users From Database
    public function read() {
      $sql = "SELECT * FROM utilisateur";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    }

    // Fetch Single User From Database
    public function readOne($id) {
      $sql = "SELECT * FROM utilisateur WHERE id_utilisateur = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id' => $id]);
      $result = $stmt->fetch();
      return $result;
    }

    // Update Single User
    public function update($id, $pseudo, $mail, $password, $role) {
      
      $sql = "UPDATE utilisateur SET pseudo_utilisateur = :pseudo_utilisateur, mail_utilisateur = :mail_utilisateur, mdp_utilisateur = :mdp_utilisateur, role_utilisateur = :role_utilisateur WHERE id_utilisateur = :id_utilisateur";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        ':pseudo_utilisateur' => $pseudo,
        ':mail_utilisateur' => $mail,
        ':mdp_utilisateur' => $password,
        ':role_utilisateur' => $role,
        ':id_utilisateur' => $id
      ]);

      return true;
    }

    // Delete User From Database
    public function delete($id) {
      $sql = "DELETE FROM utilisateur WHERE id_utilisateur = :id_utilisateur";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id_utilisateur' => $id]);
      return true;
    }
  }

?>