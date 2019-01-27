<?php
class admin extends conexion{
	public function redirect($url, $time, $no_session_par = null) {
		$url = urlencode($url);
		$url = str_replace('%3F', '?', $url);
		$url = str_replace('%3D', '=', $url);
		$url = str_replace('%26', '&', $url);
		echo '<meta http-equiv="refresh" content="'.$time.'; url='.$url.'">';
	}
	public function showArray($array) {
		echo "<pre>";
		print_r($array);
		echo "</pre>";
	}
	public function invFecha($fecha) {
	 	$fecha2=explode("-", $fecha);
	 	$fechaArray= array("Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic");
		return ($fecha2[2]."-".$fechaArray[$fecha2[1]-1]."-".$fecha2[0]);
	 }
	public function obtenUsuarios($id) {
		return $this->queryResultados("select * from usuariosAdmin where id='$id'");
	}
	 public function dash($id) {
	 	$arreglo=array();
		//usuarios
		$usuarios=$this->queryResultados("select COUNT(*) as cuantos from usuariosAdmin where activo='1'");
		$arreglo['usuarios']=$usuarios[0]['cuantos'];
		//ultimo usuario
		$arregloAux=$this->queryResultados("select usuario from usuariosAdmin  order by id DESC limit 0,1");
		$arreglo['ultimoUsuario']=$arregloAux[0]['usuario'];
		//ultimo acceso
		$arregloAux=$this->queryResultados("select accesoTemp from usuariosAdmin where id='$id'");
		$arreglo['ultimoAcceso']=$this->invFecha($arregloAux[0]['accesoTemp']);
		return ($arreglo);
	 }

	 public function guardaAcceso($id) {
		$hoy=date('Y-m-d');
		$arreglo=$this->queryResultados("select acceso from usuariosAdmin where id='$id'");
		$this->querySimple("update usuariosAdmin set accesoTemp='".$arreglo[0]['acceso']."' where id='$id'");
	 	$this->querySimple("update usuariosAdmin set acceso='$hoy' where id='$id'");
		return 1;
	 }
	 public function consulta($query) {
	 	return $this->queryResultados($query);
	 }

	 /////////////////
	 /////folios//////
	 /////////////////
	 
	 public function getFolios($limite="", $param="") {
	 	if($param)
	 		$aux=" where folio like '%$param%' ";
	 	$q="select * from folio ".$aux." order by id DESC ".$limite;
	 	return ($this->queryResultados($q));
	 }
	 public function getFolioId($id) {
	 	return $this->queryResultados("select * from folio where id='$id'");
	 }
	 public function addFolio($arreglo) {
	 	extract($arreglo);
	 	//verificando que no se duplica folio
	 	$duplicado=$this->queryResultados("select COUNT(*) as cuantos from folio where folio='$folio'");
	 	if(!$folio)
	 		return 0;
	 	else if($duplicado[0]['cuantos'])
	 		return 0;
	 	else
	 		return ($this->queryInsert("insert into folio (folio) values ('$folio')"));

	 }
	  public function editFolio($arreglo) {
	 	extract($arreglo);
	 	//verificando que no se duplica folio
	 	$duplicado=$this->queryResultados("select COUNT(*) as cuantos from folio where folio='$folio'");
	 	if($duplicado[0]['cuantos'])
	 		return 0;
	 	else 
	 		return ($this->querySimple("update folio set folio='$folio' where id='$id'"));

	 }



	 /////////////////
	 ///////tags//////
	 /////////////////
	 
	 public function getTags($limite="", $param="") {
	 	if($param)
	 		$aux=" where tag like '%$param%' ";
	 	$q="select * from tags ".$aux." order by tag ".$limite;
	 	return ($this->queryResultados($q));
	 }
	 public function getTagId($id) {
	 	return $this->queryResultados("select * from tags where id='$id'");
	 }
	 public function addTag($arreglo) {
	 	extract($arreglo);
	 	//verificando que no se duplica folio
	 	$duplicado=$this->queryResultados("select COUNT(*) as cuantos from tags where tag='$tag'");
	 	if(!$tag)
	 		return 0;
	 	else if($duplicado[0]['cuantos'])
	 		return 0;
	 	else
	 		return ($this->queryInsert("insert into tags (tag) values ('$tag')"));

	 }
	  public function editTag($arreglo) {
	 	extract($arreglo);
	 	//verificando que no se duplica folio
	 	$duplicado=$this->queryResultados("select COUNT(*) as cuantos from tags where tag='$tag'");
	 	if($duplicado[0]['cuantos'])
	 		return 0;
	 	else 
	 		return ($this->querySimple("update tags set tag='$tag' where id='$id'"));

	 }

	  public function eliminaTag($id) {
	 	$this->querySimple("delete from tags where id='$id'");
	 }

	 /////////////////
	 /////regiones////
	 /////////////////
	 
	 public function getRegiones($limite="", $param="") {
	 	if($param)
	 		$aux=" where nombre like '%$param%' or tag like '%$param%' ";
	 	$q="select * from region ".$aux." order by nombre ".$limite;
	 	return ($this->queryResultados($q));
	 }
	 public function getRegionId($id) {
	 	return $this->queryResultados("select * from region where id='$id'");
	 }
	 public function visibleRegion($arreglo) {
	 	extract($arreglo);
	 	if($id) {
	 		$visible=$visible==1?0:1;
	 		$this->querySimple("update region set visible='$visible' where id='$id'");
	 		return 1;
	 	}
	 	else
	 		return 0;
	 }
	  public function showRegion() {
	 	$response=$this->queryRes();
	 	return $response;
	 }
	 public function addRegion($arreglo, $archivo) {
	 	extract($archivo);
	 	if($imagen['size']>0){ //si hay foto
	 		$ext=explode(".",$imagen['name']);
	 		$ext=end($ext);
	 		if($ext=="jpg"||$ext=="gif"||$ext=="png") { //extensiones validas
	 			$nombreFoto=date("U").rand(0,100).".".$ext;
	 			move_uploaded_file($imagen['tmp_name'], "../images/region/".$nombreFoto);
	 		}
	 		else
	 			return 0;
	 	}
	 	//agregando datos a BD
	 	extract($arreglo);
	 	$query="insert into region (nombre, visible, latitud, longitud, imagen, tag, folio_id, telefono) 
	 						values ('$nombre', '$visible', '$latitud','$longitud','$nombreFoto', '$tag', '$folio_id', '$telefono')";
	 	return $this->queryInsert($query);
	 }

	 public function editRegion($arreglo, $archivo) {
	 	extract($archivo);
	 	if($imagen['size']>0){ //si hay foto
	 		$ext=explode(".",$imagen['name']);
	 		$ext=end($ext);
	 		if($ext=="jpg"||$ext=="gif"||$ext=="png") { //extensiones validas
	 			$nombreFoto=date("U").rand(0,100).".".$ext;
	 			move_uploaded_file($imagen['tmp_name'], "../images/region/".$nombreFoto);
	 			$aux=", imagen='$nombreFoto'";
	 		}
	 		else
	 			return 0;
	 	}
	 	//agregando datos a BD
	 	extract($arreglo);
	 	$query="update region set nombre='$nombre', latitud='$latitud', longitud='$longitud', telefono='$telefono', visible='$visible', tag='$tag', folio_id='$folio_id' ".$aux." where id='$id'";
	 	$this->querySimple($query);
	 	return 1;
	 }
	 /////////////////
	 ///localidades///
	 /////////////////
	 
	 public function getLocalidades($limite="", $param="") {
	 	if($param)
	 		$aux=" where a.nombre like '%$param%' 
	 				  or a.cp like '%$param%' 
	 				  or b.tag like '%$param%' 
	 				  or b.nombre like '%$param%' ";
	 	$q="select a.*, b.nombre as nombreRegion from localidad as a inner join region as b 
	 		on a.region_id=b.id ".$aux." order by b.id, a.nombre ".$limite;
	 	return ($this->queryResultados($q));
	 }
	 public function addLocalidad($arreglo) {
	 	extract($arreglo);
	 	$query="insert into localidad (nombre, region_id, cp) values ('$nombre', '$region_id', '$cp')";
	 	return $this->queryInsert($query);
	 }
	 public function getLocalidadId($id) {
	 	return $this->queryResultados("select * from localidad where id='$id'");
	 }
	 public function editLocalidad($arreglo) {
	 	extract($arreglo);
	 	$query="update localidad set nombre='$nombre', region_id='$region_id', cp='$cp' where id='$id'";
	 	$this->queryInsert($query);
	 	return 1;
	 }
	 /////////////////
	 ///sucursales////
	 /////////////////
	 public function getSucursales($limite="", $param="") {
	 	if($param)
	 		$aux=" where a.nombre like '%$param%' 
	 				  or a.neumonico like '%$param%' 
	 				  or a.telefonos like '%$param%' 
	 				  or a.direccion like '%$param%' 
	 				  or a.descripcion like '%$param%' 
	 				  or a.accesabilidad like '%$param%' 
	 				  or a.tag like '%$param%' 
	 				  or a.keyword like '%$param%' 
	 				  or b.nombre like '%$param%' 
	 				  or c.nombre like '%$param%' 
	 				  or d.nombre like '%$param%' ";
	 	$q="select a.*, b.nombre as nombreLocalidad, c.nombre as nombreLista, d.nombre as nombreTipo
	 		from sucursal as a inner join localidad as b on a.localidad_id=b.id
	 		left join lista as c on a.lista_id=c.id
	 		left join tipo as d on a.tipo_id=d.id ".$aux." order by a.lista_id, a.localidad_id ".$limite;
	 	return ($this->queryResultados($q));
	 }
	 public function visibleSucursal($arreglo) {
	 	extract($arreglo);
	 	if($id) {
	 		$visible=$visible==1?0:1;
	 		$this->querySimple("update sucursal set visible='$visible' where id='$id'");
	 		return 1;
	 	}
	 	else
	 		return 0;
	 }
	  public function addSucursal($arreglo, $archivo) {
	 	extract($archivo);
	 	if($imagen['size']>0){ //si hay foto
	 		$ext=explode(".",$imagen['name']);
	 		$ext=end($ext);
	 		if($ext=="jpg"||$ext=="gif"||$ext=="png") { //extensiones validas
	 			$nombreFoto=date("U").rand(0,100).".".$ext;
	 			move_uploaded_file($imagen['tmp_name'], "../images/sucursal/".$nombreFoto);
	 		}
	 		else
	 			return 0;
	 	}
	 	//agregando datos a BD
	 	extract($arreglo);
	 	$query="insert into sucursal (nombre, neumonico, localidad_id, tipo_id, visible, imagen, altaEspecialidad, latitud, longitud, telefonos, direccion, descripcion, accesabilidad, tag, keyword, horario) 
	 						values ('$nombre', '$neumonico', '$localidad_id','$tipo_id', '$visible', '$nombreFoto', '$altaEspecialidad','$latitud', '$longitud', '$telefonos', '$direccion', '$descripcion', '$accesabilidad', '$tag', '$keyword', '$horario')";
	 	return $this->queryInsert($query);
	 }
	  public function editSucursal($arreglo, $archivo) {
	 	extract($archivo);
	 	if($imagen['size']>0){ //si hay foto
	 		$ext=explode(".",$imagen['name']);
	 		$ext=end($ext);
	 		if($ext=="jpg"||$ext=="gif"||$ext=="png") { //extensiones validas
	 			$nombreFoto=date("U").rand(0,100).".".$ext;
	 			move_uploaded_file($imagen['tmp_name'], "../images/sucursal/".$nombreFoto);
	 			$aux=", imagen='$nombreFoto'";
	 		}
	 		else
	 			return 0;
	 	}
	 	//agregando datos a BD
	 	extract($arreglo);
	 	$query="update sucursal set nombre='$nombre', neumonico='$neumonico', localidad_id='$localidad_id', tipo_id='$tipo_id', 
	 			visible='$visible', altaEspecialidad='$altaEspecialidad', latitud='$latitud', longitud='$longitud', telefonos='$telefonos', 
	 			direccion='$direccion', descripcion='$descripcion', accesabilidad='$accesabilidad', horario='$horario', tag='$tag', keyword='$keyword' ".$aux." where id='$id'";
	 	$this->querySimple($query);
	 	return 1;
	 }
	 public function getSucursalId($id) {
	 	return $this->queryResultados("select * from sucursal where id='$id'");
	 }
	 public function getTipos() {
	 	return $this->queryResultados("select * from tipo");	
	 }
	 public function getListas() {
	 	return $this->queryResultados("select * from lista");	
	 }
	 /////////////////////////////////
	 ///////////Especialidades/////////
	 ///
	 public function getEspecialidades($limite="", $param="") {
	 	if($param)
	 		$aux=" where b.nombre like '%$param%' 
	 				  or c.nombre like '%$param%' 
	 				  or a.comentarios like '%$param%'";
	 	$q="select a.*, b.nombre, c.nombre as nombreSucursal from especialidades as a inner join especialidad as b 
	 		on a.especialidad_id=b.id left join sucursal as c on a.sucursal_id=c.id ".$aux." order by c.nombre, b.nombre ".$limite;
	 	return ($this->queryResultados($q));
	 }
	  public function getEspecialidadesDep($limite="", $param="") {
	 	if($param)
	 		$aux=" where nombre like '%$param%' 
	 				  ";
	 	$q="select * from especialidad  ".$aux." order by nombre ".$limite;
	 	return ($this->queryResultados($q));
	 }
	 public function getSucursalesEsp() {
	 	return $this->queryResultados("select id, nombre from sucursal order by nombre");
	 }
	 public function addEspecialidad($arreglo) {
	 	extract($arreglo);
	 	$especialidad_id=$this->queryInsert("insert into especialidad (nombre) values ('$nombre')");
	 	return $this->queryInsert("insert into especialidades (sucursal_id, especialidad_id, horario, comentarios) values ('$sucursal_id', '$especialidad_id', '$horario', '$comentarios')");
	 }
	 public function getEspecialidadId($id) {
	 	$q="select a.*, b.nombre, c.nombre as nombreSucursal from especialidades as a inner join especialidad as b 
	 		on a.especialidad_id=b.id left join sucursal as c on a.sucursal_id=c.id where a.id='$id'";
	 	return ($this->queryResultados($q));
	 }
	 public function editEspecialidad($arreglo) {
	 	extract($arreglo);
	 	$q="update especialidad set nombre='$nombre' where id='$especialidad_id'";
	 	$this->querySimple($q);
	 	$q="update especialidades set sucursal_id='$sucursal_id', horario='$horario', comentarios='$comentarios' where id = '$id'";
	 	$this->querySimple($q);
	 	return 1;

	 }
	  /////////////////////////////////
	 ///////////Departamento/////////
	 ///////////////////////////////
	  public function getDepartamentos($limite="", $param="") {
	 	if($param)
	 		$aux=" where a.nombre like '%$param%' 
	 				  or b.nombre like '%$param%'";
	 	$q="select a.*, b.nombre as nombreEspecialidad from departamento as a inner join especialidad as b 
	 		on a.especialidad_id=b.id  ".$aux." order by b.nombre, a.nombre ".$limite;
	 	return ($this->queryResultados($q));
	 }
	  public function addDepartamento($arreglo) {
	 	extract($arreglo);
	 	return $this->queryInsert("insert into departamento (nombre, especialidad_id) values ('$nombre', '$especialidad_id')");
	 }
	 public function getDepartamentoId($id) {
	 	return $this->queryResultados("select * from departamento where id='$id'");
	 }
	 public function editDepartamento($arreglo) {
	 	extract($arreglo);
	 	return $this->querySimple("update departamento set nombre='$nombre', especialidad_id='$especialidad_id' where id='$id'");
	 }
	 /////////////////////////////////
	 /////////Centro analitico///////
	 ///////////////////////////////
	 public function getCentros($limite="", $param="") {
	 	if($param)
	 		$aux=" where nombre like '%$param%'";
	 	$q="select * from centroanalitico ".$aux." order by nombre ".$limite;
	 	return ($this->queryResultados($q));
	 }
	 public function addCentro($arreglo) {
	 	extract($arreglo);
	 	return $this->queryInsert("insert into centroanalitico (nombre) values ('$nombre')");
	 }
	  public function getCentroId($id) {
	 	return $this->queryResultados("select * from centroanalitico where id='$id'");
	 }
	  public function editCentro($arreglo) {
	 	extract($arreglo);
	 	return $this->querySimple("update centroanalitico set nombre='$nombre' where id='$id'");
	 }

	 //////////////////////////////
	 ///////////SERVICIOS/////////
	 ////////////////////////////
	 public function getServicios($limite="", $param="") {
	 	if($param)
	 		$aux=" where servicio.nombre like '%$param%' 
	 				  or departamento.nombre like '%$param%'";
	 	$q=" SELECT servicio.codigo, 
			servicio.nombre, 
			servicio.departamento_id, 
			servicio.comentario, 
			servicio.nota, 
			servicio.url, 
			servicio.imagen, 
			servicio.tag, 
			servicio.keyword, 
			departamento.nombre AS nombreDep
		FROM servicio INNER JOIN departamento ON servicio.departamento_id = departamento.id ".$aux."
		ORDER BY nombreDep ASC, servicio.nombre ASC ".$limite;
		
	 	return ($this->queryResultados($q));
	 }

	 public function addServicio($arreglo, $archivo) {
	 	
	 	extract($archivo);
	 	if($imagen['size']>0){ //si hay foto
	 		$ext=explode(".",$imagen['name']);
	 		$ext=end($ext);
	 		if($ext=="jpg"||$ext=="gif"||$ext=="png") { //extensiones validas
	 			$nombreFoto=date("U").rand(0,100).".".$ext;
	 			move_uploaded_file($imagen['tmp_name'], "../images/servicio/".$nombreFoto);
	 		}
	 		else
	 			return 0;
	 	}
	 	//agregando datos a BD
	 	extract($arreglo);
	 	$query="insert into servicio (nombre, departamento_id, comentario, nota, url, imagen, tag, keyword, centroanalitico_id)
	 						values ('$nombre', '$departamento_id', '$comentario', '$nota', '$url', '$nombreFoto', '$tag', '$keyword', '$centroanalitico_id')";
	 	$codigo_servicio=$this->queryInsert($query);

	 	//agregando indicaciones
	 	if($indicacion) {
	 		$q="insert into indicaciones (servicio_codigo, indicacion) values ('$codigo_servicio', '$indicacion')";
	 		$this->queryInsert($q);
	 	}
	 	return 1;
	 	
	 }
	 public function getServicioId($id) {
	 	$q="select * from servicio where codigo='$id'";
	 	$resultado=$this->queryResultados($q);
	 	$resultado[0]['indicacion']=$this->getIndicacionesEstudio($id);

	 	return $resultado;
	 }
	 public function getIndicacionesEstudio($id) {
		$resultado=$this->queryResultados("select indicacion from indicaciones where servicio_codigo='$id'");
		return $resultado[0]['indicacion'];
	}
	 public function editServicio($arreglo, $archivo) {

	 	extract($archivo);
	 	if($imagen['size']>0){ //si hay foto
	 		$ext=explode(".",$imagen['name']);
	 		$ext=end($ext);
	 		if($ext=="jpg"||$ext=="gif"||$ext=="png") { //extensiones validas
	 			$nombreFoto=date("U").rand(0,100).".".$ext;
	 			move_uploaded_file($imagen['tmp_name'], "../images/servicio/".$nombreFoto);
	 			$aux=", imagen='$nombreFoto'";
	 		}
	 		else
	 			return 0;
	 	}
	 	//agregando datos a BD
	 	extract($arreglo);
	 	
	 	$query="update servicio set centroanalitico_id='$centroanalitico_id', departamento_id='$departamento_id', nombre='$nombre', comentario='$comentario', url='$url', tag='$tag', keyword='$keyword', nota='$nota' ".$aux." where codigo='$codigo'";
	 	$this->querySimple($query);

	 	//agregando indicaciones
	 	if($indicacionAux) {
	 		$q="update  indicaciones set indicacion='$indicacion' where servicio_codigo='$codigo'";
	 		$this->queryInsert($q);
	 	}
	 	else {
	 		if($indicacion) {
	 			$q="insert into indicaciones (servicio_codigo, indicacion) values ('$codigo', '$indicacion')";
	 			$this->queryInsert($q);
	 		}
	 	}

	 	return 1;

	 }
	 public function eliminaServicio($id) {
	 	$this->querySimple("delete from indicaciones where servicio_codigo='$id'");
	 	$this->querySimple("delete from servicio where codigo='$id'");
	 }

	 public function getEstudioSucursales($id, $region="") {
	 	if($region)
		 		$aux=" and region.id='$region' ";
	 	if($this->compruebaEstudioSucursal($id)) {
	 		$q="SELECT	estudioSucursal.sucursal_id, 
						estudioSucursal.localidad_id, 
						estudioSucursal.region_id, 
						sucursal.nombre, 
						estudioSucursal.precio, 
						sucursal.latitud, 
						sucursal.longitud, 
						localidad.nombre AS nombreLoc, 
						region.nombre AS nombreReg, 
						estudioSucursal.estudio_id
					FROM estudioSucursal INNER JOIN sucursal ON estudioSucursal.sucursal_id = sucursal.id
						 INNER JOIN region ON estudioSucursal.region_id = region.id
						 INNER JOIN localidad ON estudioSucursal.localidad_id = localidad.id
					WHERE estudioSucursal.estudio_id='$id'
					".$aux."
					ORDER BY estudioSucursal.region_id ASC, nombreLoc ASC, sucursal.nombre ASC
		 	";
		 	return ($this->queryResultados($q));
	 	}
	 	else { 
		 	
		 	$q="SELECT 	sucursal.id AS sucursal_id, 
						sucursal.nombre, 
						sucursal.longitud, 
						sucursal.latitud, 
						localidad.region_id, 
						sucursal.localidad_id, 
						region.nombre AS nombreReg, 
						localidad.nombre AS nombreLoc, 
						precios.precio
					FROM localidad INNER JOIN region ON localidad.region_id = region.id
						 INNER JOIN sucursal ON sucursal.localidad_id = localidad.id
						 INNER JOIN especialidades ON especialidades.sucursal_id = sucursal.id
						 INNER JOIN departamento ON departamento.especialidad_id = especialidades.especialidad_id
						 INNER JOIN servicio ON servicio.departamento_id = departamento.id
						 INNER JOIN precios ON precios.servicio_codigo = servicio.codigo
					WHERE servicio.codigo='$id'
					GROUP BY sucursal.id
					ORDER BY localidad.region_id ASC, nombreLoc ASC, sucursal.nombre ASC

		 			";
		 	$resultado= $this->queryResultados($q);
		 	foreach($resultado as $value) {
		 		$q="insert into estudioSucursal (estudio_id, precio, sucursal_id, localidad_id, region_id)
		 		values ('$id', '".$value['precio']."', '".$value['sucursal_id']."', '".$value['localidad_id']."', '".$value['region_id']."')";
		 		$this->queryInsert($q);
		 	}


		 	$resultado=$this->getEstudioSucursales($id, $region);
		 	return $resultado;
		 }
	 	
	 }
	 public function compruebaEstudioSucursal($id) {
	 	$q="SELECT	estudioSucursal.sucursal_id, 
					estudioSucursal.localidad_id, 
					estudioSucursal.region_id, 
					sucursal.nombre, 
					estudioSucursal.precio, 
					sucursal.latitud, 
					sucursal.longitud, 
					localidad.nombre AS nombreLoc, 
					region.nombre AS nombreReg, 
					estudioSucursal.estudio_id
				FROM estudioSucursal INNER JOIN sucursal ON estudioSucursal.sucursal_id = sucursal.id
					 INNER JOIN region ON estudioSucursal.region_id = region.id
					 INNER JOIN localidad ON estudioSucursal.localidad_id = localidad.id
				WHERE estudioSucursal.estudio_id='$id'
				ORDER BY estudioSucursal.region_id ASC, nombreLoc ASC, sucursal.nombre ASC
	 	";
	 	$resultado=$this->queryResultados($q);
	 	if($resultado)
	 		return true;
	 	else
	 		return false;
	 }

	 public function eliminaEstudioSucursal($idEstudio, $idSucursal) {
	 	$this->querySimple("delete from estudioSucursal where estudio_id='$idEstudio' and sucursal_id='$idSucursal'");
	 }
	
	  public function agregarEstudioSucursal($arreglo) {
	 	extract($arreglo);
	 	//3 opciones
	 	//1.- que exista un id Sucursal
	 	if($sucursal) {
	 		//evitando duplicados
	 		if($this->duplicadoEstudio($id, $sucursal)) {
	 			$q="insert into estudioSucursal (estudio_id, precio, sucursal_id, localidad_id, region_id)
	 				values ('$id', '$precio', '$sucursal', '$localidad', '$region')";
	 			return $this->queryInsert($q);
	 		}
	 	}
	 	//2.- no hay sucursal, pero si hay localidad
	 	else if($localidad){
	 		
	 		$sucursales=$this->getSucursalDependencias($localidad);
	 		
	 		foreach($sucursales as $value){
	 			//evitando duplicados
		 		if($this->duplicadoEstudio($id, $value['id'])) {
		 			$q="insert into estudioSucursal (estudio_id, precio, sucursal_id, localidad_id, region_id)
		 				values ('$id', '$precio', '".$value['id']."', '$localidad', '$region')";
		 			$this->queryInsert($q);
		 		}
	 		}
	 	return 1;
	 	}
	 	//3.- no hay sucursal ni localidad, solo region
	 	else if($region) {
	 		//obteniendo localidades
	 		$localidades=$this->getLocalidadDependencias($region);
	 		foreach($localidades as $loc){
	 			$localidad=$loc['id'];
	 			$sucursales=$this->getSucursalDependencias($localidad);
	 		
		 		foreach($sucursales as $value){
		 			//evitando duplicados
			 		if($this->duplicadoEstudio($id, $value['id'])) {
			 			$q="insert into estudioSucursal (estudio_id, precio, sucursal_id, localidad_id, region_id)
			 				values ('$id', '$precio', '".$value['id']."', '$localidad', '$region')";
			 			$this->queryInsert($q);
			 		}
		 		}

	 		}
	 		return 1;
	 	}
	 	else
	 		return 0;
	 }
	 public function duplicadoEstudio($id, $sucursal) {
	 	$duplicado=$this->queryResultados("select COUNT(*) as cuantos from estudioSucursal where estudio_id='$id' and sucursal_id='$sucursal'");
	 		if($duplicado[0]['cuantos'])
	 			return 0;
	 		else
	 			return 1;
	 }
	 public function getSucursalEstudio($idEstudio, $idSucursal) {

	 	$q="SELECT	estudioSucursal.sucursal_id, 
						estudioSucursal.localidad_id, 
						estudioSucursal.region_id, 
						sucursal.nombre, 
						estudioSucursal.precio, 
						sucursal.latitud, 
						sucursal.longitud, 
						localidad.nombre AS nombreLoc, 
						region.nombre AS nombreReg, 
						estudioSucursal.estudio_id
					FROM estudioSucursal INNER JOIN sucursal ON estudioSucursal.sucursal_id = sucursal.id
						 INNER JOIN region ON estudioSucursal.region_id = region.id
						 INNER JOIN localidad ON estudioSucursal.localidad_id = localidad.id
					WHERE estudioSucursal.estudio_id='$idEstudio' and estudioSucursal.sucursal_id='$idSucursal'
		 	";
		 return ($this->queryResultados($q));
	 }
	 public function editarPrecioEstudio($arreglo) {
	 	extract($arreglo);
	 	$q="update estudioSucursal set precio='$precio' where estudio_id='$idEstudio' and sucursal_id='$idSucursal'";
	 	$this->querySimple($q);
	 	return 1;
	 }

	 /////////////////
	 ///Promociones///
	 /////////////////
	 
	 public function getPromocion($limite="", $param="") {
	 	if($param)
	 		$aux=" where codigo like '%$param%'
	 				  or nombre like '%$param%'
	 				  or patologia like '%$param%'
	 				  or tag like '%$param%'
	 				  or keyword like '%$param%'
	 				  ";
	 	
	 	$q="select * from promocion ".$aux." order by orden ASC ".$limite;

	 	return ($this->queryResultados($q));
	 }
	  public function visiblePromocion($arreglo) {
	 	extract($arreglo);
	 	if($id) {
	 		$visible=$visible==1?0:1;
	 		$this->querySimple("update promocion set visible='$visible' where codigo='$id'");
	 		return 1;
	 	}
	 	else
	 		return 0;
	 }
	 public function addPromocion($arreglo, $archivo) {
	 	$nombreFoto="";
	 	$nombreBanner="";
	 	extract($archivo);
	 	if($imagen['size']>0){ //si hay foto
	 		$ext=explode(".",$imagen['name']);
	 		$ext=end($ext);
	 		if($ext=="jpg"||$ext=="gif"||$ext=="png") { //extensiones validas
	 			$nombreFoto=date("U").rand(0,100).".".$ext;
	 			move_uploaded_file($imagen['tmp_name'], "../images/promocion/".$nombreFoto);
	 			
	 		}
	 		else
	 			return 0;
	 	}
	 	if($banner['size']>0){ //si hay foto
	 		$ext=explode(".",$banner['name']);
	 		$ext=end($ext);
	 		if($ext=="jpg"||$ext=="gif"||$ext=="png") { //extensiones validas
	 			$nombreBanner=date("U").rand(0,100).".".$ext;
	 			move_uploaded_file($banner['tmp_name'], "../images/promocion/banners/".$nombreFoto);
	 			
	 		}
	 		else
	 			return 0;
	 	}
	 	//agregando datos a BD
	 	$this->reordenaP("promocion");
	 	extract($arreglo);
	 	$query="insert into promocion (nombre, servicio_codigo, visible, nivel, inicio, finaliza, incluye, recomendado, patologia, nota, aviso, tag, keyword, imagen, banner)
	 						values ('$nombre', '$servicio_codigo', '$visible', '$nivel', '$inicio', '$finaliza', '$incluye', '$recomendado', '$patologia', '$nota', '$aviso', '$tag', '$keyword', '$nombreFoto', '$nombreBanner')";
	 	$promocion_codigo=$this->queryInsert($query);
	 //	$query="insert into promociones (promocion_codigo, codigo_general, precio) values ('$promocion_codigo', '$codigo_general', '$precio')";
	 //	return $this->queryInsert($query);
	 }
	 public function getPromocionId($id) {
	 	$q="select * from promocion where codigo='$id' ";

	 	return ($this->queryResultados($q));
	 }
	 public function editPromocion($arreglo, $archivo) {
	 	extract($archivo);
	 	$aux="";
	 	if($imagen['size']>0){ //si hay foto
	 		$ext=explode(".",$imagen['name']);
	 		$ext=end($ext);
	 		if($ext=="jpg"||$ext=="gif"||$ext=="png") { //extensiones validas
	 			$nombreFoto=date("U").rand(0,100).".".$ext;
	 			move_uploaded_file($imagen['tmp_name'], "../images/promocion/".$nombreFoto);
	 			$aux.=", imagen='$nombreFoto'";
	 		}
	 		else
	 			return 0;
	 	}

	 	extract($archivo);
	 	if($banner['size']>0){ //si hay banner
	 		$ext=explode(".",$banner['name']);
	 		$ext=end($ext);
	 		if($ext=="jpg"||$ext=="gif"||$ext=="png") { //extensiones validas
	 			$nombreBanner=date("U").rand(0,100).".".$ext;
	 			move_uploaded_file($banner['tmp_name'], "../images/promocion/banners/".$nombreBanner);
	 			$aux.=", banner='$nombreBanner'";
	 		}
	 		else
	 			return 0;
	 	}
	 	//agregando datos a BD
	 	
	 	extract($arreglo);
	 	$query="update promocion set 
	 	nombre='$nombre', 
	 	servicio_codigo='$servicio_codigo', 
	 	visible='$visible', 
	 	nivel='$nivel', 
	 	inicio='$inicio', 
	 	finaliza='$finaliza',
	 	recomendado='$recomendado',
	 	incluye='$incluye',
	 	patologia='$patologia',
	 	nota='$nota',
	 	aviso='$aviso',
	 	tag='$tag', 
	 	keyword='$keyword' ".$aux." where codigo='$promocion_codigo'";
	 	$this->querySimple($query);

	 	return 1;
	 }

	 public function getPromocionSucursal($id) {
	 	$q="SELECT 	promociones.id as promoId,
	 				promociones.promocion_codigo, 
					promociones.precio, 
					promociones.sucursal_id, 
					sucursal.nombre, 
					localidad.nombre AS nombreLoc, 
					region.nombre AS nombreReg
				FROM promociones INNER JOIN sucursal ON promociones.sucursal_id = sucursal.id
					 INNER JOIN localidad ON sucursal.localidad_id = localidad.id
					 INNER JOIN region ON localidad.region_id = region.id
				WHERE promociones.promocion_codigo='$id'
				ORDER BY nombreReg ASC, nombreLoc ASC, sucursal.nombre ASC
	 	";
	 	return $this->queryResultados($q);
	 }
	 public function duplicadoPromo($id, $sucursal) {
	 	$duplicado=$this->queryResultados("select COUNT(*) as cuantos from promociones where promocion_codigo='$id' and sucursal_id='$sucursal'");
	 		if($duplicado[0]['cuantos'])
	 			return 0;
	 		else
	 			return 1;
	 }
	 public function agregarPromocionSucursal($arreglo) {
	 	extract($arreglo);
	 	//actualizando precio
	 	$this->querySimple("update precios set precio='$precioNormal' where servicio_codigo='$servicio_codigo'");
	 	//3 opciones
	 	//1.- que exista un id Sucursal
	 	if($sucursal) {
	 		//evitando duplicados
	 		if($this->duplicadoPromo($id, $sucursal)) {
	 			$q="insert into promociones (promocion_codigo, precio, sucursal_id, localidad_id, region_id)
	 				values ('$id', '$precio', '$sucursal', '$localidad', '$region')";
	 			return $this->queryInsert($q);
	 		}
	 	}
	 	//2.- no hay sucursal, pero si hay localidad
	 	else if($localidad){

	 		$q="select * from localidad where id='$localidad'";
			$resultado=$this->queryResultados($q);

			$q="select id from localidad where nombre='".$resultado[0]['nombre']."'";
			$resultadoLocs=$this->queryResultados($q);

	 		foreach($resultadoLocs as $localidadId) {
		 		$sucursales=$this->getSucursalDependencias($localidadId['id']);
		 		
		 		if($tipo>0)
		 		foreach($sucursales as $value){
		 			//evitando duplicados
		 			if($value['tipo_id']==$tipo)
			 		if($this->duplicadoPromo($id, $value['id'])) {
			 			$q="insert into promociones (promocion_codigo, precio, sucursal_id, localidad_id, region_id)
			 				values ('$id', '$precio', '".$value['id']."', '$localidad', '$region')";
			 			$this->queryInsert($q);
			 		}
		 		}
		 		else
		 		foreach($sucursales as $value){
		 			//evitando duplicados
			 		if($this->duplicadoPromo($id, $value['id'])) {
			 			$q="insert into promociones (promocion_codigo, precio, sucursal_id, localidad_id, region_id)
			 				values ('$id', '$precio', '".$value['id']."', '$localidad', '$region')";
			 			$this->queryInsert($q);
			 		}
		 		}	
		 		//

		 	}
	 	return 1;
	 	}
	 	//3.- no hay sucursal ni localidad, solo region
	 	else if($region) {
	 		//obteniendo localidades
	 		$localidades=$this->getLocalidadDependencias($region);
	 		foreach($localidades as $loc){
	 			$localidad=$loc['id'];
	 			$sucursales=$this->getSucursalDependencias($localidad);
	 				 		
	 			if($tipo>0)
		 		foreach($sucursales as $value){
		 			//evitando duplicados
		 			if($value['tipo_id']==$tipo)
			 		if($this->duplicadoPromo($id, $value['id'])) {
			 			$q="insert into promociones (promocion_codigo, precio, sucursal_id, localidad_id, region_id)
			 				values ('$id', '$precio', '".$value['id']."', '$localidad', '$region')";
			 			$this->queryInsert($q);
			 		}
		 		}
		 		else
		 		foreach($sucursales as $value){
		 			//evitando duplicados
			 		if($this->duplicadoPromo($id, $value['id'])) {
			 			$q="insert into promociones (promocion_codigo, precio, sucursal_id, localidad_id, region_id)
			 				values ('$id', '$precio', '".$value['id']."', '$localidad', '$region')";
			 			$this->queryInsert($q);
			 		}
		 		}

	 		}
	 		return 1;
	 	}
	 	else
	 		return 0;
	 }
	  public function eliminaPromoSucursal($id) {
	 	$this->querySimple("delete from promociones where id='$id'");
	 }
	 public function getLocalidadPromo($id, $region) {
	 	$q="SELECT 	promociones.sucursal_id, 
					promociones.localidad_id, 
					promociones.promocion_codigo, 
					localidad.nombre
				FROM promociones INNER JOIN localidad ON promociones.localidad_id = localidad.id
				WHERE promociones.promocion_codigo='$id'
						and promociones.region_id='$region'
				GROUP BY  localidad.nombre
				ORDER BY localidad.nombre ASC
	 	";
	 	return $this->queryResultados($q);
	 }
	 public function getSucursalPromo($id, $localidad) {

		$q="select * from localidad where id='$localidad'";
		$resultado=$this->queryResultados($q);

		$q="select id from localidad where nombre='".$resultado[0]['nombre']."'";
		$resultado=$this->queryResultados($q);

		

		$resultados=array();
		$raux=array();
		$i=0;
		foreach($resultado as $value) {
	 	$q="SELECT 	sucursal.nombre, 
					sucursal.id
				FROM promociones INNER JOIN sucursal ON promociones.sucursal_id = sucursal.id AND promociones.localidad_id = sucursal.localidad_id
				WHERE promociones.promocion_codigo='$id'
				and promociones.localidad_id='".$value['id']."'
				ORDER BY sucursal.nombre ASC
				";
		
		$raux=$this->queryResultados($q);	
		if($raux) {
			$resultados[$i]['nombre']=$raux[0]['nombre'];
			$resultados[$i]['id']=$raux[0]['id'];
			$i++;
		}

		}
		//print_r($resultados);
	 	return $resultados;
	 }
	 //////////////////////////////////////////
	 ///Funciones para cargar drop dinamicos///
	 //////////////////////////////////////////
	 public function getLocalidadDependencias($region_id) {
	 	$q="select * from localidad where region_id='$region_id'";
	 	return $this->queryResultados($q);
	 }

	 public function getLocalidadDependenciasSucursal($region_id) {
	 	$q="select * from localidad where region_id='$region_id' GROUP BY nombre";
	 	return $this->queryResultados($q);
	 }

	 public function getSucursalDependencias($localidad_id) {
	 	$q="select * from sucursal where localidad_id='$localidad_id'";
	 	return $this->queryResultados($q);
	 }

	 //funcion para traer todas las sucursales de una misma region
	 public function getSucursalDependenciasSucursal($localidad_id, $tipo=0) {
	 	if($tipo)
	 		$aux=" and sucursal.tipo_id='$tipo'";
	 	//primero obtener el nombre de la delegacion o municipio
	 	$q="select nombre from localidad where id='$localidad_id'";
	 	$localidad=$this->queryResultados($q);
	 	//buscando todas las sucursales
	 	$q="SELECT 	sucursal.nombre, 
					localidad.id AS idLocalidad, 
					sucursal.id, 
					sucursal.neumonico, 
					sucursal.localidad_id, 
					sucursal.tipo_id, 
					sucursal.visible, 
					sucursal.imagen, 
					sucursal.lista_id, 
					sucursal.latitud, 
					sucursal.longitud, 
					sucursal.telefonos, 
					sucursal.direccion, 
					sucursal.descripcion, 
					sucursal.accesabilidad, 
					sucursal.tag, 
					sucursal.keyword
				FROM localidad INNER JOIN sucursal ON localidad.id = sucursal.localidad_id
				WHERE localidad.nombre='".$localidad[0]['nombre']."'".$aux."
				ORDER BY  sucursal.nombre ASC
	 	";
	 	return $this->queryResultados($q);
	 }
	 

	 public function getEspecialidadDependencias($sucursal_id) {
	 	$q="select b.* from especialidades as a inner join especialidad as b on a.especialidad_id=b.id where a.sucursal_id='$sucursal_id'";
	 	return $this->queryResultados($q);
	 }
	  public function getDepartamentoDependencias($especialidad_id=0) {
	  	$aux="";
	  	if($especialidad_id)
	  		$aux=" where especialidad_id='$especialidad_id'";
	 	$q="select * from departamento".$aux." order by nombre";
	 	return $this->queryResultados($q);
	 }
	 public function getPromocionDinamicos() {
	 	$q="select * from promocion";
	 	return $this->queryResultados($q);
	 }
	 public function getServiciosDinamicos() {
	 	$q="select * from servicio order by nombre";
	 	return $this->queryResultados($q);
	 }

	public function getEstudiosDinamicos() {
		$q="select * from servicio where departamento_id>'0' order by nombre ";
	 	return $this->queryResultados($q);
	}
	 ///////////////
	 ///SIMILARES///
	 //////////////
	 public function getSimilares($id) {
	 	$q="select a.*, b.nombre from similar as a inner join promocion as b on a.promocion_similar=b.codigo
	 		where a.promocion_codigo='$id'";
	 	return $this->queryResultados($q);
	 }
	 public function eliminaSimilar($id) {
	 	$this->querySimple("delete from similar where id='$id'");
	 }
	 public function agregaSimilar($arreglo) {
	 	extract($arreglo);
	 	//evitar duplicados
	 	$q="select * from similar where promocion_codigo='$promocion_codigo' and promocion_similar='$promocion_similar'";
	 	if($this->queryResultados($q))
	 		return 0;
	 	//no existe
	 	$q="insert into similar (promocion_codigo, promocion_similar) values ('$promocion_codigo', '$promocion_similar')";
	 	return $this->queryInsert($q);
	 }
	 //////////////
	 ///PERFILES///
	 /////////////
	 public function getPerfiles($limite="", $param="") {
	 	if($param)
	 		$aux=" and (departamento.nombre like '%$param%'
	 					or servicio.nombre like '%$param%')
	 			";
	 	$q="SELECT servicio.codigo, 
	 			servicio.nombre, 
				servicio.comentario, 
				servicio.nota, 
				servicio.url, 
				servicio.imagen, 
				servicio.tag, 
				servicio.keyword, 
				departamento.nombre AS nombreDep
			FROM servicio INNER JOIN departamento ON servicio.centroanalitico_id = departamento.id
			WHERE servicio.centroanalitico_id >'0' ".$aux.
			" ORDER BY departamento.nombre, servicio.nombre ASC ".$limite;
	 	return ($this->queryResultados($q));
	 }

	/***** Funcion descontinuada
	 public function getPerfilesId($limite="", $param="") {
	 	if($param)
	 		$aux=" where a.perfil_codigo like '%$param%' 
	 				or a.estudio_codigo like '%$param%'
	 				or b.nombre like '%$param%'
	 				or c.nombre like '%$param%'";
	 	$q="select a.*, b.nombre as nombrePerfil, c.nombre as nombreEstudio from perfiles as a 
	 		inner join servicio as b on a.perfil_codigo=b.codigo
			inner join servicio as c on a.estudio_codigo=c.codigo
	 		".$aux." order by a.id ".$limite;
	 	return ($this->queryResultados($q));
	 }
	 funcion descuntinuada, se actualiza por getPerfilEstudios
	********/
	 public function getPerfilEstudios($id) {
	 	$q="SELECT 	servicio.nombre, 
					servicio.codigo,
					perfiles.id
			FROM perfiles INNER JOIN servicio ON perfiles.estudio_codigo = servicio.codigo
			WHERE perfiles.perfil_codigo='$id'";
		return ($this->queryResultados($q));

	 }

	 public function agregaPerfil($arreglo) {
	 	extract($arreglo);
	 	//evitar duplicados
	 	$q="select * from perfiles where perfil_codigo='$perfil_codigo' and estudio_codigo='$estudio_codigo'";
	 	if($this->queryResultados($q))
	 		return 0;
	 	//no existe
	 	$q="insert into perfiles (perfil_codigo, estudio_codigo) values ('$perfil_codigo', '$estudio_codigo')";
	 	return $this->queryInsert($q);
	 }
	  public function eliminaPerfil($id) {
	 	$this->querySimple("delete from perfiles where id='$id'");
	 }

	  //////////////
	 ///BANNERS////
	 /////////////
	 public function getBanners(){
	 	return $this->queryResultados("select * from banners order by orden ASC");
	 }
	  public function eliminaBanner($id) {
	 	$this->querySimple("delete from banners where id='$id'");
	 }
	  public function addBanner($arreglo, $archivo) {
	 	extract($archivo);
	 	if($imagen['size']>0){ //si hay foto
	 		$ext=explode(".",$imagen['name']);
	 		$ext=end($ext);
	 		if($ext=="jpg"||$ext=="gif"||$ext=="png") { //extensiones validas
	 			$nombreFoto=date("U").rand(0,100).".".$ext;
	 			move_uploaded_file($imagen['tmp_name'], "../images/banners/".$nombreFoto);
	 		}
	 		else
	 			return 0;
	 	}
	 	//agregando datos a BD
	 	$this->reordena("banners");
	 	extract($arreglo);

	 	

	 	$query="insert into banners (img, url, visible) 
	 						values ('$nombreFoto', '$url','$visible')";
	 	$idBanner=$this->queryInsert($query);
	 	
	 	foreach($region as $eRegion) {
				$q="insert into bannerRegion (banner_id, region_id) values ('$idBanner', '$eRegion')";
				$this->querySimple($q);
				}
		return 1;

	 }
	public function visibleBanner($arreglo) {
	 	extract($arreglo);
	 	if($id) {
	 		$visible=$visible==1?0:1;
	 		$this->querySimple("update banners set visible='$visible' where id='$id'");
	 		return 1;
	 	}
	 	else
	 		return 0;
	 }
	 public function getBannerId($id) {
	 	return $this->queryResultados("select * from banners where id='$id'");
	 }
	  public function editBanner($arreglo, $archivo) {
	 	extract($archivo);
	 	if($imagen['size']>0){ //si hay foto
	 		$ext=explode(".",$imagen['name']);
	 		$ext=end($ext);
	 		if($ext=="jpg"||$ext=="gif"||$ext=="png") { //extensiones validas
	 			$nombreFoto=date("U").rand(0,100).".".$ext;
	 			move_uploaded_file($imagen['tmp_name'], "../images/banners/".$nombreFoto);
	 			$aux=", img='$nombreFoto'";
	 		}
	 		else
	 			return 0;
	 	}
	 	//agregando datos a BD
	 	extract($arreglo);
	 	$this->querySimple("delete from bannerRegion where banner_id='$id'");
	 	foreach($region as $eRegion) {
				$q="insert into bannerRegion (banner_id, region_id) values ('$id', '$eRegion')";
				$this->querySimple($q);
				}

	 	$query="update banners set url='$url', visible='$visible' ".$aux." where id='$id'";
	 	$this->querySimple($query);
	 	return 1;
	 }
	 public function esRegion($banner, $region) {
		return $this->queryResultados("select * from bannerRegion where banner_id='$banner' and region_id='$region'");
	}
	   ///////////////////
	  ///TIPS DE SALUD////
	 ////////////////////
	 public function getTips($limite="", $param="") {
	 	if($param)
	 		$aux="where titulo like '%$param%'
	 					or resumen like '%$param%'
	 					or texto like '%$param%'";
	 	$q=" select * from tips ".$aux." ORDER BY fecha DESC, titulo ASC ".$limite;
	 	return ($this->queryResultados($q));
	 }
	  public function addTip($arreglo, $archivo) {
	 	extract($archivo);
	 	if($imagen['size']>0){ //si hay foto
	 		$ext=explode(".",$imagen['name']);
	 		$ext=end($ext);
	 		if($ext=="jpg"||$ext=="gif"||$ext=="png") { //extensiones validas
	 			$nombreFoto=date("U").rand(0,100).".".$ext;
	 			move_uploaded_file($imagen['tmp_name'], "../images/tips/".$nombreFoto);
	 		}
	 		else
	 			return 0;
	 	}
	 	//agregando datos a BD
	 	extract($arreglo);
	 	$query="insert into tips (titulo, resumen, texto, img, fecha) 
	 						values ('$titulo', '$resumen', '$texto', '$nombreFoto', '$fecha')";
	 	$idBanner=$this->queryInsert($query);

	 	foreach($region as $eRegion) {
				$q="insert into tipRegion (tip_id, region_id) values ('$idBanner', '$eRegion')";
				$this->querySimple($q);
				}
		return 1;
	 }
	 public function getTipId($id) {
	 	$q="select * from tips where id='$id'";
	 	return ($this->queryResultados($q));
	 }
	 public function editTip($arreglo, $archivo) {
	 	extract($archivo);
	 	if($imagen['size']>0){ //si hay foto
	 		$ext=explode(".",$imagen['name']);
	 		$ext=end($ext);
	 		if($ext=="jpg"||$ext=="gif"||$ext=="png") { //extensiones validas
	 			$nombreFoto=date("U").rand(0,100).".".$ext;
	 			move_uploaded_file($imagen['tmp_name'], "../images/tips/".$nombreFoto);
	 			$aux=", img='$nombreFoto'";
	 		}
	 		else
	 			return 0;
	 	}
	 	//agregando datos a BD
	 	extract($arreglo);

	 	$this->querySimple("delete from tipRegion where tip_id='$id'");
	 	foreach($region as $eRegion) {
				$q="insert into tipRegion (tip_id, region_id) values ('$id', '$eRegion')";
				$this->querySimple($q);
				}

	 	$query="update tips set titulo='$titulo', resumen='$resumen', texto='$texto', fecha='$fecha' ".$aux." where id='$id'";
	 	$this->querySimple($query);
	 	return 1;
	 }
	 public function eliminaTip($id) {
	 	$this->querySimple("delete from tips where id='$id'");
	 }
	 public function esRegionTip($tip, $region) {
		return $this->queryResultados("select * from tipRegion where tip_id='$tip' and region_id='$region'");
	}
	  //////////////
	 ///NOTICIAS////
	 /////////////
	 public function getNoticias(){
	 	return $this->queryResultados("select * from noticias order by fecha DESC");
	 }
	  public function eliminaNoticia($id) {
	 	$this->querySimple("delete from noticias where id='$id'");
	 }
	  public function addNoticia($arreglo, $archivo) {
	 	extract($archivo);
	 	if($imagen['size']>0){ //si hay foto
	 		$ext=explode(".",$imagen['name']);
	 		$ext=end($ext);
	 		if($ext=="jpg"||$ext=="gif"||$ext=="png") { //extensiones validas
	 			$nombreFoto=date("U").rand(0,100).".".$ext;
	 			move_uploaded_file($imagen['tmp_name'], "../images/noticias/".$nombreFoto);
	 		}
	 		else
	 			return 0;
	 	}
	 	//agregando datos a BD
	 	extract($arreglo);
	 	$query="insert into noticias (titulo, img, fecha) 
	 						values ('$titulo', '$nombreFoto', '$fecha')";
	 	return $this->queryInsert($query);
	 }
	 ////////////
	 ///CONFIG///
	 ///////////
	 public function getConfig() {
	 	return $this->queryResultados("select * from config where id='1'");	
	 }
	 public function actualizaPassword($id, $password) {
	 	$password=md5($password);
	 	$q="update usuariosAdmin set password='$password' where id='$id'";
	 	$this->querySimple($q);
	 }
	 public function actualizaConfig($arreglo) {
	 	extract($arreglo);
	 	$q="update config set estudios='$estudios' where id='1'";
	 	$this->querySimple($q);
	 }
	 ///////////////
	 ///ORDENANDO///
	 //////////////
	 
	 public function ordena($arreglo, $tabla) {
	 	extract($arreglo);
	 	//obteniendo el orden
	 	$query="select * from ".$tabla." where id ='$id'";
	 	$resultado=$this->queryResultados($query);
	 	$ordenA=$resultado[0]['orden'];
	 	//buscando el orden y la id del producto anterior/posterior
	 	if($order==0)
			$query="select min(orden) as ordenB from ".$tabla." where  orden>'$ordenA'";
		else 
			$query="select max(orden) as ordenB from ".$tabla." where  orden<'$ordenA'";
		$resultado=$this->queryResultados($query);
		$ordenB=($resultado[0]['ordenB']);
		//buscando segunda ID
		$query="select * from ".$tabla." where orden='$ordenB'";
		$resultado=$this->queryResultados($query);
		$idB=$resultado[0]['id'];

		//cambiando orden
		$query="update ".$tabla." set orden='$ordenB' where id='$id'";
		$this->querySimple($query);
		$query="update ".$tabla." set orden='$ordenA' where id='$idB'";
		$this->querySimple($query);

		return 1;

	 }

	 public function ordenaP($arreglo, $tabla) {
	 	extract($arreglo);
	 	//obteniendo el orden
	 	$query="select * from ".$tabla." where codigo ='$id'";
	 	$resultado=$this->queryResultados($query);
	 	$ordenA=$resultado[0]['orden'];
	 	//buscando el orden y la id del producto anterior/posterior
	 	if($order==0)
			$query="select min(orden) as ordenB from ".$tabla." where  orden>'$ordenA'";
		else 
			$query="select max(orden) as ordenB from ".$tabla." where  orden<'$ordenA'";
		$resultado=$this->queryResultados($query);
		$ordenB=($resultado[0]['ordenB']);
		//buscando segunda ID
		$query="select * from ".$tabla." where orden='$ordenB'";
		$resultado=$this->queryResultados($query);
		$idB=$resultado[0]['codigo'];

		//cambiando orden
		$query="update ".$tabla." set orden='$ordenB' where codigo='$id'";
		$this->querySimple($query);
		$query="update ".$tabla." set orden='$ordenA' where codigo='$idB'";
		$this->querySimple($query);

		return 1;

	 }

	 public function reordena($tabla) {
	 	//reordenando
		$query="select id from ".$tabla." order by orden";
		$resultado=$this->queryResultados($query);
		$ord=1;
		foreach($resultado as $value) {
			$this->querySimple("update ".$tabla." set orden='$ord' where id='".$value['id']."'");
			$ord++;
		}//reordenando
	 }
	 public function reordenaP($tabla) {
	 	//reordenando
		$query="select codigo from ".$tabla." order by orden";
		$resultado=$this->queryResultados($query);
		$ord=1;
		foreach($resultado as $value) {
			$this->querySimple("update ".$tabla." set orden='$ord' where codigo='".$value['codigo']."'");
			$ord++;
		}//reordenando
	 }
	 public function getPrecioServicio($id) {
		$resultado=$this->queryResultados("select precio from precios where servicio_codigo='$id'");
		return $resultado[0]['precio'];
	}

	///////////////////
	////NEWSLETTER////
	/////////////////

	 public function getNewsLetter($limite="", $param="") {
	 	if($param)
	 		$aux=" where suscripcion.correo like '%$param%' 
	 				  or especialidad.nombre like '%$param%'
	 				  or region.nombre like '%$param%'";
	 	$q="SELECT suscripcion.correo, 
				suscripcion.id, 
				especialidad.nombre AS nombreEsp, 
				region.nombre AS nombreRegion
			FROM suscripcion INNER JOIN especialidad ON suscripcion.especialidad = especialidad.id
				 INNER JOIN region ON suscripcion.region = region.id ".$aux."
			ORDER BY nombreRegion ASC, nombreEsp ASC, suscripcion.correo ASC
				 	 ".$limite;
		
	 	return ($this->queryResultados($q));
	 }
	  public function eliminaNewsLetter($id) {
	 	$this->querySimple("delete from suscripcion where id='$id'");
	 	
	 }
}
?>