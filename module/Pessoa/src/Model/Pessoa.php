<?php

namespace Pessoa\Model;


class Pessoa implements \Laminas\Stdlib\ArraySerializableInterface  {

        private $id;
        private $nome;
        private $sobrenome;
        private $email;
        private $situacao;

    public function exchangeArray(array $data){
        
        $this->id = !empty($data['id']) ? $data['id'] : null;
        $this->nome = !empty($data['nome']) ? $data['nome'] : null;
        $this->sobrenome = !empty($data['sobrenome']) ? $data['sobrenome'] : null;
        $this->email = !empty($data['email']) ? $data['email'] : null;
        $this->situacao = !empty($data['situacao']) ? $data['situacao'] : null;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome;
    }

    public function getSobrenome() {
        return $this->sobrenome;
    }

    public function setSobrenome($sobrenome) {
        $this->sobrenome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email;
    }
 
    public function getSituacao() {
        return $this->situacao;
    }

    public function setSituacao($situacao) {
        $this->situacao;
    }

    public function getArrayCopy() : array
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'sobrenome' => $this->sobrenome,
            'situacao' => $this->situacao,
        ];
    }

}