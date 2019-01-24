<?php 
class upload extends conexion {
	public function uploadVideoLocal($arreglo, $idProperty=0, $owner='') {
		extract($arreglo);
		if($type=='newvideo'){
			$file= $_FILES['archive']['tmp_name'];
			$size=$_FILES['archive']['size'];
			$name=$_FILES['archive']['name'];

			$insertvSQL = "INSERT INTO videos (file_size, name, tmp_name, title, description, owner, producer, datelocal, fk_idProperty) VALUES ('".$size."','".$name."','".$file."','".$titlename."','".$description."','".$owner."','".$producer."','".date('Y-m-d H:i:s')."', '$idProperty')";
			$idvideo = $this->queryInsert($insertvSQL);
			move_uploaded_file($file,"videos/". $idvideo.".mp4");
		}

		$insertSQL = "INSERT INTO videosinfo (idvideo, player, expire, label1, label2, label3, labelnew) VALUES ('".$idvideo."','".$playerid."','".$expire."','".$label1."','".$label2."','".$label3."','".$labelnew."')";
		$id = $this->queryInsert($insertSQL);

		return true;
	}

	public function getVideosLocal($id=0, $property=0) {
		$aux="";
		if($property)
			$aux=" where a.fk_idProperty='$property'";
		if($id)
			$selectSQL="select a.*, a.id, b.id as idInfo, b.* from videos as a inner join videosinfo as b on a.id=b.idvideo where a.id='$id'";
		else
			$selectSQL = "select a.*, b.id as idInfo from videos as a inner join videosinfo as b on a.id=b.idvideo".$aux;
		$response = $this->queryResults($selectSQL);
		return $response;
	}
	public function uploadVideo($arreglo, $videoFile){
		
		extract($arreglo);
		
		if($type=="videoinfoupdate"){


			$updateSQL = "UPDATE videos SET title='".$title."', description='".$description."' WHERE id='".$idvideo."'";
			$this->querySingle($updateSQL);
		
					
			$updateSQL = "UPDATE videosinfo SET player='".$_POST['playerid']."', expire='".$_POST['expire']."', label1='".$_POST['label1']."', label2='".$_POST['label2']."', label3='".$_POST['label3']."', labelnew='".$_POST['labelnew']."' WHERE id='".$id."'";
			$this->querySingle($updateSQL);
			return 1;
		}
		else if($type=="updatevideo"){	

			 $file=$videoFile['archivo']['tmp_name'];
			 $size=$videoFile['archivo']['size'];
			 $name=$videoFile['archivo']['name'];
			 $updateSQL = "UPDATE videos SET file_size='".$size."', name='".$name."' WHERE id='".$idvideo."'";
			 $this->querySingle($updateSQL);
			 
			 
			 $myFile = "videos/".$idvideo.".mp4";
			 if(file_exists($myFile))
			 	unlink($myFile);
			 
			 move_uploaded_file($file,"videos/". $idvideo.".mp4");
			 return 1;
		}

		
	}
	public function getVideoToOoyala($id) {
		//$selectSQL = "select a.*, b.*, a.id from videosinfo as a inner join videos as b on a.idvideo=b.id  where a.id=".$id;
		$selectSQL = "select * from videos where id='$id'";
		$response=$this->queryResults($selectSQL);
		return $response;

	}
	
	public function getVideosToOoyala($property=0) {
		$aux="";
		if($property)
			$aux=" where a.fk_idGroup='$property'";
		//$selectSQL = "select a.*, b.*, a.id from videosinfo as a inner join videos as b on a.idvideo=b.id  where b.status='1'".$aux;
		$selectSQL = "select a.*, b.property_name from videos as a inner join properties as b on a.fk_idProperty=b.idProperty ".$aux;
		$response=$this->queryResults($selectSQL);
		return $response;

	}

	public function uploadOoyala() {
		$video=$this->getVideoToOoyala($_GET['id']);
		$video=$video[0];

		//echo "<pre>";
		//print_r($video);
		//echo "</pre>";

		$api = new OoyalaApi("V5dzkxOmUFf0dFju2v9bPHqRdgjC.0Ut0Y", "O7PUVcRVGXQx5HtqMlt7MoS8wrBr_FByN-J11-s_");
		$parameters=array();
		$parameters['name']=$video['title'];
		$parameters['file_name']=$video['name'];
		$parameters['asset_type']='video';
		$parameters['file_size']=$video['file_size'];
		$parameters['description']=$video['description'];
		$results = $api->post("/v2/assets", $parameters);

		//upload video
		
		$embed_code=$results->embed_code;
		$updated_at=$results->updated_at;
		$duration=$results->duration;
		$imgprev=$results->preview_image_url;
				
		$url=$api->get("/v2/assets/".$embed_code."/uploading_urls");
								
		$content = file_get_contents('videos/'.$video['idvideo'].'.mp4');
		$direccion=$url[0];
				
		$ch = curl_init($direccion);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt ($ch, CURLOPT_HTTPHEADER, Array("Content-Type: multipart/mixed"));
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
		
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		$response = curl_exec($ch);
		if(curl_error($ch)){
			curl_close($ch);
			echo curl_error($ch);
			exit();
		}
		$head=curl_getinfo($ch);
		$content = $head["content_type"];
		$code = $head["http_code"];
		curl_close($ch);

		unset($parameters);
		$parameters=array();
		$parameters['status']='uploaded';
		$fResult=$api->put('/v2/assets/'.$embed_code.'/upload_status', $parameters); 
		//upload
		$resultsplayer = $api->put('/v2/assets/'.$embed_code.'/player/'.$video['player']);		
		//Player
		if($video['labelnew']!=NULL){	
			unset($parameterslabel);
			$parameterslabel=array();
			$parameterslabel['name']=$video['labelnew'];	
			$resultsnewlabel = $api->post("/v2/labels", $parameterslabel);
			$labelnew = $resultsnewlabel->id;
		}

		$label1=$video['label1'];
		$label2=$video['label2'];
		$label3=$video['label3'];				
		$parameterslabel=array();
		$parameterslabel['label1']=$label1;
		$parameterslabel['label2']=$label2;
		$parameterslabel['label3']=$label3;
		if($video['labelnew']!=NULL){$parameterslabel['labelnew']=$labelnew;}
		$resultslabels = $api->put('/v2/assets/'.$embed_code.'/labels/', $parameterslabel);
		//labels
		//
		$updateSQL = "UPDATE videosinfo SET embed_code='".$embed_code."' WHERE id='".$video['id']."'";
		$this->querySingle($updateSQL);
		$updateSQL2 = "UPDATE videos SET embed_code='".$embed_code."', length='".$duration."', datevendor='".$updated_at."', imgprev='".$imgprev."', status='1' WHERE id='".$video['idvideo']."'";
		$this->querySingle($updateSQL2);

		//print_r
				echo "Results:<br><pre>Results:<br>";
				print_r($results);
				echo "Uploading url";
				print_r($url);
				echo "Metadata";
				print_r($resultsmeta);
				echo "Labels";
				print_r($resultslabels);
				echo "New Labels";
				print_r($resultsnewlabel);	
				echo "Final status";
				print_r($fResult);	

				return true;
	}

	public function editVideoOoyala($arreglo, $archivo) {
		extract($arreglo);
		$api = new OoyalaApi("V5dzkxOmUFf0dFju2v9bPHqRdgjC.0Ut0Y", "O7PUVcRVGXQx5HtqMlt7MoS8wrBr_FByN-J11-s_");
		if($type=='video'){
	
	$file=$archivo['archive']['tmp_name'];
	
	$parameters=array();
		$parameters['name']=$archivo['archive']['name'];
		$parameters['file_size']=$archivo['archive']['size'];
		$parameters['file']=$archivo['archive']['tmp_name'];
		$parameters['error']=$archivo['archive']['error'];
		
		
				
		$results = $api->post("/v2/assets/".$embed_code."/replacement", $parameters);
		//sube nuevo video
		
		$url=$api->get("/v2/assets/".$embed_code."/replacement/uploading_urls");
		//subiendo las url
		
		$content = file_get_contents($file);
		//$content = file_get_contents('test.mp4');

		$direccion=$url[0];
		//echo $direccion;

		$ch = curl_init($direccion);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt ($ch, CURLOPT_HTTPHEADER, Array("Content-Type: multipart/mixed"));
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
               $response = curl_exec($ch);
               if(curl_error($ch))
                   {
                       curl_close($ch);
                       echo curl_error($ch);
                   }
        $head=curl_getinfo($ch);
        $content = $head["content_type"];
        $code = $head["http_code"];
        curl_close($ch);
		
		unset($parameters);
		$parameters=array();
		$parameters['status']='uploaded';
		$fResult=$api->put('/v2/assets/'.$embed_code.'/replacement/upload_status', $parameters);
	
			
		
		}else{

		unset($parameters);
		$parameters=array();
		$parameters['name']=$_POST['name'];
		$parameters['description']=$_POST['description'];
		$embed_code=$_POST['embed_code'];
		$results = $api->patch("/v2/assets/".$embed_code, $parameters);

	
		}
		return true;
	}

	//Yair's functions
	//
	
	public function getVideos() {
		$query="select * from videos where status=1";
		$response=$this->queryResults($query);
		return $response;
	}

	public function getVideosPerProperty($idProperty) {
		$query="select * from videos where status=1 and fk_idProperty='$idProperty'";
		$response=$this->queryResults($query);
		return $response;
	}

	public function getSearch($search, $property) {
		if($property)
			$aux=" and fk_idProperty='$property'";
		$query="select * from videos where (title LIKE '%$search%' or description LIKE '%$search%') and status='0'".$aux;
		$response=$this->queryResults($query);
		return $response;
	}
	public function getSearchOoyala($search, $property) {
		$aux="";
		if($property)
			$aux=" and a.fk_idGroup='$property'";
		//$selectSQL = "select a.*, b.*, a.id from videosinfo as a inner join videos as b on a.idvideo=b.id  where b.status='1' and (b.title LIKE '%$search%' or b.description LIKE '%$search%')".$aux;
		$selectSQL = "select a.*, b.property_name from videos as a inner join properties as b on a.fk_idProperty=b.idProperty where a.status='1' and (a.title LIKE '%$search%' or a.description LIKE '%$search%' or b.property_name LIKE '%$search%')".$aux;
		$response=$this->queryResults($selectSQL);
		return $response;
	}
	public function share($arreglo) {
		extract($arreglo);

		$this->querySingle("delete from shareVideos where idVideo='$idVideo'");
		foreach($properties as $property) {
			//search gruop id
			$qGroup="select fkgroup from properties where idProperty='".$property."'";
			$rGroup=$this->queryResults($qGroup);
			$groupId=$rGroup[0]['fkgroup'];
			$this->querySingle("insert into shareVideos (idVideo, idProperty, idUser, propertyToShare, groupToShare, title) values ('$idVideo', '$idProperty', '$idUser', '$property', '$groupId', '$title')"); 
		}
		return 1;
	}
	public function getShared($idVideo) {
		$query="select * from shareVideos where idVideo='$idVideo'";
		$response=$this->queryResults($query);
		if($response)
			foreach($response as $value)
				$array[]=$value['propertyToShare'];
		return $array;
	} 
	public function getSharedVideos($property) {
		$query="select * from shareVideos where groupToShare='$property'";
		$response=$this->queryResults($query);
		$i=0;
		if($response)
			foreach($response as $value) {
				//$aux=$this->getVideoToOoyala($value['idVideo']);
				$array[$i]=$response[$i];
				$array[$i]['embed_code']=($value['idVideo']);
				$array[$i]['sharedBy']=$this->getUserName($value['idUser']);
				$array[$i]['sharedByP']=$this->getPropertyName($value['idProperty']);
				$i++;
			}
		return $array;

	}
	public function getUserName($id) {
		$query="select userL from tusers where idlogin='$id'";
		$response=$this->queryResults($query);
		return $response[0]['userL'];
	}

	public function getPropertyName($id) {
		$query="select property_name from properties where idProperty='$id'";
		$response=$this->queryResults($query);
		return $response[0]['property_name'];
	}
	
	
	public function getTokens($id) {
		$query="select apikey, apisecret from properties where idProperty='$id'";
		return $this->queryResults($query);
	}

	public function getTokenPlayers($id) { //this function get the players list from any property 
		$token=$this->getTokens($id);
		$api = new OoyalaApi($token[0]['apikey'], $token[0]['apisecret']);
		return $api->get("players");
	}

	public function getTokenPlaylists($id) { //this function get the playlists  from any property 
		$token=$this->getTokens($id);
		$api = new OoyalaApi($token[0]['apikey'], $token[0]['apisecret']);
		return $api->get("/v2/playlists");
	}
	

	public function directuploadOoyala() {	
	
		unset($labels);
		unset($api);
		//searching apikey and apisecret for the property selected	
		$token=$this->getTokens($_POST['propertyId']);

		$api = new OoyalaApi($token[0]['apikey'], $token[0]['apisecret']);
		$players=$api->get("players");
		
		
		$labels=$api->get("labels");
		
		
		//if don't exists the selected label, create it on ooyala
		
		foreach($labels->items as $value) {
			
			if($value->name==$_POST['label1'])
				$labelArray[0]['id']=$value->id;
			else
				$labelArray[0]['name']=$_POST['label1'];

			if($value->name==$_POST['label2'])
				$labelArray[1]['id']=$value->id;
			else
				$labelArray[1]['name']=$_POST['label2'];
			
			if($value->name==$_POST['label3'])
				$labelArray[2]['id']=$value->id;
			else
				$labelArray[2]['name']=$_POST['label3'];
			
		}

		//if there are not labels
		if(sizeof($labelArray)<1) {
			$labelArray[0]['name']=$_POST['label1'];
			$labelArray[1]['name']=$_POST['label2'];
			$labelArray[2]['name']=$_POST['label3'];
		}
	

		//Adding new labels
		if(!$labelArray[0]['id']) {
			unset($parameterslabel);
			$parameterslabel=array();
			$parameterslabel['name']=$labelArray[0]['name'];
			$resultsnewlabel = $api->post("/v2/labels", $parameterslabel);
			$labelArray[0]['id'] = $resultsnewlabel->id;
		}

		if(!$labelArray[1]['id']&&$labelArray[1]['name']!=$labelArray[0]['name']) { //preventing duplicates
			unset($parameterslabel);
			$parameterslabel=array();
			$parameterslabel['name']=$labelArray[1]['name'];
			$resultsnewlabel = $api->post("/v2/labels", $parameterslabel);
			$labelArray[1]['id'] = $resultsnewlabel->id;
		}

		if(!$labelArray[2]['id']&&$labelArray[2]['name']!=$labelArray[1]['name']&&$labelArray[2]['name']!=$labelArray[0]['name']) { //preventing duplicates
			unset($parameterslabel);
			$parameterslabel=array();
			$parameterslabel['name']=$labelArray[2]['name'];
			$resultsnewlabel = $api->post("/v2/labels", $parameterslabel);
			$labelArray[2]['id'] = $resultsnewlabel->id;
		}


		if($_POST['labelnew']!=NULL){	
					unset($parameterslabel);
					$parameterslabel=array();
					$parameterslabel['name']=$_POST['labelnew'];	
					$resultsnewlabel = $api->post("/v2/labels", $parameterslabel);
					$labelnew = $resultsnewlabel->id;
				}
	


				$file=$_FILES['archive']['tmp_name'];
				$size=$_FILES['archive']['size'];
				$name=$_FILES['archive']['name'];
				$title=$_POST['titlename'];
				$description=$_POST['description'];
				//$player=$_POST['playerid'];
				
		
				$parameters=array();
					$parameters['name']=$title;
					$parameters['file_name']=$name;
					$parameters['asset_type']='video';
					$parameters['file_size']=$size;
					//$parameters['post_processing_status']='paused';
					$parameters['description']=$description;
				$results = $api->post("/v2/assets", $parameters);
				//upload video
				
				$updated_at=$results->updated_at;
				$embed_code=$results->embed_code;
		
				$url=$api->get("/v2/assets/".$embed_code."/uploading_urls");
				//uploading the url
						
				$content = file_get_contents($file);
				//$content = file_get_contents('videos/'.$_POST['id'].'.mp4');
		
				$direccion=$url[0];
				//echo $direccion;
				
				$ch = curl_init($direccion);
				       curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
				       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				       curl_setopt ($ch, CURLOPT_HTTPHEADER, Array("Content-Type: multipart/mixed"));
				       curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
				       curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
				function httpRequest($ch)	
				       {
		               curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		               $response = curl_exec($ch);
		               if(curl_error($ch))
		                   {
		                       curl_close($ch);
		                       return curl_error($ch);
		                   }
		               $head=curl_getinfo($ch);
		               $content = $head["content_type"];
		               $code = $head["http_code"];
		               curl_close($ch);
					   }
					   httpRequest($ch);
			
			
				unset($parameters);
				$parameters=array();
					$parameters['status']='uploaded';
				$fResult=$api->put('/v2/assets/'.$embed_code.'/upload_status', $parameters); 
				//upload
				
				//$resultsplayer = $api->put('/v2/assets/'.$embed_code.'/player/'.$player);		
		
				
				//labels
				
				$label1=$labelArray[0]['id'];
				$label2=$labelArray[1]['id'];
				$label3=$labelArray[2]['id'];				
				$parameterslabel=array();
					if($label1)
						$parameterslabel['label1']=$label1;
					if($label2)
						$parameterslabel['label2']=$label2;
					if($label3)
						$parameterslabel['label3']=$label3;
					if($_POST['labelnew']!=NULL){$parameterslabel['labelnew']=$labelnew;}
				$resultslabels = $api->put('/v2/assets/'.$embed_code.'/labels/', $parameterslabel);
				
			//search gruop id
			$qGroup="select fkgroup from properties where idProperty='".$_POST['propertyId']."'";
			$rGroup=$this->queryResults($qGroup);
			$groupId=$rGroup[0]['fkgroup'];
			$insertvSQL = "INSERT INTO videos (title, description, owner, datevendor, embed_code, status, fk_idProperty, fk_idGroup) VALUES ('".$title."','".$description."','".$_SESSION['ooyalaUser']['idlogin']."','".$updated_at."','".$embed_code."',1,'".$_POST['propertyId']."', '".$groupId."')";
			$idvideo = $this->queryInsert($insertvSQL);
			
			
			if($_FILES['prev_img']['tmp_name']!=NULL){	
			 $name_prev_img = $_FILES["prev_img"]["name"];
				 $name_prev_img_tmp = $_FILES['prev_img']['tmp_name'];
				 $type_prev_img = $_FILES["prev_img"]["type"];
				 $length_prev_img = $_FILES["prev_img"]["size"];
				
				 move_uploaded_file($name_prev_img_tmp,"imgprev/".$name_prev_img);
				
				//relative URL
				$phpself=explode("/", $_SERVER['PHP_SELF']);
				$urlR="http://".$_SERVER['HTTP_HOST']."/";
				for($i=1; $i<count($phpself)-1; $i++) {
				$urlR.=$phpself[$i]."/";
				}
				$urlR.="imgprev/";

				$parametersprevimg=array();
					$parametersprevimg['width']=1280;
					$parametersprevimg['height']=720;
					$parametersprevimg['url']=$urlR.$name_prev_img;
					
				$resultsprevimage=$api->post('/v2/assets/'.$embed_code.'/preview_image_urls', $parametersprevimg);
				
				$parametersprevimgput=array();
					$parametersprevimgput['type']='remote_url';
				$resultsprevimageput=$api->put('/v2/assets/'.$embed_code.'/primary_preview_image', $parametersprevimgput);
				}
				
			
			$propertycode=$this->propertycode($_POST['propertyId']);
					$rn="\n";
					$To='yjimenez@medianewsgroup.com';
					//$To=$_SESSION['ooyalaUser']['email'];
					$From='Videouploader';
					//$FromAddress=$_POST['email'];
					//$Host=$hostName;
					$Subject = 'Videouploader update';
					
					//Sending e-mail
					$Header = "MIME-Version: 1.0".$rn;
					$Header.= "Content-type: text/html; charset=utf-8".$rn;
					$Header.= "Content-Transfer-Encoding: 8bit".$rn; 
					$Header.="Message-ID: <".gmdate('YmdHs')."@".$Host.">".$rn;
					$Header.="From: ".$From." <Videouploader>".$rn;
					$Header.="Return-Path: ".$From." <Videouploader>".$rn;
					$Header.="Reply-To: ".$From." <Videouploader>".$rn;
					//$Header.="Sender: ".$Host.$rn;
					$Header.="Sent: ".date("d-m-Y").$rn;  
					
					include('sendemail.php');

							/*foreach ($players->items as $value) { 
							$pid=$value->id;
							$p=$value->name;
								
							$Message ="<div style='width:600px; margin:0px auto;'>
								".$_SESSION['ooyalaUser']['userL']." User has just uploaded a new video to your account titles ".$title." about ".$description." .You can publish the video to your site with any of  the following tags:
								<br><br>";
														
							$Message = $p."<br/><br/>
										
											&ltscript src='//player.ooyala.com/v3/".$pid."'&gt&lt/script&gt
												&ltdiv id='ooyalaplayer' style='width:1024px;height:576px'&gt
											&lt/div>&ltscript&gtOO.ready(function() { OO.Player.create('ooyalaplayer', '".$embed_code."'); });&lt/script&gt
										
											<br/><br/>
											</div>";		
							}		*/	
					
	 
	 
					mail($To,$Subject,ob_get_contents(),$Header) or die ("System error, try again later");		
					ob_end_clean();									
			return $embed_code;

	}
	
	public function searchProperties($fkgroup=0) {	
			if($fkgroup)
				$query="select * from properties where fkgroup='$fkgroup' order by property_name";
			else
				$query="select * from properties order by property_name";
			$response=$this->queryResults($query);
			return $response;
	}
	public function propertycode($idProperty) {	
			$query="select * from properties where idProperty='$idProperty' order by property_name";	
			$response=$this->queryResults($query);
			return $response;
	}
	//updated May 27th 2014
	//function to get ooyala videos per property
	public function getOooyalaVideos($search="", $idProperty, $nextoken=0) {
		
		$token=$this->getTokens($idProperty);
		//print_r($token);
		$api = new OoyalaApi($token[0]['apikey'], $token[0]['apisecret']);
		if($search)
			$parameters['where']="name INCLUDES '$search'";
		$parameters['limit']=50;
		
		$results = $api->get("assets",$parameters);

		if($nextoken) {
			$parameters['page_token']=$nextoken;
			$results = $api->get("assets",$parameters);			
		}
		
		return ($results);
	}
	//function to convert date 
	public function converDate($date) {
		$date=explode('T', $date);
		$date=explode('-', $date[0]);
		$dateArray= array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
		
		return $dateArray[$date[1]-1]."-".$date[2]."-".$date[0];
	}
	//search in ooyala server 
	public function getSearchOoyalaServer($search, $idProperty) {
		$token=$this->getTokens($idProperty);
		//print_r($token);
		$api = new OoyalaApi($token[0]['apikey'], $token[0]['apisecret']);
		$parameters = array("where" => "name INCLUDES '$search'");
		$results = $api->get("assets", $parameters);
		return ($results);
	}
}
?>