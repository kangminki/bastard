
/* jslint undef: true */
/* global window, document, $ */

/* ----------------------------------------------------------------
 * app.js
 * 
 * Some js functions and stuff
 * ---------------------------------------------------------------- */

(function() {
	
	'use strict';
    
    var client_state = '';
	
	function getFormContents(selector) {
		var data = $(selector).serializeArray();
		var result = {};
		for (var key in data) {
			result[data[key].name] = data[key].value;
		}
		return result;
	}
	
	function checkLoginData(el) {
		var data = getFormContents(el);
		var obj = {
			success : false
		};
		if(data.authcate && data.password) {
			if(data.authcate.length > 1 && data.password.length > 1) {
				obj.success = true;
				obj.data = data;
			} else {
				obj.message = 'Your password and authcate don\'t match, please try again';
			}
		} else {
			obj.message = 'Please fill in all the fields';
		}
		return obj;
	}
	
	function setup() {
        $('.dropdown-menu > li > a').click(function(e) {
            client_state = this.innerHTML;
            var str = this.innerHTML + '&nbsp;&nbsp;&nbsp;&nbsp;' + '<span class="caret"></span>';
            $('.dropdown-toggle').html(str);
        });
        
		$('#login').submit(function(e) {
			
			var result = checkLoginData(this);
			if(result.success) {
			} else {
				e.preventDefault();
				$('.error').html(result.message);
			}
		});
        
        $('#add-client').submit(function(e) {
            var data = getFormContents(this);
            data.client_state = client_state;
            console.log(data);
            e.preventDefault();
        });
	}
    
    $(document).ready(function() {
        setup();
        
    });
	
})();