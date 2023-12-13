//aqui va a estar el codigo de donante.model.js

function init(){
    $("#frm_donante").on("submit", function(e){
        guardaryeditar(e);
    });
}


$().ready(()=>{
    todos();
});

var todos = () =>{
    var html = "";
    $.get("../../Controllers/donante.controller.php?op=todos", (res) => {
      res = JSON.parse(res);
      $.each(res, (index, valor) => {
       
        html += `<tr>
                <td>${index + 1}</td>
                <td>${valor.NombreDonante}</td>
            <td>
            <button class='btn btn-success' onclick='editar(${
              valor.CodDonante
            })'>Editar</button>
            <button class='btn btn-danger' onclick='eliminar(${
              valor.CodDonante
            })'>Eliminar</button>
            <button class='btn btn-info' onclick='ver(${
              valor.CodDonante
            })'>Ver</button>
            </td></tr>
                `;
      });
      $("#tabla_donante").html(html);
    });
  };

  var guardaryeditar=(e)=>{
    e.preventDefault();
    var dato = new FormData($("#frm_donante")[0]);
    var ruta = '';
    var PaisId = document.getElementById("CodDonante").value
    if(PaisId > 0){
     ruta = "../../Controllers/donante.controller.php?op=actualizar"
    }else{
        ruta = "../../Controllers/donante.controller.php?op=insertar"
    }
    $.ajax({
        url: ruta,
        type: "POST",
        data: dato,
        contentType: false,
        processData: false,
        success: function (res) {
          res = JSON.parse(res);
          if (res == "ok") {
            Swal.fire("donante", "Registrado con éxito" , "success");
            todos();
            limpia_Cajas();
          } else {
            Swal.fire("donante", "Error al guardo, intente más tarde", "error");
          }
        },
      });
  }

  var editar = (CodDonante)=>{
  
    $.post(
      "../../Controllers/donante.controller.php?op=uno",
      { CodDonante: CodDonante },
      (res) => {
        res = JSON.parse(res);
        $("#CodDonante").val(res.CodDonante);
        $("#NombreDonante").val(res.NombreDonante);
    
      }
    );
    $("#Modal_donante").modal("show");
  }


  var eliminar = (CodDonante)=>{
    Swal.fire({
        title: "Donantes de Organos y/o Tejidos",
        text: "Esta seguro de eliminar el donante",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Eliminar",
      }).then((result) => {
        if (result.isConfirmed) {
          $.post(
            "../../Controllers/donante.controller.php?op=eliminar",
            { PaisId: PaisId },
            (res) => {
              res = JSON.parse(res);
              if (res === "ok") {
                Swal.fire("donante", "Donante Eliminado", "success");
                todos();
              } else {
                Swal.fire("Error", res, "error");
              }
            }
          );
        }
      });
  
      impia_Cajas();
}
  
  var limpia_Cajas = ()=>{
    document.getElementById("CodDonate").value = "";
    document.getElementById("NombreDonante").value = "";
    $("#Modal_paises").modal("hide");
  
  }
  init();