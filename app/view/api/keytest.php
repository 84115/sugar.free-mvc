<script type="text/javascript">

document.onkeypress = function(evt){

	var str = String.fromCharCode(
		(evt) ? evt.which : event.keyCode
	);
	if(keyboard.hasOwnProperty(str)){
		if (str !== false){
			keyboard[str]();
		}
	}
	
}

keyboard = {
	1 : function(){
		getFeed(1);
	},
	
	2 : function(){
		getFeed(2);
	},
	
	3 : function(){
		getFeed(3);
	},
	
	4 : function(){
		getFeed(4);
	},
	
	5 : function(){
		getFeed(5);
	}
};

var getFeed = function(i){
	$.get(xhr+i, function(feed){
		
		$('#result').empty();
		
		for (var i = 0; i < feed.length; i++){
			$('#result').append("<div>ID: "+feed[i].id +"<br />TITLE:"+feed[i].title+"<br />TEXT: "+feed[i].text+"<br />DATE: "+feed[i].date+"</div>");
		}
		
	},'json')
};

/*
$.get(xhr, function(feed){
	
	$('#result').empty();
	
	for (var i = 0; i < feed.length; i++){
		$('#result').append("<div>ID: "+feed[i].id +"<br />TITLE:"+feed[i].title+"<br />TEXT: "+feed[i].text+"<br />DATE: "+feed[i].date+"</div>");
	}
	
},'json');
*/

</script>

<div id="result"></div>