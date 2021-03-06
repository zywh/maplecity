


<?php
    $db = Yii::app()->db;
    ini_set("log_errors", 1);
	ini_set("error_log", "/tmp/php-error.log");

	function get_firstimage($county,$ml_num){
		
		$county = preg_replace('/\s+/', '', $county);
		$county = str_replace("&","",$county);
		$dir="mlspic/crea/".$county."/Photo".$ml_num."/";
		#$dir="mlspic/crea/creamid/".$county."/Photo".$ml_num."/";
		$num_files = 0;
		if(is_dir($dir)){
			$picfiles = scandir($dir);
			$num_files = count(scandir($dir))-2;
		}
		if ( $num_files >= 1)    {
			return $dir.$picfiles[2];

		}else { return 'static/images/zanwu.jpg';}
	}
	
	function get_tn_image($county,$ml_num){
		
		$county = preg_replace('/\s+/', '', $county);
		$county = str_replace("&","",$county);
		$dir="mlspic/crea/creatn/".$county."/Photo".$ml_num."/";
		$num_files = 0;
		if(is_dir($dir)){
			$picfiles = scandir($dir);
			$num_files = count(scandir($dir))-2;
		}
		if ( $num_files >= 1)    {
			
			$s = implode(",",array_slice($picfiles,2,3)); //return 3 comma seperated list with offset 2 which is subdir . and ..
			$s = str_replace("Photo",$dir."Photo",$s); // Insert DIR in front
			return $s;
		} else { return 'static/images/zanwu.jpg';}
	}	
	
	function searchurl($arg, $reset = 1) {
	
		$url = Yii::app()->createUrl('house/index', array('type' => $type,'cd1' => 0, 'cd2' => 0, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)); 
		return $arg.$reset ;
}
?> 

<!-- 头开始 -->
  <div class="cl"></div>
  <div data-role="page">
  <div data-role="header">
    <a href="#" class="ui-btn ui-corner-all ui-shadow ui-icon-home ui-btn-icon-left">Home</a>
    <h1>枫之都</h1>
   	<a href="#" class="ui-btn ui-corner-all ui-shadow ui-icon-search ui-btn-icon-left">Search</a>
  </div>
  
<!-- 头结束 --> 
<!-- 房源搜索开始 -->
<div id="searcharea" data-role="fieldcontain">

<!-- search province/city start -->
<div class="ui-grid-a">
	<div class="ui-block-a">
		<select name="province" id="province" data-native-menu="false" data-mini="true">
			<option >省份</option>
			<option value="3">安省</option>
			<option value="4">BC省</option>
			<option value="5">阿尔伯塔</option>
			<option value="6">新不伦瑞克</option>
			<option value="7">新斯科舍省</option>
			<option value="8">爱德华王子岛省</option>
			<option value="9">纽芬兰及拉布拉多</option>
		</select>
	</div>
	<div class="ui-block-b">
		<ul id="citysearch" data-role="listview" data-inset="true" data-filter="true" data-filter-placeholder="输入城市 中/英文" data-filter-theme="a" data-mini="true" ></ul>
	</div>
</div>
<!-- search province/city end  -->

<!-- search row2 start -->


<!-- search row2 end  -->


<!-- search row1 start -->
<div class="ui-grid-b">
    <div class="ui-block-b">
		<select name="type" id="type" data-native-menu="false" data-mini="true">
			<option >房型</option>
			<option value="1">独栋别墅</option>
			<option value="2">联排别墅</option>
			<option value="3">豪华公寓</option>
			<option value="4">双拼别墅</option>
			<option value="5">度假屋</option>
			<option value="6">农场</option>
			<option value="7">空地</option>
			<option value="8">其他</option>
		</select>
	</div>
	
	<div class="ui-block-b">
		<select name="price" id="price" data-native-menu="false" data-mini="true">
			<option >价格</option>
			<option value="1" >30万以下</option>
			<option value="2">30-50万</option>
			<option value="3">50-100万</option>
			<option value="4">100-150万</option>
			<option value="5">150-300万</option>
			<option value="6">300-450万</option>
			<option value="7">450-600万</option>
			<option value="8">600以上</option>
		</select>
	</div>
	
	<div class="ui-block-c">
		<select name="date" id="date" data-native-menu="false" data-mini="true">
			<option >挂牌时间</option>
			<option value="1" >昨日挂牌</option>
			<option value="2">一周</option>
			<option value="3">一个月</option>
			<option value="4">三个月</option>
		
		</select>	
	</div>
	</div>

<!-- search row1 end  -->

<!-- search row2 start -->
<div class="ui-grid-b">
    <div class="ui-block-b">
		<select name="bedroom" id="bedroom" data-native-menu="false" data-mini="true">
			<option >卧室</option>
			<option value="1">&gt1</option>
			<option value="2">&gt2</option>
			<option value="3">&gt3</option>
			<option value="3">&gt4</option>
			<option value="3">&gt5</option>
			
			
		</select>
	</div>
	
	<div class="ui-block-b">
		<select name="housearea" id="housearea" data-native-menu="false" data-mini="true">
			<option >房屋尺寸</option>
			<option value="1" >700平方尺以下</option>
			<option value="2">700-1100平方尺</option>
			<option value="3">1100-1500平方尺</option>
			<option value="4">1500-2000平方尺</option>
			<option value="5">700-1100平方尺</option>


		</select>
	</div>
	
	<div class="ui-block-c">
		<select name="landarea" id="landarea" data-native-menu="false" data-mini="true">
			<option >土地尺寸</option>
			<option value="1" >2000平方尺以下</option>
			<option value="2">2000-4000平方尺</option>
			<option value="3">4000-6000平方尺</option>
			<option value="4">6000-12000平方尺</option>
			<option value="5">12000-1英亩</option>
			<option value="5">1英亩以上</option>
		
		</select>	
	</div>
	</div>


<!-- search row2 end  -->
 

 
	

<script>



	
  $(function() {
	var cache = {};
	  $( "#citysearch" ).on( "filterablebeforefilter", function ( e, data ) {
        var $ul = $( this ),
            $input = $( data.input ),
            value = $input.val(),
            html = "";
        $ul.html( "" );
        if ( value && value.length > 0 ) {
            $ul.html( "<li><div class='ui-loader'><span class='ui-icon ui-icon-loading'></span></div></li>" );
            $ul.listview( "refresh" );
            $.ajax({
                url: "http://gd.geobytes.com/AutoCompleteCity",
                dataType: "jsonp",
                crossDomain: true,
                data: {
                    q: $input.val()
                }
            })
            .then( function ( response ) {
                $.each( response, function ( i, val ) {
                    html += "<li>" + val + "</li>";
                });
                $ul.html( html );
                $ul.listview( "refresh" );
                $ul.trigger( "updatelayout");
            });
        }
    });
	

	$( "#cityname" ).autocomplete({
	  //source: "/index.php?r=house/getCityList",
		source: function(request, response) {
					var term = request.term; //cache result if term is typed in past
					if ( term in cache ) {
						response( cache[ term ] );
						return;
					}
			
					$.getJSON(
					"/index.php?r=house/getCityList", 
					{ term: term, cd1: '<?php echo $cd1;?>' },  //pass province for city search
					//response
					function( data, status, xhr ) {
						cache[ term ] = data;
						response( data );
						}
					);
			
		},
		minLength: 1,
		autoFocus: true,
		select: function( event, ui ) {
 
			var city = ui.item.id;
			//var url = "index.php";
			var url = '<?php echo Yii::app()->createUrl('house/index', array('type' => $type,'cd1' => $cd1, 'cd3' => $cd3, 'cd4' => $cd4, 'cd5' => $cd5, 'cd6' => $cd6, 'cd7' => $cd7, 'cd8' => $cd8, 'cd9' => $cd9, 'cd10' => $cd10, 'cd11' => $cd11, 'cd12' => $cd12, 'cd13' => $cd13,'cd14' => $cd14, 'cd15' => $cd15, 'cd16' => $cd16, 'cd17' => $cd17, 'cd18' => $cd18)) ?> ' +'&cd2=' + city + '#001';
		
			if( city != '') {
				location.href = url;
		
			}		
		
		  
		}
	});
  });
  

	</script>
			




 

</div>

</div>
<!-- 房源搜索结束 -->


<!-- 地图开始 --> 
<!-- 地图结束 -->

<!-- 房源列表开始 --> 
<!-- 房源列表结束 -->


