///////////////////// custom javaScript Files ////////////////
////////////////////         Start js        ////////////////



function getSubjectData(pid){
  //alert(pid);
 
 var ur ="ajax_getSubjectMapping";

    $.ajax({
      type : "POST",
      url  :  ur, 
      data : {'id':pid}, 
      success : function (data) {
         // var jsonpars = JSON.parse(data);
         $("#showSubjectDetails").empty().append(data).fadeIn();
         $('input[name=pid]').val(pid);
        //console.log(JSON.parse(jsonpars['price']));
      }
    });
    
} 

function addSubject(){
   
   var sub_details   =  $('#sub_details').val();
   var sub_title     =  $('#sub_title').val();
   $('#resultareasubject').text(" ");
   
    if(sub_details == ""){
		//alert();
     $('#resultareasubject').empty().text('Please Enter  Subject Details !');
    }else{
      $('#subjectTable').append('<tr><td><input  type ="text" class="form-control" name="subjectTitle[]" value="'+sub_title+'"></td><td> <textarea type="text" class="form-control"  name="subjectDetails[]" >'+sub_details+'</textarea></td><td><i class="fa fa-trash  fa-2x" id="subjectmapping" aria-hidden="true"></i></td></tr>');
      $('#sub_details').val("");
      $('#sub_title').val("");
      
    }

}

function addContant(){
   var sub_details   =  $('#contant_details').val();
   var sub_title     =  $('#contant_title').val();
     $('#resultareacontant').text(" ");
     if(sub_details == ""){
	   $('#resultareacontant').empty().text('Please Enter  Contant Details !');
     }else{
       $('#contantTable').append('<tr><td><input  type ="text" class="form-control" name="subjectTitle[]" value="'+sub_title+'"></td><td> <textarea type="text" class="form-control"  name="subjectDetails[]" >'+sub_details+'</textarea></td><td><i class="fa fa-trash  fa-2x" id="subjectmapping" aria-hidden="true"></i></td></tr>');
       $('#contant_details').val("");
       $('#contant_title').val("");
     }
}

function addPriceText(){

   var sub_details   =  $('#price_details').val();
   var sub_title     =  $('#price_title').val();
    //alert(sub_title+"det"+sub_details);
    $('#priceTextMsg').text(" ");
     if(sub_details == ""){
	   $('#priceTextMsg').empty().text('Please Enter  Price Text Details !');
     }else{
       $('#priceTable').append('<tr><td><input  type ="text" class="form-control" name="subjectTitle[]" value="'+sub_title+'"></td><td> <textarea type="text" class="form-control"  name="subjectDetails[]" >'+sub_details+'</textarea></td><td><i class="fa fa-trash  fa-2x" id="subjectmapping" aria-hidden="true"></i></td></tr>');
       $('#price_details').val("");
       $('#price_title').val("");
     }
}

$(document).delegate("#subjectmapping","click",function(){
   $(this).parent().parent().remove();
});

$("#showSubjectDetails").validate({
    rules: {},
      submitHandler: function(form) {
        ur = "subjectDataInsert";
        var formData = new FormData(form);
            $.ajax({
                type : "POST",
                url  :  ur, 
                data : formData, // serializes the form's elements.
                success : function (data) {
                  console.log(data); // show response from the php script.
                    if(data == 1){
                      if(data == 1)
                        var msg = "Subject Mapping Process Successful !";

                      // else(data == 2)
                      // 	var msg = "Mapping Process Successful !";

                       $("#resultareasubject").text(msg); 

                     setTimeout(function() {   //calls click event after a certain time
                       $("#modal-4 .close").click();
                       $("#resultareasubject").text(" "); 
                       $('#showSubjectDetails')[0].reset(); 
                      // $("#proId").val("");
                    }, 1000);
                  }else{
                    $("#resultareasubject").text(data);
                 }
                 //ajex_ItemListData();
               },
                error: function(data){
                    alert(data);
                },
                cache: false,
                contentType: false,
                processData: false
            });
          return false;
        //form.preventDefault();
      }
  });

$("#showContantmapping").validate({
    rules: {},
      submitHandler: function(form) {
      ur = "contantDataInsert";
        var formData = new FormData(form);
            $.ajax({
                type : "POST",
                url  :  ur, 
                data : formData, // serializes the form's elements.
                success : function (data) {
                  console.log(data); // show response from the php script.
                    if(data == 1){
                      if(data == 1)
                        var msg = "Contant Mapping Process Successful !";
                        // else(data == 2)
                        // var msg = "Mapping Process Successful !";

                       $("#resultareacontant").text(msg); 

                     setTimeout(function() {   //calls click event after a certain time
                       $("#modal-5 .close").click();
                       $("#resultareacontant").text(" "); 
                       $('#showSubjectDetails')[0].reset(); 
                      // $("#proId").val("");
                    }, 1000);
                  }else{
                    $("#resultareacontant").text(data);
                 }
                 //ajex_ItemListData();
               },
                error: function(data){
                    alert(data);
                },
                cache: false,
                contentType: false,
                processData: false
            });
          return false;
        //form.preventDefault();
      }
  });


$("#showpricetextMapping").validate({
    rules: {},
      submitHandler: function(form) {

      ur = "priceDataInsert";
        var formData = new FormData(form);
            $.ajax({
                type : "POST",
                url  :  ur, 
                data : formData, // serializes the form's elements.
                success : function (data) {
                  console.log(data); // show response from the php script.
                    if(data == 1){
                      var msg = "Price Mapping Process Successful !";
                    
                     $("#priceTextMsg").text(msg); 

                     setTimeout(function() {   //calls click event after a certain time
                       $("#modal-6 .close").click();
                       $("#priceTextMsg").text(" "); 
                       $('#showpricetextMapping')[0].reset(); 
                      // $("#proId").val("");
                    }, 1000);
                  }else{
                    $("#priceTextMsg").text(data);
                 }
                 //ajex_ItemListData();
               },
                error: function(data){
                    alert(data);
                },
                cache: false,
                contentType: false,
                processData: false
            });
          return false;
        //form.preventDefault();
      }
  });



function getContantData(pid){
   var ur ="ajax_getContantMapping";
    $.ajax({
      type : "POST",
      url  :  ur, 
      data : {'id':pid}, 
      success : function (data) {
         $("#showContantmapping").empty().append(data).fadeIn();
         $('input[name=pid]').val(pid);
        //console.log(JSON.parse(jsonpars['price']));
      }
    });
}


function getPriceTextData(pid){
  var ur ="ajax_getPriceTextMapping";
    $.ajax({
      type : "POST",
      url  :  ur, 
      data : {'id':pid}, 
      success : function (data) {
         $("#showpricetextMapping").empty().append(data).fadeIn();
         $('input[name=pid]').val(pid);
      }
    });
}
  
