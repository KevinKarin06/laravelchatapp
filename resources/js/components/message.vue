<template>
   <li class="list-group-item"><slot></slot></li>
</template>

<script>
    export default {
        props:[
           'color'
        ],
        computed: {
            className(){

            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style scoped>
li{
    background-color: lightgreen;
    color: white;
    border: 1px solid rgb(82, 81, 81);
    margin-top: 2px;
    margin-bottom: 2px;
}
</style>
