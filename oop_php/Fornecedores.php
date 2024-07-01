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
    }
?>