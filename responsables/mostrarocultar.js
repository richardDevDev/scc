//ver actividades
$("#readactdiv").hide();
function ShowHideElement(){
    let text ="";
    if ($("#readactbtn").text() === "Agregar Periodos") {
        $("#readactdiv").show();
        text = "Ocultar";
    }else{
        $("#readactdiv").hide();
        text = "Agregar Periodos"
    }
    $("#readactbtn").html(text);
}
//delete actividades
$("#readactdiv1").hide();
function ShowHideElement1(){
    let text ="";
    if ($("#readactbtn1").text() === "Eliminar Periodos") {
        $("#readactdiv1").show();
        text = "Ocultar";
    }else{
        $("#readactdiv1").hide();
        text = "Eliminar Periodos"
    }
    $("#readactbtn1").html(text);
}
//delete actividades
$("#readactdiv2").hide();
function ShowHideElement2(){
    let text ="";
    if ($("#readactbtn2").text() === "Modificar Periodos") {
        $("#readactdiv2").show();
        text = "Ocultar";
    }else{
        $("#readactdiv2").hide();
        text = "Modificar Periodos"
    }
    $("#readactbtn2").html(text);
}
//delete actividades
$("#readactdiv3").hide();
function ShowHideElement3(){
    let text ="";
    if ($("#readactbtn3").text() === "Modificar Actividades") {
        $("#readactdiv3").show();
        text = "Ocultar";
    }else{
        $("#readactdiv3").hide();
        text = "Modificar Actividades"
    }
    $("#readactbtn3").html(text);
}


