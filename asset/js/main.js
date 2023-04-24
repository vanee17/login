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
//peticion ajax con jquery al backend

$(document).ready(function(){
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
                    })
                }else if(response == 0){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Completa los campos!',
                        footer: '<a href="">Why do I have this issue?</a>'
                    })
                }else if(response == 3){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Las contraseñas no coinciden!',
                        footer: '<a href="">Why do I have this issue?</a>'
                    })
                }else{
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Tu registro ha sido completado',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    setTimeout(() => {
                        window.location="login.php"
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
                })
            }
        })
    })
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
                    })
                    setTimeout(() => {
                        window.location = 'panelControl.php'
                    }, 1500);
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'wrong credentials',
                        footer: '<a href="">Why do I have this issue?</a>'
                    })
                }
            },
            error: function(response){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'unexpected error',
                    footer: '<a href="">Why do I have this issue?</a>'
                })
            }
        })
    })
})