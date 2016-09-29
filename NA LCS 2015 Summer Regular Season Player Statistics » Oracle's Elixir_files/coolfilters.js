jQuery(window).load(function() {
	
	jQuery.extend(jQuery.expr[':'], {
		'containsIN': function(elem, i, match, array) {
			return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || '').toLowerCase()) >= 0;
		}
	});
	
	var table = jQuery('table[id*=tablepress-]').DataTable();
	
	var logic = {
		'||' : function(a, b) { return a || b },
		'|'  : function(a, b) { return a || b },
		','  : function(a, b) { return a || b },
		'OR' : function(a, b) { return a || b },
		'&&' : function(a, b) { return a && b },
		'&'  : function(a, b) { return a && b },
		'AND': function(a, b) { return a && b }
	};
	
	var compare = {
		'>' : function(a, b) { return a > b },
		'>=': function(a, b) { return a >= b },
		'<' : function(a, b) { return a < b },
		'<=': function(a, b) { return a <= b },
		'==': function(a, b) { return a == b },
		'=' : function(a, b) { return a == b },
		'!=': function(a, b) { return a != b },
		'<>': function(a, b) { return a != b }
	};
	
	jQuery('select.coolfilter').each(function() {
	
		var column = parseInt(jQuery('.dataTables_wrapper .dataTables_scrollHead th:containsIN('+jQuery(this).attr('class').replace('coolfilter ', '')+')').attr('class').split(' ').shift().replace('column-', ''), 10) - 1;
		
		var options = table.column(column).data().sort().unique();
		
		for (index = 0, len = options.length; index < len; ++index) {
			jQuery(this).append('<option value="'+options[index]+'">'+options[index]+'</option>'); 
		}
		
		jQuery(this).chosen({placeholder_text_multiple:jQuery(this).attr('class').replace('coolfilter ', '').toUpperCase()})
	
	});
	
	jQuery.fn.dataTable.ext.search.push(
		function( settings, searchData, index, rowData, counter ) {
		
			var result = true;
			
			jQuery('.coolfilters .coolfilter').each(function() {
				
				var column = parseInt(jQuery('.dataTables_wrapper .dataTables_scrollHead th:containsIN('+jQuery(this).attr('class').replace('coolfilter ', '')+')').attr('class').split(' ').shift().replace('column-', ''), 10) - 1;
				
				if ( jQuery(this).val() == null ) {
					var term = '';
				} else if ( jQuery(this).val().constructor === Array ) {
					var term = [];
					var array = jQuery(this).val();
					
					jQuery.each( array, function(index, value) {
						term.push(value.replace(/\s/g, ''));
						if ( index < array.length-1 ) {
							term.push('||');
						}
					});
				} else {
					var term = jQuery(this).val().replace(/\s/g, '').split(/([><=]{2}|[|&]{2}|[><,|&])/g);
				}
				
				var source = parseFloat(searchData[column].replace(/[,%]/g, ''));
				
				var index = -1;
				while (index++ < term.length) {
					
					if (
					term[index] == '>'  ||
					term[index] == '>=' ||
					term[index] == '<'  ||
					term[index] == '<=' ||
					term[index] == '==' ||
					term[index] == '='  ||
					term[index] == '!=' ||
					term[index] == '<>'
					) {
						term.splice(index, 2, compare[term[index]](source,term[index+1]));
					} else if ( term[index] == '' ) {
						term.splice(index--	, 1);
					} else if (
					term[index] != undefined &&
					term[index] != '||' &&
					term[index] != '|' &&
					term[index] != ',' &&
					term[index] != 'OR' &&
					term[index] != '&&' &&
					term[index] != '&' &&
					term[index] != 'AND' &&
					(/[a-z]/i.test(term[index]) ||
					term[index-1] != '>'  &&
					term[index-1] != '>=' &&
					term[index-1] != '<'  &&
					term[index-1] != '<=' &&
					term[index-1] != '==' &&
					term[index-1] != '='  &&
					term[index-1] != '!=' &&
					term[index-1] != '<>' )
					) {
												
						if ( term[index].toLowerCase() == searchData[column].replace(/\s/g, '').toLowerCase() ) {
							term.splice(index, 1, true);
						} else {
							term.splice(index, 1, false);
						}
												
					}
				}
				
				index = -1;
				while (index++ < term.length) {
					
					if (
					term[index] == '||'  ||
					term[index] == '|'   ||
					term[index] == ','   ||
					term[index] == 'OR'  ||
					term[index] == '&&'  ||
					term[index] == '&'   ||
					term[index] == 'AND'
					) {
						term.splice(index-1, 3, logic[term[index]](term[index-1],term[index+1]));
						index--;
					}
				}
				
				if ( term[0] === false ) {
					result = false;
				}
				
			});
			
			
			
			return result; //matches all filters
			
		}
	);
	
	jQuery('.coolfilter').on('keyup change', function() {
		table.draw();
	});
	
});