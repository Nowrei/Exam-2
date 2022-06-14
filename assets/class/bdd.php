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
    public function insert($nom, $heure, $titre, $github, $lien, $image) {
      $sql = "INSERT INTO projet_utilisateur (nom_projet, heure_projet, titre_projet, github_projet, lien_projet, image_projet) 
      VALUES (:nom_projet, :heure_projet, :titre_projet, :github_projet, :lien_projet, :image_projet)";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        ':nom_projet' => $nom,
        ':heure_projet' => $heure,
        ':titre_projet' => $titre,
        ':github_projet' => $github,
        ':lien_projet' => $lien,
        ':image_projet' => $image,


    
      ]);
      return true;
    }

    // Fetch All Users From Database
    public function read() {
      $sql = "SELECT * FROM projet_utilisateur";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    }

    // Fetch Single User From Database
    public function readOne($id) {
      $sql = "SELECT * FROM projet_utilisateur WHERE id_projet = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id' => $id]);
      $result = $stmt->fetch();
      return $result;
    }

    // Update Single User
    public function update($id, $titre, $github, $lien, $image) {
      
      $sql = "UPDATE projet_utilisateur SET titre_projet = :titre_projet, github_projet = :github_projet, lien_projet = :lien_projet, image_projet = :image_projet WHERE projet.id_projet = :id_projet";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        ':titre_projet' => $titre,
        ':github_projet' => $github,
        ':lien_projet' => $lien,
        ':image_projet' => $image,
        ':id_projet' => $id
      ]);

      return true;
    }

    // Delete User From Database
    public function delete($id) {
      $sql = "DELETE FROM projet_utilisateur WHERE id_projet = :id_projet";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id_projet' => $id]);
      return true;
    }
  }

?>