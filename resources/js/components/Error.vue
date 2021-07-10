<template>
    <div>
        <div
            class=" alert alert-danger"
            v-for="error in errors"
            :key="error.id"
        >
            {{ error[0] }}
        </div>
    </div>
</template>
<script>
export default {
    props: ['errors'],
}
</script>