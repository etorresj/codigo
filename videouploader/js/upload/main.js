function validateVideo () {
	archive=document.getElementById("archive");
	titlename=document.getElementById("titlename");
	description=document.getElementById("description");
	if(!archive.value){
    	alert('File is required'); 
        archive.focus();
        return false;
	} else if(!titlename.value){
		alert('Title is required'); 
		titlename.focus();
		return false;                                                
	} else if(!description.value){
		alert('Description is required'); 
		description.focus();
		return false;
	}
	 document.getElementById('submit_btn').disabled = true;
	 
	// $("#loading_div").load("view/upload/loading.php").done(function(){alert(1);});
	 
	$( "#loading_div" ).show();
	setTimeout(function(){
      		$("#videoForm").submit();
      		
      	}, 1500);
        
	//document.getElementById("loading_div").style.display="block";
	//document.getElementById("videoForm").submit();
	//sendForm();

}
function sendForm() {
	alert(1);
}

function call_cbox(id){
	embed=document.getElementById("embed_code"+id).value;
	style=document.getElementById("style"+id).value;
	category=document.getElementById("category"+id).value;
	propertyId=document.getElementById("propertyId"+id).value;

 

	//alert(player+"-"+embed);
    $.colorbox({width:"640px", height:"220px", iframe:true, href:"?section=embedCode&embed_code="+embed+"&style="+style+"&category="+category+"&propertyId="+propertyId});
}