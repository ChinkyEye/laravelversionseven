<template>
	<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
		<li class="nav-item">
			<router-link to="/demo" class="nav-link">
				<i class="nav-icon fas fa-chalkboard-teacher"></i>
				<p>
					Attendance
				</p>
			</router-link>
		</li>
		<li class="nav-item">
			<router-link to="/student" class="nav-link">
				<i class="nav-icon fas fa-chalkboard-teacher"></i>
				<p>
					Student
				</p>
			</router-link>
		</li>
		<li class="nav-item">
			<router-link to="/librarian" class="nav-link">
				<i class="nav-icon fas fa-chalkboard-teacher"></i>
				<p>
					Librarian
				</p>
			</router-link>
		</li>
	</ul>
</template>
<script type="text/javascript">
	export default {

	}
</script>