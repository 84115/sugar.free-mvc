<script type="text/javascript">

	$.get(xhr1, function(feed){
		
		for (var i = 0; i < feed.length; i++){
			$('div.list').append("<h6>"+feed[i]+"</h6>"+"coming soon... <span class=\"small\">edit</span>");
		}
		
	},'json');

	$.get(xhr2, function(feed){
		
		for (var i = 0; i < feed.length; i++){
			$('table').append("<tr><td>"+feed[i].id +"</td> <td>"+feed[i].error+"</td> <td>"+feed[i].description+"</td> </tr>");
		}
		
	},'json');

</script>

<style>
table,th,td,tr{
	text-align:left;
	padding:3px;border: 1px solid #aaa;
}
</style>

<h3>List Functions</h3>
<div class="list"></div>

<h3>Error Codes</h3>
<table>
<th>ID</th><th>Error</th><th>Description</th>
</table>