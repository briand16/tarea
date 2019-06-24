<?php
session_start();
include_once('model/usuario.php');    
include_once('model/Templete.php');

function handler() {
$pag= helper_pag_data();
$per=new usuarios();
$template=new Template();//activacion de los diseños de bostrap//
$template->head();
switch ($pag) {
	case 'listar_usuarios':
         echo $per->get_tabla();
	break;
	case 'registrar_usuarios':
		$per->get_datos_usuarios($_POST);
		echo $per->get_tabla();
	break;
	case 'form_nuevo_usuarios':
         $per->form_nuevo_usuarios();
	break;
	case 'modificar_usuarios':
		$per->get_datos_modificar_usuarios($_POST);
		echo $per->get_tabla();
	break;
	case 'form_modificar_usuarios':
	    $per->get_by_id_usuarios($_GET['id_usuarios']);
		$per->form_modificar_usuarios();
	break;
	case 'eliminar_usuarios':
		$per->get_datos_eliminar_r($_POST);
		echo $per->get_tabla();


	break;
	case 'form_eliminar_usuarios':
		$per->get_by_id_usuarios($_GET['id_usuarios']);
		$per->form_eliminar_usuarios();

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