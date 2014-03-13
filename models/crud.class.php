<?php
require_once('conexao.class.php');

  class crud {
    private $sql_ins="";
    private $tabela="";
    
    public function __construct($tabela) {
		$con = new conexao(); 
		$con->connect();

        $this->tabela = $tabela;
        return $this->tabela;
    }
           
    public function inserir($campos, $valores) {
        $this->sql_ins = "INSERT INTO `".$this->tabela."`( $campos ) VALUES ( $valores );";
		//echo $this->sql_ins;
		if(!$this->ins = mysql_query($this->sql_ins)) die();
    }
    
	public function selecionar($campos, $where) {
		$campos = ($campos)?$campos:"*";
        if($where) $this->sql_ins = "SELECT $campos FROM ".$this->tabela." WHERE $where ;";
		else $this->sql_ins = "SELECT $campos FROM ".$this->tabela." ;";
		//echo $this->sql_ins;
        if(!$this->sel = mysql_query($this->sql_ins)) die();
		$result = null;
		while($linha = mysql_fetch_assoc($this->sel))
			$result[] = $linha;
		return $result;
    }
	
	public function query($query) {
		if(!$this->sql_ins = mysql_query($query)) die();
		$result = null;
		//echo $this->sql_ins;
		while($linha = mysql_fetch_assoc($this->sql_ins))
			$result[] = $linha;
		return $result;
	}
	
    public function atualizar($camposvalores, $where) {
		if($where){
			$this->sql_ins = "UPDATE `".$this->tabela."` SET $camposvalores WHERE $where ;";
			//echo $this->sql_ins;
			if(!$this->upd = mysql_query($this->sql_ins)) die();
		}
    }    
    
	public function deletar($where) {
		if($where){
			$this->sql_ins = "DELETE FROM ".$this->tabela." WHERE ".$where;
			//echo $this->sql_ins;
			if(!$this->del = mysql_query($this->sql_ins)) die();
		}
    } 
}