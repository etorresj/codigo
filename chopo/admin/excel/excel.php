<?php
ini_set('max_execution_time', 300);
ini_set('memory_limit','256M');

function convertExcelToNormalDate($date) 
{
  //$day_difference = 25568; //Day difference between 1 January 1900 to 1 January 1970
  //$day_to_seconds = 86400; // no. of seconds in a day
  //$unixtime = ($date - $day_difference) * $day_to_seconds;
  
  $ts = mktime(0,0,0,1,$date-1,1900);
  
  return date('Y-m-d', $ts);
}

function zip_extract($file, $extractPath) {

    $zip = new ZipArchive;
    $res = $zip->open($file);
    if ($res === TRUE) {
        $zip->extractTo($extractPath);
        $zip->close();
        return TRUE;
    } else {
        return FALSE;
    }

} 


if($_POST) {
 $encabezados = array();
  $correctos = true;
  $log_errores = array();
  $campos_obligatorios = array('email','numconsult','fecha inicio ciclo','fecha termino ciclo','fecha inicio franja','fecha final franja','red','numero ciclo');
  
$extension=end (explode(".", $_FILES['excel']['name']));
$nombre=explode(".", $_FILES['excel']['name']);
if($extension=="zip") {
	
zip_extract($_FILES['excel']['tmp_name'], "temp");
	
$prod="temp/".$nombre[0].".xls";//"ciclos.xls";

$max_cols = 8;
require_once 'Excel/reader.php';


// ExcelFile($filename, $encoding);
$data = new Spreadsheet_Excel_Reader();


// Set output Encoding.
$data->setOutputEncoding('CP1251');

/***
* if you want you can change 'iconv' to mb_convert_encoding:
* $data->setUTFEncoder('mb');
*
**/

/***
* By default rows & cols indeces start with 1
* For change initial index use:
* $data->setRowColOffset(0);
*
**/



/***
*  Some function for formatting output.
* $data->setDefaultFormat('%.2f');
* setDefaultFormat - set format for columns with unknown formatting
*
* $data->setColumnFormat(4, '%.3f');
* setColumnFormat - set format for column (apply only to number fields)
*
**/

$data->read($prod);

/*


 $data->sheets[0]['numRows'] - count rows
 $data->sheets[0]['numCols'] - count columns
 $data->sheets[0]['cells'][$i][$j] - data from $i-row $j-column

 $data->sheets[0]['cellsInfo'][$i][$j] - extended info about cell
    
    $data->sheets[0]['cellsInfo'][$i][$j]['type'] = "date" | "number" | "unknown"
        if 'type' == "unknown" - use 'raw' value, because  cell contain value with format '0.00';
    $data->sheets[0]['cellsInfo'][$i][$j]['raw'] = value if cell without format 
    $data->sheets[0]['cellsInfo'][$i][$j]['colspan'] 
    $data->sheets[0]['cellsInfo'][$i][$j]['rowspan'] 

*/
error_reporting(E_ALL ^ E_NOTICE);

   //print("<table>");
    //print("<thead>");
    //print("<tr>");
	
//Encabezados

	for ($j = 1; $j <= $max_cols; $j++) {
		
		$valor=$data->sheets[0]['cells'][1][$j];
		$encabezados[] = trim($valor);
      	//print("<td>" . $valor . "</td>");
		
	}



  foreach ( $campos_obligatorios as $valor ) {
      if ( !in_array($valor,$encabezados) ) {
        $correctos = false;
        $log_errores[] = "El documento no contiene el campo obligatorio: ".$valor."<br>";
		
        //break;
      }
    }
	
	//print("</tr>");
    //print("</thead>");
    //print("<tbody>");
	
//Terminamos encabezados
	$registros = array();
    $valores = array();

for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
	
	  //print("<tr>");
      $valores = array();
	
	for ($j = 1; $j <= $max_cols; $j++) {
		//echo "\"".$data->sheets[1]['cells'][$i][$j]."\",";
		if($j>=3&&$j<=6) 
		$valor=convertExcelToNormalDate($data->sheets[0]['cells'][$i][$j]);
		else
		$valor=$data->sheets[0]['cells'][$i][$j];
		$valores[] = (string)$valor;
        //print("<td>" . $valor . "</td>");
	
	}
 	$registros[] = $valores;
     //print("</tr>");
}
 //print("</tbody>");
    //print("</table>");

//todo ok
if($correctos) {
	print_r($registros);
}
else { //archivo no correcto 
foreach($log_errores as $values)
echo $values;
}

}
else
echo "Tipo de archivo no valido";
}
////print_r($data);
////print_r($data->formatRecords);
?>
<form action="" method="post" enctype="multipart/form-data"><input name="excel" type="file" />
  <input type="submit" name="button" id="button" value="Submit" />
</form>