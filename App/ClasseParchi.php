<?php
    class parchi
    {
        private $Id;
        private $Nome;
        private $Luogo;
        private $Latitudine;
        private $Longitudine;
        private $Descrizione;
        private $path_immagine;
        private $fk_IdAmministratore;
        private $conn;
        private $tableName = 'parchi';

        function setId($Id) { $this->Id = $Id; }
        function getId() { return $this->Id; }
        function setNome($Nome) { $this->Nome = $Nome; }
        function getNome() { return $this->Nome; }
        function setLuogo($Luogo) { $this->Luogo = $Luogo; }
        function getLuogo() { return $this->Luogo; }
        function setLatitudine($Latitudine) { $this->Latitudine = $Latitudine; }
        function getLatitudine() { return $this->Latitudine; }
        function setLongitudine($Longitudine) { $this->Longitudine = $Longitudine; }
        function getLongitudine() { return $this->Longitudine; }
        function setDescrizione($Descrizione) { $this->Descrizione = $Descrizione; }
        function getDescrizione() { return $this->Descrizione; }
        function setPath_immagine($path_immagine) { $this->path_immagine = $path_immagine; }
        function getPath_immagine() { return $this->path_immagine; }
        function setFk_IdAmministratore($fk_IdAmministratore) { $this->fk_IdAmministratore = $fk_IdAmministratore; }
        function getFk_IdAmministratore() { return $this->fk_IdAmministratore; }

        public function _construct()
        {
            include 'DBconnection.php';
        }

        public function getParchi() {
            include 'DBconnection.php';
            $sql = "SELECT * FROM parco";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_all($result);
            return $row;
        }
    }
?>