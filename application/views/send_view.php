<script type="text/javascript">
		
function con(message) {
 var answer = confirm(message);
 if (answer) {
  return true;
 }

 return false;
}

function add() {
 var p = "<tr><td/><td align='left'></td></tr>";
 $("#recipients").append(p);
 $("#rbutton").remove();
}

function insertText() {
	var td1 = document.getElementById('td1');
	//var append = $('#receiverName1 option').clone();
	//var append = document.getElementById('td1').firstChild.data;
	// var text = document.createNode();
	var text = td1.cloneNode(true);
	//td1.appendChild(text);
	document.getElementById('td1').appendChild(text);
}

$("button#addRecipient").live( 'click', function(){
    $("#td1").append("<br />");
	var cloned = $("#tr1 td:last").clone(false).appendTo( $("#td1") );
    cloned.find('[name^=data]').attr('name', function() {
        var index = this.name.match(/\d*(\d)/);
        if (index != null && index.length > 1) {
            var newIndex = parseInt(index[1], 10) + 1; 
            return this.name.replace(/\d*(\d)/, newIndex);
        }
        return this.name;    
    });
});


function add() {
// var $newSelect = $('select[name=receiverName0]')
                    // .clone()
                    // .attr('name', function(i,n) { 
                         // var int = 
                                // parseInt(n.match(/\d*/),10); 
                         // return n.replace(/\d*/, int + 1); 
                     // });
					 
					// $('#td1').append($newSelect.attr('name', 'receiverName'));
					// $('#td1').append("<br/>");
}
</script>

<?php
$add_recipient = array (
	'name'		=>	'addRecipient',
	'id'		=>	'addRecipient',
	'content'	=>	'Add Next Receiver',
	'onClick'	=>	'return add()'
);

$subject = array(
	'name'		=>	'documentName',
	'value'		=>	set_value('subject')
);


	// if (isset($receivers)) {
		// $dropdown_array = array();
		// $dropdown_array[] = '';
		// foreach($receivers as $row)	{
			// $dropdown_array[$row->user_id] = $row->first_name . ' ' . $row->last_name;
		// }
	// }
	
?>

<div id="rounded">
<div id="main" class="container">
<?php echo validation_errors('<p class="error">'); ?>
<div id="content">
	
	<div class="send_form">
	
	<?php echo form_open('send/submit'); ?>
	
	<table align='center'>
		<tr>
			<td align='right'>
				<b><?php echo form_label("Document Name: "); ?></b>
			</td>
			<td align='left'>
				<?php echo form_input($subject); ?> 
				</br>
				<?php // echo form_button($add_recipient) ."<br/>"; ?>
			</td>
		</tr>
	
	<tr id="tr1">
			<td align='right'>
				<b>
				<?php echo "Send to:"; ?>
				</b>
			</td>
			<td align='left' id="td1" >
				
				    <input type="text" id="demo-input" name="recipients" />
        
					<script type="text/javascript">
					$(document).ready(function() {
						$("#demo-input").tokenInput(<?php echo $receivers; ?>, {
							hintText: "Type in name of receiver(s) for the document",
							//theme: "facebook"
						});
					});
					
					</script>
    
				<?php //echo form_dropdown('data0', $dropdown_array, '', 'id="sel1"'); ?>
				
			</td>
			
		</tr>
	
	<br/>
	<tr align='center'>
		<td align='right'>
			<b>
			<?php echo "Description: "; ?>
			</b>
		</td>
		
		<td align='left'>
			<?php echo form_textarea('documentDescription', ''); ?>
			<br/>
		</td>
	</tr>
	<tr align='center'>
		<td/>
		<td align='center'>
		<?php echo form_submit('submit', 'Submit', 'onclick="return con(\'Are you sure to send the document? Click OK or Cancel button.\')"'); ?>
		<?php echo anchor(base_url(), 'Back'); ?>
		</td>
		
	</tr>
	
	
	<?php echo form_close(); ?>
	</table>
	</div>
</div>
</div>
</div>