jQuery(function($) {

  //  "use strict";

/*--
    Menu Sticky
-----------------------------------*/
var windows = $(window);
var sticky = $('.header-sticky');

windows.on('scroll', function() {
    var scroll = windows.scrollTop();
    if (scroll < 300) {
        sticky.removeClass('is-sticky');
    }else{
        sticky.addClass('is-sticky');
    }
});


$(window).on('resize', function(){  
   if($(window).width() < 767){
        $('.header-bottom').removeClass('header-sticky');
   }else{
        $('.header-bottom').addClass('header-sticky');
    }  
});





/*--
    Mobile Menu
------------------------*/
var mainMenuNav = $('.main-menu nav');
mainMenuNav.meanmenu({
    meanScreenWidth: '991',
    meanMenuContainer: '.mobile-menu',
    meanMenuClose: '<span class="menu-close"></span>',
    meanMenuOpen: '<span class="menu-bar"></span>',
    meanRevealPosition: 'right',
    meanMenuCloseSize: '0',
});

/*--
    Hero Slider
--------------------------------------------*/
var heroSlider = $('.hero-slider');
heroSlider.slick({
    arrows: true,
    autoplay: true,
    autoplaySpeed: 5000,
    dots: false,
    pauseOnFocus: false,
    pauseOnHover: false,
    fade: true,
    infinite: true,
    slidesToShow: 1,
    prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
    responsive: [
        {
          breakpoint: 767,
          settings: {
            arrows: false,
          }
        },
        {
          breakpoint: 991,
          settings: {
            arrows: false,
          }
        }
    ]
});


/*--
    Testimonial Slider
--------------------------------------------*/
var testimonialSlider = $('.testimonial-slider')
testimonialSlider.slick({
    arrows: false,
    autoplay: true,
    autoplaySpeed: 5000,
    dots: true,
    pauseOnFocus: false,
    pauseOnHover: false,
    infinite: true,
    slidesToShow: 1,
    slidesToScoll: 1,
    prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
});


/*--
    Winner Slider
--------------------------------------------*/
var issueSlider = $('.winner-slider')
issueSlider.slick({
    arrows: true,
    autoplay: true,
    autoplaySpeed: 5000,
    dots: false,
    pauseOnFocus: false,
    pauseOnHover: false,
    infinite: true,
    slidesToShow: 4,
    slidesToScoll: 2,
    prevArrow: $('.slick-prev'),
    nextArrow: $('.slick-next'),
    responsive: [
        {
          breakpoint: 1100,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 2,
            infinite: true,
          }
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 560,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
});



/*--
    Auction Single Product Slider
--------------------------------------------*/
var issueSlider = $('.product-thumb-slider')
issueSlider.slick({
    arrows: true,
    autoplay: true,
    autoplaySpeed: 5000,
    dots: false,
    pauseOnFocus: false,
    pauseOnHover: false,
    infinite: true,
    slidesToShow: 1,
    slidesToScoll: 1,
    prevArrow: $('.slick-prev2'),
    nextArrow: $('.slick-next2')
});



/* Lightbox
 ========================================================*/

  $('div.gallery .gallery-item a').attr('data-lightbox', 'image-gal');



/* Copyright Year
 ========================================================*/
var currentYear = (new Date).getFullYear();
jQuery(function($) {
    $(document).ready(function () {
        $("#copyright-year").text((new Date).getFullYear());
    });
});





 /* 
    ###############################################
    FANCY TABS
    ############################################### 
    */
    function extend( a, b ) {
        for( var key in b ) { 
            if( b.hasOwnProperty( key ) ) {
                a[key] = b[key];
            }
        }
        return a;
    }

    function CBPFWTabs( el, options ) {
        this.el = el;
        this.options = extend( {}, this.options );
        extend( this.options, options );
        this._init();
    }

    CBPFWTabs.prototype.options = {
        start : 0
    };

    CBPFWTabs.prototype._init = function() {
        // tabs elems
        this.tabs = [].slice.call( this.el.querySelectorAll( 'nav > ul > li' ) );
        // content items
        this.items = [].slice.call( this.el.querySelectorAll( '.content-wrap > section' ) );
        // current index
        this.current = -1;
        // show current content item
        this._show();
        // init events
        this._initEvents();
    };

    CBPFWTabs.prototype._initEvents = function() {
        var self = this;
        this.tabs.forEach( function( tab, idx ) {
            tab.addEventListener( 'click', function( ev ) {
                ev.preventDefault();
                self._show( idx );
            } );
        } );
    };

    CBPFWTabs.prototype._show = function( idx ) {
        if( this.current >= 0 ) {
            this.tabs[ this.current ].className = this.items[ this.current ].className = '';
        }
        // change current
        this.current = idx != undefined ? idx : this.options.start >= 0 && this.options.start < this.items.length ? this.options.start : 0;
        this.tabs[ this.current ].className = 'tab-current';
        this.items[ this.current ].className = 'content-current';
    };

    // add to global namespace
    window.CBPFWTabs = CBPFWTabs;

    //initialize the fancy tabs
    [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
        new CBPFWTabs( el );
    });

    



// EQUAL HEIGHT
     equalheight = function(container){

    var currentTallest = 0,
         currentRowStart = 0,
         rowDivs = new Array(),
         $el,
         topPosition = 0;
     $(container).each(function() {

       $el = $(this);
       $($el).height('auto')
       topPostion = $el.position().top;

       if (currentRowStart != topPostion) {
         for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
           rowDivs[currentDiv].height(currentTallest);
         }
         rowDivs.length = 0; // empty the array
         currentRowStart = topPostion;
         currentTallest = $el.height();
         rowDivs.push($el);
       } else {
         rowDivs.push($el);
         currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
      }
       for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
         rowDivs[currentDiv].height(currentTallest);
       }
     });
    }

    $(window).load(function() {
      equalheight('.eqhght');
    });

    $(window).resize(function(){
      equalheight('.eqhght');
    });

    $(window).load(function() {
      equalheight('.eqhght2');
    });

    $(window).resize(function(){
      equalheight('.eqhght2');
    });

    $(window).load(function() {
      equalheight('.eqhght3');
    });

    $(window).resize(function(){
      equalheight('.eqhght3');
    });


  
/*-- 
    Timeline Process
--------------------------------------------*/
var timeLine = $('.timeline');
var timeLineProces = $('.timeline-proces');
timeLine.hover(
    function() {
        var timelinePosition = $(this).position().top;
        var timelineHeight = $(this).height();
        var totalHeight = timelinePosition + timelineHeight + 50;
        
        $(this).addClass('hover').prevAll().addClass('hover');
        timeLineProces.css( 'height', totalHeight +'px' );
    },
    function() {
        $(this).removeClass('hover').prevAll().removeClass('hover');
        timeLineProces.css( 'height', '0px' );
    }
);

/*--
	Isotop with ImagesLoaded
-----------------------------------*/
var isotopFilter = $('.isotop-filter');
var isotopGrid = $('.isotop-grid');
var isotopGridItem = '.isotop-item';

isotopFilter.find('button:first-child').addClass('active');

/*-- Images Loaded --*/
isotopGrid.imagesLoaded(function () {

    isotopGrid.isotope({
        itemSelector: isotopGridItem,
        layoutMode: 'masonry',
    });

    /*-- Isotop Filter Menu --*/
    isotopFilter.on('click', 'button', function () {

        var filterValue = $(this).attr('data-filter');

        isotopFilter.find('button').removeClass('active');
        $(this).addClass('active');
        isotopGrid.isotope({filter: filterValue});

    });
    
});
    
/*--
	Video Popup
-----------------------------------*/
var videoPopup = $('.video-popup');
videoPopup.magnificPopup({
    disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false
});
    
/*--
	Image Popup
-----------------------------------*/
var imagePopup = $('.image-popup');
imagePopup.magnificPopup({
    type: 'image',
    mainClass: 'mfp-fade',
});
    
/*--
	Image Popup
-----------------------------------*/
var galleryPopup = $('.gallery-popup');
galleryPopup.magnificPopup({
    type: 'image',
    mainClass: 'mfp-fade',
    gallery: {
        enabled: true,
    },
});

/*--
	Counter UP
-----------------------------------*/
var counter = $('.counter')
counter.counterUp({
    delay: 20,
    time: 3000
});
    
/*--
	MailChimp
-----------------------------------*/
$('#mc-form').ajaxChimp({
	language: 'en',
	callback: mailChimpResponse,
	// ADD YOUR MAILCHIMP URL BELOW HERE!
	url: 'http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef'

});
function mailChimpResponse(resp) {
	
	if (resp.result === 'success') {
		$('.mailchimp-success').html('' + resp.msg).fadeIn(900);
		$('.mailchimp-error').fadeOut(400);
		
	} else if(resp.result === 'error') {
		$('.mailchimp-error').html('' + resp.msg).fadeIn(900);
	}  
}
    


    /*--
    Scroll Up
-----------------------------------*/
$.scrollUp({
    easingType: 'linear',
    scrollSpeed: 900,
    animation: 'fade',
    scrollText: '<i class="fa fa-angle-up"></i>',
});

});



jQuery(document).ready(
    function() {
    // particle.min.js hosted on GitHub
    // Scroll down for initialisation code

    !function(a){var b="object"==typeof self&&self.self===self&&self||"object"==typeof global&&global.global===global&&global;"function"==typeof define&&define.amd?define(["exports"],function(c){b.ParticleNetwork=a(b,c)}):"object"==typeof module&&module.exports?module.exports=a(b,{}):b.ParticleNetwork=a(b,{})}(function(a,b){var c=function(a){this.canvas=a.canvas,this.g=a.g,this.particleColor=a.options.particleColor,this.x=Math.random()*this.canvas.width,this.y=Math.random()*this.canvas.height,this.velocity={x:(Math.random()-.5)*a.options.velocity,y:(Math.random()-.5)*a.options.velocity}};return c.prototype.update=function(){(this.x>this.canvas.width+20||this.x<-20)&&(this.velocity.x=-this.velocity.x),(this.y>this.canvas.height+20||this.y<-20)&&(this.velocity.y=-this.velocity.y),this.x+=this.velocity.x,this.y+=this.velocity.y},c.prototype.h=function(){this.g.beginPath(),this.g.fillStyle=this.particleColor,this.g.globalAlpha=.7,this.g.arc(this.x,this.y,1.5,0,2*Math.PI),this.g.fill()},b=function(a,b){this.i=a,this.i.size={width:this.i.offsetWidth,height:this.i.offsetHeight},b=void 0!==b?b:{},this.options={particleColor:void 0!==b.particleColor?b.particleColor:"#fff",background:void 0!==b.background?b.background:"#1a252f",interactive:void 0!==b.interactive?b.interactive:!0,velocity:this.setVelocity(b.speed),density:this.j(b.density)},this.init()},b.prototype.init=function(){if(this.k=document.createElement("div"),this.i.appendChild(this.k),this.l(this.k,{position:"absolute",top:0,left:0,bottom:0,right:0,"z-index":1}),/(^#[0-9A-F]{6}$)|(^#[0-9A-F]{3}$)/i.test(this.options.background))this.l(this.k,{background:this.options.background});else{if(!/\.(gif|jpg|jpeg|tiff|png)$/i.test(this.options.background))return console.error("Please specify a valid background image or hexadecimal color"),!1;this.l(this.k,{background:'url("'+this.options.background+'") no-repeat center',"background-size":"cover"})}if(!/(^#[0-9A-F]{6}$)|(^#[0-9A-F]{3}$)/i.test(this.options.particleColor))return console.error("Please specify a valid particleColor hexadecimal color"),!1;this.canvas=document.createElement("canvas"),this.i.appendChild(this.canvas),this.g=this.canvas.getContext("2d"),this.canvas.width=this.i.size.width,this.canvas.height=this.i.size.height,this.l(this.i,{position:"relative"}),this.l(this.canvas,{"z-index":"20",position:"relative"}),window.addEventListener("resize",function(){return this.i.offsetWidth===this.i.size.width&&this.i.offsetHeight===this.i.size.height?!1:(this.canvas.width=this.i.size.width=this.i.offsetWidth,this.canvas.height=this.i.size.height=this.i.offsetHeight,clearTimeout(this.m),void(this.m=setTimeout(function(){this.o=[];for(var a=0;a<this.canvas.width*this.canvas.height/this.options.density;a++)this.o.push(new c(this));this.options.interactive&&this.o.push(this.p),requestAnimationFrame(this.update.bind(this))}.bind(this),500)))}.bind(this)),this.o=[];for(var a=0;a<this.canvas.width*this.canvas.height/this.options.density;a++)this.o.push(new c(this));this.options.interactive&&(this.p=new c(this),this.p.velocity={x:0,y:0},this.o.push(this.p),this.canvas.addEventListener("mousemove",function(a){this.p.x=a.clientX-this.canvas.offsetLeft,this.p.y=a.clientY-this.canvas.offsetTop}.bind(this)),this.canvas.addEventListener("mouseup",function(a){this.p.velocity={x:(Math.random()-.5)*this.options.velocity,y:(Math.random()-.5)*this.options.velocity},this.p=new c(this),this.p.velocity={x:0,y:0},this.o.push(this.p)}.bind(this))),requestAnimationFrame(this.update.bind(this))},b.prototype.update=function(){this.g.clearRect(0,0,this.canvas.width,this.canvas.height),this.g.globalAlpha=1;for(var a=0;a<this.o.length;a++){this.o[a].update(),this.o[a].h();for(var b=this.o.length-1;b>a;b--){var c=Math.sqrt(Math.pow(this.o[a].x-this.o[b].x,2)+Math.pow(this.o[a].y-this.o[b].y,2));c>120||(this.g.beginPath(),this.g.strokeStyle=this.options.particleColor,this.g.globalAlpha=(120-c)/120,this.g.lineWidth=.7,this.g.moveTo(this.o[a].x,this.o[a].y),this.g.lineTo(this.o[b].x,this.o[b].y),this.g.stroke())}}0!==this.options.velocity&&requestAnimationFrame(this.update.bind(this))},b.prototype.setVelocity=function(a){return"fast"===a?1:"slow"===a?.33:"none"===a?0:.66},b.prototype.j=function(a){return"high"===a?5e3:"low"===a?2e4:isNaN(parseInt(a,10))?1e4:a},b.prototype.l=function(a,b){for(var c in b)a.style[c]=b[c]},b});

    // Initialisation

    var canvasDiv = document.getElementById('particle-canvas');
    var options = {
      particleColor: '#666',
      background: 'https://raw.githubusercontent.com/JulianLaval/canvas-particle-network/master/img/demo-bg.jpg',
      interactive: true,
      speed: 'medium',
      density: 'high'
    };
    var particleCanvas = new ParticleNetwork(canvasDiv, options);
});


/*--
    Auction Filters
-----------------------------------*/

jQuery(function($) {
  $(document).ready(function(){

        $(".auc_all").click(function(){
            $( ".auc_all" ).addClass( "active" );
            $( ".auc_bronze" ).removeClass( "active" );
            $( ".auc_silver" ).removeClass( "active" );
            $( ".auc_gold" ).removeClass( "active" );            
            $('.bronze_section, .silver_section, .gold_section').show();
        });


        $(".auc_bronze").click(function(){
            $( ".auc_bronze" ).addClass( "active" );
            $( ".auc_all" ).removeClass( "active" );
            $( ".auc_silver" ).removeClass( "active" );
            $( ".auc_gold" ).removeClass( "active" );
            $('.silver_section, .gold_section').hide();
            $('.bronze_section').show();
        });

        $(".auc_silver").click(function(){
            $( ".auc_silver" ).addClass( "active" );
            $( ".auc_all" ).removeClass( "active" );
            $( ".auc_bronze" ).removeClass( "active" );
            $( ".auc_gold" ).removeClass( "active" );
            $('.bronze_section, .gold_section').hide();
            $('.silver_section').show();
        });

        $(".auc_gold").click(function(){
            $( ".auc_gold" ).addClass( "active" );
            $( ".auc_all" ).removeClass( "active" );
            $( ".auc_silver" ).removeClass( "active" );
            $( ".auc_bronze" ).removeClass( "active" );
            $('.bronze_section, .silver_section').hide();
            $('.gold_section').show();
        });

    });

}); 


/*--
    Fixed Footer bar show and hide
-----------------------------------*/

jQuery(function($) {
    $(window).on('scroll', function() { 
        if ($(window).scrollTop() >= $('.main-wrapper').offset().top + $('.main-wrapper'). 
            outerHeight() - window.innerHeight) { 
            $('.fixfooterbar').addClass('removeftbar');
       }else{
            $('.fixfooterbar').removeClass('removeftbar');
        }  
    }); 
});




/*--
    Auction Bid Price Calculator
    Calculate total bid ammount when the number increments in auction single page 
-----------------------------------*/

//var v_jmlh = $('input[type=number][name=auctonprice]').val();
//jQuery(function($) {
//    var v_jmlh = $('input[type=number][name=auctonprice]').val();
//    $('#showaucp').text(v_jmlh);
//});

jQuery(function($) {
    $("#aucquan").on("change paste keyup", function() {
       var quan = $('input[type=number][name=auctionquantity]').val();
       var auc_pr = $('input[type=text][name=auctionprice]').val();
       var v_jmlh = quan * auc_pr;
        $('#showaucp').text(v_jmlh); 
    });
});



jQuery(function($) {


// Login pop-up element & Contact form pop-up element
    if(typeof($('.login-popup-with-form')) != 'undefined') {
        $('.login-popup-with-form').magnificPopup({
            closeBtnInside: true,
            type: 'inline',
            preloader: false,
            focus: '#name',
            // When elemened is focused, some mobile browsers in some cases zoom in
            // It looks not nice, so we disable it:
            callbacks: {
                beforeOpen: function() {
                    if ($(window).width() < 700) {
                        this.st.focus = false;
                    } else {
                        this.st.focus = '#name';
                    }
                }
            }
        });
    }
// END Login pop-up element & Contact form pop-up element



// Magnific Popup
    if(typeof($.fn.magnificPopup) != 'undefined')
    {
        $('a.kl-login-box').magnificPopup({
            type: 'inline',
            closeBtnInside:true,
            showCloseBtn: true,
            mainClass: 'mfp-fade mfp-bg-lighter'
        });
    }
// END Magnific Popup
});