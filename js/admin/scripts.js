// JavaScript Document



	jQuery(document).ready(function($){

		

		$.each($('.gp-element'), function(){

			//console.log($(this));

			$(this).prepend('<a class="drag fa-hand-o-up fa" title="You can drag and reposition. (Coming Soon!)"></a><a class="delete fa-times fa" title="Click here to remove this element"></a>');

		});

		

		$('.gp-element .delete').click(function(){

			var ask = confirm('Are you sure that you want to remove this element?');

			if(ask){

				$(this).parent().remove();

			}

		});

		

		if($('input[value="elbisc_sibling"]').length>0)

		$('input[value="elbisc_sibling"]').parents().eq(1).hide()



		//if($('input[value="language"]').length>0)

		//$('input[value="language"]').parents().eq(1).hide()

		

		$('.switchable_lang').change(function(){

			var obj = $('input[value="elbisc_sibling"]');

			var id = obj.attr('id').replace('key', 'value');

			$('#'+id).val($(this).val());

		});

		

		if($('.switchable_lang').length>0){

			$('#postdivrich_wrap').prepend($('.switchable_lang'));

			$('.switchable_lang').show();

		}

		
		$.each($(':input[data-repeater="true"]'), function(){
			var obj = $(this).parent();
			
			if(obj.find('.repeater-plus').length==0)
			obj.prepend('<a class="repeater-plus">Add Field</a>');
			
			$('<a class="repeater-minus">Remove</a>').insertAfter($(this));
		});
		
		$('.gp-fieldset').on('click', 'a.repeater-plus', function(){
			var wrap = $(this).parent(); 
			var obj = wrap.find(':input[data-repeater="true"]').eq(0);
			wrap.append(obj.clone().val(''));
			wrap.append('<a class="repeater-minus">Remove</a>');
			
		});
		$('.gp-fieldset').on('click', 'a.repeater-minus', function(){
			$(this).prev().remove();
			$(this).remove();
		});
		
		
		$('.gp-section.repeater').on('click', 'a.repeater-group-plus', function(){
			var wrap = $(this).parent();
			var this_item = wrap.find('.rfields a.active').parent().index();
			
			$.each(wrap.find('.gp-fieldset'), function(){
				//console.log($(this));	
				var obj = $(this).find('.repeater-field').eq(0);
				$(this).append(obj.clone().val(''));
				
			});
			
			repeater_refresh();
			wrap.find('.rfields a:last-child').click();
			
		});
		$('.gp-section.repeater').on('click', 'a.repeater-group-minus', function(){
			var wrap = $(this).parent();
			var this_item = wrap.find('.rfields a.active').parent().index();
			
			$.each(wrap.find('.gp-fieldset'), function(){
				
				$(this).find('.repeater-field').eq(this_item).remove();
				
			});
			
			repeater_refresh();
			wrap.find('.rfields a:last-child').click();
			
		});		
		
		
		
		$.each($('.repeater.gp-section .gp-fieldset'), function(){
			$(this).find('.repeater-field').eq(0).show();
			
			
		});
		
		function repeater_refresh(){
			$.each($('.repeater.gp-section'), function(){
				$(this).find('.rfields').remove();
				$(this).find('.repeater-group-plus').remove();
				$(this).find('.repeater-group-minus').remove();
				var repeater_fields = 0;
				repeater_fields = $(this).find('.gp-fieldset').eq(0).find('.repeater-field').length;	
							
				var rf_html;
				var rf_btns;
				rf_btns = '<a class="repeater-group-plus">Add Fieldset</a><a class="repeater-group-minus">Remove Fieldset</a>';
				if(repeater_fields>0){
					rf_html = '<ul class="rfields">';
					for(r=1; r<=repeater_fields; r++){
						rf_html += '<li><a>'+r+'</a></li>';
					}
					rf_html += '</ul>';
				}
				$(this).append(rf_html);
				$(this).prepend(rf_btns);
				$(this).find('.rfields a').eq(0).addClass('active');
				//console.log($(this));				
			});
		}
		
		repeater_refresh();
		
		$('.repeater.gp-section').on('click', '.rfields a', function(){
			var this_item = $(this).parent().index();
			var obj = $(this).parents().eq(2);
			//console.log(this_item);
			$.each($(obj).find('.gp-fieldset'), function(){
				var all_items = $(this).find('.repeater-field');			
				//console.log(all_items);
				all_items.hide();
				//console.log(all_items.eq(this_item));
				all_items.eq(this_item).show();
			});
			
			$(obj).find('.rfields .active').removeClass('active');
			$(this).addClass('active');
		});
	});