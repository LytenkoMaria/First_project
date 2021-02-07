
   
var textarea = document.querySelector(".dinam-size");
textarea.addEventListener('keydown', autosize);
             
function autosize(){

  var el = this;
  setTimeout(function(){
    el.style.cssText = 'height:auto; padding:0';
    // for box-sizing other than "content-box" use:
    // el.style.cssText = '-moz-box-sizing:content-box';
    el.style.cssText = 'height:' + el.scrollHeight + 'px';
  },0);
}

$('#create-new-comment').on("submit", function(e) {
         e.preventDefault();
        var $form = $(this);
        $.ajax({
          type: "post",
          dataType: 'json',
          url: "./ComentsForm.php",
          data: $form.serialize(),
          success: function(result) { 
                           $('.new-bar').append('<img class="coments-image mr-3" src="'+result.picture_path+'" >');
                           $('.new-bar').append('<h6 class="user-name-title">'+result.user_name+'&nbsp&nbsp&nbsp&nbsp'+result.date_coment+'</h6>');
                           $('.new-bar').append('<textarea id="dinam-size2" name="coments"  class=" last-coment">'+result.text+'</textarea>');  
                           console.log(result); 
                                   },
        })
      });

