<?php
session_start();
include_once('model/detalles_procesos.php');    
include_once('model/Templete.php');

function handler() {
$pag= helper_pag_data();
$per=new detalles_procesos();
$template=new Template();//activacion de los diseños de bostrap//
$template->head();
switch ($pag) {
	case 'listar_detalles_procesos':
         echo $per->get_tabla();
	break;
	case 'registrar_detalles_procesos':
		$per->get_datos_detalles_procesos($_POST);
		echo $per->get_tabla();
	break;
	case 'form_nuevo_detalles_procesos':
         $per->form_nuevo_detalles_procesos();
	break;
	case 'modificar_detalles_procesos':
		$per->get_datos_modificar_detalles_procesos($_POST);
		echo $per->get_tabla();
	break;
	case 'form_modificar_detalles_procesos':
	    $per->get_by_id_detalles_procesos($_GET['id_detalles_procesos']);
		$per->form_modificar_detalles_procesos();
	break;
	case 'eliminar_detalles_procesos':
		$per->get_datos_eliminar_r($_POST);
		echo $per->get_tabla();


	break;
	case 'form_eliminar_detalles_procesos':
		$per->get_by_id_detalles_procesos($_GET['id_detalles_procesos']);
		$per->form_eliminar_detalles_procesos();

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