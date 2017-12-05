


<div class="modal fade" id="edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
				<h4 align="center">Editar</h4>
          <br>
          
          <div class="row" v-for="usuario in editUsuario" v-if="usuario.id_elemento==idElemento" >
            <div class="col-sm-10 col-sm-offset-1">
            

            <h5 >@{{"NOMBRE: "+ usuario.nombre +" "+usuario.apellido_paterno+" "+ usuario.apellido_materno}}</h5>
            </br>
           
          </div>
          </div>
           
        
          
          <input id="id_usuario_edit" v-model="idElemento" type="input"  @click="editarUsuario">
			</div>
			<div class="modal-body">
        <div class="row" v-for="usuario in editUsuario" v-if="usuario.id_elemento==idElemento" >
        <div class="col-sm-10 col-sm-offset-1">
            <h5 >@{{"Fecha de nacimiento: "+usuario.fecha_nacimiento}}</h5>
            <h5 >@{{"Delegacion: "+usuario.sub_delegacion}}</h5>
            <h5 >@{{"Estatus: "+usuario.estatus}}</h5>
            <h5 >@{{"Fecha de ingreso: "+usuario.fecha_inicio_laboral}}</h5>
            
        
        </div>
      </div>



      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
         
                      
                      <div class=" form-group">
                                <div class="input-group ">
                                    <span class="input-group-addon" id="basic-addon1">
                                      <i class="material-icons md-18">history</i>   
                                    </span>

                                    <select id="dias"  v-model="diasVacaciones" name="dias"  class="form-control required" placeholder="Seleccione" @change="calcularFechaTR" >
                                    </select>
                                    
                               </div>
                      </div>




                      <div class=" form-group">
                                <div class="input-group ">
                                    <span class="input-group-addon" id="basic-addon1">
                                      <i class="material-icons md-18">description</i>   
                                    </span>

                                    <input id="oficio"  class="form-control" name="oficio" value="" autofocus placeholder="No de oficio" aria-describedby="basic-addon1"  v-model="oficioVacaciones">
                               </div>
                      </div>







                        <div class=" form-group">
                                <div class="input-group ">
                                    <span class="input-group-addon" id="basic-addon1">
                                      <i class="material-icons md-18">event</i>   
                                    </span>

                                  <h5>Fecha solicitud</h5>


                               
                                <input type="date" v-model="fechaSolicitudVacaciones" class="form-control required" id="fecha_solicitud" name="fecha_solicitud">

                               </div>
                        </div>


                        <div class=" form-group">
                                <div class="input-group ">
                                    <span class="input-group-addon" id="basic-addon1">
                                      <i class="material-icons md-18">hourglass_empty</i>   
                                    </span>

                                  

                                <h5>Fecha inicial</h5>
                               
                                <input type="date" v-model="fechaInicioVacaciones"   class="form-control required" id="fecha_inicial" name="fecha_inicial" @change="calcularFechaTR">

                               </div>
                        </div>

                        <div class=" form-group">
                                <div class="input-group ">
                                    <span class="input-group-addon" id="basic-addon1">
                                      <i class="material-icons md-18">hourglass_full</i>   
                                    </span>

                                  

                                    <h5>Fecha final</h5>
                               
                                <input type="date" v-model="fechaTerminoVacaciones"   class="form-control required" id="fecha_final" name="fecha_final" readonly>

                               </div>
                        </div>

                        <div class=" form-group">
                                <div class="input-group ">
                                    <span class="input-group-addon" id="basic-addon1">
                                      <i class="material-icons md-18">repeat</i>   
                                    </span>

                                  <h5>Fecha Reincorporacion</h5>


                               
                                <input type="date" class="form-control required" v-model="fechaReincorporacionVacaciones" id="fecha_reincorporacion" name="fecha_reincorporacion" readonly>

                               </div>
                        </div>


                      

                   

                   
                      

                    

        </div>
      </div>
                      






      





      </div>
			<div class="modal-footer">
				<input  type="button" class="btn btn-primary" value="Cancelar" data-dismiss="modal">
				<input type="button" class="btn btn-primary" value="Guardar" @click="createUsuario" >
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
