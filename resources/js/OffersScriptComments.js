
  
var textarea = document.querySelector(".dinam-size");
textarea.addEventListener('keydown', autosize);
             
function autosize(){

  var el = this;
  setTimeout(function(){
    el.style.cssText = 'height:auto; padding:0';
    el.style.cssText = 'height:' + el.scrollHeight + 'px';
  },0);
}

$(document).on("submit",".create-new-comments", function(e) {
         e.preventDefault();
        var form = $(this);
        $.ajax({
          type: "post",
          dataType: 'json',
          url: "./OffersCommentsForm.php",
          data: form.serialize(),
          success: function(result) { 
            $('.new-bar').append("<img class='comments-image mr-3' src='"+result.picture_path+"'>");            
            $('.new-bar').append("<div class='bord'><div class='user-name-title'>"+result.user_name+"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"+result.date_comments+"</div></div>");
            $('.new-bar').append("<button  type='button' id='reply' data-id='"+result.id+"' name='reply' class=' reply btn btn-primary'><strong>Reply</strong></button>");
            $('.new-bar').append("<textarea name='comments' data-id='"+result.id+"' class='last-comments' readonly>"+result.text+"\n</textarea>");
            $('.new-bar').append("<form method='post' class='create-reply-comments reply-comments' data-id='"+result.id+"'><input name='parent_id' type='hidden' value='"+result.id+"'></form>"); 
            $('.new-bar').append("<div class='child_comments' data-id='"+result.id+"'></div>"); 
             $('.new-comments').val('');  
                                         
                           console.log(result); 
                                   },
        error: function (data) {
        console.log('Error', data);
    },        
        })
      });

$(document).on("click",".reply", function (){
           $('.reply').attr("disabled",true);
           $('.new-comments').hide();   

           var data_id =$(this).attr("data-id");
           console.log(data_id);         
          
           $('.reply-comments[data-id="'+ data_id +'"]').append('<textarea id="dinam-size" name="comments" class="reply-com"></textarea>');
           $('.reply-comments[data-id="'+ data_id +'"]').append("<input name='parent_id' type='hidden' value='"+data_id+"'>");
           $('.reply-comments[data-id="'+ data_id +'"]').append('<button type="button" data-id="'+data_id+'"  class="close replay-close">&times;</button>');
           $('.reply-comments[data-id="'+ data_id +'"]').append('<button  data-id="'+data_id+'" type="submit" id="create-reply-comments" name="create-reply-comments" class=" create-reply-comments btn btn-primary"><strong>Send</strong></button>');
           $('.reply-comments[data-id="'+ data_id +'"]').css("display","block");
        }
    );



$(document).on("submit",".create-reply-comments", function(r) {
         r.preventDefault();
          $('.new-comments').show();
          $('.reply').removeAttr("disabled");      
          $(".create-reply-comments").hide();  
          var data_id =$(this).attr("data-id");

        var form_reply = $(this);     
        $.ajax({
          type: "post",
          dataType: 'json',
          url: "./OffersReplyCommentsForm.php",
          data: form_reply.serialize(),
          success: function(result) { 
            $('.child_comments[data-id="'+ result.id_parent_comments +'"]').append("<img class='comments-image mr-3' src='"+result.picture+"'>");
            $('.child_comments[data-id="'+ result.id_parent_comments +'"]').append("<div class='bord'><div class='user-name-title'>"+result.user_name+"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"+result.date_comments+"</div></div>");
            $('.child_comments[data-id="'+ result.id_parent_comments +'"]').append("<button  type='button' id='reply' data-id='"+result.id+"' name='reply' class=' reply btn btn-primary'><strong>Reply</strong></button>");
            $('.child_comments[data-id="'+ result.id_parent_comments +'"]').append("<textarea name='comments' data-id='"+result.id+"' class='last-comments' readonly>"+result.text+"\n</textarea>");
            $('.child_comments[data-id="'+ result.id_parent_comments +'"]').append("<form method='post' class='create-reply-comments reply-comments' data-id='"+result.id+"'><input name='parent_id' type='hidden' value='"+result.id+"'></form>"); 
            $('.child_comments[data-id="'+ result.id_parent_comments +'"]').append("<div class='child_comments' data-id='"+result.id+"'></div>"); 

         $('.reply-comments[data-id="'+ data_id +'"]').html("<form method='post' class='create-reply-comments reply-comments' data-id='"+ data_id +"'></form>"); 
                          console.log(result); },
        })
      });



$(document).on("click",".close", function (){
           $('.new-comments').show();
           $('.reply').removeAttr("disabled");
           var data_id =$(this).attr("data-id");      
           console.log("sss",data_id);            
           $('.create-reply-comments').hide();    
         $('.reply-comments[data-id="'+ data_id +'"]').html("<form method='post' class='create-reply-comments reply-comments' data-id='"+ data_id +"'></form>");
        }
    );
