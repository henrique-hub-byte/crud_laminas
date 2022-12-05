<?php
namespace Pessoa\Form;

use Laminas\Form\Form;

/**
 * Description of PessoaForm
 *
 * @author drink
 */
class PessoaForm extends Form {
 
    public function __construct() {
        parent::__construct('pessoa', []);
        
        $this->add(new \Laminas\Form\Element\Hidden('id'));
        $this->add(new \Laminas\Form\Element\Text("nome",['label' => "Nome"]));
        $this->add(new \Laminas\Form\Element\Text("sobrenome",['label' => "Sobrenome"]));
        $this->add(new \Laminas\Form\Element\Email("email",['label' => "email"]));
        $this->add(new \Laminas\Form\Element\Text("situacao",['label' => "Situação"]));
        
        $submit = new \Laminas\Form\Element\Submit('submit');
        $submit->setAttributes(['value'=>'Salvar','id'=>'submitbutton']);
        $this->add($submit);
    }
    
}