<?php
session_start();
include_once('model/fecha_hora.php');    
include_once('model/Templete.php');

function handler() {
$pag= helper_pag_data();
$per=new fecha_hora();
$template=new Template();//activacion de los diseños de bostrap//
$template->head();
switch ($pag) {
	case 'listar_fecha_hora':
         echo $per->get_tabla();
	break;
	case 'registrar_fecha_hora':
		$per->get_datos_fecha_hora($_POST);
		echo $per->get_tabla();
	break;
	case 'form_nuevo_fecha_hora':
         $per->form_nuevo_fecha_hora();
	break;
	case 'modificar_fecha_hora':
		$per->get_datos_modificar_fecha_hora($_POST);
		echo $per->get_tabla();
	break;
	case 'form_modificar_fecha_hora':
	    $per->get_by_id_fecha_hora($_GET['id_fecha_hora']);
		$per->form_modificar_fecha_hora();
	break;
	case 'eliminar_fecha_hora':
		$per->get_datos_eliminar_r($_POST);
		echo $per->get_tabla();


	break;
	case 'form_eliminar_fecha_hora':
		$per->get_by_id_fecha_hora($_GET['id_fecha_hora']);
		$per->form_eliminar_fecha_hora();

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