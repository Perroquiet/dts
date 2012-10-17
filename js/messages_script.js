var myMessages = ['info','warning','error','success']; // define the messages types		 
	function hideAllMessages()
	{
			 var messagesHeights = new Array(); // this array will store height for each
		 
			 for (i=0; i<myMessages.length; i++)
			 {
					  messagesHeights[i] = $('.' + myMessages[i]).outerHeight();
					  $('.' + myMessages[i]).css('top', -messagesHeights[i]); //move element outside viewport	  
			 }
	}

	function showMessage(type)
	{
		$('.'+ type +'-trigger').click(function(){
			  hideAllMessages();				  
			  $('.'+type).animate({top:"0"}, 500);
		});
	}

	$(document).ready(function(){
			 
			 // Initially, hide them all
			 hideAllMessages();
			 
			 // Show message
			 for(var i=0;i<myMessages.length;i++)
			 {
				showMessage(myMessages[i]);
			 }
			 
			 // When message is clicked, hide it
			 $('.message').click(function(){			  
					  $(this).animate({top: -$(this).outerHeight()}, 500);
			  });		 
			 
	}); 