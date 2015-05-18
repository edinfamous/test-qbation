Drupal.behaviors.test = {
  attach: function (context, settings) {
	navigator.geolocation.getCurrentPosition(GetLocation);
	function GetLocation(location) {
		jQuery('.v').val(location.coords.accuracy);
		jQuery('.longitud').val(location.coords.longitude);
		jQuery('.latitud').val(location.coords.latitude);
	}
  }
};