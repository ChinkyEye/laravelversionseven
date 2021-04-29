<template>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">All Student Detail<span class="float-right"><a data-toggle="modal" href="#addModalStudent">+</a></span>
				</div>
				<div class="card-body">
					<ul class="list-group">
						<li class="list-group-item" v-for="item in tasks" v-bind:key="item.id">{{item.id}} - {{item.name}}<span class="float-right"><button class="btn btn-info btn-sm">Preview</button> | <button class="btn btn-danger btn-sm" v-on:click="deleteData(item.id)">Delete</button> | <button class="btn btn-primary btn-sm" data-toggle="modal" href="#editModalStudent" v-on:click="editData(item.id)">Edit</button></span></li>
					</ul>
				</div>
				<div class="card-footer"><small class="float-right">Copyrights @copy: 2018</small></div>
			</div>
			<div id="modal">
				<addStudent v-on:recordadded="refreshRecord"></addStudent>
				<editStudent :rec="recEdit" v-on:recordupdated="refreshRecord"></editStudent>
				<!-- <addTask v-on:recordadded="refreshRecord"></addTask> -->
				<!-- <addStudent v-on:recordadd="refreshRecord"></addStudent> -->
			</div>
		</div>
	</div>
</template>
<script type="text/javascript">
	export default{
		data(){
			return {
				tasks: {},
				recEdit: {},
			}
		},
		methods:{
			refreshRecord(resp){
				this.tasks=resp.data
			},
			deleteData(id){
				axios.delete('http://127.0.0.1:8000/vue/student/'+id)
				.then(resp=>{
					this.tasks = resp.data;
				});

			},
			editData(id){
				axios.get('http://127.0.0.1:8000/vue/student/'+id+'/edit')
				// .then(resp=>console.log(resp))
				.then(resp=>{
					this.recEdit=console.log(resp.data.[0])
					this.recEdit=resp.data.[0]
				})
			}
		},
		created(){
			axios.get('http://127.0.0.1:8000/vue/get-student')
			.then(resp=>{
				this.tasks = resp.data
				// this.tasks = console.log(resp.data)
				console.warn('tsak is completed');
			})
		}


	}
</script>