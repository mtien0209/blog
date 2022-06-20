function fashion_photography_right_sidebar_openNav() {
  jQuery(".rightsidenav").addClass('show');
  jQuery("body").addClass('overlay-enable');
}
function fashion_photography_right_sidebar_closeNav() {
  jQuery(".rightsidenav").removeClass('show');
  jQuery("body").removeClass('overlay-enable');

}

function fashion_photography_openNav() {
  jQuery(".sidenav").addClass('show');
}
function fashion_photography_closeNav() {
  jQuery(".sidenav").removeClass('show');
}

( function( window, document ) {
  function fashion_photography_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const fashion_photography_nav = document.querySelector( '.sidenav' );

      if ( ! fashion_photography_nav || ! fashion_photography_nav.classList.contains( 'show' ) ) {
        return;
      }

      const elements = [...fashion_photography_nav.querySelectorAll( 'input, a, button' )],
        fashion_photography_lastEl = elements[ elements.length - 1 ],
        fashion_photography_firstEl = elements[0],
        fashion_photography_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;

      if ( ! shiftKey && tabKey && fashion_photography_lastEl === fashion_photography_activeEl ) {
        e.preventDefault();
        fashion_photography_firstEl.focus();
      }

      if ( shiftKey && tabKey && fashion_photography_firstEl === fashion_photography_activeEl ) {
        e.preventDefault();
        fashion_photography_lastEl.focus();
      }
    } );
  }
  fashion_photography_keepFocusInMenu();
} )( window, document );

( function( window, document ) {
  function fashion_photography_rightsidebar_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const fashion_photography_nav = document.querySelector( '.rightsidenav' );

      if ( ! fashion_photography_nav || ! fashion_photography_nav.classList.contains( 'show' ) ) {
        return;
      }

      const elements = [...fashion_photography_nav.querySelectorAll( 'input, a, button' )],
        fashion_photography_lastEl = elements[ elements.length - 1 ],
        fashion_photography_firstEl = elements[0],
        fashion_photography_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;

      if ( ! shiftKey && tabKey && fashion_photography_lastEl === fashion_photography_activeEl ) {
        e.preventDefault();
        fashion_photography_firstEl.focus();
      }

      if ( shiftKey && tabKey && fashion_photography_firstEl === fashion_photography_activeEl ) {
        e.preventDefault();
        fashion_photography_lastEl.focus();
      }
    } );
  }
  fashion_photography_rightsidebar_keepFocusInMenu();
} )( window, document );


( function( window, document ) {
  function fashion_photography_rightSidebar_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const fashion_photography_nav = document.querySelector( '.rightSidenav' );

      if ( ! fashion_photography_nav || ! fashion_photography_nav.classList.contains( 'show' ) ) {
        return;
      }

      const elements = [...fashion_photography_nav.querySelectorAll( 'input, a, button' )],
        fashion_photography_lastEl = elements[ elements.length - 1 ],
        fashion_photography_firstEl = elements[0],
        fashion_photography_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;

      if ( ! shiftKey && tabKey && fashion_photography_lastEl === fashion_photography_activeEl ) {
        e.preventDefault();
        fashion_photography_firstEl.focus();
      }

      if ( shiftKey && tabKey && fashion_photography_firstEl === fashion_photography_activeEl ) {
        e.preventDefault();
        fashion_photography_lastEl.focus();
      }
    } );
  }
  fashion_photography_rightSidebar_keepFocusInMenu();
} )( window, document );


var btn = jQuery('#button');

jQuery(window).scroll(function() {
  if (jQuery(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  jQuery('html, body').animate({scrollTop:0}, '300');
});

jQuery(document).ready(function(){
  jQuery('span.search-box a').click(function(){
    jQuery(".serach_outer").toggle();
    jQuery('.serach_inner input.search-field').focus();
  });
  window.addEventListener('load', (event) => {
    jQuery(".loading").delay(2000).fadeOut("slow");
  });
});

jQuery('.serach_inner input.search-field').on('keydown', function (e) {
  if (jQuery("this:focus") && (e.which === 9)) {
    e.preventDefault();
    jQuery(this).blur();
    jQuery('.serach_inner [type="submit"]').focus();
  }
});

jQuery('.serach_inner [type="submit"]').on('keydown', function (e) {
  if (jQuery("this:focus") && (e.which === 9)) {
    e.preventDefault();
    jQuery(this).blur();
    jQuery('span.search-box a').focus();
  }
});

jQuery('span.search-box a').on('keydown', function (e) {
  if (jQuery("this:focus") && (e.which === 9)) {
    if(jQuery(".serach_outer").is(":visible")){
      e.preventDefault();
      jQuery(this).blur();
      jQuery('.serach_inner input.search-field').focus();
    } else {
      e.preventDefault();
      jQuery(this).blur();
      jQuery('.right-sidbar-btn').focus();
    }    
  }
});

jQuery(window).scroll(function() {
  var data_sticky = jQuery('.main_header').attr('data-sticky');

  if (data_sticky == "true") {
    if (jQuery(this).scrollTop() > 1){  
      jQuery('.main_header').addClass("stick_header");
    } else {
      jQuery('.main_header').removeClass("stick_header");
    }
  }
});