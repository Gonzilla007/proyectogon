<?php
class controlador
{
	
	public function load_template($title='Sin Titulo'){
		$pagina = $this->load_page('vista/default/pagina.php');
		$header = $this->load_page('vista/default/secciones/s.header.php');
		$alerta = $this->load_page_datos('vista/default/secciones/s.alerta.php');
		$pagina = $this->replace_content('/\#ALERTA\#/ms' ,$alerta , $pagina);
		$pagina = $this->replace_content('/\#HEADER\#/ms' ,$header , $pagina);
		$pagina = $this->replace_content('/\#TITLE\#/ms' ,$title , $pagina);	
			
		$menu_left = $this->load_page_datos('vista/default/secciones/s.menu.php');
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu_left , $pagina);

		return $pagina;
	}
	
	public function load_template_header($title='Sin Titulo'){
		$pagina = $this->load_page('vista/default/pagina.php');
		
		$pagina = $this->replace_content('/\#TITLE\#/ms' ,$title , $pagina);				
		$menu_left = $this->load_page('vista/default/secciones/s.menu.php');
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu_left , $pagina);
		return $pagina;
	}
	
	public function load_page($page)
	{
		return file_get_contents($page);
	}
	public function load_page_datos($page)
	{
		ob_start();
		include $page;
		return ob_get_clean();
	}

	public function view_page($html)
	{
		echo $html;
	}
	
	public function replace_content($in='/\#CONTENIDO\#/ms', $out,$pagina)
	{
		 return preg_replace($in, $out, $pagina);	 	
	}
}