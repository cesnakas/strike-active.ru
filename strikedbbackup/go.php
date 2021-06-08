<?php 

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include ('dumper.php');

try {
	
	$date = date('Y_m_d_H_i_s');
	
	$dumper = Shuttle_Dumper::create(array(
		'host' => 'localhost',
		'username' => 'ogukst9k_st_0117',
		'password' => '2nMe94ls',
		'db_name' => 'ogukst9k_st_0117',
	));

	// dump the database to gzipped file
	$dumper->dump($date."_db.sql.gz");

	// dump the database to plain text file
	//$dumper->dump($date."_db.sql");
	
	echo "Бэкап выполнен успешно!<br>";

} catch(Shuttle_Exception $e) {
	echo "Couldn't dump database: " . $e->getMessage();
}

$number_of_files = 30;

$files = glob('*.gz');
$number_of_files_counter = count($files);
$number_of_files_real_counter = 0;

echo "<br>";
foreach($files as $file) {
    $file = pathinfo($file);
	$number_of_files_real_counter++;
	print_r($file);
	if ($number_of_files < $number_of_files_real_counter) {
		unlink($files[0]);
		echo "<br><br>";
		echo "Файл ".$files[0]." удален!";
	}
	echo "<br>";
}

echo "<br>Хранить ".$number_of_files." бэкапов";
echo "<br>Фактическое кол-во файлов бэкапов ".($number_of_files_counter - 1);