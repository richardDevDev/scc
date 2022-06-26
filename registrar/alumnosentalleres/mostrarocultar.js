//ver actividades
$("#readactdiv").hide();
function ShowHideElement(){
    let text ="";
    if ($("#readactbtn").text() === "Buscar Alumno por Matricula") {
        $("#readactdiv").show();
        text = "Ocultar";
    }else{
        $("#readactdiv").hide();
        text = "Buscar Alumno por Matricula"
    }
    $("#readactbtn").html(text);
}
//delete actividades
$("#readactdiv1").hide();
function ShowHideElement1(){
    let text ="";
    if ($("#readactbtn1").text() === "Filtrar Alumnos por Carrera") {
        $("#readactdiv1").show();
        text = "Ocultar";
    }else{
        $("#readactdiv1").hide();
        text = "Filtrar Alumnos por Carrera"
    }
    $("#readactbtn1").html(text);
}
//delete actividades
$("#readactdiv2").hide();
function ShowHideElement2(){
    let text ="";
    if ($("#readactbtn2").text() === "Filtrar Alumnos por Semestre") {
        $("#readactdiv2").show();
        text = "Ocultar";
    }else{
        $("#readactdiv2").hide();
        text = "Filtrar Alumnos por Semestre"
    }
    $("#readactbtn2").html(text);
}
//delete actividades
$("#readactdiv3").hide();
function ShowHideElement3(){
    let text ="";
    if ($("#readactbtn3").text() === "Añadir Alumno") {
        $("#readactdiv3").show();
        text = "Ocultar";
    }else{
        $("#readactdiv3").hide();
        text = "Añadir Alumno"
    }
    $("#readactbtn3").html(text);
}

//delete actividades
$("#readactdiv6").hide();
function ShowHideElement6(){
    let text ="";
    if ($("#readactbtn6").text() === "Eliminar Alumno") {
        $("#readactdiv6").show();
        text = "Ocultar";
    }else{
        $("#readactdiv6").hide();
        text = "Eliminar Alumno"
    }
    $("#readactbtn6").html(text);
}

//delete actividades
$("#readactdiv5").hide();
function ShowHideElement5(){
    let text ="";
    if ($("#readactbtn5").text() === "Modificar Alumno") {
        $("#readactdiv5").show();
        text = "Ocultar";
    }else{
        $("#readactdiv5").hide();
        text = "Modificar Alumno"
    }
    $("#readactbtn5").html(text);
}


//_________________________________________________________________________________________________________________________________________
// REGISTRO ACTIVIDADES 

$("#registroactividaddiv").hide();
function ShowHideElement4(){
    let text ="";
    if ($("#registroactividaddiv").text() === "RITMOS LATINOS") {
        $("#registroactividaddiv").show();
        text = "Ocultar";
    }else{
        $("#registroactividaddiv").hide();
        text = "Modificar Actividades"
    }
    $("#registrpactividadbtn").html(text);
}









