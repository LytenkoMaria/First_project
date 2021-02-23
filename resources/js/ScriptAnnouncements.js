
$(document).on("click",".update", function () {
        $.ajax({
          type: "get",
          dataType: 'json',
          url: "./ParserForm.php",
          success: function(result) {     
                           console.log(result); 
                                   },
        error: function (data) {
        console.log('Error', data);
    },        
        })
      });


$(document).ready(function() {
        $.ajax({
          type: "get",
          contentType : 'application/json',
          url: "./ShowAnnouncements.php",
          success: function(result) {  

 let arr = JSON.parse(result);
 arr.forEach(function(item, i, arr) {
       $('.announcements').prepend(" <div class='new-announcements'><img src='"+arr[i].images_url+"' class='offer-img'><a class='offer' href='./Offers.php?id="+arr[i].id+"'><strong>"+arr[i].advertisements_name+"</strong></a><div class='price'>"+arr[i].price+"</div><lable class='offer-date'><strong>"+arr[i].date+"</strong></lable></div>"); 
    });                     
                          // console.log(result); 
       },
        error: function (data) {
        console.log('Error', data);  
         }     
    })
  })
