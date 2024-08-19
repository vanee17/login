function showPassword(idPassword, idIcon){
    let inputPassword = document.getElementById(idPassword);
    let icon = document.getElementById(idIcon);

    if (inputPassword.type == "password" && icon.classList.contains("fa-eye")) {
        inputPassword.type = "text";
        icon.classList.replace("fa-eye", "fa-eye-slash");
    } else {
        inputPassword.type = "password";
        icon.classList.replace("fa-eye-slash", "fa-eye");
    }
} 

//funcionalidad de login y registro
    $("#signupForm").submit(function(e){
        e.preventDefault();
        let form_data = $(this).serialize();
        $.ajax({
            url: "../../view/home/store.php",
            type: "POST",
            data: form_data,
            success:function(response){
                if(response == 2){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Este correo ya esta en uso!',
                        footer: '<a href="">Why do I have this issue?</a>'
                    });
                }else if(response == 0){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Completa los campos!',
                        footer: '<a href="">Why do I have this issue?</a>'
                    });
                }else if(response == 3){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Las contraseñas no coinciden!',
                        footer: '<a href="">Why do I have this issue?</a>'
                    });
                }else{
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Tu registro ha sido completado',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    setTimeout(() => {
                        window.location="login.php";
                    }, 1000);
                }
            },
            error: function(error){
                console.log(error);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    footer: '<a href="">Why do I have this issue?</a>'
                });
            }
        });
        console.log(form_data);
    });

    $("#loginForm").submit(function(e){
        e.preventDefault();
        let form_data = $(this).serialize();
        $.ajax({
            url: "../../view/home/verify.php",
            type: "POST",
            data: form_data,
            success: function(response){
                console.log(response);
                if(response == 1){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Welcome!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    setTimeout(() => {
                        window.location = 'panelControl.php';
                    }, 1500);
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'wrong credentials',
                        footer: '<a href="">Why do I have this issue?</a>'
                    });
                }
            },
            error: function(response){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'unexpected error',
                    footer: '<a href="">Why do I have this issue?</a>'
                });
            }
        });
    });



    
    var dataTable = $("#datos_prov").DataTable({
       "processing": true,
       "serverSide": true,
       "order": [],
       "ajax":{
           url: "../../controller/suppliersController.php?f=drawsuppliers",
           type: "POST"
       },
       "columnsDefs": [
           {
               "targets":[0, 3, 4],
               "orderable": false
               
           }
       ]
    });
    
    
    $('#crearProv').click(function(){
        $('#formularioProv')[0].reset();
        $('#action').val('Crear Proveedor');
        $('#operacion').val('crear');        
    });
    //peticion ajax con jquery al backend para proveedores
    $(document).on('submit', '#formularioProv', function(event){
        event.preventDefault();
        var empresa = $('#empresa').val();
        var encargado = $('#encargado').val();
        var direccion = $('#direccion').val();
        var telEmpresa = $('#telEmpresa').val();
        var telEncargado = $('#telEncargado').val();
    
        if(empresa != '' && encargado != '' && direccion != '' && telEmpresa != '' & telEncargado != ''){
           
            $.ajax({
                url:"../../controller/suppliersController.php?f=updatesuppliers" ,
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(data){
                    console.log(data)
                    $('#formularioProv')[0].reset();
                    $('#modalProv').modal('hide');
                    dataTable.ajax.reload();
                },
            });
        }else{
            alert('Todos los campos son obligatorios');
        }
    });

    $(document).on('click', '.editar', function(){
        var id_prov = $(this).attr("id");
        $.ajax({
            url:"../../controller/suppliersController.php?f=vieweditsuppliers",
            method: "POST",
            data: {id_prov: id_prov},
            datatype: "json",
            success: function(data){
                var datos = JSON.parse(data);
                $("#modalProv").modal('show');
                $("#empresa").val(datos[0].empresa);
                $("#encargado").val(datos[0].encargado);
                $("#direccion").val(datos[0].direccion);
                $("#telEmpresa").val(datos[0].telEmpresa);
                $("#telEncargado").val(datos[0].telEncargado);
                $(".modal-title").text("Editar Usuario");
                $("#id_prov").val(id_prov);
                $("#action").val("editar");
                $("#operacion").val("editar");
            }
        });
    });

    //funcionalidad borrar proveedores
    $(document).on('click', '.borrar', function(){
        var id_prov = $(this).attr("id");
        if (confirm("Esta seguro de borrar el proveedor " + id_prov)) {
            $.ajax({
                url:"../../controller/suppliersController.php?f=deletesuppliers",
                method: "POST",
                data: {id_prov: id_prov},
                success: function(data){
                    alert(data);
                    dataTable.ajax.reload();
                }
            });   
        }else{
            return false;
        }
    });


//funcionalidad llenar select proveedores
    $(document).ready(function(){
        $.ajax({
            url: "../../controller/suppliersController.php?f=drawnamessuppliers",
            type: "GET",
            success: function (response) {
                var datos = JSON.parse(response);
                var select = $("#proveedor");
                select.empty();
                select.append('<option value="0">--Selecciona una opcion--</option>');
                for (var i = 0; i < datos.length; i++) {
                    var option = '<option value="' + datos[i].prv_id + '">' + datos[i].prv_nombre_empresa + '</option>';
                    select.append(option);
                }
            },
        });
});
        //peticion ajax con jquery al backend para productos
        
        var dataTableProd = $("#datos_prod").DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax":{
                url: "../../controller/productsController.php?f=drawproducts",
                type: "POST"
            },
            "columnsDefs": [
                {
                    "targets":[0, 3, 4],
                    "orderable": false
                }
            ]
        });
    
            
         //funcionalidad crear producto     
         $('#crearProd').click(function(){
             $('#formularioProd')[0].reset();
             $('#action').val('Crear Producto');
             $('#operacion').val('crear');        
         });
    
         $(document).on('submit', '#formularioProd', function(event){
            event.preventDefault();
            var serial = $('#serial').val();
            var nombre = $('#nombre').val();
            var descripcion = $('#descripcion').val();
            var proveedor = $('#proveedor').val();
            var peso = $('#peso').val();
            var cantidad = $('#cantidad').val();
            var valorBruto = $('#valorBruto').val();
            var valorNeto = $('#valorNeto').val();
            var valorVenta = $('#valorVenta').val();
        
            if(nombre != '' && proveedor != '' && peso != '' && cantidad != '' & valorBruto != '' & valorNeto != '' & valorVenta != ''){
               
                $.ajax({
                    url:"../../controller/productsController.php?f=updateproduct" ,
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data){
                        console.log(data)
                        $('#formularioProd')[0].reset();
                        $('#modalProd').modal('hide');
                        dataTableProd.ajax.reload();
                    },
                });
            }else{
                alert('Todos los campos son obligatorios');
            }
        });
    
        $(document).on('click', '.detalles', function(){
             let id_prod = $(this).attr("id");
             console.log(id_prod);
            $.ajax({
                url:"../../controller/productsController.php?f=vieweditproduct",
                method: "POST",
                data: {id_prod: id_prod},
                datatype: "json",
                success: function(data){
                    var datos = JSON.parse(data);
                    $("#modalProd").modal('show');
                    $("#serial").val(datos[0].serial);
                    $("#nombre").val(datos[0].nombre);
                    $("#descripcion").val(datos[0].descripcion);
                    $("#proveedor").val(datos[0].proveedor);
                    $("#peso").val(datos[0].peso);
                    $("#cantidad").val(datos[0].cantidad);
                    $("#valorBruto").val(datos[0].valorBruto);
                    $("#valorNeto").val(datos[0].valorNeto);
                    $("#valorVenta").val(datos[0].valorVenta);
                    $(".modal-title").text("Detalles de Producto");
                    $("#id_prod").val(id_prod);
                    $("#action").val("editar");
                    $("#operacion").val("editar");
                }
            });
        });
    
            //funcionalidad borrar
            $(document).on('click', '.borrarPrd', function(){
                var id_prod = $(this).attr("id");
                if (confirm("Esta seguro de borrar el producto " + id_prod)) {
                    $.ajax({
                        url:"../../controller/productsController.php?f=deleteproduct",
                        method: "POST",
                        data: {id_prod: id_prod},
                        success: function(data){
                            alert(data);
                            dataTableProd.ajax.reload();
                        }
                    });   
                }else{
                    return false;
                }
            });
