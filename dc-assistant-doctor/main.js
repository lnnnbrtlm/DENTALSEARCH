$(function() { 
    $('#sidebarCollapse').on('click', function() {
      $('#sidebar, #content').toggleClass('active');
    });
  });
  
  function enable(){
	document.getElementById("firstName").disabled = "";
  }