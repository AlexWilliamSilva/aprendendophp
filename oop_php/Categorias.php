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

        public function set_NomeDaCategoria($NomeDaCategoria) {
            $this->NomeDaCategoria = $NomeDaCategoria;
        }

        
        public function set_Descricao($Descricao) {
            $this->Descricao = $Descricao;
        }

        public function set_Figura($Figura) {
            $this->Figura = $Figura;
        }
    }
?>