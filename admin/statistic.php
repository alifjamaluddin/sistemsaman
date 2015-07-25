<?php
require( "../php/config.php" );
include "../php/check_access_admin.php";

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title></title>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <script type="text/javascript" src="../js/canvasjs.min.js"></script>

    <script type="text/javascript">
    var monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];
    var month = getUrlVars()["month"];
    var type = getUrlVars()["type"];
    var place = getUrlVars()["tempat"];
    if(type=="month"){
       var url = "generateDataMonth.php?month="+month;
        $(document).ready(function () {

            $.getJSON(url, function (result) {

                var chart = new CanvasJS.Chart("chartContainer", {
                    title:{
        text: "Statistik saman untuk bulan "+monthNames[month-1]+", 2015"    
      },
      animationEnabled: true,
      axisY: {
        title: "Usage"
      },
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "center"
      },
      theme: "theme2",
                    data: [
                        {
                            dataPoints: result
                        }
                    ]
                });

                chart.render();
            });

        });
    }

    if(type=="place"){

      var url = "generateDataPlace.php?place="+place;
        $(document).ready(function () {

            $.getJSON(url, function (result) {
      
     var chart = new CanvasJS.Chart("chartContainer",
    {
      zoomEnabled: true,      
      
      title:{
       text: "Chart With Date-Time Stamps Inputs"       
     },

     data: [
     {        
      type: "area",
      xValueType: "dateTime",
      dataPoints: [                  
              { x: 949248000, y :3},
              { x: 949248000, y : 1 }
      ]
    }
    ]
  });

chart.render();
  });

        });


    }
   

        function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

    </script>

   
</head>
<body>


    <div id="chartContainer" style="width: 800px; height: 380px;"></div>
    <!-- <button onclick="window.print()">Print this report</button> -->
    <!-- <button onclick="window.history.back()">Back</button> -->

</body>
</html>