<?php
session_start();
include_once('model/historiales.php');    
include_once('model/Templete.php');

function handler() {
$pag= helper_pag_data();
$per=new historiales();
$template=new Template();//activacion de los diseños de bostrap//
$template->head();
switch ($pag) {
	case 'listar_historiales':
         echo $per->get_tabla();
	break;
	case 'registrar_historiales':
		$per->get_datos_historiales($_POST);
		echo $per->get_tabla();
	break;
	case 'form_nuevo_historiales':
         $per->form_nuevo_historiales();
	break;
	case 'modificar_historiales':
		$per->get_datos_modificar_historiales($_POST);
		echo $per->get_tabla();
	break;
	case 'form_modificar_historiales':
	    $per->get_by_id_historiales($_GET['id_historiales']);
		$per->form_modificar_historiales();
	break;
	case 'eliminar_historiales':
		$per->get_datos_eliminar_r($_POST);
		echo $per->get_tabla();


	break;
	case 'form_eliminar_historiales':
		$per->get_by_id_historiales($_GET['id_historiales']);
		$per->form_eliminar_historiales();

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