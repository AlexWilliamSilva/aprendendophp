<?php
    class Fornecedores
    {

        private $CodigoDoFornecedor;
        private $NomeDaEmpresa;
        private $NomeDoContato;
        private $CargoDoContato;
        private $Endereco;
        private $Cidade;
        private $UF;
        private $CEP;
        private $Pais;
        private $Telefone;
        private $Fax;

        public function __construct($NomeDaEmpresa, $NomeDoContato, $CargoDoContato, $Endereco, $Cidade, $UF, $CEP, $Pais, $Telefone) {
            $this->NomeDaEmpresa = $NomeDaEmpresa;
            $this->NomeDoContato = $NomeDoContato;
            $this->CargoDoContato = $CargoDoContato;
            $this->Endereco = $Endereco;
            $this->Cidade = $Cidade;
            $this->UF = $UF;
            $this->CEP = $CEP;
            $this->Pais = $Pais;
            $this->Telefone = $Telefone;
        }

        public function set_NomeDaEmpresa($NomeDaEmpresa) {
            $this->NomeDaEmpresa = $NomeDaEmpresa;
        }

        public function get_NomeDaEmpresa() {
            return $this->NomeDaEmpresa;
        }

        public function set_NomeDoContato($NomeDoContato) {
            $this->NomeDoContato = $NomeDoContato;
        }

        public function get_NomeDoContato() {
            return $this->NomeDoContato;
        }

        public function set_CargoDoContato($CargoDoContato) {
            $this->CargoDoContato = $CargoDoContato;
        }

        public function get_CargoDoContato() {
            return $this->CargoDoContato;
        }

        public function set_Endereco($Endereco) {
            $this->Endereco = $Endereco;
        }

        public function get_Endereco() {
            return $this->Endereco;
        }

        public function set_Cidade($Cidade) {
            $this->Cidade = $Cidade;
        }

        public function get_Cidade() {
            return $this->Cidade;
        }

        public function set_UF($UF) {
            $this->UF = $UF;
        }

        public function get_UF() {
            return $this->UF;
        }

        public function set_CEP($CEP) {
            $this->CEP = $CEP;
        }

        public function get_CEP() {
            return $this->CEP;
        }

        public function set_Pais($Pais) {
            $this->Pais = $Pais;
        }

        public function get_Pais() {
            return $this->Pais;
        }

        public function set_Telefone($Telefone) {
            $this->Telefone = $Telefone;
        }

        public function get_Telefone() {
            return $this->Telefone;
        }
    }
?>