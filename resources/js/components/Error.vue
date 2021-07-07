<template>
    <section 
        class="transition ease-in-out duration-700"
    >
        <div class="absolute lg:w-1/4 w-2/3 right-0 py-2">
            <div 
                v-for="(err, index) in error"
                :key="index"
                class="bg-red-400 border-l-4 border-red-500 py-2 px-3 shadow-md mb-2 text-white text-lg max-w"
            >
                <button 
                    class="hover:text-gray-400 focus:outline-none" 
                    @click="del()"
                >
                    <i class="fas fa-times-circle"></i>
                </button>
                {{ err[0] }}
            </div>
        </div>
    </section>
</template>

<script>
export default {
    props: ['error'],
    methods: {
        del() {
            this.$parent.error = {};
        }
    }
}
</script>