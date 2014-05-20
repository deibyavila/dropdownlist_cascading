  $(window).ready(function(){

$( "#hide" ).click(function() {
  $( "#div_new_vh" ).clone().appendTo( "#div_new_vh" );
});

 //(function() {



 $("#clase_modelos").change(function() {
                    $.ajax({
                        url: $("#clase_modelos").val(),
                        type: 'GET',
                        data: {legajo: $("#clase_modelos").val()},
                        dataType: 'JSON',
                        beforeSend: function() {
                            $("#respuesta").html('Buscando empleado...');
                        },
                        error: function() {
                            $("#respuesta").html('<div> Ha surgido un error. </div>');
                        },
                        success: function(data) {
                            if (data) {
                              var model = $('#model');
          model.empty();
                                    $.each(data, function(index, element) {
                  model.append("<option value='"+ element.id +"'>" + element.name + "</option>");
              });
                                
                            } 
                            else {
                                $("#respuesta").html('<div> No hay ningún empleado con ese legajo. </div>');
                            }
                        }
                    });
                    $("#legajo").val('');
                });




  /*
  $.each(data, function(index, element) {
                  model.append("<option value='"+ element.id +"'>" + element.name + "</option>");
              });
  version 2
                $("#clase_modelos").change(function() {
                    $.ajax({
                        url: $("#clase_modelos").val(),
                        type: 'GET',
                        data: {legajo: $("#clase_modelos").val()},
                        dataType: 'JSON',
                        beforeSend: function() {
                            $("#respuesta").html('Buscando empleado...');
                        },
                        error: function() {
                            $("#respuesta").html('<div> Ha surgido un error. </div>');
                        },
                        success: function(respuesta) {
                            if (respuesta) {
                                var html = '<div>';
                                html += '<ul>';
                                html += '<li> Legajo: ' + respuesta.id + ' </li>';
                                html += '<li> Nombre: ' + respuesta.name + ' </li>';
                                html += '<li> Apellido: ' + respuesta.apellido + ' </li>';
                                html += '<li> Area: ' + respuesta.area + ' </li>';
                                html += '</ul>';
                                html += '</div>';
                                $("#respuesta").html(html);
                            } else {
                                $("#respuesta").html('<div> No hay ningún empleado con ese legajo. </div>');
                            }
                        }
                    });
                    $("#legajo").val('');
                });
        //    }).call(this);

  */

/*

  $('#clase_modelos').change(function(){
    $.get("{{ url('show')}}",
      {option:$(this).val()},
      function(data){
        var model = $('#nombres_modelos');
        model.empty();
        $.each(data, function(index,element){
          model.appnd("<option value='"+ element.id+ "'>"+ element.name+"</option>");
        });
      });
  
      });

  */
 

/*
<script type="text/javascript"> 
<!-- 
num=0; 
num1=1; 
function crear(obj) { 
   
if (num<3) {  
  num++;
  var valor = document.getElementById('oculto').value; 
  
  if (valor==0){ 
     fa = document.getElementById('fiel'); // 1 
  contenedor2 = document.createElement('div'); // 2 
  contenedor2.id = 'divcolum' // 3 
  fa.appendChild(contenedor2); // 4 
  
  //columna1 
  ele = document.createElement('input'); // 5 
  ele.type = 'text'; // 6 
  ele.name = 'modelo' ; // 6 
  ele.disabled='disabled'; 
  ele.value='modelo'; 
  var prueba = 'modelo' 
  contenedor2.appendChild(ele); // 7 
  <?php  $ola= ".." ?> 
  
      
     ele = document.createElement('input'); // 5 
  ele.type = 'text'; // 6 
  ele.name = 'color' ; // 6 
  ele.disabled='disabled'; 
  ele.value='color'; 
  contenedor2.appendChild(ele); // 7 
  
  ele = document.createElement('input'); // 5 
  ele.type = 'text'; // 6 
  ele.name = 'descripcion' ; // 6 
  ele.disabled='disabled'; 
  ele.value='descripcion'; 
  contenedor2.appendChild(ele); // 7 
  
      
     document.getElementById('oculto').value=1; 
  } 
  
  
  fi = document.getElementById('fiel'); // 1 
  contenedor = document.createElement('div'); // 2 
  contenedor.id = 'div'+num; // 3 
  fi.appendChild(contenedor); // 4 
  
  //columnas 
  
  
  
// input 1 

  ele = document.createElement('input'); // 5 
  ele.type = 'text'; // 6 
  ele.name = 'cant[]' ; // 6 
  contenedor.appendChild(ele); // 7 
  
  
  // input 2 
    ele = document.createElement('input'); // 5 
  ele.type = 'text'; // 6 
  ele.name = 'uni[]'; // 6 
  contenedor.appendChild(ele); // 7 
  // input 3 
    ele = document.createElement('input'); // 5 
  ele.type = 'text'; // 6 
  ele.name = 'des[]'; // 6 
  contenedor.appendChild(ele); // 7 
  
   
  
  ele = document.createElement('input'); // 5 
  ele.type = 'button'; // 6 
  ele.value = 'Borrar'; // 8 
  ele.name = 'div'+num; // 8 
  ele.onclick = function () {borrar(this.name)} // 9 
  contenedor.appendChild(ele); // 7 
} 
}
function borrar(obj) { 
  fi = document.getElementById('fiel'); // 1 
    
  fi.removeChild(document.getElementById(obj)); // 10 
} 
--> 
</script> 
*/







});



