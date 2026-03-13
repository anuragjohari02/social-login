# PHP Social Login with Google (HybridAuth)

A simple **class-based PHP project** that implements Google OAuth login using **HybridAuth**, and stores user details in a **MySQL database**. Perfect for practice and portfolio projects.

---

## 🔹 Features

- Login with **Google account**  
- Store users in **MySQL database**  
- **Class-based** OOP structure  
- Session-based login  
- Easily extendable for other providers (GitHub, Facebook, LinkedIn)  
- Ready to push to GitHub

---

## 🔹 Folder Structure

```

social-login/
│
├── app/
│   ├── classes/
│   │      SocialAuth.php
│   │      User.php
│   │      Database.php
│   │
│   └── config/
│          oauth.php
│
├── public/
│      login.php
│      callback.php
│      logout.php
│
├── vendor/         # Composer libraries
├── composer.json
├── .gitignore
└── README.md

````

---

## 🔹 Requirements

- PHP >= 7.4  
- MySQL / MariaDB  
- Apache / Nginx (localhost setup e.g., XAMPP, WAMP, LAMP)  
- Composer

---

## 🔹 Setup Instructions

### 1. Clone the repo

```bash
git clone https://github.com/yourusername/php-social-login.git
cd php-social-login
````

---

### 2. Install Composer Dependencies

```bash
composer install
```

This will install **HybridAuth**.

---

### 3. Create Database

Create a MySQL database:

```sql
CREATE DATABASE social_login;
USE social_login;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    provider VARCHAR(50) NOT NULL,
    provider_id VARCHAR(255) NOT NULL,
    name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    avatar VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

### 4. Google OAuth Setup

1. Go to **[Google Cloud Console](https://console.cloud.google.com/)**
2. Create a **New Project** (or select existing)
3. Navigate to **APIs & Services → Credentials → Create Credentials → OAuth Client ID**
4. Choose **Web Application**
5. Add **Authorized redirect URI**:

```
http://localhost/prep/social-login/public/callback.php
```

6. Copy **Client ID** and **Client Secret**.

---

### 5. Configure OAuth

Edit `app/config/oauth.php`:

```php
return [
    'callback' => 'http://localhost/prep/social-login/public/callback.php',
    'providers' => [
        'Google' => [
            'enabled' => true,
            'keys' => [
                'id' => 'YOUR_GOOGLE_CLIENT_ID',
                'secret' => 'YOUR_GOOGLE_CLIENT_SECRET'
            ]
        ]
    ]
];
```

> ⚠️ Never push your `Client Secret` to GitHub; use `.env` in production.

---

### 6. Start Local Server

If using XAMPP / LAMP:

```
http://localhost/prep/social-login/public/login.php
```

Click **Login with Google**, accept the prompt, and you will be redirected back.

User info is saved in `users` table and stored in PHP session.

---

### 7. Logout

Open:

```
http://localhost/prep/social-login/public/logout.php
```

---

## 🔹 How to Extend

* Add **Facebook / GitHub / LinkedIn** login in `oauth.php`
* Extend `SocialAuth.php` to handle multiple providers
* Store additional user info in the database
* Add **CSRF protection** with `state` parameter

---

## 🔹 Recommended Security Tips

* Never commit secrets to GitHub
* Use `.env` or `config.local.php` for credentials
* Use **prepared statements** (PDO) for all DB queries
* Always validate the OAuth `state` parameter

---

## 🔹 References

* [HybridAuth Documentation](https://hybridauth.github.io/)
* [Google OAuth 2.0 Docs](https://developers.google.com/identity/protocols/oauth2)
* [PHP PDO Documentation](https://www.php.net/manual/en/book.pdo.php)

---

## 🔹 License

MIT License

```

---

This README covers everything: **folder structure, database, Google setup, OAuth config, running locally, and security tips**.  

If you want, I can **also make a ready-to-push GitHub structure** with **all working files (`SocialAuth.php`, `User.php`, `Database.php`, `login.php`, `callback.php`, `logout.php`)** exactly for `/var/www/html/prep/social-login/`.  

Do you want me to create that full package?
```
