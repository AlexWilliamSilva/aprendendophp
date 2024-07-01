<?php
    class Produtos
    {

        private $CodigoProduto;
        private $NomeDoProduto;
        private $CodigoFornecedor;
        private $CodigoCategoria;
        private $QuantidadePorUnidade;
        private $PrecoUnitario;
        private $UnidadesEmEstoque;
        private $UnidadesPedidas;
        private $NivelDeEstoque;
        private $Descontinuado;
        
        public function __construct($NomeDoProduto, $CodigoFornecedor, $CodigoCategoria, $QuantidadePorUnidade, $PrecoUnitario, $UnidadesEmEstoque, $UnidadesPedidas, $NivelDeEstoque, $Descontinuado) {
            $this->NomeDoProduto = $NomeDoProduto;
            $this->CodigoFornecedor = $CodigoFornecedor;
            $this->CodigoCategoria = $CodigoCategoria;
            $this->QuantidadePorUnidade = $QuantidadePorUnidade;
            $this->PrecoUnitario = $PrecoUnitario;
            $this->UnidadesEmEstoque = $UnidadesEmEstoque;
            $this->UnidadesPedidas = $UnidadesPedidas;
            $this->NivelDeEstoque = $NivelDeEstoque;
            $this->Descontinuado = $Descontinuado;
        }
    }
?>