<?php
$title='Plot';
$description='';  
include 'header3.php';
session_start();

include("dbconnection.php");
require_once 'phplot.php'; //include the template code
$data = array(array('', 10), array('', 1));

//Define a class which extends PHPlot:
class my_phplot extends PHPlot {
  function __construct($width=550, $height=400, $out=NULL, $in=NULL)
  {
    parent::__construct($width, $height, $out, $in);
    $this->SetFont('x_label', 4);
	$this->SetFont('y_label', 4);
	$this->SetFont('title', 5);
	$this->SetFont('legend', 3);
	$this->SetFont('x_title', 5);
	$this->SetFont('y_title', 5);
    $this->SetTitleColor('black');
  }
}
$plot = new my_phplot(); //create a new plot
$plot->SetPrintImage(False);  // Do not output the image
$plot->SetPlotType('pie');
$plot->SetDataType('text-data-single');
//Define some data
$shop_name=$_SESSION['$shop_name'];
$get_items = "SELECT name, orders  
			  FROM items  
			  WHERE inShop = '$shop_name'
			  ORDER by orders DESC LIMIT 20";
$get_items_res = mysql_query($get_items,$link);
if (mysql_num_rows($get_items_res)<1)
{ //no available items
	echo "No available items right now. Sorry for your inconvenience.";
}
else
{ //show the available items
$data=array();
$leg=array();
while($data_info = mysql_fetch_array($get_items_res))
	{
		$data_name = $data_info['name'];
		$data_orders = $data_info['orders'];
		$data[]=array($data_name, $data_orders);
		$leg[]=array("$data_name");
	}
$plot->SetDataValues($data);
}

//Set titles
$plot->SetTitle("Products relative sales\n(pieces sold)");
$plot->SetXTitle('Products');
$plot->SetYTitle('Pieces sold');

//Customize the legend
//Each call to SetLegend makes one line as "label: value"
foreach ($leg as $row)
	$plot->SetLegend(implode(': ', $row));
$plot->SetLegendStyle('left', 'left');

//Customize plot appearance
//$plot->TuneXAutoRange(1,'T');
//$plot->SetYDataLabelPos('plotin');
$plot->SetImageBorderType('plain');

//Draw it
$plot->DrawGraph();
?>

<div id="content">
<h1>Shop Statistics</h1>
<center><p><?php echo "<H2> Metrics for the shop " . $shop_name . "</H2>"; ?></p></center>
<!--<center><p>page subtitle</p></center>-->
<center><img src="<?php echo $plot->EncodeImage();?>" alt="Plot Image"></center>
<br>
<div id="button"><a href="plot2.php">Go back</a></div>
</div>
<?php include 'footer.php'; ?>