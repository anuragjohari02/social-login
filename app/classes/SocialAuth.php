<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/User.php';
use Hybridauth\Hybridauth;

class SocialAuth {

    private $hybridauth;
    private $userModel;

    public function __construct()
    {
        $config = require __DIR__ . '/../config/oauth.php';
        $this->hybridauth = new Hybridauth($config);
        $this->userModel = new User();
    }

    public function login($provider)
    {
        try {
            // Authenticate with Google (or any provider)
            $adapter = $this->hybridauth->authenticate($provider);
            $profile = $adapter->getUserProfile();

            // Check if user exists
            $existingUser = $this->userModel->getUserByProvider($provider, $profile->identifier);

            if ($existingUser) {
                // Optional: update existing info
                $this->userModel->updateUser($existingUser['id'], [
                    'name' => $profile->displayName,
                    'email' => $profile->email,
                    'avatar' => $profile->photoURL
                ]);
                $user = $existingUser;
            } else {
                // Create new user
                $userId = $this->userModel->createUser([
                    'provider' => $provider,
                    'provider_id' => $profile->identifier,
                    'name' => $profile->displayName,
                    'email' => $profile->email,
                    'avatar' => $profile->photoURL
                ]);
                $user = $this->userModel->getUserByProvider($provider, $profile->identifier);
            }

            // Store in session
            session_start();
            $_SESSION['user'] = $user;

            return $user;

        } catch (\Exception $e) {
            echo "Login failed: " . $e->getMessage();
            return false;
        }
    }
}