<?php
class conn
{
    private $nombre_db;
    private $usu; //root
    private $pass; //""
    private $server;

    private $link;

    function __construct()
    {
        $this->nombre_db = "UH";
        $this->server = "a2nlmysql19plsk.secureserver.net";
        $this->usu = "US";
        $this->pass = "US123";
    }

    public function conectar()
    {
        $this->link = mysqli_connect($this->server, $this->usu, $this->pass, $this->nombre_db);

        if (!$this->link) {
            echo "error al conectar a mysql";
            exit();
        }
        return $this->link;
    }

    public function desconectar()
    {
        mysqli_close($this->link);
    }
}

?>
