<?php
session_start();
include_once('model/abogados.php');    
include_once('model/Templete.php');

function handler() {
$pag= helper_pag_data();
$per=new abogados();
$template=new Template();//activacion de los diseños de bostrap//
$template->head();
switch ($pag) {
	case 'listar_abogados':
         echo $per->get_tabla();
	break;
	case 'registrar_abogados':
		$per->get_datos_abogados($_POST);
		echo $per->get_tabla();
	break;
	case 'form_nuevo_abogados':
         $per->form_nuevo_abogados();
	break;
	case 'modificar_abogados':
		$per->get_datos_modificar_abogados($_POST);
		echo $per->get_tabla();
	break;
	case 'form_modificar_abogados':
	    $per->get_by_id_abogados($_GET['id_abogados']);
		$per->form_modificar_abogados();
	break;
	case 'eliminar_abogados':
		$per->get_datos_eliminar_r($_POST);
		echo $per->get_tabla();


	break;
	case 'form_eliminar_abogados':
		$per->get_by_id_abogados($_GET['id_abogados']);
		$per->form_eliminar_abogados();

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