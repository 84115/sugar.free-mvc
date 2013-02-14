<?php

class View{

	public function render($dir, $name, $noInclude = false){
		if ($noInclude == true){
			require APP.'/'.VIEW.'/'.$dir.'/'.$name.'.php';
		}
		else{
			require APP.'/'.VIEW.'/header.php';
			require APP.'/'.VIEW.'/'.$dir.'/'.$name.'.php';
			require APP.'/'.VIEW.'/footer.php';
		}
	}

	public function scriptLoader(){
		if (isset($this->js)){
			foreach ($this->js as $js){
				echo '<script type="text/javascript" src="'.URL.'/app/view/'.$js.'"></script>'."\r\n";
			}
		}
		if (isset($this->vars)){
			echo '<script type="text/javascript">'."\r\n";
			foreach ($this->vars as $vars => $val){
				echo '		var '.$vars.' = \''.$val.'\';'."\r\n";
			}
			echo '	</script>'."\r\n";
		}
	}
	
	public function dataLoader(){
	echo'<title>'.TITLE.' - '.DESC.'</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="author" content="'.AUTHOR.'" />
	<meta name="keywords" content="'.KEYWORDS.'" />
	<meta name="description" content="'.DESC.'" />'."\r\n";
	}
	
}