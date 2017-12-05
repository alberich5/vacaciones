


<div class="modal fade" id="historial">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
				<h4 align="center">HISTORIAL</h4>
          <br>
           
        
          <div class="row" v-for="usuario in users" v-if="usuario.id_elemento==idElemento" >
            <div class="col-sm-10 col-sm-offset-1">
            <h5 >@{{"Nombre: "+usuario.nombre +" "+ usuario.apellido_paterno+" "+ usuario.apellido_materno}}</h5>

         
          </div>
          </div>
          <input id="id_usuario_historial" type="hidden"  @click="historialUsuario">
			</div>
      <div class="modal-body">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <table id="tablaAcciones" class=" table-hover" cellspacing="0" width="100%">
       
      <thead>
        <tr>
        <th colspan="2">OPCIONES</th>
          
         <th colspan="1">ID</th>
         <th colspan="">F. INICIAL</th>
         <th colspan="">F. FINAL</th>
         <th colspan="">FOLIO</th>
        </tr>
      </thead>


      <tbody>
        <tr v-for="acceso in accesos">
          <td >
            <a href="#" @click="descargarArchivo(acceso.id_permiso)">
             
                  <i class="material-icons md-18">file_download</i>   
             
            </a>
          </td>
          <td >
           
          </td>
          <td>&nbsp;@{{acceso.id_permiso}}</td>
          <td>&nbsp;@{{acceso.fecha_inicial}}</td>
          <td>&nbsp;@{{acceso.fecha_final}}</td>
          <td>@{{acceso.oficio}}</td>

        </tr>
          
          

      </tbody>  
    </table>
        
        </div>
      </div>
                      

      </div>
			<div class="modal-footer">
				<input type="button" class="btn btn-primary" value="CANCELAR">
       

				<input type="submit" class="btn btn-primary" value="Guardar">
			</div>
<!---
       <div class="row">
            <div class="col-xs-12">
              <pre>@{{$data}}</pre>
            </div>
 </div>

-->
		</div>
	</div>
</div>
