<?php 
//
class student {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllStudents() {
        return $this->db->query("SELECT * FROM student");
    }

    public function addStudent($first_name, $last_name, $email, $class_id, $dob) {
        $this->db->query(
            "INSERT INTO student (first_name, last_name, email, class_id, date_of_birth) VALUES (?, ?, ?, ?, ?)",
            [$first_name, $last_name, $email, $class_id, $dob]
        );
    }
}
