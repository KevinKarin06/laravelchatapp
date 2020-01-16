<template>
  <li class="list-group-item"><slot></slot></li>
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
</style>
