
$(document).ready(function(){
         
            var s = 1;   
               $.ajax({
                  url:"./ReplyComentsOutput.php",
                   method: "post",
                   data: {s:s},
                   contentType : 'application/json',
                   success: function(result){

 //console.log(result);

 let arr = JSON.parse(result);
  //console.log(arr[1].id); 

arr.forEach(function(item, i, arr) {
 
 $('.child_coments[data-id="'+ arr[i].id_parent_coment +'"]').append("<img class='coments-image mr-3' src='"+arr[i].picture+"'><div class='bord'><div class='user-name-title'>"+arr[i].name+"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"+arr[i].date_coment+"</div></div><button  type='button' id='reply' data-id='"+arr[i].id+"' name='reply' class=' reply btn btn-primary'><strong>Reply</strong></button><textarea name='coments' data-parent='"+arr[i].id_parent_coment+"' data-id='"+arr[i].id+"' class='last-coment' readonly>"+arr[i].text+"\n</textarea><form method='post' class='create-reply-comment reply-comment' data-id='"+arr[i].id+"'><input name='parent_id' type='hidden' value='"+arr[i].id+"'></form><div class='child_coments' data-id='"+arr[i].id+"'></div>");  

});                    
                   },
                   error: function(result){
                       console.log("error get aid");
                   }
               })
   })
   





                                               
                                                