<template>
  <li class="list-group-item">
     <small> <i class="tiny material-icons">fiber_manual_record</i></small>
      <slot></slot></li>
</template>

<script>
    export default {
        mounted() {
            console.log('Users Component mounted.')
        }
    }
</script>

<style scoped>
li{
    text-transform: uppercase;
    font-size: 0.8rem;
}
i{
    color: green;
    align-self: auto;
}
</style>
