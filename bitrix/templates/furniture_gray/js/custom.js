//IE7,8 html 5
if (!$.support.leadingWhitespace) {
    var e = ("abbr,article,aside,audio,canvas,datalist,details,figure,footer,header,hgroup,mark,menu,meter,nav,output,progress,section,time,video,figcaption,summary").split(',');
	for (var i = 0; i < e.length; i++){
	    document.createElement(e[i]);
	}
}

var centerizeVert=function(items,posPlus,onWindowLoad,isCustomFont){var items=$(items);if(!items.length)return;var plus=0;if(typeof posPlus!=="undefined")plus=posPlus;items.each(function(){var item=$(this);if(!item.height())if(item.is("img")){item.hide();var interval=setInterval(function(){if(item.height()){clearInterval(interval);item.show();centerize(item)}},20);return}else return;centerize(item);if(isCustomFont){var top=item.css("top");var interval2=setInterval(function(){centerize(item);if(item.css("top")!== top)clearInterval(interval2)},20);$(window).load(function(){clearInterval(interval2)})}});function centerize(item){var parent=item.parent();var css={top:~~((parent.height()-item.height())/2+plus)};if($.inArray(item.css("position"),["absolute","relative"])<0)css.position="relative";item.css(css)}if(onWindowLoad)$(window).load(function(){centerizeVert(items,posPlus)})};

var Tabs = function( tabsItems, pagesItems ){
    var t = this, tabs = $(tabsItems), pages = $(pagesItems);
  tabs.click(function(){ t.select($(this).index()) });
  t.selected = null; // public callback
  t.select = function(id){ // public method
    tabs.removeClass('active').eq(id).addClass('active');
    pages.removeClass('active').eq(id).addClass('active');
  };
};

$(document).ready( domReady );
$(window).load( windowOnload );

function domReady(){


  centerizeVert('section.content ul.product-nav li a img.product-img', 0, 1, 0);
  centerizeVert('section.content ul.certif-list li a img', 0, 1, 0);
  centerizeVert('aside.sidebar.right .general-sale .img-wrap img', 0, 1, 0);
  centerizeVert('ul.complect-list .img-wrap img', 0, 1, 0);
  centerizeVert('ul.basket-list .img-wrap img', 0, 1, 0);

  $('.select-style, .check-style, .radio-style').styler();

  /*Инициализация ползунка*/
  (function() {
    $( ".slider-range" ).slider({
      range: true,
      min: 0,
      max: 100000,
      values: [ 15000, 100000 ],
      animate: "fast",
      slide: function( event, ui ) {
        $( ".range-min" ).val(ui.values[ 0 ]);
        $( ".range-max" ).val(ui.values[ 1 ]);
      }
    });
    $( ".range-min" ).val($(".slider-range" ).slider( "values", 0 ));
    $( ".range-max" ).val($(".slider-range" ).slider( "values", 1 ));
  })();

  /*Дружим инпуты со ползунком
  (Передача значений от инпутов в ползунок при редактировании инпута.
  Значение передаеться при потере фокуса у инпута.
  В стандартном варианте ui такой функции нет)*/
  $(".range-wrap").each(function(){
    var amountMin = $(this).find("input.range-min");
    var amountMax = $(this).find("input.range-max");
    var sliderR = $(this).find(".slider-range");
    amountMin.change(function(){
      var value1= amountMin.val();
      var value2= amountMax.val();
      if(parseInt(value1) > parseInt(value2)){
        value1 = value2;
        amountMin.val(value1);
      }
      sliderR.slider("values",0,value1);  
    });
  });
  $(".range-wrap").each(function(){
    var amountMin = $(this).find("input.range-min");
    var amountMax = $(this).find("input.range-max");
    var sliderR = $(this).find(".slider-range");
    amountMax.change(function(){
      var value1 = amountMin.val();
      var value2 = amountMax.val();
      if(parseInt(value1) > parseInt(value2)){
        value2 = value1;
      amountMax.val(value2);
      }
      sliderR.slider("values",1,value2);
    });
  });
  
  /*Исключаем ввод букв в инпуты слайдера регулярным выражением*/
  $('range-wrap .range-min, range-wrap .range-max').bind("change keyup input click", function() {
    if (this.value.match(/[^0-9]/g)) {
        this.value = this.value.replace(/[^0-9]/g, '');
    }
  });

	
  $(".product-options").each(function(){
    var colorSelect = $(this).find('.line.color .jq-selectbox');
    var select = colorSelect.find('select');
    var selectedColor = colorSelect.find(".jq-selectbox__select-text");
    select.change(function(){
      selectedColor.removeClass("red blue green yellow");
      switch (selectedColor.text()) {
        case("Крассный"):selectedColor.addClass("red");break;
        case("Синий"):selectedColor.addClass("blue");break;
        case("Зеленый"):selectedColor.addClass("green");break;
        case("Желтый"):selectedColor.addClass("yellow");break;
      }
    });
  });

  (function() {
    var nav = $("nav.main-nav");
    var item = nav.find("ul li.first-level");
    item.each(function(){
      var subNav = $(this).find(".sub-nav");
      $(this).mouseenter(function(){
        subNav.slideDown(150);
      });
      $(this).mouseleave(function(){
        subNav.stop(true, true);
        subNav.slideUp(150);
      });
    });
  })();


	$("aside.sidebar ul.catalog-nav > li").each(function(){
		var li = $(this);
		var subCat = li.find("ul.sub-category");
		li.mouseenter(function(){
			if( li.hasClass('active') ) return;
			subCat.slideDown(150);
		});
		li.mouseleave(function(){
			if( li.hasClass('active') ) return;
			subCat.stop().slideUp(150);
		});
		li.click(function(){
			li.toggleClass('active');
		});
	});
	
	(function(){
		var fix = $('aside.sidebar.left');
		if(!fix.length) return;
		var win = $(window),
			body = $('body'),
			contentWrap = body.find('div.content-wrap'),
			topOrig = fix.offset().top,
			bottomMargin = 275;
		function pos(){
			var contentWrapLeft = contentWrap.offset().left - win.scrollLeft(),
				winTop = win.scrollTop(),
				winBottom = body.height() - bottomMargin,
				bottom = winTop + fix.height();
			if( winTop > topOrig ){
				if( bottom < winBottom ) fix.css({
					position: 'fixed',
					top: 0,
					left: contentWrapLeft + 'px',
					bottom: 'auto'
				}); else fix.css({
					position: 'absolute',
					left: 0,
					top: 'auto',
					bottom: bottomMargin + 'px'
				});
			} else fix.css({
				position: 'absolute',
				left: 0,
				top: 0,
				bottom: 'auto'
			});
		}
		pos();
		win.scroll(pos).resize(pos);
	})();


  var tabs = new Tabs ($('.tabs .tab'), $('.tab-item'));

}

function windowOnload(){
	
	
	
	
}