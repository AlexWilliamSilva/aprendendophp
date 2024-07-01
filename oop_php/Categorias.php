<?php
    class Categorias
    {

        private $CodigoDaCategoria;
        private $NomeDaCategoria;
        private $Descricao;
        private $Figura;
        
        public function __construct($NomeDaCategoria, $Descricao, $Figura) {
            $this->NomeDaCategoria = $NomeDaCategoria;
            $this->Descricao = $Descricao;
            $this->Figura = $Figura;
        }

        
    }
?>