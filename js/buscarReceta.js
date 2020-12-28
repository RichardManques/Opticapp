new Vue({
  el: "#app",
  data: {
    url: "http://mysql:host=bm4zscbkudhtv5p4x5wc-mysql.services.clever-cloud.com;dbname=optica_2020:82/opticapp/",
    rut: "",
    recetas: [],
    receta: {},
    fecha: "",
  },
  methods: {
    buscarRut: async function () {
      var recurso = "controllers/ControlBuscarPorRut.php";
      var form = new FormData();
      form.append("rut", this.rut);
      try {
        const res = await fetch(this.url + recurso, {
          method: "post",
          body: form,
        });
        const data = await res.json();
        console.log(data);
        this.recetas = data;
      } catch (error) {
        console.log(error);
      }
    },
    buscarFecha: async function () {
      this.fecha=M.Datepicker.getInstance(buscar_fecha);
      var recurso = "controllers/ControlBuscarPorFecha.php";
      var form = new FormData();
      form.append("fecha", this.fecha);
      try {
        const res = await fetch(this.url + recurso, {
          method: "post",
          body: form,
        });
        const data = await res.json();
        console.log(data);
        this.recetas = data;
      } catch (error) {
        console.log(error);
      }
    },
    abrirModal: function (receta) {
      this.receta = receta;
      var modal = document.getElementById("modal1");
      var instance = M.Modal.getInstance(modal);
      instance.open();
        },
  },
  created() {},
});


