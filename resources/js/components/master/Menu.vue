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
                    Chủ đề
                </router-link>
            </div>

            
            <div 
                class="px-3 font-bold" 
                v-if="!getLogStatus"
            >
                <router-link 
                    :to="{ name: 'login' }" 
                    class="text-white border-2 rounded-md py-2 px-3 hover:no-underline hover:bg-gray-400"
                >
                    Đăng nhập
                </router-link>
            </div>

            <div 
                class="px-1 font-bold" 
                v-if="!getLogStatus"
            >
                <router-link 
                    :to="{ name: 'register' }" 
                    class="text-white border-2 border-blue-600 bg-blue-600 rounded-md py-2 px-3 hover:no-underline"
                >
                    Đăng ký
                </router-link>
            </div>


            <div 
                class="px-3 font-bold" 
                v-if="getLogStatus"
            >
                <router-link 
                    :to="{ name: 'register' }" 
                    class="text-white hover:no-underline block"
                >
                    Trang cá nhân
                </router-link>
            </div>

            <div 
                class="px-1 font-bold" 
                v-if="getLogStatus"
            >
                <router-link 
                    :to="{ name: 'logout' }" 
                    class="text-white border-2 border-red-600 bg-red-600 rounded-md py-2 px-3 hover:no-underline"
                >
                    Đăng xuất
                </router-link>
            </div>


        </div>
    </div>
</template>

<script>
export default {
    props: ['getUserId', 'getUserSlug', 'getLogStatus']
}
</script>