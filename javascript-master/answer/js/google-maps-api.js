$(function(){
  var geocoder;
  var map;

  init();

  function init() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(35.697456,139.702148);
    var opts = {
      zoom: 10,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var canvas = $('#map_canvas')[0];
    map = new google.maps.Map(canvas, opts);
  }

  $('#search').click(function(){
    var address = $('#address').val();
    if (geocoder) {
      geocoder.geocode({
        'address': address,
        'region': 'jp'
      }, function(results, status){
        if (status == google.maps.GeocoderStatus.OK) {
          map.setCenter(results[0].geometry.location);

          var bounds = new google.maps.LatLngBounds();
          for (var r in results) {
            if (results[r].geometry) {
              var latlng = results[r].geometry.location;
              bounds.extend(latlng);
              new google.maps.Marker({
                position: latlng,
                map: map
              });

              $('#ido').text(latlng.lat());
              $('#keido').text(latlng.lng());
            }
          }
        } else {
          alert('Geocode 取得に失敗しました reason: ' + status);
        }
      });
    }
  });
});
