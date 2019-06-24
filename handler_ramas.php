<?php
session_start();
include_once('model/ramas.php');    
include_once('model/Templete.php');

function handler() {
$pag= helper_pag_data();
$per=new ramas();
$template=new Template();//activacion de los diseños de bostrap//
$template->head();
switch ($pag) {
	case 'listar_ramas':
         echo $per->get_tabla();
	break;
	case 'registrar_ramas':
		$per->get_datos_ramas($_POST);
		echo $per->get_tabla();
	break;
	case 'form_nuevo_ramas':
         $per->form_nuevo_ramas();
	break;
	case 'modificar_ramas':
		$per->get_datos_modificar_ramas($_POST);
		echo $per->get_tabla();
	break;
	case 'form_modificar_ramas':
	    $per->get_by_id_ramas($_GET['id_ramas']);
		$per->form_modificar_ramas();
	break;
	case 'eliminar_ramas':
		$per->get_datos_eliminar_r($_POST);
		echo $per->get_tabla();


	break;
	case 'form_eliminar_ramas':
		$per->get_by_id_ramas($_GET['id_ramas']);
		$per->form_eliminar_ramas();

	break;
	case 'exportar_pdf':
		$per->exportar_pdf();
	break;
	case 'exportar_excel':
		$per->exportar_excel();
	break;
	case 'exportar_word':
		$per->exportar_word();
	break;
	case 'buscar_personal':

		break;
}

//$template->foot();

}
function helper_pag_data() {
$pag_data=$_GET['pag'];
return $pag_data;
}

handler();

?>