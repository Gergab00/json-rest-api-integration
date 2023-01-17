import jQuery from 'jquery';
import 'datatables.net';

( function ( $ ) {
	// Use the $ in peace...
	$('#users-table').DataTable();

	$( '.user-details-link' ).on( 'click', function( e ) {
		e.preventDefault();
	  
		var user_id = $( this ).attr( 'href' ).split( '=' )[1];
	  
		$.ajax( {
		  type: 'POST',
		  url: userstable_script.url,
		  data: {
			action: 'get_user_details',
			user_id: user_id,
			nonce: userstable_script.nonce
		  },
		  success: function( response ) {
			if ( response.success ) {
			  // Show the user details in a modal
			  showUserDetailsModal( response.data );
			  $('#staticBackdrop').modal('show');
			} else {
			  // Show an error message
			  alert( 'An error occurred: ' + response.data );
			}
		  }
		} );
	  } );

	  $( '.user-details-close-btn' ).on( 'click', function( e ) {
		var modalBody = $('.modal-body');
		modalBody.empty();
	  });
	  
	  function showUserDetailsModal(userData) {
		  var modalBody = $('.modal-body');
		  modalBody.empty();
		
		  var name = $('<p>').text('Name: ' + userData.name);
		  var username = $('<p>').text('Username: ' + userData.username);
		  var email = $('<p>').text('Email: ' + userData.email);
		  var phone = $('<p>').text('Phone: ' + userData.phone);
		  var website = $('<p>').text('Website: ' + userData.website);
		  var company = $('<p>').text('Company: ' + userData.company.name);
		  var address = $('<p>').text('Address: ' + userData.address.street + ' ' + userData.address.suite + ' ' + userData.address.city + ' ' + userData.address.zipcode);
		  var geo = $('<p>').text('Geo: ' + userData.address.geo.lat + ', ' + userData.address.geo.lng);
		
		  modalBody.append(name, username, email, phone, website, company, address, geo);
		}
} )( jQuery );	

  