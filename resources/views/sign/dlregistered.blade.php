
@php
// How to Generate CSV File from Array in PHP Script


$bdd = new PDO('mysql:host=localhost;dbname=bde','root','');


$results = $bdd->query('SELECT COUNT(*) AS users');



$filename = 'Registered.csv';
header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=$filename");
$output = fopen("php://output", "w");
$header = array_keys($results[0]);
fputcsv($output, $header);
foreach($results as $row)
{
    fputcsv($output, $row);
}
fclose($output);


@endphp