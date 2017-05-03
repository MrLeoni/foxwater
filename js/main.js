( function( $ ) {
  $(document).ready(function() {
  
    foxwaterEngine = {
      
      footerDate: function() {
        
        var date = new Date();
        $("#js-date").html(date.getFullYear());
        
      },
      
      turnKey: function() {
        
        foxwaterEngine.footerDate();
        
      }
      
    }
    
    foxwaterEngine.turnKey();
  
  });
})( jQuery );
