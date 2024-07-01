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
    }
?>