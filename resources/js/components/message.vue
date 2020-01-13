<template>
<div>
   <li class="list-group-item" :class="className"><slot></slot></li>
   <small class="badge float-right">You</small>
</div>
</template>

<script>
    export default {
        props:[
           'color'
        ],
        computed: {
            className(){
        return 'list-group-item-' + this.color;
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style scoped>
li{
  margin-top: 1px;
  margin-bottom: 1px;
}


</style>
