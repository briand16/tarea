<?php
session_start();
include_once('model/estado.php');    
include_once('model/Templete.php');

function handler() {
$pag= helper_pag_data();
$per=new estado();
$template=new Template();//activacion de los diseños de bostrap//
$template->head();
switch ($pag) {
	case 'listar_estado':
         echo $per->get_tabla();
	break;
	case 'registrar_estado':
		$per->get_datos_estado($_POST);
		echo $per->get_tabla();
	break;
	case 'form_nuevo_estado':
         $per->form_nuevo_estado();
	break;
	case 'modificar_estado':
		$per->get_datos_modificar_estado($_POST);
		echo $per->get_tabla();
	break;
	case 'form_modificar_estado':
	    $per->get_by_id_estado($_GET['id_estado']);
		$per->form_modificar_estado();
	break;
	case 'eliminar_estado':
		$per->get_datos_eliminar_r($_POST);
		echo $per->get_tabla();


	break;
	case 'form_eliminar_estado':
		$per->get_by_id_estado($_GET['id_estado']);
		$per->form_eliminar_estado();

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