<?php
class usersActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->users = UserTable::getInstance()->findAll();
  }

  public function executeShow(sfWebRequest $request)
  {
    $id = $request->getParameter('id');
    $this->user = UserTable::getInstance()->find($id);
  }

  public function executeEdit(sfWebRequest $request)
  {
    $id = $request->getParameter('id');
    $this->user = UserTable::getInstance()->find($id);
    $this->form = new UserForm($this->user);
    if ($request->isMethod('post')) {
      $this->form->bind($request->getParameter($this->form->getName()));
      if ($this->form->isValid()) {
        $this->form->save();
        $this->redirect('users/index');
      }
    }
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new UserForm();
    if ($request->isMethod('post')) {
      $this->form->bind($request->getParameter($this->form->getName()));
      if ($this->form->isValid()) {
        $this->form->save();
        $this->redirect('users/index');
      }
    }
  }

  public function executeDelete(sfWebRequest $request)
  {
    $id = $request->getParameter('id');
    $user = UserTable::getInstance()->find($id);
    $user->delete();
    $this->redirect('users/index');
  }
}
