<?php
session_start();
include_once('model/genero.php');    
include_once('model/Templete.php');

function handler() {
$pag= helper_pag_data();
$per=new genero();
$template=new Template();//activacion de los diseños de bostrap//
$template->head();
switch ($pag) {
	case 'listar_genero':
         echo $per->get_tabla();
	break;
	case 'registrar_genero':
		$per->get_datos_genero($_POST);
		echo $per->get_tabla();
	break;
	case 'form_nuevo_genero':
         $per->form_nuevo_genero();
	break;
	case 'modificar_genero':
		$per->get_datos_modificar_genero($_POST);
		echo $per->get_tabla();
	break;
	case 'form_modificar_genero':
	    $per->get_by_id_genero($_GET['id_genero']);
		$per->form_modificar_genero();
	break;
	case 'eliminar_genero':
		$per->get_datos_eliminar_r($_POST);
		echo $per->get_tabla();


	break;
	case 'form_eliminar_genero':
		$per->get_by_id_genero($_GET['id_genero']);
		$per->form_eliminar_genero();

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