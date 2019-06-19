<?php
session_start();
include_once('model/producto.php');    
include_once('model/Templete.php');

function handler() {
$pag= helper_pag_data();
$producto=new producto();
$template=new Template();//activacion de los diseños de bostrap//
$template->head();
switch ($pag) {
	case 'listar_producto':
         echo $producto->get_tabla();
	break;
	case 'registrar_producto':
		$producto->get_datos_producto($_POST);
		echo $producto->get_tabla();
	break;
	case 'form_nuevo_producto':
         $producto->form_nuevo_producto();
	break;
	case 'modificar_producto':
		$producto->get_datos_modificar_producto($_POST);
		echo $producto->get_tabla();
	break;
	case 'form_modificar_producto':
	    $producto->get_by_id_producto($_GET['id_producto']);
		$producto->form_modificar_producto();
	break;
	case 'eliminar_producto':
		$producto->get_datos_eliminar_p($_POST);
		echo $producto->get_tabla();

	break;
	case 'form_eliminar_producto':
		$producto->get_by_id_producto($_GET['id_producto']);
		$producto->form_eliminar_producto();

	break;
	case 'exportar_pdf':
		$producto->exportar_pdf();
	break;
	case 'exportar_excel':
		$producto->exportar_excel();
	break;
	case 'exportar_word':
		$producto->exportar_word();
	break;
	case 'buscar_producto':

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