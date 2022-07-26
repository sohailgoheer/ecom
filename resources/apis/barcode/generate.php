<?php

require "vendor/autoload.php";
 

$Bar = new Picqer\Barcode\BarcodeGeneratorHTML();
$code = $Bar->getBarcode($_GET['text'], $Bar::TYPE_CODE_128);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Generate Bar Codes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js" ></script>
    <style>
        
		
		
		
@media print
{
body * { visibility: hidden; }
#previewImage * { visibility: visible; }
#previewImage { position: absolute; top: 40px; left: 30px; }
}
		
 
    </style>

</head>
<body>
     
<div style="width:10vw;" id="imageDIV">
<p>Goheer Online</p>
<h3><?php echo $code ?></h3> 
<p><?php echo $_GET['text']; ?></p >
</div>
     
	
	<br/> 
	 
	<div id="download" ></div>
	<hr/>
	<h5> click on below barcode to print</h3>
	<div style="border-style: dotted; width:10vw; cursor: pointer;">
		
	 <div id="previewImage" onclick="window.print()"> </div> 
	</div>
	
</body>
	<script>
	 var element = $("#imageDIV"); // global variable
var getCanvas; // global variable
$('document').ready(function(){
  html2canvas(element, {
    onrendered: function (canvas) {
      $("#previewImage").append(canvas);
      getCanvas = canvas;
    }
  });
});
$("#download").on('click', function () {
  var imgageData = getCanvas.toDataURL("image/png");
  // Now browser starts downloading it instead of just showing it
  var newData = imageData.replace(/^data:image\/png/, "data:application/octet-stream");
  $("#download").attr("download", "image.png").attr("href", newData);
});





function printDiv() 
{

  var divToPrint=document.getElementById('DivIdToPrint');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);

}


	</script>
</html>
