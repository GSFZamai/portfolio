<?php

//Classe da conexão com BD
class Connection {

    private $host = 'localhost';
    private $dbname = 'portfolio';
    private $user = 'root';
    private $pass = '';

    public function Connect() {

        try {
            $connection = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->user, $this->pass);
            return $connection;
        }catch(PDOException $err) {
            return $err;
        }
    }
}

//Classe do objeto Projeto
class Projeto{

    private $id;
    private $titulo;
    private $imagem;
    private $github;
    private $link;
    private $descricao;
    private $connection;

    public function __get($attribute) {
        return $this->$attribute;
    }

    public function __set($attribute, $value) {
        $this->$attribute = $value;
    }

    public function cadastraProjeto() {
        $connection = new Connection();
        $connection = $connection->Connect();
        
        $query = "insert into projetos(titulo, imagem, github, link, descricao) 
                    values(:titulo, :imagem, :github, :link, :descricao)";

        $stmt = $connection->prepare($query);
        $stmt->bindValue(':titulo', $this->titulo);
        $stmt->bindValue(':imagem', $this->imagem);
        $stmt->bindValue(':github', $this->github);
        $stmt->bindValue(':link', $this->link);
        $stmt->bindValue(':descricao', $this->descricao);
        $stmt->execute();

    }

    public function retornaProjetos() {
        $connection = new Connection();
        $connection = $connection->Connect();

        $query = "select id, titulo, imagem, github, link, descricao from projetos";
        $stmt = $connection->query($query);
        
        $projetos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $projetos;
    }

}

    //cria nova instância do projeto e insere dados do formulário
    if(isset($_POST['titulo'])) {

    
        $projeto = new Projeto();

        $projeto->__set('titulo', $_POST['titulo']);
        $projeto->__set('imagem', $_POST['imagem']);
        $projeto->__set('github', $_POST['github']);
        $projeto->__set('link', $_POST['link']);
        $projeto->__set('descricao', $_POST['descricao']);
        
        $projeto->cadastraProjeto();
    }


   
?>