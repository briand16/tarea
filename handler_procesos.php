<?php
session_start();
include_once('model/procesos.php');    
include_once('model/Templete.php');

function handler() {
$pag= helper_pag_data();
$per=new procesos();
$template=new Template();//activacion de los diseños de bostrap//
$template->head();
switch ($pag) {
	case 'listar_procesos':
         echo $per->get_tabla();
	break;
	case 'registrar_procesos':
		$per->get_datos_procesos($_POST);
		echo $per->get_tabla();
	break;
	case 'form_nuevo_procesos':
         $per->form_nuevo_procesos();
	break;
	case 'modificar_procesos':
		$per->get_datos_modificar_procesos($_POST);
		echo $per->get_tabla();
	break;
	case 'form_modificar_procesos':
	    $per->get_by_id_procesos($_GET['id_procesos']);
		$per->form_modificar_procesos();
	break;
	case 'eliminar_procesos':
		$per->get_datos_eliminar_r($_POST);
		echo $per->get_tabla();


	break;
	case 'form_eliminar_procesos':
		$per->get_by_id_procesos($_GET['id_procesos']);
		$per->form_eliminar_procesos();

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