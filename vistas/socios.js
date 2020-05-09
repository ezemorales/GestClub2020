$(document).ready(function() {
var id_persona, opcion;
opcion = 4;
    
tablaSocios = $('#tablaSocios').DataTable({  
       "ajax":{            
        "url": "bd/acciones_socios.php", 
        "method": 'POST', //usamos el metodo POST
        "data":{opcion:opcion}, //envio opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    "language": {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
                 },
                 "sProcessing":"Procesando...",
            },
    "columns":[
        {"data": "id_persona"},
        {"data": "nombre"},
        {"data": "apellido"},
        {"data": "dni"},
        {"data": "fecha_nac"},
   //     {"data": "id_estado"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
    ]
});     


var fila; //captura la fila, para editar o eliminar
//submit para el Alta y Actualización
$('#formSocios').submit(function(e){                         
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    nombre = $.trim($('#nombre').val());    
    apellido = $.trim($('#apellido').val());
    dni = $.trim($('#dni').val());    
    fecha_nac = $.trim($('#fecha_nac').val()); 
         $.ajax({
          url: "bd/acciones_socios.php",
          type: "POST",
          datatype:"json",    
          data:  {id_persona:id_persona, nombre:nombre, apellido:apellido, fecha_nac:fecha_nac, dni:dni,opcion:opcion},    
          success: function(data) {
            tablaSocios.ajax.reload(null, false);
           }
        });			        
    $('#modalSocios').modal('hide');											     			
});
        
 

//para limpiar los campos antes de dar de Alta una Persona
$("#btnNuevo").click(function(){
    opcion = 1; //alta           
    id_persona=null;
    $("#formSocios").trigger("reset");
    $(".modal-header").css( "background-color", "#17a2b8");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text("Alta de Socios");
    $('#modalSocios').modal('show');	    
});

//Editar        
$(document).on("click", ".btnEditar", function(){		        
    opcion = 2;//editar
    fila = $(this).closest("tr");	        
    id_persona = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
    nombre = fila.find('td:eq(1)').text();
    apellido = fila.find('td:eq(2)').text();
    dni = fila.find('td:eq(3)').text();
    fecha_nac = fila.find('td:eq(4)').text();
    $("#nombre").val(nombre);
    $("#apellido").val(apellido);
    $("#dni").val(dni);
    $("#fecha_nac").val(fecha_nac);
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Editar Socio");		
    $('#modalSocios').modal('show');		   
});

//Borrar
$(document).on("click", ".btnBorrar", function(){
    fila = $(this);           
    id_persona = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;	
    nombre =    $(this).closest('tr').find('td:eq(1)').text() ;   
    apellido = $(this).closest('tr').find('td:eq(2)').text() ;   	
    opcion = 3; //baja       
    var respuesta = confirm("¿Está seguro que desea dar de baja a "+nombre+ " " +apellido+ "?");                
    if (respuesta) {            
        $.ajax({
          url: "bd/acciones_socios.php",
          type: "POST",
          datatype:"json",    
          data:  {opcion:opcion, id_persona:id_persona},    
          success: function() {
            tablaSocios.ajax.reload(null, false);
            //  tablaSocios.row(fila.parents('tr')).remove().draw();                  
           }
        });	
    }
 });
     
});    