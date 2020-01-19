<template>
    <div>
        <div class="progress">
            <div class="indeterminate"></div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('loader componet')
        }
    }

</script>

<style scoped>
.progress{
    height: 2px;
}
</style>
