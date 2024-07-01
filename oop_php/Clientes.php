<?php
    class Clientes
    {

        private $CodigoDoCliente;
        private $Nome;
        private $Endereco;
        private $Cidade;
        private $CEP;
        private $UF;
        private $Pais;
        private $Telefone;
        private $Fax;

        public function __construct($Nome, $Endereco, $Cidade, $CEP, $UF, $Pais, $Telefone) {
            $this->Nome = $Nome;
            $this->Endereco = $Endereco;
            $this->Cidade = $Cidade;
            $this->CEP = $CEP;
            $this->Pais = $Pais;
            $this->Telefone = $Telefone;
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

        public function set_CEP($CEP) {
            $this->CEP = $CEP;
        }

        public function set_UF($UF) {
            $this->UF = $UF;
        }

        public function set_Pais($Pais) {
            $this->Pais = $Pais;
        }

        public function set_Nome($Nome) {
            $this->Nome = $Nome;
        }

        public function set_Telefone($Telefone) {
            $this->Telefone = $Telefone;
        }
    }
?>