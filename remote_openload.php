$login = 'xxxxxxxxxxxxxxx'; // tu API Login de openload
$key = 'xxxxxxxxxxxxxxx';   // tu API key de openload
$urls = 'https://openload.co/f/xxxxxxxxxxxxx/'; //archivo a remotear

	$curl = curl_init();
	$opts = [
		CURLOPT_URL => 'https://api.openload.co/1/remotedl/add?login='.$login.'&key='.$key.'&url='.$url.'', //Enviamos la url
		CURLOPT_RETURNTRANSFER => true,
	];
	curl_setopt_array($curl, $opts);
	$response = json_decode(curl_exec($curl), true);
	
	echo '<pre>';
	print_r($response);//Visualización del json de retorno (para obtener información)
	echo '</pre>';
	
	$id = $response['result']['id'];
	
	$curl2 = curl_init();
	$opts = [
		CURLOPT_URL => 'https://api.openload.co/1/remotedl/status?login='.$login.'&key='.$key.'&limit=1&id='.$id.'', //recuperamos información de nuestra última carga remota (límite = 1)
		CURLOPT_RETURNTRANSFER => true,
	];
	curl_setopt_array($curl2, $opts);
	$response = json_decode(curl_exec($curl2), true);
	
	echo '<pre>';
	print_r($response);//Visualización del json de retorno (para obtener información)
	echo '</pre>';
	
	$lien = $response['result'][''.$id.'']['url'];
	
	echo $lien;
