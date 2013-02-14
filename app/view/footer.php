
</div>

<div id="footer">
<?php Session::init();
if(Session::get('loggedIn') == true){
	print_r( $_SESSION );
}
else{
	echo ":(";
}
?>
</div>

</body>
</html>