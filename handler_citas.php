<?php
session_start();
include_once('model/citas.php');    
include_once('model/Templete.php');

function handler() {
$pag= helper_pag_data();
$per=new citas();
$template=new Template();//activacion de los diseños de bostrap//
$template->head();
switch ($pag) {
	case 'listar_citas':
         echo $per->get_tabla();
	break;
	case 'registrar_citas':
		$per->get_datos_citas($_POST);
		echo $per->get_tabla();
	break;
	case 'form_nuevo_citas':
         $per->form_nuevo_citas();
	break;
	case 'modificar_citas':
		$per->get_datos_modificar_citas($_POST);
		echo $per->get_tabla();
	break;
	case 'form_modificar_citas':
	    $per->get_by_id_citas($_GET['id_citas']);
		$per->form_modificar_citas();
	break;
	case 'eliminar_citas':
		$per->get_datos_eliminar_r($_POST);
		echo $per->get_tabla();


	break;
	case 'form_eliminar_citas':
		$per->get_by_id_citas($_GET['id_citas']);
		$per->form_eliminar_citas();

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