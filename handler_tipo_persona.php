<?php
session_start();
include_once('model/tipo_persona.php');    
include_once('model/Templete.php');

function handler() {
$pag= helper_pag_data();
$per=new id_tpersona();
$template=new Template();//activacion de los diseños de bostrap//
$template->head();
switch ($pag) {
	case 'listar_tpersona':
         echo $per->get_tabla();
	break;
	case 'registrar_tpersona':
		$per->get_datos_tpersona($_POST);
		echo $per->get_tabla();
	break;
	case 'form_nuevo_tpersona':
         $per->form_nuevo_tpersona();
	break;
	case 'modificar_tpersona':
		$per->get_datos_modificar_tpersona($_POST);
		echo $per->get_tabla();
	break;
	case 'form_modificar_tpersona':
	    $per->get_by_id_tpersona($_GET['id_tpersona']);
		$per->form_modificar_tpersona();
	break;
	case 'eliminar_tpersona':
		$per->get_datos_eliminar_r($_POST);
		echo $per->get_tabla();


	break;
	case 'form_eliminar_tpersona':
		$per->get_by_id_tpersona($_GET['id_tpersona']);
		$per->form_eliminar_tpersona();

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