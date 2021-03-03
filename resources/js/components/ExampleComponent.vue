<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                        <demo></demo>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    Vue.component('demo', require('./components/DemoComponent.vue').default);
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
