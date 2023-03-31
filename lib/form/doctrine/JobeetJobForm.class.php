<?php

/**
 * JobeetJob form.
 *
 * @package    jobeet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class JobeetJobForm extends BaseJobeetJobForm
{
  public function configure()
  {
    $this->removeFields();
    //ACTIVAR ESAS OPCIONES CUANDO SE CREA UN USUARIO ADMIN PARA REALIZAR ESAS ACCIONES MEDIANTE lOGIN
    //CONFIGURAR POR DOCKER SU LOGIN.
    //UNA VEZ CREADO EL LOGIN, QUITA ESOS COMENTARIOS Y PODRA HACER LAS MODIFICACIONES EN BACK END
    unset(
      $this['created_at'],
      $this['updated_at'],
      // $this['expires_at'],
      // $this['is_activated'],
      $this['token']
    );


    $this->validatorSchema['email'] = new sfValidatorAnd(array(
      $this->validatorSchema['email'],
      new sfValidatorEmail(),
    ));

    $this->widgetSchema['type'] = new sfWidgetFormChoice(array(
      'choices'  => Doctrine_Core::getTable('JobeetJob')->getTypes(),
      'expanded' => true,
    ));
    $this->validatorSchema['type'] = new sfValidatorChoice(array(
      'choices' => array_keys(Doctrine_Core::getTable('JobeetJob')->getTypes()),
    ));

    $this->widgetSchema['logo'] = new sfWidgetFormInputFile(array(
      'label' => 'Company logo',
    ));

    $this->widgetSchema->setLabels(array(
      'category_id'    => 'Category',
      'is_public'      => 'Public?',
      'how_to_apply'   => 'How to apply?',
    ));

    $this->validatorSchema['logo'] = new sfValidatorFile(array(
      'required'   => false,
      'path'       => sfConfig::get('sf_upload_dir') . '/jobs',
      'mime_types' => 'web_images',
    ));

    $this->widgetSchema->setHelp('is_public', 'Si el trabajo también se puede publicar en sitios web afiliados o no.');
  }

  protected function removeFields()
  {
    unset(
      $this['created_at'],
      $this['updated_at'],
      $this['expires_at'],
      $this['is_activated'],
      $this['token']
    );
  }
}
