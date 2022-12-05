<?php

namespace Pessoa\Controller;

use Exception;
use Pessoa\Form\PessoaForm;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class PessoaController extends AbstractActionController
{
 
    private $table;

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
        return new ViewModel(['pessoas' => $this->table->getAll()]);
    } 

    public function adicionarAction() {
        $form = new PessoaForm();
        $form->get('submit')->setValue('Adicionar');
        $request = $this->getRequest();

        if (!$request->isPost()) {
            return new ViewModel(['form' => $form]);
        }

        $pessoa = new \Pessoa\Model\Pessoa();
        $form->setData($request->getPost());
        if (!$form->isValid()) {
            return new ViewModel(['form' => $form]);
        }

        $pessoa->exchangeArray($form->getData());
        $this->table->salvarPessoa($pessoa);
        return $this->redirect()->toRoute('pessoa');
    }

    public function salvarAction(){
        return new ViewModel();
    }

    public function editarAction(){
        $id = (int) $this->params()->fromRoute('id',0);
        if($id === 0){
            return $this->redirect()->toRoute('pessoa', ['action' => 'adicionar']);
        }
        try {
            $pessoa = $this->table->getPessoa($id);
        } catch (Exception $ecx){
            return $this->redirect()->toRoute('pessoa', ['action' => 'index']);
        }

        $form = new PessoaForm();
        $form->bind($pessoa);
        $form->get('submit')->setAttribute('value', 'salvar');
        $request = $this->getRequest();
        $viewData =  ['id' =>$id, 'form'=>$form];

        if(!$request->isPost()){
            return $viewData; 
        }

        $form->setData($request->getPost());
        if (!$form->isValid()) {
            return $viewData;
        }

        //$pessoa->exchangeArray($form->getData() );
        $this->table->salvarPessoa($form->getData());
        return $this->redirect()->toRoute('pessoa');

        return new ViewModel();
    }

    public function removerAction(){
        return new ViewModel();
    }

    public function confirmacaoAction(){
        //return new ViewModel();
    }

}
