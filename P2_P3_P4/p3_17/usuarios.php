<?php
function validarUsuario($usuario, $contraseña){

  $usuarios = array("victor" => "1234",
  "Luisa" => "baobab",
  "Antonio" => "olmo");

  // Verifica si el usuario existe en el array $usuarios y si la contraseña proporcionada coincide
  // 1. array_key_exists($usuario, $usuarios) verifica si la clave $usuario existe en el array $usuarios.
  //    Esto asegura que estamos buscando un usuario válido.
  // 2. Si el usuario existe, $usuarios[$usuario] === $contraseña compara la contraseña almacenada
  //    con la contraseña proporcionada por el usuario de manera estricta (mismo valor y tipo).
  // 3. Ambas condiciones deben ser verdaderas para que la instrucción devuelva true, lo que significa que
  //    el usuario y la contraseña son válidos y coinciden.
  return array_key_exists($usuario, $usuarios) && $usuarios[$usuario] === $contraseña;
}