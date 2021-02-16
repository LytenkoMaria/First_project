
$(document).ready(function(){
         
   var s = 1;   
   $.ajax({
      url:"./ReplyCommentsOutput.php",
      method: "post",
      data: {s:s},
      contentType : 'application/json',
      success: function(result){

 let arr = JSON.parse(result);
 arr.forEach(function(item, i, arr) {

 $('.child_comments[data-id="'+ arr[i].id_parent_comments +'"]').append("<img class='comments-image mr-3' src='"+arr[i].picture+"'><div class='bord'><div class='user-name-title'>"+arr[i].name+"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"+arr[i].date_comments+"</div></div><button  type='button' id='reply' data-id='"+arr[i].id+"' name='reply' class=' reply btn btn-primary'><strong>Reply</strong></button><textarea name='comments' data-parent='"+arr[i].id_parent_comments+"' data-id='"+arr[i].id+"' class='last-comments' readonly>"+arr[i].text+"\n</textarea><form method='post' class='create-reply-comments reply-comments' data-id='"+arr[i].id+"'><input name='parent_id' type='hidden' value='"+arr[i].id+"'></form><div class='child_comments' data-id='"+arr[i].id+"'></div>");  

                                    });                    
      },
        error: function(result){
        console.log("error get aid");
        }
      })
   })
   





                                               
                                                