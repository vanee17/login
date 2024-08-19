function valLenght() {
    let numInputVal = $('#cedula').val();
    let numInput = $("#cedula");
    if (numInputVal.length !== 10) {
        numInput.popover({
            content: 'Ingrese un número válido (10 dígitos)',
            placement: 'right'
        });
        numInput.popover('show');
        return 0;
    }
    return 1;
}//funcion para mejorar

function valNumber(event) {
    let inputValue = event.target.value;
    event.target.value = inputValue.replace(/[^\d]/g, '').substr(0, 10);
}

$(document).ready(function(){
    
    $('#cedula').on('blur', function(event){
        let cedula = $('#cedula').val();
        console.log("valor cedula:" + cedula);
        let cedLenght = valLenght();

        if(cedLenght == 1){
            $.ajax({
                url:"../../controller/checkinController.php?f=drawcustomer" ,
                method: 'POST',
                data: {cedula: cedula},
                success: function(data){
                    console.log("valor data:" + data);
                    if (data != "vacio") {
                        let datos = JSON.parse(data);
                        $("#cedula").val(datos[0].clt_cedula);
                        $("#telefonoClt").val(datos[0].clt_telefono);
                        $("#nombreClt").val(datos[0].clt_nombre);
                        $("#correoClt").val(datos[0].clt_correo);
                    }else{
                        $('#formularioFact').find('input').not(':eq(0)').val('');
                    }
                },
            });
        }else{
            alert('Ingrese una cedula valida');
        }
    });
//funcionalidad para llenar select de productos
    $.ajax({
        url: "../../controller/checkinController.php?f=viewproduct",
        type: "GET",
        success: function (response) {
            var datos = JSON.parse(response);
            console.log(datos[0].prd_nombre);
        
            var select = $("#producto");
            select.empty();
            select.append('<option value="0">--Selecciona una opcion--</option>');
            for (var i = 0; i < datos.length; i++) {
                var option = '<option value="' + datos[i].prd_id + '">' + datos[i].prd_nombre + '</option>';
                select.append(option);
            }
        },
    });

    $.ajax({
        url: "../../controller/checkinController.php?f=viewproduct",
        type: "GET",
        success: function (response) {
            var datos = JSON.parse(response);
            console.log(datos[0].prd_nombre);
        
            var select = $("#producto");
            select.empty();
            select.append('<option value="0">--Selecciona una opcion--</option>');
            for (var i = 0; i < datos.length; i++) {
                var option = '<option value="' + datos[i].prd_id + '">' + datos[i].prd_nombre + '</option>';
                select.append(option);
            }
        },
    });

    $('#producto').on('change', function (e) {
        let producto = $('#producto').val();
        $.ajax({
            url:"../../controller/checkinController.php?f=viewprodid" ,
            method: 'POST',
            data: {idProducto: producto},
            success: function(data){
                $('#valorUnt').val('');
                if (data != "vacio") {
                    let datos = JSON.parse(data);
                    $('#valorUnt').val(datos[0].prd_valor_venta);
                }else{
                    console.log(datos);
                }
            },
        });
    });

    $('#cantidad').on('change', function (e) {
        let producto = $('#producto').val();
        let cantidadProd = $('#cantidad').val();
        $.ajax({
            url:"../../controller/checkinController.php?f=viewprodid" ,
            method: 'POST',
            data: {idProducto: producto},
            success: function(data){
                if (data != "vacio") {
                    let datos = JSON.parse(data);
                    let valorTotal = datos[0].prd_valor_venta * cantidadProd;
                    $('#valorTtl').val(valorTotal);
                }else{
                    console.log(datos);
                }
            },
        });
    });
});