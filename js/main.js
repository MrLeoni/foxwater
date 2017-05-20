( function( $ ) {
  $(document).ready(function() {
  
    foxwaterEngine = {
      
      mobileMenu: function() {
        
        $('#js-mobile-btn').on('click', function() {
          
          var menu = $('#main-menu-wrapper');
          var btnParent = $('.mobile-btn-box');
          var btn = $(this);
          
          var overlay = '<div class="menu-overlay"></div>'
          
          if( menu.css('opacity') < 1 ) {
            
            menu.css({'left': '0px', 'opacity': '1'});
            btn.addClass('active');
            btnParent.css('left', '185px');
            $('body').prepend(overlay).css('overflow', 'hidden');
            
          } else {
            
            menu.css({'left': '-200px', 'opacity': '0'});
            btn.removeClass('active');
            btnParent.css('left', '-15px');
            $('.menu-overlay').remove();
            $('body').css('overflow', 'initial');
            
          }
          
        });
        
      },
      
      homeSlider: function() {
        
        $('.home-slider').bxSlider({
          pager: false,
          mode: 'fade',
          auto: true,
          pause: 7000,
          speed: 500,
          autoHover: true,
          nextText: '<span></span>',
          prevText: '<span></span>'
        });
        
      },
      
      sendEmail: function() {
        
        var page = $('#ajax-url');
        if ( page.length > 0 ) {
          
          $('#news-send').on('click', function() {
            
            var feedback = $('#news-feedback');
            feedback.html('').removeClass('error').removeClass('success').css('height', '0');
            
            var path = page.html();
            var email = $('#news-email').val();
            
            if ( email.length === 0 ) {
              feedback.html('Insira seu e-mail!').addClass('error').css('height', 'auto');
            } else {
              
              if ( email.search('@') > 0 && email.search('.com') > 0) {
                
                send_ajax(path, email);
                
              } else {
                feedback.html('E-mail inválido').addClass('error').css('height', 'auto');
              }
              
            }
            
          });
          
          var send_ajax = function(path, email) {
            
            var feedback = $('#news-feedback');
            
            $.ajax({
              
              url: path,
              type: 'POST',
              data: '&action=base&email=' + email,
              
              success: function(results) {
                feedback.html('Você foi adicionado à nossa base de dados. Obrigado!').addClass('success').css('height', 'auto');
                // console.log(results);
              },
              
              error: function(xhr) {
                console.log(xhr);
              }
              
            });
          }
          
        }
        
      },
      
      footerDate: function() {
        
        var date = new Date();
        $("#js-date").html(date.getFullYear());
        
      },
      
      turnKey: function() {
        
        foxwaterEngine.mobileMenu();
        foxwaterEngine.homeSlider();
        foxwaterEngine.footerDate();
        foxwaterEngine.sendEmail();
        
      }
      
    }
    
    foxwaterEngine.turnKey();
  
  });
})( jQuery );
