import { validarTexto } from "./helpers/validation.js";

$(document).ready(function () {

    // Definir los campos y sus validaciones
    const nombre = $("#nombreCategoria");
    // Inicializar errores
    const errores = { nombre: true };

    
    nombre.on("input", async function(){
        const valido = await validarTexto(nombre);
        errores.nombre = !valido;
    });
    // Submit del formulario
    $("#formAgregarCategoria").submit(async function (e) {
        console.log(errores);
    
        for (let key in errores) {
            if (errores[key] === true) {
                e.preventDefault();
                alert("Por favor, corrija los errores en el formulario ❌");
                return;
            }
        }
    
        alert("Formulario enviado correctamente ✅");
    });

});
