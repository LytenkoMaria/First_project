
   
var textarea = document.querySelector(".dinam-size");
textarea.addEventListener('keydown', autosize);
             
function autosize(){

  var el = this;
  setTimeout(function(){
    el.style.cssText = 'height:auto; padding:0';
    el.style.cssText = 'height:' + el.scrollHeight + 'px';
  },0);
}

$(document).on("submit",".create-new-comment", function(e) {
         e.preventDefault();
        var form = $(this);
        $.ajax({
          type: "post",
          dataType: 'json',
          url: "./ComentsForm.php",
          data: form.serialize(),
          success: function(result) { 
            $('.new-bar').append("<img class='coments-image mr-3' src='"+result.picture_path+"'>");
            $('.new-bar').append("<div class='bord'><div class='user-name-title'><h6>"+result.user_name+"</h6>"+result.date_coment+"</div></div>");
            $('.new-bar').append("<button  type='button' id='reply' data-id='"+result.id+"' name='reply' class=' reply btn btn-primary'><strong>Reply</strong></button>");
            $('.new-bar').append("<textarea name='coments' data-id='"+result.id+"' class='last-coment' readonly>"+result.text+"\n</textarea>");
            $('.new-bar').append("<form method='post' class='create-reply-comment reply-comment' data-id='"+result.id+"'><input name='parent_id' type='hidden' value='"+result.id+"'></form>"); 
            $('.new-bar').append("<div class='child_coments' data-id='"+result.id+"'></div>");  
                                          
                          // console.log(result); 
                                   },
        error: function (data) {
        console.log('Error', data);
    },        
        })
      });

$(document).on("click",".reply", function (){
           $('.reply').attr("disabled",true);
           $('.new-coment').hide();   

           var data_id =$(this).attr("data-id");
           //console.log(data_id);         
           $('.reply-comment[data-id="'+ data_id +'"]').css("display","block");
           $('.reply-comment[data-id="'+ data_id +'"]').append('<textarea id="dinam-size" name="coments" class=" reply-coment"></textarea>');
           $('.reply-comment[data-id="'+ data_id +'"]').append("<input name='parent_id' type='hidden' value='"+data_id+"'>");
           $('.reply-comment[data-id="'+ data_id +'"]').append('<button type="button" data-id="'+data_id+'" id="close-reply-bar" class="close replay-close">&times;</button>');
           $('.reply-comment[data-id="'+ data_id +'"]').append('<button  data-id="'+data_id+'" type="submit" id="create-reply-comment" name="create-reply-comment" class=" create-reply-comment btn btn-primary"><strong>Send</strong></button>');
           
        }
    );



$(document).on("submit",".create-reply-comment", function(r) {
         r.preventDefault();
          $('.new-coment').show();
          $('.reply').removeAttr("disabled");      
          $(".create-reply-comment").hide();  
          var data_id =$(this).attr("data-id");

        var form_reply = $(this);
        $.ajax({
          type: "post",
          dataType: 'json',
          url: "./ReplyComentsForm.php",
          data: form_reply.serialize(),
          success: function(result) { 
            $('.child_coments[data-id="'+ result.id_parent_coment +'"]').append("<img class='coments-image mr-3' src='"+result.picture+"'>");
            $('.child_coments[data-id="'+ result.id_parent_coment +'"]').append("<div class='bord'><div class='user-name-title'><h6>"+result.user_name+"</h6>"+result.date_coment+"</div></div>");
            $('.child_coments[data-id="'+ result.id_parent_coment +'"]').append("<button  type='button' id='reply' data-id='"+result.id+"' name='reply' class=' reply btn btn-primary'><strong>Reply</strong></button>");
            $('.child_coments[data-id="'+ result.id_parent_coment +'"]').append("<textarea name='coments' data-id='"+result.id+"' class='last-coment' readonly>"+result.text+"\n</textarea>");
            $('.child_coments[data-id="'+ result.id_parent_coment +'"]').append("<form method='post' class='create-reply-comment reply-comment' data-id='"+result.id+"'><input name='parent_id' type='hidden' value='"+result.id+"'></form>"); 
            $('.child_coments[data-id="'+ result.id_parent_coment +'"]').append("<div class='child_coments' data-id='"+result.id+"'></div>"); 

         $('.reply-comment[data-id="'+ data_id +'"]').html("<form method='post' class='create-reply-comment reply-comment' data-id='"+ data_id +"'></form>"); 
                          console.log(result); },
        })
      });



$(document).on("click",".close", function (){
           $('.new-coment').show();
           $('.reply').removeAttr("disabled");
           var data_id =$(this).attr("data-id");      
           console.log("sss",data_id);            
           $('.create-reply-comment').hide();    
         $('.reply-comment[data-id="'+ data_id +'"]').html("<form method='post' class='create-reply-comment reply-comment' data-id='"+ data_id +"'></form>");
        }
    );
