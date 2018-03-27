 <?php 
error_reporting( ~E_DEPRECATED & ~E_NOTICE );

define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'Rel_Data_Banken');

$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

if ($conn== false) {
	die("ERROR:Could not connect to ". mysqli_connect_error());
}
echo "Connected succesfully. Host info: " . mysqli_get_host_info($conn);

 ?>