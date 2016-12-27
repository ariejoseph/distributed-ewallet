<?php
/**
 * Step 1: Require the Slim Framework
 *
 * If you are not using Composer, you need to require the
 * Slim Framework and register its PSR-0 autoloader.
 *
 * If you are using Composer, you can skip this step.
 */
require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

/**
 * Step 2: Instantiate a Slim application
 *
 * This example instantiates a Slim application using
 * its default settings. However, you will usually configure
 * your Slim application now by passing an associative array
 * of setting names and values into the application constructor.
 */
$app = new \Slim\Slim();

/**
 * Step 3: Define the Slim application routes
 *
 * Here we define several Slim application routes that respond
 * to appropriate HTTP request methods. In this example, the second
 * argument for `Slim::get`, `Slim::post`, `Slim::put`, `Slim::patch`, and `Slim::delete`
 * is an anonymous function.
 */

// GET route
$app->get(
    '/',
    function () {
        $template = <<<EOT
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8"/>
            <title>Slim Framework for PHP 5 - ewallet</title>
            <style>
                html,body,div,span,object,iframe,
                h1,h2,h3,h4,h5,h6,p,blockquote,pre,
                abbr,address,cite,code,
                del,dfn,em,img,ins,kbd,q,samp,
                small,strong,sub,sup,var,
                b,i,
                dl,dt,dd,ol,ul,li,
                fieldset,form,label,legend,
                table,caption,tbody,tfoot,thead,tr,th,td,
                article,aside,canvas,details,figcaption,figure,
                footer,header,hgroup,menu,nav,section,summary,
                time,mark,audio,video{margin:0;padding:0;border:0;outline:0;font-size:100%;vertical-align:baseline;background:transparent;}
                body{line-height:1;}
                article,aside,details,figcaption,figure,
                footer,header,hgroup,menu,nav,section{display:block;}
                nav ul{list-style:none;}
                blockquote,q{quotes:none;}
                blockquote:before,blockquote:after,
                q:before,q:after{content:'';content:none;}
                a{margin:0;padding:0;font-size:100%;vertical-align:baseline;background:transparent;}
                ins{background-color:#ff9;color:#000;text-decoration:none;}
                mark{background-color:#ff9;color:#000;font-style:italic;font-weight:bold;}
                del{text-decoration:line-through;}
                abbr[title],dfn[title]{border-bottom:1px dotted;cursor:help;}
                table{border-collapse:collapse;border-spacing:0;}
                hr{display:block;height:1px;border:0;border-top:1px solid #cccccc;margin:1em 0;padding:0;}
                input,select{vertical-align:middle;}
                html{ background: #EDEDED; height: 100%; }
                body{background:#FFF;margin:0 auto;min-height:100%;padding:0 30px;width:440px;color:#666;font:14px/23px Arial,Verdana,sans-serif;}
                h1,h2,h3,p,ul,ol,form,section{margin:0 0 20px 0;}
                h1{color:#333;font-size:20px;}
                h2,h3{color:#333;font-size:14px;}
                h3{margin:0;font-size:12px;font-weight:bold;}
                ul,ol{list-style-position:inside;color:#999;}
                ul{list-style-type:square;}
                code,kbd{background:#EEE;border:1px solid #DDD;border:1px solid #DDD;border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;padding:0 4px;color:#666;font-size:12px;}
                pre{background:#EEE;border:1px solid #DDD;border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;padding:5px 10px;color:#666;font-size:12px;}
                pre code{background:transparent;border:none;padding:0;}
                a{color:#70a23e;}
                header{padding: 30px 0;text-align:center;}
            </style>
        </head>
        <body>
            <header>
                <a href="http://www.slimframework.com"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHIAAAA6CAYAAABs1g18AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAABRhJREFUeNrsXY+VsjAMR98twAo6Ao4gI+gIOIKOgCPICDoCjCAjXFdgha+5C3dcv/QfFB5i8h5PD21Bfk3yS9L2VpGnlGW5kS9wJMTHNRxpmjYRy6SycgRvL18OeMQOTYQ8HvIoJKiiz43hgHkq1zvK/h6e/TyJQXeV/VyWBOSHA4C5RvtMAiCc4ZB9FPjgRI8+YuKcrySO515a1hoAY3nc4G2AH52BZsn+MjaAEwIJICKAIR889HljMCcyrR0QE4v/q/BVBQva7Q1tAczG18+x+PvIswHEAslLbfGrMZKiXEOMAMy6LwlisQCJLPFMfKdBtli5dIihRyH7A627Iaiq5sJ1ThP9xoIgSdWSNVIHYmrTQgOgRyRNqm/M5PnrFFopr3F6B41cd8whRUSufUBU5EL4U93AYRnIWimCIiSI1wAaAZpJ9bPnxx8eyI3Gt4QybwWa6T/BvbQECUMQFkhd3jSkPFgrxwcynuBaNT/u6eJIlbGOBWSNIUDFEIwPZFAtBfYrfeIOSRSXuUYCsprCXwUIZWYnmEhJFMIocMDWjn206c2EsGLCJd42aWSyBNMnHxLEq7niMrY2qyDbQUbqrrTbwUPtxN1ZZCitQV4ZSd6DyoxhmRD6OFjuRUS/KdLGRHYowJZaqYgjt9Lchmi3QYA/cXBsHK6VfWNR5jgA1DLhwfFe4HqfODBpINEECCLO47LT/+HSvSd/OCOgQ8qE0DbHQUBqpC4BkKMPYPkFY4iAJXhGAYr1qmaqQDbECCg5A2NMchzR567aA4xcRKclI405Bmt46vYD7/Gcjqfk6GP/kh1wovIDSHDfiAs/8bOCQ4cf4qMt7eH5Cucr3S0aWGFfjdLHD8EhCFvXQlSqRrY5UV2O9cfZtk77jUFMXeqzCEZqSK4ICkSin2tE12/3rbVcE41OBjBjBPSdJ1N5lfYQpIuhr8axnyIy5KvXmkYnw8VbcwtTNj7fDNCmT2kPQXA+bxpEXkB21HlnSQq0gD67jnfh5KavVJa/XQYEFSaagWwbgjNA+ywstLpEWTKgc5gwVpsyO1bTII+tA6B7BPS+0PiznuM9gPKsPVXbFdADMtwbJxSmkXWfRh6AZhyyzBjIHoDmnCGaMZAKjd5hyNJYCBGDOVcg28AXQ5atAVDO3c4dSALQnYblfa3M4kc/cyA7gMIUBQCTyl4kugIpy8yA7ACqK8Uwk30lIFGOEV3rPDAELwQkr/9YjkaCPDQhCcsrAYlF1v8W8jAEYeQDY7qn6tNGWudfq+YUEr6uq6FZzBpJMUfWFDatLHMCciw2mRC+k81qCCA1DzK4aUVfrJpxnloZWCPVnOgYy8L3GvKjE96HpweQoy7iwVQclVutLOEKJxA8gaRCjSzgNI2zhh3bQhzBCQQPIHGaHaUd96GJbZz3Smmjy16u6j3FuKyNxcBarxqWWfYFE0tVVO1Rl3t1Mb05V00MQCJ71YHpNaMcsjWAfkQvPPkaNC7LqTG7JAhGXTKYf+VDeXAX9IvURoAwtTFHvyYIxtnd5tPkywrPafcwbeSuGVwFau3b76NO7SHQrvqhfFE8kM0Wvpv8gVYiYBlxL+fW/34bgP6bIC7JR7YPDubcHCPzIp4+cum7U6NlhZgK7lua3KGLeFwE2m+HblDYWSHG2SAfINuwBBfxbJEIuWZbBH4fAExD7cvaGVyXyH0dhiAYc92z3ZDfUVv+jgb8HrHy7WVO/8BFcy9vuTz+nwADAGnOR39Yg/QkAAAAAElFTkSuQmCC" alt="Slim"/></a>
            </header>
            <h1>Welcome to Slim!</h1>
            <p>
                Congratulations! Your Slim application is running. If this is
                your first time using Slim, start with this <a href="http://docs.slimframework.com/#Hello-World" target="_blank">"Hello World" Tutorial</a>.
            </p>
            <section>
                <h2>Get Started</h2>
                <ol>
                    <li>The application code is in <code>index.php</code></li>
                    <li>Read the <a href="http://docs.slimframework.com/" target="_blank">online documentation</a></li>
                    <li>Follow <a href="http://www.twitter.com/slimphp" target="_blank">@slimphp</a> on Twitter</li>
                </ol>
            </section>
            <section>
                <h2>Slim Framework Community</h2>

                <h3>Support Forum and Knowledge Base</h3>
                <p>
                    Visit the <a href="http://help.slimframework.com" target="_blank">Slim support forum and knowledge base</a>
                    to read announcements, chat with fellow Slim users, ask questions, help others, or show off your cool
                    Slim Framework apps.
                </p>

                <h3>Twitter</h3>
                <p>
                    Follow <a href="http://www.twitter.com/slimphp" target="_blank">@slimphp</a> on Twitter to receive the very latest news
                    and updates about the framework.
                </p>
            </section>
            <section style="padding-bottom: 20px">
                <h2>Slim Framework Extras</h2>
                <p>
                    Custom View classes for Smarty, Twig, Mustache, and other template
                    frameworks are available online in a separate repository.
                </p>
                <p><a href="https://github.com/codeguy/Slim-Extras" target="_blank">Browse the Extras Repository</a></p>
            </section>
        </body>
    </html>
EOT;
        echo $template;
    }
);

// POST route
$app->post(
    '/post',
    function () {
        echo 'This is a POST route';
    }
);

// PUT route
$app->put(
    '/put',
    function () {
        echo 'This is a PUT route';
    }
);

// PATCH route
$app->patch('/patch', function () {
    echo 'This is a PATCH route';
});

// DELETE route
$app->delete(
    '/delete',
    function () {
        echo 'This is a DELETE route';
    }
);

function connect_db() {
	$server = 'localhost'; // this may be an ip address instead
	$user = 'root';
	$pass = 'ariejoseph';
	$database = 'sisdis';
	$connection = new mysqli($server, $user, $pass, $database);

	return $connection;
}

$app->post('/ping', 'testPing');

$app->post('/quorum', 'pingAll');

$app->post('/healthCheck', 'getActiveQuorum');

$app->post('/register', function() use($app) {
	$data = $app->request->getBody();
	$json = json_decode($data);
	$npm = $json->user_id;//$_POST['user_id'];
	$nama = $json->nama;//$_POST['nama'];
	$ip = $json->ip_domisili;//$_POST['ip_domisili'];
	$quorum = pingAll();
	if($quorum >= 5) {
		register($npm, $nama, $ip);
	}
});

$app->post('/getSaldo', function() use($app) {
	$data = $app->request->getBody();
	$json = json_decode($data);
	$npm = $json->user_id;//$_POST['user_id'];
	$quorum = pingAll();
	if($quorum >= 5) {
		getSaldo($npm);
	}
});

$app->post('/getTotalSaldo', function() use($app) {
	$data = $app->request->getBody();
	$json = json_decode($data);
	$npm = $json->user_id;//$_POST['user_id'];
	$quorum = pingAll();
	if($quorum == 8) {
		getTotalSaldo($npm);
	}
});

$app->post('/transfer', function() use($app) {
	$data = $app->request->getBody();
	$json = json_decode($data);
	$npm = $json->user_id;//$_POST['user_id'];
	$jumlah_uang = $json->nilai;//$_POST['nilai'];
	$quorum = pingAll();
	if($quorum >= 5) {
		getTransferred($npm, $jumlah_uang);
	}
});

$app->post('/transferTo', function() use($app) {
	$data = $app->request->getBody();
	$json = json_decode($data);
	$npm = $json->user_id;//$_POST['user_id'];
	$jumlah_uang = $json->nilai;//$_POST['nilai'];
	$ip_tujuan = $json->ip_tujuan;//$_POST['ip_tujuan'];
	$quorum = pingAll();
	if($quorum >= 5) {
		doTransfer($npm, $jumlah_uang, $ip_tujuan);
	}
});

$activeQuorum = array();
$listIP = array(
	"152.118.33.95" => "https://joseph.sisdis.ui.ac.id/",
	"152.118.33.96" => "https://saga.sisdis.ui.ac.id/",
	"152.118.33.97" => "https://halim.sisdis.ui.ac.id/",
	"152.118.33.99" => "https://wijaya.sisdis.ui.ac.id/",
	"152.118.33.76" => "https://raditya.sisdis.ui.ac.id/",
	"152.118.33.71" => "https://nindyatama.sisdis.ui.ac.id/",
	"152.118.33.85" => "https://wicaksono.sisdis.ui.ac.id/",
	"152.118.33.104" => "https://gylberth.sisdis.ui.ac.id/",
	);

function getDomainName($ip) {
	global $listIP;
	return $listIP[$ip];
}

function getActiveQuorum() {
	$app = \Slim\Slim::getInstance();
	pingAll();
	global $activeQuorum;
	$output = array();
	foreach ($activeQuorum as $pong) {
		if($pong == "192.168.75.95/ewallet/ping") {
			array_push($output, "152.118.33.95");
		} else if($pong == "192.168.75.96/ewallet/ping") {
			array_push($output, "152.118.33.96");
		} else if($pong == "192.168.75.97/ewallet/ping") {
			array_push($output, "152.118.33.97");
		} else if($pong == "192.168.75.99/ewallet/ping") {
			array_push($output, "152.118.33.99");
		} else if($pong == "192.168.75.76/ewallet/ping") {
			array_push($output, "152.118.33.76");
		} else if($pong == "192.168.75.71/ewallet/ping") {
			array_push($output, "152.118.33.71");
		} else if($pong == "192.168.75.85/ewallet/ping") {
			array_push($output, "152.118.33.85");
		} else if($pong == "192.168.75.104/ewallet/ping") {
			array_push($output, "152.118.33.104");
		}
	}
	$app->response()->headers->set('Content-Type', 'application/json');
	echo json_encode($output);
	$activeQuorum = array();
}

function pingAll() {
	$app = \Slim\Slim::getInstance();
	global $activeQuorum;
	$quorum = 0;
	$self_ping = FALSE;

	$listEndPoint = array("192.168.75.95/ewallet/ping",
						"192.168.75.76/ewallet/ping",
						"192.168.75.96/ewallet/ping",
						"192.168.75.97/ewallet/ping",
						"192.168.75.99/ewallet/ping",
						"192.168.75.71/ewallet/ping",
						"192.168.75.85/ewallet/ping",
						"192.168.75.104/ewallet/ping");

	foreach($listEndPoint as $url) {
		$ch = curl_init($url);
		curl_setopt( $ch, CURLOPT_POST, 1);
		curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt( $ch, CURLOPT_HEADER, 0);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);
		if($response) {
			$respon_ping = json_decode($response);
			$quorum += $respon_ping->pong;
			if($url == "192.168.75.95/ewallet/ping") {
				$self_ping = TRUE;
			}
			array_push($activeQuorum, $url);
		}
	}
	if($self_ping) {
		return $quorum;
	} else {
		return 0;
	}
}

function testPing() {
	$app = \Slim\Slim::getInstance();
	$output = array();
	$output = array("pong" => 1);
	$app->response()->headers->set('Content-Type', 'application/json');
	echo json_encode($output);
}

function register($npm, $nama, $ip) {
	$app = \Slim\Slim::getInstance();
	$output = array();
	$saldo = 0;

	$conn = connect_db();
	if($ip == "152.118.33.95") {
		$saldo = 1000000;
	}
	$insert_query = "INSERT INTO nasabah (user_id, nama, saldo, IP_domisili) VALUES ('$npm', '$nama', '$saldo', '$ip')";
	if(mysqli_query($conn, $insert_query)) {
		$output = array("success" => 1);
	} else {
		$output = array("success" => 0);
	}

	$app->response()->headers->set('Content-Type', 'application/json');
	echo json_encode($output);
}

function getSaldo($npm) {
	$app = \Slim\Slim::getInstance();
	$output = array();

	$conn = connect_db();
	$query = "SELECT * from nasabah where user_id = $npm";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	$row_count = mysqli_num_rows($result);
	if($row_count == 1) {
		$output = array("nilai_saldo" => (int)$row['saldo'], "pemilik" => $row['nama']);
	} else {
		$output = array("nilai_saldo" => -1, "pemilik" => "user tidak terdaftar");
	}
	
	$app->response()->headers->set('Content-Type', 'application/json');
	echo json_encode($output);
}

function getTotalSaldo($npm) {
	$app = \Slim\Slim::getInstance();
	$output = array();
	$saldo = 0;

	$conn = connect_db();
	$query = "SELECT * from nasabah where user_id = $npm";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	$saldo += $row['saldo'];
	$ip_domisili = $row['IP_domisili'];

	$listEndPoint = array("https://raditya.sisdis.ui.ac.id/ewallet/getSaldo",
						"https://saga.sisdis.ui.ac.id/ewallet/getSaldo",
						"https://halim.sisdis.ui.ac.id/ewallet/getSaldo",
						"https://nindyatama.sisdis.ui.ac.id/ewallet/getSaldo",
						"https://wicaksono.sisdis.ui.ac.id/ewallet/getSaldo",
						"https://gylberth.sisdis.ui.ac.id/ewallet/getSaldo",
						"https://wijaya.sisdis.ui.ac.id/ewallet/getSaldo");

	if($ip_domisili == "152.118.33.95") {
		$args = array('user_id' => $npm);
		foreach($listEndPoint as $url) {
			$ch = curl_init($url);
			curl_setopt( $ch, CURLOPT_POST, 1);
			curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($args));
			curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt( $ch, CURLOPT_HEADER, 0);
			curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type : application/json'));
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
			$response = curl_exec($ch);
			$respon_getSaldo = json_decode($response);
			try {
				$saldoLuar = $respon_getSaldo->nilai_saldo;
			} catch (Exception $e) {
				$saldoLuar = $respon_getSaldo['nilai_saldo'];
			}
			if($saldoLuar != -1) {
				$saldo += $saldoLuar;
			}
		}
	} else {
		$url = getDomainName($ip_domisili)."/ewallet/getTotalSaldo";
		$ch = curl_init($url);
		$args = array('user_id' => $npm);
		curl_setopt( $ch, CURLOPT_POST, 1);
		curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($args));
		curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt( $ch, CURLOPT_HEADER, 0);
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type : application/json'));
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);
		$respon_getSaldo = json_decode($response);
	}
	$output = array("nilai_saldo" => (int)$saldo);
	$app->response()->headers->set('Content-Type', 'application/json');
	echo json_encode($output);
}

function doTransfer($npm, $jumlah_uang, $ip_tujuan) {
	$app = \Slim\Slim::getInstance();
	$output = array();

	// retrieve data dari server (penerima)
	$url = getDomainName($ip_tujuan)."/ewallet/getSaldo";
	$ch = curl_init();
	$args = array('user_id' => $npm);
	curl_setopt_array($ch, array(
	  CURLOPT_SSL_VERIFYPEER => FALSE,
	  CURLOPT_RETURNTRANSFER => TRUE,
	  CURLOPT_URL => $url,
	  CURLOPT_POSTFIELDS => json_encode($args),
	));
	$response = curl_exec($ch);
	$jsonsaldo = json_decode($response);
	try {
		$saldoPenerima = $jsonsaldo->nilai_saldo;
	} catch (Exception $e) {
		$saldoPenerima = $jsonsaldo['nilai_saldo'];
	}

	// retrieve data dari client (pengirim)
	$conn = connect_db();
	$query = "SELECT * from nasabah where user_id = $npm";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	$row_count = mysqli_num_rows($result);

	$saldo = $row['saldo'];
	$nama = $row['nama'];
	$ip = $row['IP_domisili'];

	if($saldoPenerima == -1) { // user belum terdaftar di server penerima, register dulu
		$url = getDomainName($ip_tujuan)."/ewallet/register";
		$ch = curl_init();
		$args = array('user_id' => $npm, 'nama' => $nama, 'ip_domisili' => $ip);
		curl_setopt_array($ch, array(
		  CURLOPT_SSL_VERIFYPEER => FALSE,
		  CURLOPT_RETURNTRANSFER => TRUE,
		  CURLOPT_URL => $url,
		  CURLOPT_POSTFIELDS => json_encode($args),
		));
		$response = curl_exec($ch);
	}

	// sisi pengirim, tembak transfer ke sisi penerima lalu kurangi saldo pengirim
	if($saldo > $jumlah_uang) { // user terdaftar & uang cukup
		$url = getDomainName($ip_tujuan)."/ewallet/transfer";
		$ch = curl_init($url);
		$args = array('user_id' => $npm, 'nilai' => $jumlah_uang);
		curl_setopt( $ch, CURLOPT_POST, 1);
		curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($args));
		curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt( $ch, CURLOPT_HEADER, 0);
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type : application/json'));
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);
		$respon_transfer = json_decode($response);
		try {
			$status_transfer = $respon_transfer->status_transfer;
		} catch (Exception $e) {
			$status_transfer = $respon_transfer['status_transfer'];
		}

		// berhasil trf, saldo telah bertambah di server penerima, kurangi saldo pengirim
		if($status_transfer == 0) {
			$conn = connect_db();
			$current_saldo = $saldo - $jumlah_uang;
			$update_query = "UPDATE nasabah set saldo = $current_saldo where user_id = $npm";
			mysqli_query($conn, $update_query);
			$output = array("status_transfer" => 0);
		} else { // gagal trf
			$output = array("status_transfer" => -1);
		}
	} else { // saldo tidak cukup
		$output = array("status_transfer" => -1);
	}
	$app->response()->headers->set('Content-Type', 'application/json');
	echo json_encode($output);
}

function getTransferred($npm, $jumlah_uang) {
	$app = \Slim\Slim::getInstance();
	$output = array();

	$conn = connect_db();
	$query = "SELECT * from nasabah where user_id = $npm";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	$row_count = mysqli_num_rows($result);
	$saldo = $row['saldo'];
	
	if($row_count == 0)  { // user tidak terdaftar
		$output = array("status_transfer" => -1);
	} else {
		$conn = connect_db();
		$current_saldo = $saldo + $jumlah_uang;
		$update_query = "UPDATE nasabah set saldo = $current_saldo where user_id = $npm";
		if(mysqli_query($conn, $update_query)) {
			$output = array("status_transfer" => 0);
		} else {
			$output = array("status_transfer" => -1);
		}
	}

	$app->response()->headers->set('Content-Type', 'application/json');
	echo json_encode($output);
}

/**
 * Step 4: Run the Slim application
 *
 * This method should be called last. This executes the Slim application
 * and returns the HTTP response to the HTTP client.
 */
$app->run();
