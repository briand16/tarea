<?php
session_start();
include_once('model/pretenciones.php');    
include_once('model/Templete.php');

function handler() {
$pag= helper_pag_data();
$per=new pretenciones();
$template=new Template();//activacion de los diseños de bostrap//
$template->head();
switch ($pag) {
	case 'listar_pretenciones':
         echo $per->get_tabla();
	break;
	case 'registrar_pretenciones':
		$per->get_datos_pretenciones($_POST);
		echo $per->get_tabla();
	break;
	case 'form_nuevo_pretenciones':
         $per->form_nuevo_pretenciones();
	break;
	case 'modificar_pretenciones':
		$per->get_datos_modificar_pretenciones($_POST);
		echo $per->get_tabla();
	break;
	case 'form_modificar_pretenciones':
	    $per->get_by_id_pretenciones($_GET['id_pretenciones']);
		$per->form_modificar_pretenciones();
	break;
	case 'eliminar_pretenciones':
		$per->get_datos_eliminar_r($_POST);
		echo $per->get_tabla();


	break;
	case 'form_eliminar_pretenciones':
		$per->get_by_id_pretenciones($_GET['id_pretenciones']);
		$per->form_eliminar_pretenciones();

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