<template>
    <div class="hidden md:block">
        <div class="flex items-baseline space-x-4 text-md">
            <div class="px-3 font-bold">
                <router-link 
                    :to="{ name: 'home' }" 
                    class="text-white"
                >
                    Trang chủ
                </router-link>
            </div>

            <div class="px-3 font-bold">
                <router-link 
                    :to="{ name: 'home' }" 
                    class="text-white"
                >
                    Thông báo
                </router-link>
            </div>

            <div class="px-3 font-bold">
                <router-link 
                    :to="{ name: 'home' }" 
                    class="text-white"
                >
                    Chủ đề
                </router-link>
            </div>

            <div class="px-3 font-bold">
                <router-link 
                    :to="{ name: 'home' }" 
                    class="text-white"
                >
                    Tác giả
                </router-link>
            </div>

        </div>
    </div>
</template>

<script>
export default {}
</script>