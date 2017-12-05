		

		new Vue({
			//id asignado al div en el que funcionara vue
			el: '#usuarioCRUD',
			//funcion al crear el objeto
			created:function(){

				this.prueba();
				//llamada al metodo
			},


			data:{
				
				errors:[],
				usuarios:[],
					},
			methods:{

					prueba:function () {
					
					var url='/administrador/usuario/get';
					//variable que hace referencia a la URI de la ruta
					axios.get(url).then(response=>{
					this.usuarios=response.data;
					
					});
					
				}

				
				

				
		
		}});