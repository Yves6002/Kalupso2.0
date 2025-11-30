<?php
// Connexion & Déconnexion 
class AuthController extends Controller {
    public function login($email, $password) {
        $userModel = new User();
        $user = $userModel->getUserByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role_id'] = $user['role_id'];

            if ($user['role_id'] == 1) { // Admin
                header("Location: /dashboard");
            } else {
                header("Location: /attendance");
            }
            exit;
        } else {
            echo "Email ou mot de passe incorrect";
        }
    }
}
