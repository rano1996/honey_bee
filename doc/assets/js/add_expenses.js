$.validator.addMethod("valueNotEquals", function(value, element, arg){
     return arg !== value;
    }, "Value must not equal arg.");
if ($("#ajax_form").length > 0) {
     $("#ajax_form").validate({
       
     rules: {
          amount:{
               required: true,
          },
       
   
          category: {
               valueNotEquals: "default" 
          //    digits:true,
          //    minlength: 10,
          //    maxlength:12,
         },
            
     },
     messages: {
          amount: {
               required: "Please enter amount",
               // maxlength: "Your last name maxlength should be 50 characters long."
             },
          category: {
              
               valueNotEquals: "Please select an item!"
     //     maxlength: "Your last name maxlength should be 50 characters long."
       },
      
     
          
     },
    
   })
 }
// $(document).ready(function () {
// $('button#submit').on('click', function(e){
// // alert("gdgdg");


//      $('#add').validate({ // initialize the plugin
          
//      //     rules: {
            
//      //      amount: {
//      //             required: true,
//      //             minlength: 5
//      //         }
//      //     }
//      });
 
//  });

// })
$( "#category" ).change(function() {
  $("#sub").empty();
   var selected_option=$("#category").val();
   $.ajax({
     url: '../../requests/lists.php',
     type: "GET",
     data: {action:"get_expenses_category",category_id:selected_option},
     dataType: "json",
     success: function( response ) {
       response=JSON.stringify=(response);
       if(response.code=="1")
       {
        $("#sub").empty();
        var select='';
        $.each(response.data, function(i, order){
        
          select+='<option>'+response.data[i].sub_category_name+'</option>'
        });
       
        $("#sub").append('<div class="form-group"><label for="message-text" class="control-label">sub category:</label><select class="form-control" id="sub_category" name="sub_category">'+select+'</select></div>')
       }
       
     }
   });
  //  if(selected_option=='food and drink'){
  //      $("#sub").empty();
  //       $("#sub").append('<div class="form-group"><label for="message-text" class="control-label">sub category:</label><select class="form-control" id="sub_category"><option>cafe</option> <option>resturents</option><option>grocery</option><option>general</option></select></div>')
  //  }
  //  else{
  //   $("#sub").empty();
  //   $("#sub").append('<div class="form-group"><label for="message-text" class="control-label">sub category:</label><select class="form-control" id="sub_category"><option>clothes</option> <option>general</option><option>childrern</option></select></div>')
  //  }
  });

