<?php

/*
extract($_GET);


$listAux=explode(",",$playlists);
$count=count($listAux);
$list="";
for($i=0; $i<$count-1; $i++) {
	$list.='"'.$listAux[$i].'",';
}
$list.='"'.$listAux[$count-1].'"';


echo htmlentities("<script type=\"text/javascript\" src=\"https://player.ooyala.com/v3/$player\"></script>")."<br>";
echo htmlentities("<div id=\"ooyalaplayer\" style='width:1024px;height:576px' ></div>")."<br>";
echo htmlentities("<script type=\"text/javascript\">")."<br>";
echo htmlentities("var ooyalaPlayer;")."<br>";

echo htmlentities("OO.ready(function() {")."<br>";
    echo htmlentities("var playerConfiguration = {")."<br>";
    if($playlists!="null") {
    	echo htmlentities("playlistsPlugin: {\"data\":[".$list."]},")."<br>";
    }

    echo htmlentities("height: '576',")."<br>";
    echo htmlentities("width: '1024'")."<br>";
    echo htmlentities("};")."<br>";

    echo htmlentities("ooyalaPlayer = OO.Player.create('ooyalaplayer', '".$embed_code."', playerConfiguration);")."<br>";
 echo htmlentities("});")."<br>";

echo htmlentities("</script>")."<br>";*/


foreach ($players->items as $value) { 
		$pid=$value->id;
		$p=$value->name;
		if($p == "Default Player"){
		
		foreach($propertycode as $propertyc) {
?>

 &ltdiv id="dfmVideo" data-video-style="<?php echo $_GET['style'];?>" data-video-label="<?php echo $_GET['category'];?>" data-video-account="<?php echo $propertyc['property_code'];?>" data-video-contentid="<?php echo $_GET['embed_code']?>" data-video-player="<?php echo $pid;?>"&gt&lt/div&gt	 
 <br/><br/>
 
 data-video-style=<?php echo $_GET['style'];?>&data-video-label=<?php echo $_GET['category'];?>&data-video-account=<?php echo $propertyc['property_code'];?>&data-video-contentid=<?php echo $_GET['embed_code']?>&data-video-player=<?php echo $pid;?>
<?php
	}}}
?>