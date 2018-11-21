<?php
function veeu($Etag, $jumlah, $wait){
    $x = 0; 
    while($x < $jumlah) {
		
		$body = 'Etag='.$Etag.'';
				
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://news.usa.cdn.cooktek.service.com/veeu.php");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Host: host:news.usa.cdn.cooktek.service.com","User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36"));
        $server_output = curl_exec ($ch);
        curl_close ($ch);
		echo $server_output."\n";
        sleep($wait);
        $x++;
        flush();
    }
}
print "TUYUL COIN APP VEEU\n\n";
echo "Etag?\nInput : ";
$Etag = trim(fgets(STDIN));
echo "Jumlah?\nInput : ";
$jumlah = trim(fgets(STDIN));
echo "Jeda? 0-9999999999 (ex:0)\nInput : ";
$wait = trim(fgets(STDIN));
$execute = veeu($Etag, $jumlah, $wait);
print $execute;
print "DONE ALL SEND\n";
?>