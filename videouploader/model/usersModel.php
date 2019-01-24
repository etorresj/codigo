<?php
class users extends conexion {
	public function getUser($id) {
		$query="select * from tusers where idlogin='$id'";
		$response=$this->queryResults($query);

		$queryG="select fkgroup from properties where idProperty='".$response[0]['property']."'";
		$responseG=$this->queryResults($queryG);

		$response[0]['fkgroup']=$responseG[0]['fkgroup'];

		return $response;
	}
}
?>