<template>
    <section>
        <div class="font-light tracking-wider my-3">
            <span
                v-for="(one, index) in breadcrumb"
                :key="index"
            >
                <span v-if="index == breadcrumb.length - 1">
                    {{ one.name }}
                </span>
                <span v-else>
                    <router-link
                        :to="{name: one.link}"
                        class="text-blue-500 font-normal hover:no-underline"
                    >
                        {{ one.name }}
                    </router-link>
                    <span class="mx-1"> / </span>
                </span>
            </span> 
        </div>
    </section>
</template>
<script>
export default {
    name: 'Breadcrumb',
    props: ['breadcrumb'],
}
</script>