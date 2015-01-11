  $(document).ready(function() {

    //Simple Example, external menu
    var menu = new Maplace({
      map_div: '#gmap-4',
      controls_type: 'list',
      controls_cssclass: 'side-nav',
      controls_on_map: false,
      locations: LocsA
    });



    $('#menu').one('inview', function(event, isInView) {
      if (isInView) {
        menu.Load();
      } 
    }); 



  });