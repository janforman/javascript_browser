<?php
require('password_protect.php');
header("Expires: 0");
if ($_GET['do'] != 'refresh')
{
header('Content-Encoding: gzip');
header('Content-type: application/json');
echo file_get_contents('scan.txt');
exit;
}

// refresh
$dir = "files";
$response = scan($dir);
function scan($dir){
	$files = array();
  global $c;
	if(file_exists($dir)){
		foreach(scandir($dir) as $f) {
			if(!$f || $f[0] == '.' || $f == 'Thumbs.db') {
				continue;
			}
			if(is_dir($dir . '/' . $f)) {
				$files[] = array(
					"name" => $f,
					"type" => "folder",
					"path" => $dir . '/' . $f,
					"items" => scan($dir . '/' . $f)
				);
			}
			else {
				$files[] = array(
					"name" => $f,
					"type" => "file",
					"path" => $dir . '/' . $f,
					"size" => filesize($dir . '/' . $f)
				);
        $c++;
			}
		}
	}
	return $files;
}
$txt = json_encode(array(
	"name" => $dir,
	"type" => "folder",
	"path" => $dir,
	"filenum" => $c,
	"items" => $response
));

$gzip_size = strlen($txt);
$gzip_final = "\x1f\x8b\x08\x00\x00\x00\x00\x00" . substr(gzcompress($txt, 6), 0, - 4). pack('V', crc32($txt)). pack('V', $gzip_size);
$fopen = fopen("scan.txt", "w") or die("Unable to open file!");
fwrite($fopen, $gzip_final);
fclose($fopen);
