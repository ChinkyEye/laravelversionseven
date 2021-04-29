<template>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">All Task <span class="float-right"><a data-toggle="modal" href="#taskModal">+</a></span>
				</div>
				<div class="card-body">
					<ul class="list-group">
						<li class="list-group-item" v-for="item in tasks" v-bind:key="item.id">{{item.id}} - {{item.name}}<span class="float-right"><button class="btn btn-info btn-sm">Preview</button> | <button class="btn btn-danger btn-sm" v-on:click="deleteData(item.id)">Delete</button> | <button class="btn btn-primary btn-sm" data-toggle="modal" href="#editTaskModal" v-on:click="editData(item.id)">Edit</button></span></li>
					</ul>
				</div>
				<div class="card-footer"><small class="float-right">Copyrights @copy: 2018</small></div>
			</div>
			<div id="modal">
				<addModel v-on:recordadded="refreshData"></addModel>
				<editModel :rec="editRec" v-on:recordupdated="refreshData"></editModel>
			</div>
		</div>
	</div>
</template>
<script type="text/javascript">
	Vue.component('addModel', require('./addTaskComponent.vue').default);
	Vue.component('editModel', require('./editTaskComponent.vue').default);
	export default{
		data(){
			return {
				tasks:{},
				editRec:{},
			}
		},
		methods:{
			refreshData(resp){
				this.tasks=resp.data
			},
			deleteData(id){
				axios.delete('http://127.0.0.1:8000/task/'+id)
				.then(resp=>{
					this.tasks= resp.data;
				})

			},
			editData(id){
				axios.get('http://127.0.0.1:8000/task/'+id+'/edit')
				.then(resp=>{
					this.editRec= resp.data.[0];
				})


			}
		},
		created(){
			axios.get('http://127.0.0.1:8000/task/getData')
			.then(resp=>{
				this.tasks = resp.data;
			})
		}

	}
</script>
