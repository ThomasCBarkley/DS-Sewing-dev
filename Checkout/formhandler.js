(function($, undefined) {

    "use strict";
  
    // When ready.
    $(function() {
      
      var $form = $( "#form" );
      var $input = $form.find( "input" );
  
      $input.on( "keyup", function( event ) {
        
        
        // When user select text in the document, also abort.
        var selection = window.getSelection().toString();
        if ( selection !== '' ) {
          return;
        }
        
        // When the arrow keys are pressed, abort.
        if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 ) {
          return;
        }
        
        
        var $this = $( this );
        
        // Get the value.
        var input = $this.val();
        
        var input = input.replace(/[\D\s\._\-]+/g, "");
            input = input ? parseInt( input, 10 ) : 0;
  
            $this.val( function() {
              return ( input === 0 ) ? "" : input.toLocaleString( "en-US" );
            } );
      } );
      
      /**
       * ==================================
       * When Form Submitted
       * ==================================
       */
      $form.on( "submit", function( event ) {
        
        var $this = $( this );
        var arr = $this.serializeArray();
      
        for (var i = 0; i < arr.length; i++) {
            arr[i].value = arr[i].value.replace(/[($)\s\._\-]+/g, ''); // Sanitize the values.
        };
        
        console.log( arr );
        
        event.preventDefault();
      });
      
    });
  })(jQuery);


    /////////////
    // Date///
var date = document.getElementById('date');

function checkValue(str, max) {
  if (str.charAt(0) !== '0' || str == '00') {
    var num = parseInt(str);
    if (isNaN(num) || num <= 0 || num > max) num = 1;
    str = num > parseInt(max.toString().charAt(0)) && num.toString().length == 1 ? '0' + num : num.toString();
  };
  return str;
};

date.addEventListener('input', function(e) {
  this.type = 'text';
  var input = this.value;
  if (/\D\/$/.test(input)) input = input.substr(0, input.length - 3);
  var values = input.split('/').map(function(v) {
    return v.replace(/\D/g, '')
  });
  if (values[0]) values[0] = checkValue(values[0], 12);
  if (values[1]) values[1] = checkValue(values[1], 31);
  var output = values.map(function(v, i) {
    return v.length == 2 && i < 2 ? v + ' / ' : v;
  });
  this.value = output.join('').substr(0, 14);
});

date.addEventListener('blur', function(e) {
  this.type = 'text';
  var input = this.value;
  var values = input.split('/').map(function(v, i) {
    return v.replace(/\D/g, '')
  });
  var output = '';
  
  if (values.length == 3) {
    var year = values[2].length !== 4 ? parseInt(values[2]) + 2000 : parseInt(values[2]);
    var month = parseInt(values[0]) - 1;
    var day = parseInt(values[1]);
    var d = new Date(year, month, day);
    if (!isNaN(d)) {
      document.getElementById('result').innerText = d.toString();
      var dates = [d.getMonth() + 1, d.getDate(), d.getFullYear()];
      output = dates.map(function(v) {
        v = v.toString();
        return v.length == 1 ? '0' + v : v;
      }).join(' / ');
    };
  };
  this.value = output;
});


////////
// Serial number

(function($, undefined) {

    "use strict";
  
    // When ready.
    $(function() {
      
      var $form = $( "#form" );
      var $input = $form.find( "input" );
  
      $input.on( "keyup", function( event ) {
        
        
        // When user select text in the document, also abort.
        var selection = window.getSelection().toString();
        if ( selection !== '' ) {
          return;
        }
        
        // When the arrow keys are pressed, abort.
        if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 ) {
          return;
        }
        
        var $this = $(this);
        var input = $this.val();
            input = input.replace(/[\W\s\._\-]+/g, '');
          
          var split = 4;
          var chunk = [];
  
          for (var i = 0, len = input.length; i < len; i += split) {
            split = ( i >= 8 && i <= 16 ) ? 4 : 8;
            chunk.push( input.substr( i, split ) );
          }
  
          $this.val(function() {
            return chunk.join("-").toUpperCase();
          });
      
      } );
      
      /**
       * ==================================
       * When Form Submitted
       * ==================================
       */
      $form.on( "submit", function( event ) {
        
        var $this = $( this );
        var arr = $this.serializeArray();
      
        for (var i = 0; i < arr.length; i++) {
            arr[i].value = arr[i].value.replace(/[($)\s\._\-]+/g, ''); // Sanitize the values.
        };
        
        console.log( arr );
        
        event.preventDefault();
      });
      
    });
  })(jQuery);