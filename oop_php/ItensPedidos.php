<?php
    class ItensPedidos
    {

        private $NumeroDoPedido;
        private $CodigoDoProduto;
        private $PrecoUnitario;
        private $Quantidade;
        private $Desconto;

        public function __construct($NumeroDoPedido, $CodigoDoProduto, $PrecoUnitario, $Quantidade, $Desconto) {
            $this->NumeroDoPedido = $NumeroDoPedido;
            $this->CodigoDoProduto = $CodigoDoProduto;
            $this->PrecoUnitario = $PrecoUnitario;
            $this->Quantidade = $Quantidade;
            $this->Desconto = $Desconto;
        }

        public function set_NumeroDoPedido($NumeroDoPedido) {
            $this->NumeroDoPedido = $NumeroDoPedido;
        }

        public function get_NumeroDoPedido() {
            return $this->NumeroDoPedido;
        }

        public function set_CodigoDoProduto($CodigoDoProduto) {
            $this->CodigoDoProduto = $CodigoDoProduto;
        }

        public function get_CodigoDoProduto() {
            return $this->CodigoDoProduto;
        }

        public function set_PrecoUnitario($PrecoUnitario) {
            $this->PrecoUnitario = $PrecoUnitario;
        }

        public function get_PrecoUnitario() {
            return $this->PrecoUnitario;
        }

        public function set_Quantidade($Quantidade) {
            $this->Quantidade = $Quantidade;
        }

        public function get_Quantidade() {
            return $this->Quantidade;
        }

        public function set_Desconto($Desconto) {
            $this->Desconto = $Desconto;
        }

        public function get_Desconto() {
            return $this->Desconto;
        }
    }
?>