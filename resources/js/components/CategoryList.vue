<template>
    <div>
        <span 
            v-for="(category, index) in categories"
            :key="index"
            class="small"
        >
            <router-link 
                :to="{
                    name: 'one-category',
                    params: { id: category.id, slug: category.slug }
                }"
                class="text-uppercase text-decoration-none"
            >
                {{ category.name }}
            </router-link>
            <span v-if="index != categories.length - 1">
                , 
            </span>
        </span>
    </div>
</template>

<script>
export default {
    name: 'CategoryList',
    props: ['categories'],
}
</script>