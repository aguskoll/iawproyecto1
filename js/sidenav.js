/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 $(".button-collapse").sideNav();
 
  $('.button-collapse').sideNav({
      menuWidth: 200, // Default is 240
      edge: 'left', // Choose the horizontal origin
      closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
    }
  );
    // Show sideNav
//  $('.button-collapse').sideNav('show');
  // Hide sideNav
  $('.button-collapse').sideNav('hide');

//$("#boton_menu").click(function(){
  //   $('.button-collapse').sideNav('show');

//});

function boton_menu(){
    
     $('.button-collapse').sideNav('show');
    
}