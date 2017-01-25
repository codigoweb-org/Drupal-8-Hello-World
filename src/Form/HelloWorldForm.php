<?php

namespace Drupal\hello_world\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class HelloWorldForm extends ConfigFormBase {
  /**
   * {@inheritdoc}.
   */
  public function getFormId() {
    return 'hello_world_form';
  }
  
  /**
   * {@inheritdoc}.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // Form constructor
    $form = parent::buildForm($form, $form_state);
    // Default settings
    $config = $this->config('hello_world.settings');
    
    // Page title field
    $form['page_title'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Hello World - Page title:'),
      '#default_value' => $config->get('hello_world.page_title', 'Hello World Page title'),
      '#description' => $this->t('Page title for Hello World page.'),
    );
    // Source text field
    $form['body'] = array(
      '#type' => 'textarea',
      '#title' => $this->t('Hello World - Body:'),
      '#default_value' => $config->get('hello_world.body', 'Hello World Body'),
      '#description' => $this->t('Body for Hello World page.'),
    );
    
    return $form;
  }
  
  /**
   * {@inheritdoc}.
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    
  }
  
  /**
   * {@inheritdoc}.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('hello_world.settings');
    $config->set('hello_world.body', $form_state->getValue('body'));
    $config->set('hello_world.page_title', $form_state->getValue('page_title'));
    $config->save();
    return parent::submitForm($form, $form_state);
  }
  
  /**
   * {@inheritdoc}.
   */
  protected function getEditableConfigNames() {
    return [
      'hello_world.settings',
    ];
  }
  
}