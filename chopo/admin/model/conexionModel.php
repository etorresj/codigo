<?php
abstract class conexion{

	private $server_db = 'localhost';
	/*private $user_db = 'wigimex_chopores';
	private $password_db = '1ChopoResponsive2';
	private $name_db = 'wigimex_chopo_responsive';
	*/
	private $user_db = 'root';
	private $password_db = '';
	private $name_db = 'chopo';

	private $link_conexion_db;
	protected $msj;
	private $myConn;
	protected $data = array ();
	protected $rows;
	protected $query_data;


	
	private function Connection (){
		$this->myConn = new mysqli($this->server_db, $this->user_db, $this->password_db, $this->name_db);
		$this->myConn->query('SET NAME UTF-8');
	}


	private function CloseConnection (){
		unset($this->myConn);
	}
	
	protected function querySimple ($query){
		$this->Connection();
		if($this->myConn->query($query)){
			$this->msj = true;
			$this->CloseConnection();
			return $this->msj;
		}
		else{
			echo $this->myConn->error;
			$this->msj = false;
			$this->CloseConnection();
			return $this->msj;
		}
	}
	protected function queryRes() {
		return $this->user_db."-".$this->password_db;
	}
	protected function queryInsert($query) {
		$this->Connection();
		if($this->myConn->query($query)){
			$insert=$this->myConn->insert_id;
			$this->CloseConnection();
			return $insert;
		}
		else{
			echo $this->myConn->error;
			$this->msj = false;
			$this->CloseConnection();
			return $this->msj;
		}
	}

	protected function queryResultados ($query){
		$this->Connection();
		$this->query_data = $this->myConn->query($query) or die ($this->myConn->error);
		$this->rows = $this->query_data->num_rows;
		if($this->rows == 0){
			$this->msj = false;
			$this->CloseConnection();
			return $this->msj;
		}
		else{
			$this->data=array();
			while($result = $this->query_data->fetch_assoc()){
				$this->data [] = $result;
			}
			$this->CloseConnection();
			return $this->data;
		}
	}


	
}

?>