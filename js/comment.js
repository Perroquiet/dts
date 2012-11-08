$(document).ready(function(){
    
    var baseurl = $('#baseurl').val();
    $('.submitComment').submit(function(){
        
        $.ajax({
            url : baseurl + 'index.php/comment/insert',
            data : $(' form').serialize(),
            type: "POST",
            success : function(comment){
                
                $(comment).hide().insertBefore('#insertbeforMe').slideDown('slow');
            }
        })
        return false;
    })
})