<?php dpm($item);?>
<div id="item-carousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
  	<?php foreach ($item->photos->groups[0]->items as $key => $value) { ?>
  		<?php if ($key == 0): ?>	
  			<li data-target="#item-carousel" data-slide-to="0" class="active"></li>
  		<?php else : ?>
  			<li data-target="#item-carousel" data-slide-to="<?php print $key;?>"></li>
  		<?php endif; ?>
  	<?php } ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
  	<?php foreach ($item->photos->groups[0]->items as $key => $value) { ?>
  		<?php if ($key == 0): ?>	
  			<div class="item active">
		      <img src="<?php print ($value->prefix . substr($value->suffix, 1)); ?>" alt="<?php print ($value->source->name); ?>">
		    </div>
  		<?php else : ?>
  			<div class="item">
		      <img src="<?php print ($value->prefix . substr($value->suffix, 1)); ?>" alt="<?php print ($value->source->name); ?>">
		    </div>
  		<?php endif; ?>
  	<?php }?>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#item-carousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#item-carousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="panel panel-default">
  <div class="panel-body">
  	<!-- List group -->
	<ul class="list-group">
		<li class="list-group-item"><?php print $item->name; ?></li>
		<li class="list-group-item"><?php print $item->location->address; ?></li>
		<li class="list-group-item"><a href="<?php print $item->url; ?>">More</a></li>
	</ul>
  </div>
</div>
<div class="embed-responsive embed-responsive-16by9">
  <div id="map-canvas"  style="width:800px; height:500px"></div>
</div>

<script>
	function initialize() {
		var mapCanvas = document.getElementById('map-canvas');
		var mapOptions = {
		  center: new google.maps.LatLng(<?php print $item->location->lat;?>, <?php print $item->location->lng;?>),
		  zoom: 12,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		var map = new google.maps.Map(mapCanvas, mapOptions);
		var companyPos = new google.maps.LatLng(<?php print $item->location->lat;?>, <?php print $item->location->lng;?>);
		var companyMarker = new google.maps.Marker({
		    position: companyPos,
		    map: map,
		    title:"Some title"
		});
	}
		google.maps.event.addDomListener(window, 'load', initialize);
</script>