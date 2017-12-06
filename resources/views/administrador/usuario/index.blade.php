@extends('administrador.layout')

@section('css')
<link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css">

<link href="{{asset('loopj-jquery-tokeninput/styles/token-input.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('loopj-jquery-tokeninput/styles/token-input-facebook.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
<!-- Inicio del body del panel -->

            <div class="row" >


                  <div class="panel panel-default col-sm-10 col-sm-offset-1" id="contenedorUsuario">
                  <!--      inicio Wizard container        -->
                  <div class="panel-heading" id="titulo"> <h3 align="center" >ELEMENTOS</h3></div>

            </br>
            </br>

                <div id="tabledemo" >
                    <form method="POST" v-on:submit.prevent="busquedaUsuario">
                      <div name="formulario busqueda" class="form-horizontal">

                        <div class="row">

                            <div class=" col-sm-6 form-group">

                                <div class="input-group col-md-8 col-md-offset-1">
                                    <span class="input-group-addon" id="basic-addon1">
                                      <i class="material-icons md-18">account_circle</i>
                                    </span>

                                    <input id="id" type="id" class="form-control" name="id"  autofocus placeholder="ID" aria-describedby="basic-addon1"  v-model="searchUsuario.id">

                               </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class=" col-sm-6  form-group ">

                                <div class=" input-group col-md-8 col-md-offset-1">
                                    <span class="input-group-addon" id="basic-addon1">
                                      <i class="material-icons md-18">person</i>
                                    </span>

                                    <input id="rfc" type="rfc" class="form-control" name="rfc" value=""  autofocus placeholder="RFC" aria-describedby="basic-addon1" style="text-transform:uppercase;" v-model="searchUsuario.rfc" >

                               </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class=" col-sm-6  form-group ">

                                <div class=" input-group col-md-8 col-md-offset-1">
                                    <span class="input-group-addon" id="basic-addon1">
                                      <i class="material-icons md-18">person</i>
                                    </span>

                                    <input id="nombre" type="nombre" class="form-control" name="nombre" value=""  autofocus placeholder="Nombre" aria-describedby="basic-addon1" style="text-transform:uppercase;" v-model="searchUsuario.nombre" >

                               </div>
                            </div>
                        </div>


                        <div class="row">

                            <div class=" col-sm-6  form-group ">

                                <div class=" input-group col-md-8 col-md-offset-1">
                                    <span class="input-group-addon" id="basic-addon1">
                                      <i class="material-icons md-18">&nbsp; &nbsp;&nbsp;</i>
                                    </span>

                                    <input id="paterno" type="paterno" class="form-control" name="paterno" value=""  autofocus placeholder="Apellido paterno" aria-describedby="basic-addon1" style="text-transform:uppercase;"  v-model="searchUsuario.paterno">

                               </div>
                            </div>
                        </div>


                        <div class="row">

                            <div class=" col-sm-6 form-group ">

                                <div class=" input-group col-md-8 col-md-offset-1">
                                    <span class="input-group-addon" id="basic-addon1">
                                      <i class="material-icons md-18">&nbsp; &nbsp;&nbsp;</i>
                                    </span>

                                    <input id="materno" type="materno" class="form-control" name="materno" value=""  autofocus placeholder="Apellido materno" aria-describedby="basic-addon1" style="text-transform:uppercase;"  v-model="searchUsuario.materno" >

                               </div>
                            </div>
                        </div>








                        <div class="row col-sm-offset-1">


                                <input type="submit" class="btn btn-primary" value="BUSCAR">


                        </div>
                       </div><!--      FORM BUSQ      -->
                      </form>




                      <!--      tabla usuarios      -->


                      Buscar : <input v-model="search">
                      <hr>
                      <data-table :users="filteredUsers"></data-table>

<!--
                      <div class="row">
                                <div class="col-xs-12">
                                  <pre>@{{$data}}</pre>
                                </div>
                    </div>
 -->
                    @include('administrador.usuario.edit')
                    @include('administrador.usuario.historial')
                    @include('administrador.usuario.show')
</div>




                      <!-- FIN DEL TAB PARA LOS CONTENIDOS -->









              </div>
          </div> <!-- row -->


 <!-- pruebas -->

<!-- fin de pruebas -->





<!-- Fin del body del panel -->

@endsection
@section('js')
<!-- INCLUYE LAS LIBRERIAS EXTERNAS DE JAVASCRIPT-->



<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('loopj-jquery-tokeninput/src/jquery.tokeninput.js') }}"></script>
<script type="text/javascript">

    /*
$("#demo-input").tokenInput([
                          {id: 7, name: "Ruby"},
                          {id: 11, name: "Python"},
                          {id: 13, name: "JavaScript"},
                          {id: 17, name: "ActionScript"},
                          {id: 19, name: "Scheme"},
                          {id: 23, name: "Lisp"},
                          {id: 29, name: "C#"},
                          {id: 31, name: "Fortran"},
                          {id: 37, name: "Visual Basic"},
                          {id: 41, name: "C"},
                          {id: 43, name: "C++"},
                          {id: 47, name: "Java"}
                        ],{
                          prePopulate: [ {id: 29, name: "C#"},
                                          {id: 31, name: "Fortran"}
                                        ],
                          theme: "facebook",
                          hintText: "Escriba el nombre de la accion",
                          noResultsText: "Sin resultado",
                          searchingText: "Buscando...",
                          preventDuplicates: true

                                      });
*/


</script>
<script type="text/javascript">




function editar(id)
{

  $('#edit').modal('show');
  document.getElementById('id_usuario_edit').value=id;
 document.getElementById("id_usuario_edit").click();


}


function ver(id)
{

  $('#show').modal('show');
  document.getElementById('id_usuario_show').value=id;
 document.getElementById("id_usuario_show").click();


}

function historial(id)
{

  $('#historial').modal('show');
  document.getElementById('id_usuario_historial').value=id;
  document.getElementById("id_usuario_historial").click();


}


Vue.component('data-table', {
  template: '<table class="display"></table>',

  props: ['users'],
  data() {
    return {
      headers: [
        { title: 'OPCIONES' },
        { title: 'ID'  },
        { title: 'NOMBRE'},
        { title: 'APELLIDO PATERNO' },
        { title: 'APELLIDO MATERNO'  },
        { title: 'SUCURSAL' , class: 'some-special-class sorting' }

      ],
      rows: [] ,
      dtHandle: null
    }
  },
  watch: {
    users(val, oldVal) {
      let vm = this;
      vm.rows = [];
      // You should _probably_ check that this is changed data... but we'll skip that for this example.
      val.forEach(function (item) {
        // Fish out the specific column data for each item in your data set and push it to the appropriate place.
        // Basically we're just building a multi-dimensional array here. If the data is _already_ in the right format you could
        // skip this loop...
        let row = [];
        row.push(


          "<a href='#'' class='btn btn-warning btn-sm' title='Ver informacion elemento' onclick='"+"ver("+item.id_elemento+")'"+"> <i class='material-icons md-18'>visibility</i></a>&nbsp;"+
          "<a  href='#'' class='btn btn-danger btn-sm' title='Agregar vacaciones' onclick='"+"editar("+item.id_elemento+")'"+"><i class='material-icons md-18'>add_circle_outline</i></a>"+
          "<a href='#'' class='btn btn-success btn-sm' title='Historial' onclick='"+"historial("+item.id_elemento+")'"+"><i class='material-icons md-18'>list</i></a>"
        );


        row.push(item.id_elemento);
        row.push(item.nombre);
        row.push(item.apellido_paterno);
        row.push(item.apellido_materno);
        row.push(item.sub_delegacion);

        vm.rows.push(row);
      });

      // Here's the magic to keeping the DataTable in sync.
      // It must be cleared, new rows added, then redrawn!
      vm.dtHandle.clear();
      vm.dtHandle.rows.add(vm.rows);
      vm.dtHandle.draw();
    }






  },
  methods:{


              }

  ,
  mounted() {
    let vm = this;
    // Instantiate the datatable and store the reference to the instance in our dtHandle element.
    vm.dtHandle = $(this.$el).DataTable({
      // Specify whatever options you want, at a minimum these:



      columns: vm.headers,
      data: vm.rows,
      searching: false,
      paging: true,
      info: true,
          language: {
        paginate: {
                first:    'Inicio',
                previous: 'Anterior',
                next:     'Siguiente',
                last:     'Ultimo'
        },

        emptyTable: "Sin resultados",
        //sLengthMenu: "Mostrar _MENU_",
        info: "Mostrando pagina _PAGE_ de _PAGES_",
        sLengthMenu: 'Mostrar <select>'+
      '<option value="10">10</option>'+
      '<option value="25">25</option>'+
      '<option value="50">50</option>'+
      '<option value="100">100</option>'+
      '<option value="-1">Todos</option>'+
      '</select>',
       infoEmpty: "",
       infoFiltered: " - filtered from _MAX_ records"




    }


    });




  }




});

new Vue({

  el: '#tabledemo',

  data: {
    searchUsuario:{id:'',rfc:'',nombre:'',paterno:'',materno:''},
    users: [],
    search: '',

    usuario:{},
    idElemento:'',
    permisos:[],
    tablaPermisos:[],
    accesos:[],
    editUsuario:'',
    editPermisos:[],
    editSucursales:[],
    diasVacaciones:'',
    fechaInicioVacaciones:'',
    fechaSolicitudVacaciones:'',
    oficioVacaciones:'',




    fechaTerminoVacaciones:'',
fechaReincorporacionVacaciones:'',
idPermisoImprimir:''




  },
  methods:{
    calcularFechaTR:function(){


     var url='/administrador/usuario/calcularfecha';

                    axios.post(url,{
                        fechaInicioVacaciones:this.fechaInicioVacaciones,//new keep es e input
                        diasVacaciones:this.diasVacaciones
                    }).then(response=>{
                    // alert(response.data);
                    this.fechaTerminoVacaciones =response.data.fechaTerminoVacaciones;

                    this.fechaReincorporacionVacaciones =response.data.fechaReincorporacionVacaciones;


                      this.errors=[];//listado de errores
                      //alert(response.data);

                    }).catch(error=>{
                      this.errors=error.response.data

                    });
    }
     ,

                    descargarArchivo:function(id_permiso){


                    window.open('usuario/vacaciones/download/'+id_permiso,"_self");
                   }


     ,
                    createUsuario:function()
                    {


                      var url='/administrador/usuario/create';

                    axios.post(url,{


                      idElemento:this.idElemento,
                      diasVacaciones:this.diasVacaciones,
                      fechaInicioVacaciones:this.fechaInicioVacaciones,
                      fechaSolicitudVacaciones:this.fechaSolicitudVacaciones,
                      oficioVacaciones:this.oficioVacaciones,
                      fechaTerminoVacaciones:this.fechaTerminoVacaciones,
                      fechaReincorporacionVacaciones:this.fechaReincorporacionVacaciones


                    }).then(response=>{


                       $('#edit').modal('toggle');
                      this.errors=[];//listado de errores
                      this.idElemento='';
                      this.diasVacaciones='';
                      this.fechaInicioVacaciones='';
                      this.fechaSolicitudVacaciones='';
                      this.oficioVacaciones='';
                      this.fechaTerminoVacaciones='';
                      this.fechaReincorporacionVacaciones='';
                      //alert(response.data);

                      this.idPermisoImprimir=response.data;
                     this.descargarArchivo(response.data);
                    //fin descarga
                    }).catch(error=>{
                      this.errors=error.response.data

                    });



                    //this.idPermisoImprimir=0;
                    },




                    editarUsuario:function()
                    {
                    this.idElemento=document.getElementById('id_usuario_edit').value;


                    var url='/administrador/usuario/edit';

                    axios.post(url,{
                        usuario:this.idElemento//new keep es e input
                    }).then(response=>{

                     this.editUsuario=response.data.usuario;
                     this.editUsuario=this.editUsuario[0];
                     //this.editUsuario.diasSeleccionados='';
                     //<input type="text" id="permisosEditar">
                     //padre


                     var selectDias = document.getElementById("dias");

                     for (var ii =0;ii<= selectDias.length  ; ii++) {
                       selectDias.remove(ii);
                     }

                     for(var i=0;i<response.data.diasUtilizados;i++)
                     {
                      var c = document.createElement("option");
                      c.text =i+1;
                      c.value=i+1;
                      selectDias.options.add(c, i);

                     }




                      this.errors=[];//listado de errores
                      //alert(response.data);

                    }).catch(error=>{
                      this.errors=error.response.data

                    });
                    //descargar el formato de vacaciones



                    },

                    mostrarUsuario:function()
                    {
                    this.idElemento=document.getElementById('id_usuario_show').value;
                    var url='/administrador/usuario/show';

                    axios.post(url,{
                        usuario:this.idElemento//new keep es e input
                    }).then(response=>{

                     //this.permisos=response.data;


                      this.errors=[];//listado de errores
                      //alert(response.data);

                    }).catch(error=>{
                      this.errors=error.response.data

                    });


                    },

                    historialUsuario:function()
                    {

                    this.idElemento=document.getElementById('id_usuario_historial').value;
                    var url='/administrador/usuario/historial';

                    axios.post(url,{
                        usuario:this.idElemento//new keep es e input
                    }).then(response=>{



                     this.accesos=response.data;


                      this.errors=[];//listado de errores
                      //alert(response.data);

                    }).catch(error=>{
                      this.errors=error.response.data

                    });



                },
                    busquedaUsuario:function()
                    {
                    this.users=[];
                    var url='/administrador/usuario/search';

                    axios.post(url,{
                        usuario:this.searchUsuario//new keep es e input
                    }).then(response=>{
                    //  alert(response.data.nombre);
                     // this.usuarios=[];

                      //this.users=response.data;

                     this.users=response.data.usuario;
                      //this.tablaPermisos=response.data.permisos;

                      this.errors=[];//listado de errores
                      //alert(response.data);
                      //this.searchUsuario={'username':'','nombre':'','paterno':'','materno':''};
                      this.searchUsuario.id='';
                      this.searchUsuario.rfc='';
                      this.searchUsuario.nombre='';
                      this.searchUsuario.paterno='';
                      this.searchUsuario.materno='';
                        toastr.success('Busqueda exitosa');//mensaje


                        //
                       ///
                    }).catch(error=>{
                      this.errors=error.response.data

                    });



                },

                getIdElemento:function()
                {
                 this.idElemento=document.getElementById('id_usuario').value;
                }

        },//end metodos

  computed: {
    filteredUsers: function () {
      let self = this
      let search = self.search.toLowerCase()
      return self.users.filter(function (user) {
        return  user.id_elemento.indexOf(search) !== -1 ||
          user.nombre.toLowerCase().indexOf(search) !== -1 ||
          user.apellido_paterno.toLowerCase().indexOf(search) !== -1 ||
          user.apellido_materno.toLowerCase().indexOf(search) !== -1 ||
          user.sub_delegacion.toLowerCase().indexOf(search) !== -1


      })
    }





  },
  mounted() {
    let vm = this;


        vm.users = [];





  }
});





</script>

@endsection
