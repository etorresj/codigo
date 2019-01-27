<?php
class front extends admin{
	/////////////////
	///PROMOCIONES///
	////////////////
	public function getPromociones($region, $tag=0) {
		if($tag) {
			$q="select * from tags where id='$tag'";
			$r=$this->queryResultados($q);
			$aux=" and promocion.tag like '%".$r[0]['tag']."%'";
		}
		$q="SELECT 	promociones.precio, 
					promocion.nombre, 
					promocion.nivel, 
					promocion.inicio, 
					promocion.finaliza, 
					promocion.incluye, 
					promocion.recomendado, 
					promocion.patologia, 
					promocion.nota, 
					promocion.imagen, 
					promocion.banner, 
					promocion.aviso, 
					promocion.tag, 
					promocion.keyword, 
					promociones.region_id, 
					promociones.sucursal_id,
					promociones.region_id,
					promociones.localidad_id,
					promocion.codigo, 
					precios.precio AS precioNormal
				FROM promociones INNER JOIN promocion ON promociones.promocion_codigo = promocion.codigo
					 INNER JOIN precios ON promocion.servicio_codigo = precios.servicio_codigo
				WHERE promociones.region_id='$region' and
				promocion.visible='1'".$aux."
				GROUP BY promocion.codigo
				ORDER BY promocion.orden ASC, promocion.nombre ASC";
		
		$resultado=$this->queryResultados($q);
		//print_r($resultado);
		
		for($i=0; $i<sizeof($resultado); $i++) {
			$resultado[$i]['precio']=$this->getPrecioPromo($resultado[$i]['codigo'], $region);
		}
		
		return $resultado;
	}
	public function getPromocionesHome($region) {
		$q="SELECT 	
					promocion.nombre, 
					promocion.nivel, 
					promocion.inicio, 
					promocion.finaliza, 
					promocion.incluye, 
					promocion.recomendado, 
					promocion.patologia, 
					promocion.nota, 
					promocion.imagen, 
					promocion.banner, 
					promocion.aviso, 
					promocion.tag, 
					promocion.keyword, 
					promociones.region_id, 
					promociones.sucursal_id,
					promociones.region_id,
					promociones.localidad_id,
					promocion.codigo, 
					precios.precio AS precioNormal
				FROM promociones INNER JOIN promocion ON promociones.promocion_codigo = promocion.codigo
					 INNER JOIN precios ON promocion.servicio_codigo = precios.servicio_codigo
				WHERE promociones.region_id='$region' and
				promocion.visible='1'
				and promocion.nivel='1'
				GROUP BY promocion.codigo
				ORDER BY promocion.orden ASC, promocion.nombre ASC";

		
		$resultado=$this->queryResultados($q);
		
		for($i=0; $i<sizeof($resultado); $i++) {
			$resultado[$i]['precio']=$this->getPrecioPromo($resultado[$i]['codigo'], $region);
		}
		
		return $resultado;

	}
	public function getSimilaresFront($region, $promocion) {
		$q="SELECT 	promocion.nombre, 
					promocion.nivel, 
					promocion.inicio, 
					promocion.finaliza, 
					promocion.incluye, 
					promocion.recomendado, 
					promocion.patologia, 
					promocion.nota, 
					promocion.imagen, 
					promocion.banner, 
					promocion.aviso, 
					promocion.tag, 
					promocion.keyword, 
					promociones.region_id, 
					promociones.sucursal_id, 
					promociones.region_id, 
					promociones.localidad_id, 
					promocion.codigo, 
					precios.precio AS precioNormal
				FROM promociones INNER JOIN promocion ON promociones.promocion_codigo = promocion.codigo
					 INNER JOIN similar ON promocion.codigo = similar.promocion_similar
					 INNER JOIN precios ON promocion.servicio_codigo = precios.servicio_codigo
				WHERE promociones.region_id='$region' and
				promocion.visible='1' and
				similar.promocion_codigo='$promocion'
				GROUP BY promocion.codigo
				ORDER BY promocion.orden ASC, promocion.nombre ASC";

		
		$resultado=$this->queryResultados($q);
		$resultado[0]['precio']=$this->getPrecioPromo($resultado[0]['codigo']);
		return $resultado;

	}
	public function especialidadRegion($idRegion) {
		$q="SELECT region.nombre, 
				region.id, 
				localidad.nombre AS localidadNombre, 
				sucursal.nombre AS sucursalNombre, 
				especialidades.especialidad_id, 
				especialidad.nombre AS especialidadNombre
			FROM localidad INNER JOIN region ON localidad.region_id = region.id
				 INNER JOIN sucursal ON sucursal.localidad_id = localidad.id
				 INNER JOIN especialidades ON especialidades.sucursal_id = sucursal.id
				 INNER JOIN especialidad ON especialidad.id = especialidades.especialidad_id
			WHERE region.id='$idRegion'
			GROUP BY especialidad.id";
			return $this->queryResultados($q);
	}
	public function obtenerPromocionDatos($codigo, $region="") {
		$q="SELECT promocion.nombre, 
			promocion.finaliza, 
			promocion.incluye, 
			promocion.recomendado, 
			promocion.patologia, 
			promocion.nota, 
			promocion.aviso, 
			promocion.banner,
			promocion.imagen,
			servicio.centroanalitico_id, 
			servicio.departamento_id, 
			servicio.nombre AS servicioNombre, 
			servicio.codigo AS servicioCodigo
		FROM promocion INNER JOIN servicio ON promocion.servicio_codigo = servicio.codigo
			 INNER JOIN promociones ON promocion.codigo = promociones.promocion_codigo
			
		WHERE promocion.codigo='$codigo'";

		$resultado=$this->queryResultados($q);

		$resultado[0]['indicaciones']=$this->getIndicaciones($resultado[0]['servicioCodigo']);
		$resultado[0]['precioNormal']=$this->getPrecioNormal($resultado[0]['servicioCodigo']);
		$resultado[0]['precio']=$this->getPrecioPromo($codigo, $region);

		return $resultado;

	}
	public function getIndicaciones($id) {
		$resultado=$this->queryResultados("select indicacion from indicaciones where servicio_codigo='$id'");
		return $resultado[0]['indicacion'];
	}
	public function getPrecioNormal($id) {
		$resultado=$this->queryResultados("select precio from precios where servicio_codigo='$id'");
		return $resultado[0]['precio'];
	}
	public function getPrecioPromo($id, $region="") {
		$q="select min(precio) as precioPromo from promociones where promocion_codigo='$id' and region_id='$region' and precio>'0'";
		$resultado=$this->queryResultados($q);
		return $resultado[0]['precioPromo'];
	}
	public function obtenerRegionesPromocion($codigo, $region=0) {
		if($region)
			$aux=" AND region.id='$region'";
		else
			$aux=" GROUP BY region.id";
		$q="SELECT region.id AS regionId, 
			region.nombre AS regionNombre, 
			sucursal.nombre AS sucursalNombre, 
			sucursal.id AS sucursalId
		FROM promocion INNER JOIN servicio ON promocion.servicio_codigo = servicio.codigo
			 INNER JOIN departamento ON servicio.departamento_id = departamento.id
			 INNER JOIN especialidades ON departamento.especialidad_id = especialidades.especialidad_id
			 INNER JOIN sucursal ON especialidades.sucursal_id = sucursal.id
			 INNER JOIN localidad ON sucursal.localidad_id = localidad.id
			 INNER JOIN region ON localidad.region_id = region.id
		WHERE promocion.codigo='$codigo'".$aux;
		return $this->queryResultados($q);
	}
	public function convierteFecha($fecha) {
		$fecha=explode(" ", $fecha);
		$fecha=$fecha[0];
		$fecha=explode("-", $fecha);
		$arregloMeses=array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
		
		return $fecha[2]." de ".$arregloMeses[(int)$fecha[1]-1]." de ".$fecha[0];
	}
	public function obtenerEspecialidadesSucursal($idSucursal) {
		$q="SELECT especialidades.sucursal_id, 
				especialidades.especialidad_id, 
				especialidades.horario, 
				especialidades.comentarios, 
				especialidad.nombre, 
				especialidad.id
			FROM especialidad INNER JOIN especialidades ON especialidad.id = especialidades.especialidad_id
			WHERE especialidades.sucursal_id='$idSucursal'";
		return $this->queryResultados($q);
	}
	public function getEstudios($limite="", $param, $region, $tag=0) {
		
		if($tag) {
			$q="select * from tags where id='$tag'";
			$r=$this->queryResultados($q);
			$aux2=" and servicio.tag like '%".$r[0]['tag']."%'";
		}

		$aux="";
		if($param)
			$aux=" and (
				servicio.nombre like '%$param%' or
				servicio.codigo like'%$param%' or
				servicio.comentario like'%$param%' or
				servicio.nota like'%$param%' or
				servicio.tag like'%$param%' or
				servicio.keyword like '%$param%' 
				) ";
		$q="SELECT 	servicio.codigo, 
					servicio.nombre, 
					servicio.departamento_id, 
					servicio.centroanalitico_id, 
					servicio.comentario, 
					servicio.nota, 
					servicio.url, 
					servicio.imagen, 
					servicio.tag, 
					servicio.keyword, 
					region.id AS idRegion
				FROM servicio INNER JOIN departamento ON servicio.departamento_id = departamento.id
					 INNER JOIN especialidades ON departamento.especialidad_id = especialidades.especialidad_id
					 INNER JOIN sucursal ON especialidades.sucursal_id = sucursal.id
					 INNER JOIN localidad ON sucursal.localidad_id = localidad.id
					 INNER JOIN region ON localidad.region_id = region.id
				WHERE region.id='$region'".$aux.$aux2."
				GROUP BY servicio.nombre
				 ORDER BY idRegion ASC, servicio.nombre ASC
				".$limite;
				
		return $this->queryResultados($q);
	}
	public function getEstudioId($id) {
		$q="select * from servicio where codigo='$id'";
		$resultado= $this->queryResultados($q);
		$resultado[0]['indicacion']=$this->getIndicacionesEstudio($id);
		return $resultado;
	}
	public function getBannersFront($region) {
		$q="SELECT 	banners.id, 
					banners.img, 
					banners.url, 
					banners.orden, 
					banners.visible, 
					banners.region_id
				FROM banners INNER JOIN bannerRegion ON banners.id = bannerRegion.banner_id
				WHERE bannerRegion.region_id='$region'
				AND banners.visible='1'
				ORDER BY banners.orden ASC
		";
		return $this->queryResultados($q);	
	}

	 public function getTipsFront($limite="", $param="", $region) {
	 	if($param)
	 		$aux="and tips.titulo like '%$param%'
	 					or tips.resumen like '%$param%'
	 					or tips.texto like '%$param%'";

	 	$q="SELECT 	tips.id, 
					tips.titulo, 
					tips.resumen, 
					tips.texto, 
					tips.img, 
					tips.fecha
				FROM tipRegion INNER JOIN tips ON tipRegion.tip_id = tips.id
				WHERE tipRegion.region_id='$region'".$aux."
				ORDER BY tips.fecha DESC, tips.titulo ASC
	 	".$limite;

	 	return ($this->queryResultados($q));
	 }
	 public function getEspecialidadDatos($id, $sucursal) {
	 	$q="select a.*, b.nombre from especialidades as a inner join especialidad as b on a.especialidad_id=b.id
	 	where sucursal_id='$sucursal' and especialidad_id='$id'";
	 	return ($this->queryResultados($q));
	 }

	 //checando folio
	 public function checarFolio($folio){
		$numDigits	 = strlen($folio) - 1;
		$numero		 = substr($folio, 0, $numDigits);
		$verificador = substr($folio, -1);
		
		$sumaNon = 0;
		$sumaPar = 0;
		for($a = 0; $a < $numDigits; $a++){
			$num = substr($numero, $a, 1);
			if(($a+1) % 2 == 0){
				$sumaPar += $num;
				//echo 'par: '.$num."<br>\n";
			} else{
				$sumaNon += $num;
				//echo 'non: '.$num."<br>\n";
			}
		}
		$paso1 = $sumaNon * 3;
		$paso2 = $paso1 + $sumaPar;
		$final = 0;
		for($b = 1; $b < 10; $b++){
			if( ($b + $paso2) % 10 == 0){
				$final = $b;
				break;
			}
		}
		
		return ($verificador == $final) ? true : false;
	}
	public function getPrecioSucursal($promo, $sucursal) {
		$q="select * from promociones where promocion_codigo='$promo' and sucursal_id='$sucursal'";
		return ($this->queryResultados($q));
	}
}
?>