<template>
	<div class="modal fade" id="editModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add new Task</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form>
					<div class="modal-body">
						<div class="form-group">
							<label for="name">Name:</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="enter your name" autocomplete="off" v-model="rec.name">
						</div>
						<div class="form-group">
							<label for="name">Address:</label>
							<input type="text" class="form-control" id="address" name="address" placeholder="enter your address" autocomplete="off" v-model="rec.address">
						</div>
						<div class="form-group">
							<label for="phone_no">Phone No:</label>
							<input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="enter your phone_no" autocomplete="off" v-model="rec.phone_no">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal" v-on:click="updateRecord">Save Change</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</template>
<script type="text/javascript">
	export default{
		props:['rec'],
		methods:{
			updateRecord(){
				axios.post('http://127.0.0.1:8000/staff/'+this.rec.id,{
					'name': this.rec.name,
					'address': this.rec.address,
					'phone_no': this.rec.phone_no,
					'_method': 'PUT',
				})
				.then(resp=>{
					this.$emit('recordupdated', resp)
				})
			}
		}

	}
</script>