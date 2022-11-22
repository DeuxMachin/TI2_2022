$(document).ready(function(){
    var Tablas= document.getElementById('tablas'); 
    var Campos= document.getElementById('campos'); 
    $(document).on('change',Tablas, function(){
        //console.log("si cambio");

        var cat_id = $(this).val();
        //console.log(cat_id);
        var div = $(this).parents();
        var op = " ";
        //Agregamos Ajax para conexiones
        $.ajax({
            
            type: 'get',
            url:{URL:to("findProductName")},//TA MALA ESTA WEAAAAA 
            data:{'id':cat_id},
            success:function(data){
                //console.log('Success');

                //console.log(data);

                //console.log(data.length);
				op+='<option value="0" selected disabled>chose product</option>';
				for(var i=0;i<data.length;i++){
				    op+='<option value="'+data[i].id+'">'+data[i].productname+'</option>';
                }
                div.find(Campos).html(" ");
                div.find(Campos).append(op);

            },
            error:function(){

            }

        });
    });
});