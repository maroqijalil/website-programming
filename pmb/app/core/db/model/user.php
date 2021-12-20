<?php

function login()
{
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

  $sql = "SELECT * FROM users WHERE email=:email OR email=:email";
  $stmt = $db->prepare($sql);

  $params = array(":email" => $email);

  $stmt->execute($params);

  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($user) {
    if (password_verify($password, $user["password"])) {
      session_start();
      $_SESSION["user"] = $user;

      header("Location: /");
    }
  } else {
    echo 'Pengguna belum terdaftar';
  }
}
