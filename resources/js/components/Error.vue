<template>
    <section 
        v-if="error"
        class="transition ease-in-out duration-700 relative"
    >
        <div class="absolute lg:w-1/4 w-2/3 right-0 py-2">
            <div 
                class="bg-red-400 border-l-4 border-red-500 py-2 px-3 shadow-md mb-2"
                v-for="(err, index) in error"
                :key="index"    
            >
                <div class="text-white max-w">
                    <i class="fas fa-times-circle"></i>
                    {{ err[0] }}
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    props: ['error'],
}
</script>