<?php
/**
 * KindEditor PHP
 *
 * The PHP program is a demo program, it is recommended not to use directly in the actual project.
 * Please see the relevant security settings directly if you decide to use the program before using.
 *
 */

require_once 'JSON.php';

$php_path = dirname(__FILE__) . '/';
$php_url = dirname($_SERVER['PHP_SELF']) . '/';

//Save the file directory path
$save_path = $php_path . '../../../attached/';
//File directory URL
$save_url = $php_url . '../../../attached/';
//Definition allows uploading file extensions
$ext_arr = array(
	'image' => array('gif', 'jpg', 'jpeg', 'png', 'bmp'),
	'flash' => array('swf', 'flv'),
	'media' => array('swf', 'flv', 'mp3', 'wav', 'wma', 'wmv', 'mid', 'avi', 'mpg', 'asf', 'rm', 'rmvb', 'mp4', 'webm', 'ogv', 'swf', 'flv'),
	'file' => array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'htm', 'html', 'txt', 'zip', 'rar', 'gz', 'bz2'),
);
//Maximum file size
$max_size = 10000000;

$save_path = realpath($save_path) . '/';

//PHP upload failed
if (!empty($_FILES['imgFile']['error'])) {
	switch($_FILES['imgFile']['error']){
		case '1':
			$error = 'Over php.ini allowable size.';
			break;
		case '2':
			$error = 'Over form allowable size.';
			break;
		case '3':
			$error = 'Picture was only partially uploaded.';
			break;
		case '4':
			$error = 'Please select a picture.';
			break;
		case '6':
			$error = 'Can not find a temporary directory.';
			break;
		case '7':
			$error = 'Write files to a hard drive failure.';
			break;
		case '8':
			$error = 'File upload stopped by extension。';
			break;
		case '999':
		default:
			$error = 'Unknown error.';
	}
	alert($error);
}

//When uploading files
if (empty($_FILES) === false) {
	//The original file name
	$file_name = $_FILES['imgFile']['name'];
	//A temporary file on the server name
	$tmp_name = $_FILES['imgFile']['tmp_name'];
	//File Size
	$file_size = $_FILES['imgFile']['size'];
	//Check the file name
	if (!$file_name) {
		alert("Please select a file.");
	}
	//Check the directory
	if (@is_dir($save_path) === false) {
		alert("Upload directory does not exist.");
	}
	//Check the directory write permission
	if (@is_writable($save_path) === false) {
		alert("does not have write permission.");
	}
	//Check whether uploaded
	if (@is_uploaded_file($tmp_name) === false) {
		alert("Upload failed.");
	}
	//Check the file size
	if ($file_size > $max_size) {
		alert("Upload file size exceeds the limit.");
	}
	//Check the directory name
	$dir_name = empty($_GET['dir']) ? 'image' : trim($_GET['dir']);
	if (empty($ext_arr[$dir_name])) {
		alert("Directory name is incorrect.");
	}
	//Get the file extension
	$temp_arr = explode(".", $file_name);
	$file_ext = array_pop($temp_arr);
	$file_ext = trim($file_ext);
	$file_ext = strtolower($file_ext);
	//Check extension
	if (in_array($file_ext, $ext_arr[$dir_name]) === false) {
		alert("Upload the file extension is not allowed extension.\nOnly allowed" . implode(",", $ext_arr[$dir_name]) . "Format.");
	}
	//Creating folders
	if ($dir_name !== '') {
		$save_path .= $dir_name . "/";
		$save_url .= $dir_name . "/";
		if (!file_exists($save_path)) {
			mkdir($save_path);
		}
	}
	$ymd = date("Ymd");
	$save_path .= $ymd . "/";
	$save_url .= $ymd . "/";
	if (!file_exists($save_path)) {
		mkdir($save_path);
	}
	//New file name
	$new_file_name = date("YmdHis") . '_' . rand(10000, 99999) . '.' . $file_ext;
	//Moving Files
	$file_path = $save_path . $new_file_name;
	if (move_uploaded_file($tmp_name, $file_path) === false) {
		alert("Upload file failed.");
	}
	@chmod($file_path, 0644);
	$file_url = $save_url . $new_file_name;

	header('Content-type: text/html; charset=UTF-8');
	$json = new Services_JSON();
	echo $json->encode(array('error' => 0, 'url' => $file_url));
	exit;
}

function alert($msg) {
	header('Content-type: text/html; charset=UTF-8');
	$json = new Services_JSON();
	echo $json->encode(array('error' => 1, 'message' => $msg));
	exit;
}
?>