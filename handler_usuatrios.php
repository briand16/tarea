<?php
session_start();
include_once('model/usuario.php');    
include_once('model/Templete.php');

function handler() {
$pag= helper_pag_data();
$per=new usuario();
$template=new Template();//activacion de los diseños de bostrap//
$template->head();
switch ($pag) {
	case 'listar_usuario':
         echo $per->get_tabla();
	break;
	case 'registrar_usuario':
		$per->get_datos_usuario($_POST);
		echo $per->get_tabla();
	break;
	case 'form_nuevo_usuario':
         $per->form_nuevo_usuario();
	break;
	case 'modificar_usuario':
		$per->get_datos_modificar_usuario($_POST);
		echo $per->get_tabla();
	break;
	case 'form_modificar_usuario':
	    $per->get_by_id_usuario($_GET['id_usuario']);
		$per->form_modificar_usuario();
	break;
	case 'eliminar_usuario':
		$per->get_datos_eliminar_r($_POST);
		echo $per->get_tabla();


	break;
	case 'form_eliminar_usuario':
		$per->get_by_id_usuario($_GET['id_usuario']);
		$per->form_eliminar_usuario();

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