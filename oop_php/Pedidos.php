<?php
    class Pedidos
    {

        private $NumeroPedido;
        private $CodigoCliente;
        private $CodigoFuncionario;
        private $DataDoPedido;
        private $DataDeEntrega;
        private $DataDeEnvio;
        private $Frete;
        private $NomeDestinatario;
        private $EnderecoDestinatario;
        private $CidadeDeDestino;
        private $CEPdeDestino;
        private $PaisdeDestino;

        public function __construct($CodigoCliente, $CodigoFuncionario, $DataDoPedido, $DataDeEntrega, $DataDeEnvio, $Frete, $NomeDestinatario, $EnderecoDestinatario, $CidadeDeDestino, $CEPdeDestino, $PaisdeDestino) {
            $this->CodigoCliente = $CodigoCliente;
            $this->CodigoFuncionario = $CodigoFuncionario;
            $this->DataDoPedido = $DataDoPedido;
            $this->DataDeEntrega = $DataDeEntrega;
            $this->DataDeEnvio = $DataDeEnvio;
            $this->Frete = $Frete;
            $this->NomeDestinatario = $NomeDestinatario;
            $this->EnderecoDestinatario = $EnderecoDestinatario;
            $this->CidadeDeDestino = $CidadeDeDestino;
            $this->CEPdeDestino = $CEPdeDestino;
            $this->PaisdeDestino = $PaisdeDestino;
        }

        public function set_CodigoCliente($CodigoCliente) {
            $this->CodigoCliente = $CodigoCliente;
        }

        public function get_CodigoCliente() {
            return $this->CodigoCliente;
        }

        public function set_CodigoFuncionario($CodigoFuncionario) {
            $this->CodigoFuncionario = $CodigoFuncionario;
        }

        public function get_CodigoFuncionario() {
            return $this->CodigoFuncionario;
        }

        public function set_DataDoPedido($DataDoPedido) {
            $this->DataDoPedido = $DataDoPedido;
        }

        public function get_DataDoPedido() {
            return $this->DataDoPedido;
        }

        public function set_DataDeEntrega($DataDeEntrega) {
            $this->DataDeEntrega = $DataDeEntrega;
        }

        public function get_DataDeEntrega() {
            return $this->DataDeEntrega;
        }

        public function set_DataDeEnvio($DataDeEnvio) {
            $this->DataDeEnvio = $DataDeEnvio;
        }

        public function get_DataDeEnvio() {
            return $this->DataDeEnvio;
        }

        public function set_Frete($Frete) {
            $this->Frete = $Frete;
        }

        public function get_Frete() {
            return $this->Frete;
        }

        public function set_NomeDestinatario($NomeDestinatario) {
            $this->NomeDestinatario = $NomeDestinatario;
        }

        public function get_NomeDestinatario() {
            return $this->NomeDestinatario;
        }
        
        public function set_EnderecoDestinatario($EnderecoDestinatario) {
            $this->EnderecoDestinatario = $EnderecoDestinatario;
        }

        public function get_EnderecoDestinatario() {
            return $this->EnderecoDestinatario;
        }

        public function set_CidadeDeDestino($CidadeDeDestino) {
            $this->CidadeDeDestino = $CidadeDeDestino;
        }

        public function get_CidadeDeDestino() {
            return $this->CidadeDeDestino;
        }

        public function set_CEPdeDestino($CEPdeDestino) {
            $this->CEPdeDestino = $CEPdeDestino;
        }

        public function get_CEPdeDestino() {
            return $this->CEPdeDestino;
        }

        public function set_PaisdeDestino($PaisdeDestino) {
            $this->PaisdeDestino = $PaisdeDestino;
        }

        public function get_PaisdeDestino() {
            return $this->PaisdeDestino;
        }
    }
?>