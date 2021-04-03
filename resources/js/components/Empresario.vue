<template>
    <div>
        <h1 class="text-center">Gerenciador de Empresários</h1>
        <hr/>
    <!-- Button to Open the Modal -->
<button  @click="editar=false; abrirModal();" type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModal">
  Criar
</button>

<!-- The Modal -->
<div class="modal" :class="{mostrar:modal}" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">{{tituloModal}}</h4>
        <button @click="encerrarModal();" type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="col-md-5 text-left">
						<div class="form-group">
							<label for="name">Nome</label>
							<input v-model="empresario.name" type="text" name="name" class="form-control" id="name" required>
						</div>
						
							<label for="gender">Celular</label>
              <input v-model="empresario.tel" type="number" name="tel" class="form-control" id="tel" required>
						            
							<label for="name">Capital</label>
							<input v-model="empresario.UF" type="text" name="UF" class="form-control" id="UF" required>

							<label for="name">Cidade</label>
							<input v-model="empresario.UF" type="text" name="city" class="form-control" id="city" required>
	
							<label for="date">Data de Cadastro</label>
							<input v-model="empresario.date" type="date" id = "date" name="date" class="form-control">

							<label for="name">Pai empresarial</label>
							<input v-model="empresario.paiempresario" type="text" name="paiempresario" class="form-control" id="paiempresario" required>

				</div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button @click="salvar();" type="button" class="btn btn-success" data-dismiss="modal">Salvar</button>
        <button @click="encerrarModal();" type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
      </div>

    </div>
  </div>
</div>
<table class="table">
  <thead>
    <tr class="thead-dark text-center">
      <th scope="col">nome completo</th>
      <th scope="col">cel</th>
      <th scope="col">Cidade/UF</th>
      <th scope="col">Cadastro em</th>
      <th scope="col">Pai empresario</th>
      <th scope="col">Rede</th>
      <th scope="col">ações</th>
    </tr>
  </thead>
  <tbody>
    <tr class="text-center" v-for="emprs in empresarios" :key="emprs.id">
      <td>{{emprs.name}}</td>
      <td>{{emprs.tel}}</td>
      <td>{{emprs.city}}/{{emprs.UF}}</td>
      <td>{{emprs.date}}</td>
      <td>{{emprs.paiempresario}}</td>
      <td><button @click="editar=true; abrirModal(emprs)" class="btn btn-warning">Editar</button></td>
      <td><button @click="eliminar(emprs.id)" class="btn btn-danger mr-1">APAGAR</button><button class="btn btn-success">VER</button></td>
    </tr>
  </tbody>
</table>
    </div>
</template>
<script>

export default{
    data(){
        return {
            empresario:{
              name:'',
              tel:'',
              city:'',
              UF:'',
              date:'',
              paiempresario:''
            },
            editar:true,
            modal:0,
            tituloModal:'',
            empresarios:[],
        }
    },
    methods: {
        async listar(){
            const res=await axios.get('empresarios');
            this.empresarios=res.data;
        },

        async eliminar(id){
            const res=await axios.delete('/empresarios/'+id);
            this.listar();
        },

        async salvar(){
            if(this.editar){
              const res=await axios.put('/empresarios/'+this.id, this.empresario);
            } else{
              const res=await axios.post('/empresarios/', this.empresario);
            }
            this.encerrarModal();
            this.listar();
        },

        abrirModal(data={}){
            this.modal=1;
            if(this.editar){
              this.id=data.id,
              this.tituloModal="Editar empresário";
              this.empresario.name=data.name;
              this.empresario.tel=data.tel;
              this.empresario.city=data.city;
              this.empresario.UF=data.UF;
              this.empresario.date=data.date;
              this.empresario.paiempresario=data.paiempresario;
            } else{
              this.id=0,
              this.tituloModal="Cadastrar empresário";
              this.empresario.name='';
              this.empresario.tel='';
              this.empresario.city='';
              this.empresario.UF='';
              this.empresario.date='';
              this.empresario.paiempresario='';
            }
        },

        async encerrarModal(){
            this.modal=0;
        }
        

    },  
    created(){
        this.listar();
    }
}
</script>
<style>
.mostrar{
  display: list-item;
  opacity: 1;
  background-color: rgba(0, 0, 0, 0.692);
}
</style>
