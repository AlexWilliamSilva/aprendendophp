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

        public function set_
    }
?>