<?php
class authActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    if ($request->isMethod('post')) {
      $username = $request->getParameter('username');
      $password = $request->getParameter('password');

      // Buscar al usuario en la base de datos
      $user = Doctrine_Core::getTable('users')->findOneBy('username', $username);

      // Validar la contraseña
      if ($user && $user->getPassword() == md5($password)) {
        // Autenticación exitosa
        $this->getUser()->setAuthenticated(true);
        $this->getUser()->setAttribute('username', $user->getUsername());

        return $this->redirect('@homepage');
      } else {
        // Autenticación fallida
        $this->getUser()->setFlash('error', 'Usuario o contraseña incorrectos');
      }
    }
  }
}
