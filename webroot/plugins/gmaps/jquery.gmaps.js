/**
* Theme: Adminto Admin Template
* Author: Coderthemes
* Google Maps
*/

!function($) {
    "use strict";

    var GoogleMap = function() {};


    //creates map with markers
    GoogleMap.prototype.createMarkers = function($container) {
        var map = new GMaps({
          div: $container,
          lat: $($container).data('lat'),
          lng: $($container).data('lng'),
          zoom: 16
        });

        map.drawOverlay({
          lat: map.getCenter().lat(),
          lng: map.getCenter().lng(),
          content: '<div class="gmaps-overlay">Mi<br />Oficina<div class="gmaps-overlay_arrow above"></div></div>',
          verticalAlign: 'top',
          horizontalAlign: 'center'
        });

        return map;
    },

    //init
    GoogleMap.prototype.init = function() {
      var $this = this;
      $(document).ready(function(){
        //with sample markers
        $this.createMarkers('#gmaps-markers');

      });
    },
    //init
    $.GoogleMap = new GoogleMap, $.GoogleMap.Constructor = GoogleMap
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.GoogleMap.init()
}(window.jQuery);