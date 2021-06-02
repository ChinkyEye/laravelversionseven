<template>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">All Librarian Details<span class="float-right"><a data-toggle="modal" href="#addModalLibrarian">+</a></span>
				</div>
				<div class="card-body">
					<ul class="list-group">
						<li class="list-group-item" v-for="item in tasks" v-bind:key="item.id">{{item.id}} - {{item.name}}<span class="float-right"><button class="btn btn-info btn-sm" v-on:click="showData(item.id)">Preview</button> | <button class="btn btn-danger btn-sm" v-on:click="deleteData(item.id)">Delete</button> | <button class="btn btn-primary btn-sm" data-toggle="modal" href="#editModalLibrarian" v-on:click="editData(item.id)">Edit</button></span></li>
					</ul>
				</div>
				<div class="card-footer"><small class="float-right">Copyrights @copy: 2018</small></div>
			</div>
			<div id="modal">
				<addLibrarian v-on:recordadded="refreshRecord"></addLibrarian>
				<editLibrarian :rec="recEdit" v-on:recordupdated="refreshRecord"></editLibrarian>
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
				axios.delete('http://127.0.0.1:8000/vue/librarian/'+ id)
				.then(resp=>{
					this.tasks=resp.data
				})
			},
			editData(id){
				axios.get('http://127.0.0.1:8000/vue/librarian/'+ id+ "/edit")
				// .then(resp=>console.log(resp.data.[0]))
				.then(resp=>{
					this.recEdit =resp.data.[0]
				})

			}
		},
		created(){
			axios.get('http://127.0.0.1:8000/vue/get-librarian')
			.then(resp=>{
				console.log(resp)
				this.tasks = resp.data
				// this.tasks = console.log(resp.data)
				console.warn('tsak is completed');
			})
		}

	}
</script>