<template>
    <div>
        <button
            :type="type"
            class="my-button"
            v-text="test.name">
        </button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                test: ''
            }
        },
        props: [
           'btext',
           'type'
        ],
        mounted() {
            console.log('Component mounted.')
            axios.get('api/vue', {})
                .then(response =>{
                    this.test = response.data
                })
        }
    }
</script>
<style scoped>
    .my-button{
        background-color: orange;
        color: white;
        border: 2px solid rgb(255, 145, 0);
        padding: 10px 15px;
        border-radius: 10px;
    }
</style>
