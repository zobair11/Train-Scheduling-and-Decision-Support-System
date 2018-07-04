
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Train Scheduling System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Gretong Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<script src="js/amcharts.js"></script>	
<script src="js/serial.js"></script>	
<script src="js/light.js"></script>	
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
   <!--pie-chart--->
<script src="js/pie-chart.js" type="text/javascript"></script>
 <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#3bb2d0',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#fbb03b',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ed6498',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

           
        });

    </script>
</head> 
<body>
   <div class="page-container">
   <!--/content-inner-->
	<div class="left-content">
	   <div class="inner-content">
		<!-- header-starts -->
			<div class="header-section">
			<!-- top_bg -->
						
					<div class="clearfix"></div>
				<!-- /top_bg -->
				</div>
				<div class="header_bg">
						
							<div class="header">
								<div class="head-t">
									<div class="logo">
										<h1> Train Scheduling System </h1> 
										<a href='crossing_detection2.php'> <h2> Next  </h2> </a> 
									</div>
										<!-- start header_right -->
								<div class="clearfix"> </div>
							</div>
						</div>
					
				</div>
					<!-- //header-ends -->
				
				<!--content-->
			<div class="content">
					<div class="monthly-grid">
						<div class="panel panel-widget">
							<div class="panel-title">
							  <div class="col-md-">
						<div class="panel panel-widget">
						<div class="tables">
							<h4>Train Crossing Point Detection</h4>
					

<?php
function waiting_time_sum($id,$tt,$t){

include"conn.php"; 
if($t==0){ $sel_query5="select SUM(waiting_time) as t1 from real_time_pos WHERE train_id='$id' AND station_location<$tt"; }
else { $sel_query5="select SUM(waiting_time) as t1 from real_time_pos WHERE train_id='$id' AND station_location>$tt";  }

  $result5=mysql_query($sel_query5);
    while($row5=mysql_fetch_array($result5)){
	   $t1=$row5['t1'];
	  
	   return $t1;


}
}


function waiting_time_sum_v($id,$tt,$t){
$str="0 + ";
$last=0;
include"conn.php"; 
if($t==0){ $sel_query5="select waiting_time as t1 from real_time_pos WHERE train_id='$id' AND station_location<$tt";   }
else{  $sel_query5="select waiting_time as t1 from real_time_pos WHERE train_id='$id' AND station_location>$tt";  }

  $result5=mysql_query($sel_query5);
    while($row5=mysql_fetch_array($result5)){
	   $t1=$row5['t1'];
	  
	   $str=$str." $t1 + ";
$last=$t1;

}
return $str=$str."................+ $last";
}


function id_to_info($id){

include"conn.php"; 
$sel_query5="select * from station_location WHERE id='$id'";
  $result5=mysql_query($sel_query5);
    while($row5=mysql_fetch_array($result5)){
	   $lat=$row5['lat'];
	   $lon=$row5['lon'];
	   $station_name=$row5['station_name'];
	   $alternative_line=$row5['alternative_line'];
	   $station_code=$row5['station_code'];
	   $ret=$lat."-".$lon."-".$station_name."-".$alternative_line."-".$station_code;
	   return $ret;


}
}



global $to_sort;

//////////////////////
	 getTimeDiff("11:30","11:10");

echo "<hr>";

function getTimeDiff($dtime,$atime)
    {
        $nextDay = $dtime>$atime?0:0;
        $dep = explode(':',$dtime);
        $arr = explode(':',$atime);
        $diff = abs(mktime($dep[0],$dep[1],0,date('n'),date('j'),date('y'))-mktime($arr[0],$arr[1],0,date('n'),date('j')+$nextDay,date('y')));
        $hours = floor($diff/(60*60));
        $mins = floor(($diff-($hours*60*60))/(60));
        $secs = floor(($diff-(($hours*60*60)+($mins*60))));
        if(strlen($hours)<2){$hours="0".$hours;}
        if(strlen($mins)<2){$mins="0".$mins;}
        if(strlen($secs)<2){$secs="0".$secs;}
        return $hours.':'.$mins.':'.$secs;
    }



/////////////
function verify($id){

include"conn.php"; 

$sel_query5="select * from real_time_pos WHERE station_location='$id'";
  $result5=mysql_query($sel_query5);
  $re=mysql_num_rows($result5);
	if($re){ return 1;} else{ return 0;}
	 }



///////////////////////

function diff_calc($id){
global $array;

   
include"conn.php"; 
$int=999;
$get=0;
$sel_query5="select * from
    (select timez as t3, id as id3 from   real_time_pos  where station_location='$id' AND train_id=4) as t1
    ,
    (select timez as t4,id as id4 from   real_time_pos  where station_location='$id' AND train_id=6) as t2";
  $result5=mysql_query($sel_query5);
    while($row5=mysql_fetch_array($result5)){
	$ret=id_to_info($id);
	$ex=explode('-',$ret);
	echo "Station ID : $id <br>Station Name: ".$ex[2]."<br>";
	echo "Station Latitude : $ex[0] <br>Station Longitutde: ".$ex[1]."<br>";
	 echo "  First Train  Time: ".$t3=$row5['t3'];
	 echo " |  Second Train Time  : ".$t4=$row5['t4'];
	// echo   "noooooo".$dddd=abs($t3-$t4);
	 echo   " || Time Difference ".$dddd=getTimeDiff($t4,$t3);
$array[$id]=$dddd;
	 echo "<hr>";
 
	 }

}




$t5=array();
include"conn.php"; 
$sel_query5="select * from station_location";
  $result5=mysql_query($sel_query5);
    while($row5=mysql_fetch_array($result5)){
	   $id=$row5['id'];
	echo "<br>";
	// echo  "<br>ssa".$station_code=$row5['station_code'];
	//Entry Finding
	
	//
	if(verify($id)){

	diff_calc($id); 
	
}
	

	}
	
	

	
	
	
	//var_dump($array);
	echo"<hr> <hr> <i> <u> Experimental Result : </u> </i><br>";
echo "Minimum Time Difference : ".min($array);
$vv= array_keys($array, min($array));
echo "<br>Crossing Station ID :".$vv[0];
	$ret=id_to_info($vv[0]);
	$ex=explode('-',$ret);
	echo "Station ID : $vv[0] <br> Station Name: ".$ex[2]."<br>";
	echo "Station Latitude : $ex[0] <br> Station Longitutde: ".$ex[1]."<br>";
	echo "Station Code : $ex[4] <br> Alternative Line: ".$ex[3]."<br>";
	
	
	
	
	///////////////
	 $t1_w=waiting_time_sum(4,$vv[0],0);
	$t2_w=waiting_time_sum(6,$vv[0],1);
	 $threshold=90;
	 echo"<hr>";
	 echo"<i><p><u>Train one wating Time:</u><br>".$t1_w_v=waiting_time_sum_v(4,$vv[0],0)." = ".$t1_w." minutes </i></p>";
	 echo"<hr>";
	 echo"<i><p><u>Train two wating Time:</u><br>".$t1_w_v=waiting_time_sum_v(6,$vv[0],1)." = ".$t2_w." minutes </i></p> ";
	 echo"<hr>";
	echo"<hr>";
	echo"<hr>";
	echo"Train one Priority : ".$t1_priodity=3;echo"<hr>";
	echo"Train two Priority : ".$t2_priodity=4;echo"<hr>";
	echo"Train one Scaled Priority  : ".$t1_priodity1=100*(1/$t1_priodity)." % ";echo"<hr>";
	 $t1_priodity=1/$t1_priodity;
	echo"Train two Scaled Priority : ".$t2_priodity1=100*(1/$t2_priodity)." % ";echo"<hr>";
	 $t2_priodity=1/$t2_priodity;
	 echo "Threshold in waiting time : 90 minutes"; echo"<hr>";
	echo "Train one wating time factor".$t1_w=$t1_w/$threshold; echo"<hr>";
	echo "Train two wating time factor".$t2_w=$t2_w/$threshold; echo"<hr>";
	
	echo"Train one Priority Factor [ F(p) + F(wt) ] :  ".$t1_factor=$t1_priodity+$t1_w; echo"<hr>";
	echo"Train two Priority Factor [ F(p) + F(wt) ] :  ".$t2_factor=$t2_priodity+$t2_w;echo"<hr>";
	if($t1_factor>$t2_factor){echo "<h1> <u> <i> Decidation: Train one will get the line clearence first </h1> </u></i> ";}
	else {echo "<h1><i> <u> Decidation: Train two will get the line clearence first </h1>  </u> </i>";}
	/////////////
$l_lat=$ex[0];
$l_lon=$ex[1];
?>




<html>
  <head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body><hr>
  <h1>  Maps Point Implementation of Crossing Detection <br>  <hr><hr> </h1>
    <div style='height:350px;width:900px'id="map"> </div>
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 18,
          center: new google.maps.LatLng(<?php echo $l_lat; ?>, <?php echo $l_lon; ?>),
          mapTypeId: 'roadmap'
        });

        var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
        var icons = {
          Very_Large: {
            icon: '1.png'
          },
		  
		  Large: {
            icon: '2.png'
          },
		  
		  
		   Medium: {
            icon: '3.png'
          },
		  
		  
		  Small: {
            icon: '4.png'
          },
		  
		   Very_Small: {
            icon: '5.png'
          },
		  
          library: {
            icon: iconBase + 'library_maps.png'
          },
          info: {
            icon: iconBase + 'info-i_maps.png'
          }
        };

        function addMarker(feature) {
          var marker = new google.maps.Marker({
            position: feature.position,
            icon: icons[feature.type].icon,
            map: map
          });
        }

        var features = [
          {
            position: new google.maps.LatLng(<?php echo $l_lat; ?>, <?php echo $l_lon; ?>),
            type: 'Very_Large'
          }, 
		 <?php 

include"conn.php";




  
$xxx="Small";
 echo " {
            position: new google.maps.LatLng($l_lat, $l_lon),
            type: '$xxx'
          }," ;
  
  
  ?>
		
		  {
            position: new google.maps.LatLng(-33.91539, 151.22820),
            type: 'info'
          }
        ];

        for (var i = 0, feature; feature = features[i]; i++) {
          addMarker(feature);
        }
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlNThG-ZxIs519bD308dAl_zu7O2Ple4A&callback=initMap">
    </script>
  </body>
</html>









					</div>
					</div>
					</div>
							  
							</div>
							<div class="panel-body">
								<!-- status -->
								<div class="contain">	
									<div class="gantt"></div>
								</div>
								<!-- status -->
							</div>
						</div>
					</div>
			
						<!--//area-->
						<div class="clearfix"></div>
						
		<!--area-->					
			</div>
			<!--content-->
		</div>
		
		
</div>
				<!--//content-inner-->
			<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<header class="logo1">
						<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
					</header>
						<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                          <?php include"menu.php"; ?>
							  </div>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
   <!-- real-time -->
<script language="javascript" type="text/javascript" src="js/jquery.flot.js"></script>
	<script type="text/javascript">

	$(function() {

		// We use an inline data source in the example, usually data would
		// be fetched from a server

		var data = [],
			totalPoints = 300;

		function getRandomData() {

			if (data.length > 0)
				data = data.slice(1);

			// Do a random walk

			while (data.length < totalPoints) {

				var prev = data.length > 0 ? data[data.length - 1] : 50,
					y = prev + Math.random() * 10 - 5;

				if (y < 0) {
					y = 0;
				} else if (y > 100) {
					y = 100;
				}

				data.push(y);
			}

			// Zip the generated y values with the x values

			var res = [];
			for (var i = 0; i < data.length; ++i) {
				res.push([i, data[i]])
			}

			return res;
		}

		// Set up the control widget

		var updateInterval = 30;
		$("#updateInterval").val(updateInterval).change(function () {
			var v = $(this).val();
			if (v && !isNaN(+v)) {
				updateInterval = +v;
				if (updateInterval < 1) {
					updateInterval = 1;
				} else if (updateInterval > 2000) {
					updateInterval = 2000;
				}
				$(this).val("" + updateInterval);
			}
		});

		var plot = $.plot("#placeholder", [ getRandomData() ], {
			series: {
				shadowSize: 0	// Drawing is faster without shadows
			},
			yaxis: {
				min: 0,
				max: 100
			},
			xaxis: {
				show: false
			}
		});

		function update() {

			plot.setData([getRandomData()]);

			// Since the axes don't change, we don't need to call plot.setupGrid()

			plot.draw();
			setTimeout(update, updateInterval);
		}

		update();

		// Add the Flot version string to the footer

		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	});

	</script>
<!-- /real-time -->
<script src="js/jquery.fn.gantt.js"></script>
    <script>

		$(function() {

			"use strict";

			$(".gantt").gantt({
				source: [{
					name: "Sprint 0",
					desc: "Analysis",
					values: [{
						from: "/Date(1320192000000)/",
						to: "/Date(1322401600000)/",
						label: "Requirement Gathering", 
						customClass: "ganttRed"
					}]
				},{
					name: " ",
					desc: "Scoping",
					values: [{
						from: "/Date(1322611200000)/",
						to: "/Date(1323302400000)/",
						label: "Scoping", 
						customClass: "ganttRed"
					}]
				},{
					name: "Sprint 1",
					desc: "Development",
					values: [{
						from: "/Date(1323802400000)/",
						to: "/Date(1325685200000)/",
						label: "Development", 
						customClass: "ganttGreen"
					}]
				},{
					name: " ",
					desc: "Showcasing",
					values: [{
						from: "/Date(1325685200000)/",
						to: "/Date(1325695200000)/",
						label: "Showcasing", 
						customClass: "ganttBlue"
					}]
				},{
					name: "Sprint 2",
					desc: "Development",
					values: [{
						from: "/Date(1326785200000)/",
						to: "/Date(1325785200000)/",
						label: "Development", 
						customClass: "ganttGreen"
					}]
				},{
					name: " ",
					desc: "Showcasing",
					values: [{
						from: "/Date(1328785200000)/",
						to: "/Date(1328905200000)/",
						label: "Showcasing", 
						customClass: "ganttBlue"
					}]
				},{
					name: "Release Stage",
					desc: "Training",
					values: [{
						from: "/Date(1330011200000)/",
						to: "/Date(1336611200000)/",
						label: "Training", 
						customClass: "ganttOrange"
					}]
				},{
					name: " ",
					desc: "Deployment",
					values: [{
						from: "/Date(1336611200000)/",
						to: "/Date(1338711200000)/",
						label: "Deployment", 
						customClass: "ganttOrange"
					}]
				},{
					name: " ",
					desc: "Warranty Period",
					values: [{
						from: "/Date(1336611200000)/",
						to: "/Date(1349711200000)/",
						label: "Warranty Period", 
						customClass: "ganttOrange"
					}]
				}],
				navigate: "scroll",
				scale: "weeks",
				maxScale: "months",
				minScale: "days",
				itemsPerPage: 10,
				onItemClick: function(data) {
					alert("Item clicked - show some details");
				},
				onAddClick: function(dt, rowId) {
					alert("Empty space clicked - add an item!");
				},
				onRender: function() {
					if (window.console && typeof console.log === "function") {
						console.log("chart rendered");
					}
				}
			});

			$(".gantt").popover({
				selector: ".bar",
				title: "I'm a popover",
				content: "And I'm the content of said popover.",
				trigger: "hover"
			});

			prettyPrint();

		});

    </script>
		   <script src="js/menu_jquery.js"></script>
</body>
</html>