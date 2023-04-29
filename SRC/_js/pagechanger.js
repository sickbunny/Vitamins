$(document).ready(function() {
    $('#nav a').click(function(e) {
     e.preventDefault();
     $('#content').load($(this).attr('href'));
    });
   });