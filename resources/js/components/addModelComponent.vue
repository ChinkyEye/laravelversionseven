<template>
	<div class="modal fade" id="addModal">
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
							<input type="text" class="form-control" id="name" name="name" placeholder="enter your name" autocomplete="off" v-model="post.name">
						</div>
						<div class="form-group">
							<label for="name">Address:</label>
							<input type="text" class="form-control" id="address" name="address" placeholder="enter your address" autocomplete="off" v-model="post.address">
						</div>
						<div class="form-group">
							<label for="phone_no">Phone No:</label>
							<input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="enter your phone_no" autocomplete="off" v-model="post.phone_no">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal" @click="clearModal">Close</button>
						<button type="button" class="btn btn-primary" v-on:click="addRecord">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</template>
<script type="text/javascript">
	export default {
		data(){
			return {
				post : {
					name: null,
					address: null,
					phone_no: null, 
				},
				error: [],
			}
		},
		methods : {
			addRecord(){
				axios.post('http://127.0.0.1:8000/staff',this.post)
				// .then(resp=>console.log(resp.data.data))
				.then(resp=>{
					this.$emit('recordadded', resp);
					this.post='';
				})
			},
			clearModal(){
				
			}
		}
	}
	
</script>