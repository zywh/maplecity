 <script src="/static/js/Highstock-4.2.1/js/highstock.js"></script>
 <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
       

<div class="cl"></div>

<div class="chartcontainer">
        <div class="chartbox" id="chart1">
        </div>
        <div class="chartbox" id="chart2" >
        </div>
		<div class="chartbox" id="chart3" >
        </div>
		<div class="chartbox" id="chart4" >
        </div>
		
</div>

<div class="cl"></div>
	
<script type="text/javascript">
	

		
	 $.ajax({
		url: '<?php echo Yii::app()->createUrl('stats/getHouseStats'); ?>',
		dataType: "json",
		success: function(result) {		
		
			
			
			
			
			//Start Chart1
			
			var data = [
			  {
				x: result.price,
				autobinx: false,
				xbins: {
				  start: 0,
				  end: 300,
				  size: 20
				},
				type: 'histogram'
			  }
			];
			
			var layout = {
			  title: '房价分布图',
			  xaxis: {title: '房价（万）'},
			  yaxis: {title: '数量'},
			  barmode: 'overlay',
			  bargap: 0.15,
			  bargroupgap: 0.3
			};
			Plotly.newPlot('chart1', data,layout);
			
			
			var property_type_count= [];
			var property_type_label= [];
			
			$.each(result.property_type, function (key, value) {
			property_type_count.push(Number(value[0]));
			property_type_label.push(value[1]);
			});
			var data2 = [{
				values: property_type_count,
				labels: property_type_label,
				type: 'pie'
			}];
			var layout2 = {
			  title: ' 房源类型分布图',
			};
			Plotly.newPlot('chart2', data2, layout2);
			
			
			//House number by city Bar chart			
			var city_count= [];
			var city_label= [];
			
			$.each(result.city, function (key, value) {
			city_count.push(Number(value[0]));
			city_label.push(value[1]);
			});
			var data3 = [{
				y: city_count,
				x: city_label,
				type: 'bar'
			}];
			var layout3 = {
			  title: ' 房源城市分布图',
			};
			Plotly.newPlot('chart3', data3, layout3);
			
			//House number by community Bar chart			
			var community_count= [];
			var community_label= [];
			
			$.each(result.community, function (key, value) {
			community_count.push(Number(value[0]));
			community_label.push(value[1]);
			});
			var data4 = [{
				y: community_count,
				x: community_label,
				type: 'bar'
			}];
			var layout4 = {
			  title: ' 房源社区分布图',
			};
			Plotly.newPlot('chart4', data4, layout4);
						
		//success close	
		}
	//ajax close	
	});
		

		
</script>

