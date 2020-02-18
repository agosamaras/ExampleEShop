<?php
session_start();
include("dbconnection.php");
require_once 'phplot.php'; //include the template code
$data = array(array('', 10), array('', 1));

//Define a class which extends PHPlot:
class my_phplot extends PHPlot 
{
  function __construct($width=800, $height=600, $out=NULL, $in=NULL)
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
$plot->SetPlotType('bars');
$plot->SetDataType('text-data');
//Define some data
$get_items = "SELECT name, inShop, orders  
			  FROM items "; 
			 // WHERE orders = (select max(orders) from items)";
$get_items_res = mysql_query($get_items,$link);
if (mysql_num_rows($get_items_res)<1)
{ //no available items
	echo "No available items right now. Sorry for your inconvenience.";
}
else
{ //show the available items
	$data=array();
	$shops=array();
	$leg=array();
	while($data_info = mysql_fetch_array($get_items_res))
	{
		
		$data_name = $data_info['name'];
		$data_shop = $data_info['inShop'];
		$data_orders = $data_info['orders'];
		$data[]=array($data_name, $data_orders, $data_shop);
		$shops[]=array($data_shop);
	}
	$data2=$data;
	//group by product
	for($i = 0, $size = count($data); $i < count($data); $i++)
	{
		for($j = 0; $j < $size; $j++)
		{
			if($data[$i][2]!=$data[$j][2] && $data[$i][0]==$data[$j][0])
			{
				array_push($data[$i], $data[$j][1]);
				unset($data[$j]);
			}
		}
	}
	//unset the the shop name for better connectivity
	for($i = 0, $size = count($data); $i < count($data); $i++) 
	{
		unset($data[$i][2]);
	}
	//uniqueness of legend
	for($i = 0, $size = count($shops); $i < count($shops); $i++)
	{
		for($j = 0; $j < count($shops); $j++)
		{
			if($shops[$i]==$shops[$j] && $i!=$j)
			{
				unset($shops[$j]);
			}
		}
	}
}
$plot->SetDataValues($data);

for($i = 0, $size = count($data); $i < $size; $i++)
{
	for($j = 0, $size = count($data2); $j < $size; $j++)
	{
		if($data[$i][0] == $data2[$j][0])
		{
			;
		}
	}
}

//Set titles
$plot->SetTitle("The most popular products\nat this moment");
$plot->SetXTitle('Products');
$plot->SetYTitle('Pieces sold');

//Customize the legend
//Each call to SetLegend makes one line as "label: value"
foreach ($shops as $row)
	$plot->SetLegend(implode(': ', $row));
$plot->SetLegendStyle('left', 'left');
$plot->SetLegendPixels(720, 50);

//Turn off X axis ticks and labels because they get in the way:
$plot->SetXTickLabelPos('none');
$plot->SetLineWidths(3);
$plot->SetDrawXGrid(False);
$plot->SetXTickPos('none');

//Customize plot appearance
$plot->TuneXAutoRange(1,'T');
$plot->SetYDataLabelPos('plotin');
$plot->SetImageBorderType('plain');
$plot->SetMarginsPixels(NULL,70);

//Draw it
$plot->DrawGraph();
?>
<html>
<head>
<title>PHPlot Example - Inline Image</title>
</head>
<body style="width: 90%; background-color: rgb(255, 204, 102); color: rgb(0, 0, 0);">
<center><h1><big><big style="font-weight: bold; font-style: italic; font-family: Times New Roman,Times,serif;">e-Coffee Shop Statistics</h1></center>
<!--<center><p>page subtitle</p></center>-->
<center><img src="<?php echo $plot->EncodeImage();?>" alt="Plot Image"></center>
</body>
</html>