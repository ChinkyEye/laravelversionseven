// profile
import Demo from './components/DemoComponent.vue'

//home
import Home from './components/home.vue'
//student
import Student from './components/student/StudentComponent.vue'

// Librarian
import Librarian from './components/librarian/LibrarianComponent.vue'

export const routes = [
	{
		path: '/demo',
		component: Demo	
	},
	{
		path: '/',
		component: Home	
	},
	{
		path: '/student',
		component: Student	
	},
	{
		path: '/librarian',
		component: Librarian
	},
	
]