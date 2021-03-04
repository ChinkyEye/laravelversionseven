<template>
	<!-- <div class="row">
        <div class="container-fluid">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Todo Task <span class="float-right"><a data-toggle="modal" href="#addModal">+</a></span>
                    </div>

                    <div class="card-body">

                    </div>
                    <div class="card-footer"><small class="float-right">Copyrights @copy: 2018</small></div>
                </div>
            </div>
        </div>
        <div id="modal">
        </div>
    </div> -->
    <div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">All Todo Task <span class="float-right"><a data-toggle="modal" href="#addModal">+</a></span>
			</div>
			<div class="card-body">
				<ul class="list-group">
					<li class="list-group-item" v-for="item in tasks" v-bind:key="item.id">{{item.id}} - {{item.name}}<span class="float-right"><button class="btn btn-info btn-sm">Preview</button> | <button class="btn btn-danger btn-sm">Delete</button> | <button class="btn btn-primary btn-sm">Edit</button></span></li>
				</ul>
			</div>
			<div class="card-footer"><small class="float-right">Copyrights @copy: 2018</small></div>
		</div>
		<div id="modal">
			<addTask></addTask>
        </div>

        <!-- <div class="modal fade" id="addModal">
        	<div class="modal-dialog">
        		<div class="modal-content">
        			<div class="modal-header">
        				<h5 class="modal-title">Add new Task</h5>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="clearModal">
        					<span aria-hidden="true">&times;</span>
        				</button>
        			</div>
        			<form>
        				<div class="modal-body">
        					<div class="form-group">
        						<label for="name">Name:</label>
        						<input type="text" class="form-control" id="name" name="name" placeholder="enter your name" autocomplete="off" v-model='record'>
        					</div>
        				</div>
        				<div class="modal-footer">
        					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        					<button type="button" class="btn btn-primary">Save changes</button>
        				</div>
        			</form>
        		</div>
        	</div>
        </div> -->
	</div>
</div>
</template>
<script type="text/javascript">
	Vue.component('addTask', require('./addModelComponent.vue').default);
	export default{
		data(){
			return {
				tasks: {},
			}
		},
		methods:{
			
		},
		created(){
			axios.get('http://127.0.0.1:8000/staff/getData')
			.then(resp=>{
				this.tasks = resp.data
				// this.tasks = console.log(resp.data)
				console.warn('tsak is completed');
			})
		}

	}
</script>
<style type="text/css" scoped=""></style>