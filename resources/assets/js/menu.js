		

		new Vue({
			//id asignado al div en el que funcionara vue
			el: '#seleccionMD',
			//funcion al crear el objeto
			created:function(){
				this.verificar();
				this.getSucursal();
				
				//llamada al metodo
			},


			data:{
				modulos:[],
				sucursales:[],
				sucursal:{'id':'','nombre':''},
				errors:[],
				usuarios:[],
					},
			methods:{
				getModulos:function () {
					
					var url='/menumodulos/';
					//variable que hace referencia a la URI de la ruta
					axios.get(url).then(response=>{
						this.modulos=response.data

					});


					setTimeout(function () {
					for (var i = 0;i<7; i++ ){
						for (var j =0 ; j < this.modulos.length ;j++) {
							if(this.modulos[j].id==i)
							{

						var nombre='modulo'+i;
						
						document.getElementById(nombre).style.display = 'block';
							}
						
							
						}
						}
					
					}.bind(this), 700)




				},

				

				verificar:function () {
					
					var url='/menusucursales';
					//variable que hace referencia a la URI de la ruta
					axios.get(url).then(response=>{
						this.sucursales=response.data
						//al acceder a esa ruta asignara el resultado a la variable 

					});
					this.getModulos();



					setTimeout(function () {
					if(this.sucursales.length>1)
					{
						//jquery
						
						if(this.sucursal.id==0)
						{
							$('#sucursal').modal('show');
						}
					
					}

					}.bind(this), 700)
				}
				,


					setSucursal:function (id) {
					

					var url ='/setsucursal/'+id;
					axios.post(url,id).then(response=>{	
						this.errors=[];//listado de errores

						$('#sucursal').modal('hide');
					toastr.success('Delegacion '+this.sucursal.nombre+' seleccionada con exito');//mensaje 
					





					}).catch(error=>{

						this.errors=error.response.data

					});

					


					},


					getSucursal:function () {

					var url='/getsucursal/';
					//variable que hace referencia a la URI de la ruta
					axios.get(url).then(response=>{
				
						
							this.sucursal=response.data;
						//al acceder a esa ruta asignara el resultado a la variable 
					});

					
					
				},

				editSucursal:function () {

					$('#sucursal').modal('show');

					
					
				},
	/*
					prueba:function () {
					this.getSucursal();
					var url='administrador/usuario/get';
					//variable que hace referencia a la URI de la ruta
					axios.get(url).then(response=>{
					this.usuarios=response.data;
					
					});
					alert(url);
				}


	*/
				
				

				
		
		}});