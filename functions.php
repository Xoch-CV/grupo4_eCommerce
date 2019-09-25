<?php

define("COOKIE_REMEMBER", "user_logged");

function is_remembered() {
  $data=json_decode(file_get_contents('data.json'),true);
 if (isset($_COOKIE[COOKIE_REMEMBER])) {
   foreach ($data['usuarios'] as $key => $value) {
     if ($_COOKIE[COOKIE_REMEMBER]==$value['email']) {
       $_SESSION['user']=$value;
       // return $_SESSION['user'];
     }
   }
 }
  // aca verifico si esta la cookie
  // si esta
    // buscar el json el usuario
    // y al encontrarlo lo guardo en sesion

}
