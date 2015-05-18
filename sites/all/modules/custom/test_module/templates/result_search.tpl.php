<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
    <li class="active"><a href="#lists" data-toggle="tab"><span class="glyphicon glyphicon-list"></span> Lists</a></li>
    <li><a href="#map" data-toggle="tab"><span class="glyphicon glyphicon-map-marker"></span> Map</a></li>
</ul>
<div class="tabs-content">
	<div class="tab-pane active" id="lists">
    	<?php foreach ($items->venues as $key => $value) { ?>
    		<?php if ($key == 0): ?>
				<a href="#" class="list-group-item active">
					<h4 class="list-group-item-heading glyphicon glyphicon-cutlery"> <?php print($value->name); ?></h4>
					<p class="list-group-item-text"><span class="glyphicon glyphicon-plane"></span>  It is <?php print($value->location->distance); ?> meters away from you</p>
					<span class="city glyphicon glyphicon-road"> <?php print($value->location->city);?>
						<a href="/item-search/<?php print($value->id);?>" class="list-group-item-text">See more</a>
					</span>
				</a>
			<?php else : ?>
				<a href="#" class="list-group-item">
					<h4 class="list-group-item-heading glyphicon glyphicon-cutlery"> <?php if(!empty($value->name)? print($value->name) : print 'no name'); ?></h4>
					<p class="list-group-item-text"><span class="glyphicon glyphicon-plane"></span>  It is <?php print($value->location->distance); ?> meters away from you</p>
					<span class="city glyphicon glyphicon-road"> <?php if(!empty($value->location->city)? print($value->location->city) : print 'no city');?>
						<a href="/item-search/<?php print($value->id);?>" class="list-group-item-text">See more</a>
					</span>
				</a>
			<?php endif; ?>
		<?php } ?>
    </div>
    <div class="tab-pane" id="map"></div>
</div>
<?php dpm($items);?>
<!--<div class="list-group">
  <a href="#" class="list-group-item active">
    <h4 class="list-group-item-heading">Título del elemento de la lista</h4>
    <p class="list-group-item-text">...</p>
    https://foursquare.com/oauth2/authenticate?client_id=PZYP3JUAPNMSRR2JKMDY4BTXWEITM3D2SZXXCAF0ZV5OTHUY&response_type=code&redirect_uri=https://www.foursquare.com
    https://foursquare.com/oauth2/access_token?client_id=PZYP3JUAPNMSRR2JKMDY4BTXWEITM3D2SZXXCAF0ZV5OTHUY&client_secret=1JIJTPBNV3VTV0CCEE1UOIRDR0TP1SXWNRUERRDELHTMIRDQ&grant_type=authorization_code&redirect_uri=https://www.foursquare.com&code=CODE
  </a>
</div>-->