(function($){
	$.fn.customSelect = function(options) {
		var defaults = {
			myClass : 'mySelect',
			fixedWidth : false
		};
		var settings = $.extend({}, defaults, options);
				
		this.each(function() {
			// Var	
			var $this = $(this);
			var thisClass = $(this).attr("class");
			var thisOpts = $('option',$this);
			var thisSelected = $this[0].selectedIndex;
			var options_clone = '';
			
			$this.hide(); /* --> display defined by CSS */
			
			options_clone += '<li rel="" class="level-1"><span>'+thisOpts[thisSelected].text+'</span><ul>'
			for (var index in thisOpts) {
				//Check to see if option has any text, and that the value is not undefined
				if(thisOpts[index].text && thisOpts[index].value != undefined) {
					options_clone += '<li class="level-2" rel="' + thisOpts[index].value + '"><span>' + thisOpts[index].text + '</span></li>'
				}
			}
			options_clone += '</ul></li>';
			
			var mySelect = $('<ul class="' + settings.myClass + " " + thisClass + '">').html(options_clone); //Insert Clone Options into Container UL
			$this.after(mySelect); //Insert Clone after Original
			
			$this.next('ul').find('ul').hide();
	
			if (!settings.fixedWidth) {
			var selectWidth = $this.next('ul').find('ul').outerWidth(); //Get width of dropdown before hiding
			$this.next('ul').css('width',selectWidth);
			}
			
			//on click, show dropdown
			$this.next('ul').find('span').click(function(){
				$this.next('ul').find('ul').toggle();
				if ($this.next('ul').find('ul').is(':visible')) {
					$this.next('ul').addClass('open');
				} else {
					$this.next('ul').removeClass('open');
				}
			});

			//on click, change top value, select hidden form, close dropdown
			$this.next('ul').find('ul span').click(function(){
				$(this).closest('ul').children().removeClass('selected');
				$(this).parent().addClass("selected");
				selection = $(this).parent().attr('rel');
				selectedText = $(this).text();
				$(this).closest('ul').prev().html(selectedText);
				$(this).closest('ul').hide();
				$this.val(selection);
			});

		});
		// returns the jQuery object to allow for chainability.
		return this;
	}
})(jQuery);