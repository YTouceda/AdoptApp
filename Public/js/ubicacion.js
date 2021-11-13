class Localidad{
    constructor(varNombre,idLoc,idPro){
        this.nombre=varNombre;
        this.id_localidad=idLoc;
        this.id_provincia=idPro;
    }
}

$(document).ready(function () {
    var respuesta;
    $.ajax({
        url: 'Public/Otros/localidades.json',
        type: 'POST',
        success:  function (response) {
            respuesta=response;
            if( $("#provincia option:selected").val() != ""){
                $("#ilocalidades").val("");
                let id_provincia = $("#provincia option:selected").val();
                filtrar(respuesta, id_provincia);
            }
        }
    });

    
    const filtrar =(data, filtro)=>{
        let $option, elemento, loc;
        var localidades=[];
        $(data["localidades-censales"]).each((index)=>{
            var aux=new Localidad();
            elemento= data["localidades-censales"][index];
            if (filtro == elemento.provincia.id){
                aux.nombre = elemento.nombre;
                aux.id_localidad= elemento.id;
                aux.id_provincia=elemento.provincia.id;
                localidades.push(aux);
            }          
        })
        localidades = ordenarLocalidades(localidades);
        $(localidades).each((index)=>{
            loc = localidades[index];
            if($("#xlocalidad").val() == loc.id_localidad){
                $option+= `<option value="${loc.id_localidad}" id-p="${loc.id_provincia}" selected>${loc.nombre}</option>`;
            }else{
                $option+= `<option value="${loc.id_localidad}" id-p="${loc.id_provincia}">${loc.nombre}</option>`;
            }
        })
        $("#localidades").html($option);
    }
    
    
    const cambiarLoc= ()=>{
        $("#ilocalidades").val("");
        let id_provincia = $("#provincia option:selected").val();
        
        console.log(respuesta);
        filtrar(respuesta, id_provincia);
    }    
    
    const seleccionarLoc= ()=>{
        //envia lo seleccionado al input
        let loc = $("#localidades option:selected").data("l")
        $("#xlocalidad").val(loc);
    }
    
    $("#provincia").on("change", cambiarLoc);

    $("#localidades").change( ()=>{
        seleccionarLoc();
    })
    
    const filtrarModal =(data, filtro)=>{
        let $option, elemento, nombre, id_localidad, id_provincia, loc;
        var localidades=[];
        $(data["localidades-censales"]).each((index)=>{
            var aux=new Localidad();
            elemento= data["localidades-censales"][index];
            if (filtro == elemento.provincia.id){
                aux.nombre = elemento.nombre;
                aux.id_localidad= elemento.id;
                aux.id_provincia=elemento.provincia.id;
                localidades.push(aux);
            }          
        })
        localidades = ordenarLocalidades(localidades);
        $(localidades).each((index)=>{
            loc = localidades[index];
            $option+= `<option data-l='${loc.id_localidad}' data-p='${loc.id_provincia}'> ${loc.nombre} </option>`;
        })
        $("#localidades_modal").html($option);
        
    }
    
    
    const cambiarLocModal= ()=>{
        $("#localidades_modal").val("");
        let id_provincia = $("#provincia_modal option:selected").val();
        filtrarModal(respuesta, id_provincia);
    }    
    
    const seleccionarLocModal= ()=>{
        //envia lo seleccionado al input
        let loc = $("#localidades option:selected").data("l")
        $("#xlocalidad_modal").val(loc);
    }
    
    $("#provincia_modal").on("change", cambiarLocModal);
    
    $("#localidades_modal").change( ()=>{
        seleccionarLocModal();
    })
    
    function ordenarLocalidades(loc){
        var aux;
        for ( var i = 1 ; i < loc.length ; i++ ){
            for ( var x = 0 ; x < loc.length - i ; x++ ){
                if (loc[x].nombre > loc[x+1].nombre){
                    aux=loc[x];
                    loc[x]=loc[x+1];
                    loc[x+1]=aux;
                }
            }
        }
        return loc;
    }
})