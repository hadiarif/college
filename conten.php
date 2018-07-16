<?php

switch ($_REQUEST['page']) {
	case 'daftar':
		include "modul/daftar.php";
		break;
	case 'jurusan':
		include "modul/jurusan.php";
		break;
	case 'jalur':
		include "modul/jalur.php";
		break;
	case 'home':
		include "modul/home.php";
		break;
	default:
		include "modul/home.php";
		break;
}


?>