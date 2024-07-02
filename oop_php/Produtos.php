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

        public function set_NomeDoProduto($NomeDoProduto) {
            $this->NomeDoProduto = $NomeDoProduto;
        }

        public function get_NomeDoProduto() {
            return $this->NomeDoProduto;
        }

        public function set_CodigoFornecedor($CodigoFornecedor) {
            $this->CodigoFornecedor = $CodigoFornecedor;
        }

        public function get_CodigoFornecedor() {
            return $this->CodigoFornecedor;
        }

        public function set_CodigoCategoria($CodigoCategoria) {
            $this->CodigoCategoria = $CodigoCategoria;
        }

        public function get_CodigoCategoria() {
            return $this->CodigoCategoria;
        }

        public function set_QuantidadePorUnidade($QuantidadePorUnidade) {
            $this->QuantidadePorUnidade = $QuantidadePorUnidade;
        }

        public function get_QuantidadePorUnidade() {
            return $this->QuantidadePorUnidade;
        }

        public function set_PrecoUnitario($PrecoUnitario) {
            $this->PrecoUnitario = $PrecoUnitario;
        }

        public function get_PrecoUnitario() {
            return $this->PrecoUnitario;
        }

        public function set_UnidadesEmEstoque($UnidadesEmEstoque) {
            $this->UnidadesEmEstoque = $UnidadesEmEstoque;
        }

        public function get_UnidadesEmEstoque() {
            return $this->UnidadesEmEstoque;
        }

        public function set_UnidadesPedidas($UnidadesPedidas) {
            $this->UnidadesPedidas = $UnidadesPedidas;
        }

        public function get_UnidadesPedidas() {
            return $this->UnidadesPedidas;
        }

        public function set_NivelDeEstoque($NivelDeEstoque) {
            $this->NivelDeEstoque = $NivelDeEstoque;
        }

        public function get_NivelDeEstoque() {
            return $this->NivelDeEstoque;
        }

        public function set_Descontinuado($Descontinuado) {
            $this->Descontinuado = $Descontinuado;
        }

        public function get_Descontinuado() {
            return $this->Descontinuado;
        }
    }
?>