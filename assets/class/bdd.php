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
    public function insert($t, $nom, $titre, $lien, $file_name, $message, $id_utilisateur) {
    
      $sql = "INSERT INTO projet (nom_projet, heure_projet, titre_projet, lient_projet, image_projet, message_projet, id_utilisateur) VALUES (:nom_projet, :heure_projet, :titre_projet, :lient_projet, :image_projet, :message_projet, :id_utilisateur)";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        ':titre_projet' => $titre,
        ':lient_projet' => $lien,
        ':image_projet' => $file_name,
        ':message_projet' =>$message,
        ':nom_projet' => $nom,
        'id_utilisateur' => $id_utilisateur,
        ':heure_utilisateur' => $t

    
      ]);
      

      return true;
    }

    // Fetch Single User From Database
    public function readOne($id) {
      $sql = "SELECT * FROM projet ";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id' => $id]);
      $result = $stmt->fetch();
      return $result;
    }
  }


?>