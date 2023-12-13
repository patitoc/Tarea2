//aqui va a estar el codigo de usuarios.model.js

function init() {
  $("#frm_donacion").on("submit", function (e) {
    guardaryeditar(e);
  });
}

$().ready(() => {
  todos();
});

var todos = () => {
  var html = "";
  $.get("../../Controllers/donacion.controller.php?op=todos", (res) => {
    console.log(res);
    res = JSON.parse(res);
    $.each(res, (index, valor) => {
      html += `<tr>
                <td>${index + 1}</td>
                <td>${valor.NombreDonante}</td>
                <td>${valor.donante}</td>
            <td>
            <button class='btn btn-success' onclick='editar(${
              valor.CodDonacion
            })'>Editar</button>
            <button class='btn btn-danger' onclick='eliminar(${
              valor.CodDonacion
            })'>Eliminar</button>
            <button class='btn btn-info' onclick='ver(${
              valor.CodDonacion
            })'>Ver</button>
            </td></tr>
                `;
    });
    $("#tabla_paises").html(html);
  });
};

var guardaryeditar = (e) => {
  e.preventDefault();
  var dato = new FormData($("#frm_provincias")[0]);
  var ruta = "";
  var CodDonacion = document.getElementById("CodDonacion").value;
  if (CodDonacion > 0) {
    ruta = "../../Controllers/donacion.controller.php?op=actualizar";
  } else {
    ruta = "../../Controllers/donacion.controller.php?op=insertar";
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
        Swal.fire("donacion", "Registrado con éxito", "success");
        todos();
        limpia_Cajas();
      } else {
        Swal.fire("donacion", "Error al guardo, intente mas tarde", "error");
      }
    },
  });
};

var cargaDonante = () => {
  return new Promise((resolve, reject) => {
    $.post("../../Controllers/donante.controller.php?op=todos", (res) => {
      res = JSON.parse(res);
      var html = "";
      $.each(res, (index, val) => {
        html += `<option value="${val.CodDonante}"> ${val.NombreDonante}</option>`;
      });
      $("#CodDonante").html(html);
      resolve();
    }).fail((error) => {
      reject(error);
    });
  });
};

var editar = async (CodDonacion) => {
  await cargaDonacion();
  $.post(
    "../../Controllers/donacion.controller.php?op=uno",
    { CodDonacion: CodDonacion },
    (res) => {
      res = JSON.parse(res);

      $("#CodDonacion").val(res.CodDonacion);
      $("#CodDonante").val(res.CodDonante);
      //document.getElementById("PaisId").value = res.PaisesId;


      $("#NombreDonante").val(res.NombreDonante);
    }
  );
  $("#Modal_donacion").modal("show");
};

/*var eliminar = (ProvinciasId) => {
  Swal.fire({
    title: "Paises",
    text: "Esta seguro de eliminar la provincia",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post(
        "../../Controllers/provincias.controller.php?op=eliminar",
        { ProvinciasId: ProvinciasId },
        (res) => {
          res = JSON.parse(res);
          if (res === "ok") {
            Swal.fire("provincias", "Provincia Eliminado", "success");
            todos();
          } else {
            Swal.fire("Error", res, "error");
          }
        }
      );
    }
  });

  limpia_Cajas();
};*/

var limpia_Cajas = () => {
  document.getElementById("CodDonacion").value = "";
  document.getElementById("CodDonante").value = "";
  document.getElementById("NombreDonante").value = "";
  $("#Modal_donacion").modal("hide");
};
init();
