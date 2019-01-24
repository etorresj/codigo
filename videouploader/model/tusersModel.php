<?php
  class tusers extends conexion
  {
      public function __construct($table = "", $idC="id", $userC = "", $passC = "", $activo = "", $admin="", $session = "")
      {
          $this->myTable = array("table" => "$table", "userColum" => "$userC", "passColum" => "$passC", "actColum" => "$activo");
          $this->activo = $activo;
          $this->session = $session;
          $this->auth = false;
          $this->idUsuario=$idC;
          $this->admin=$admin;
      }
      
      
      
      public function fuser($user, $password)
      {
          $myTable = $this->myTable;
          $myActivo = $this->activo;
          $mySession = $this->session;
          

          //find user in DB
       

          $query = "select * from " . $myTable["table"] . " where " . $myTable["userColum"] . "='$user' and " . $myTable["passColum"] . "='$password'";
          if ($myActivo)
              $query .= " and " . $myTable["actColum"] . " ='1'";
          if($this->admin) 
              $query.=" and admin ='1'";
      
          $resultado = $this->queryResults($query);
          
          
          //User and password are correct
          
          if ($resultado) {
              $this->auth = true;
              $_SESSION['' . $mySession . ''] = $resultado[0][$this->idUsuario];
          }
          
          // password incorrect
          else {
              $this->auth = false;
          }
      }
      
      //function that return if the user can access to the system
      public function allow()
      {
          if ($this->auth) {
              return true;
          } else {
              return false;
          }
      }
	  
	
  }
?>