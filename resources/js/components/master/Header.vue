<template>
    <header>
        <div class="bg-blue-400">
            <div class="md:container mx-auto">
                <nav class="flex items-center justify-between py-3 mx-3">
                    
                    <div class="flex items-center flex-shrink-0 text-white mr-6">
                        <router-link :to="{ name: 'home' }">
                            <img src="images/logo.png" alt="" />
                        </router-link>
                    </div>

                    <div class="block md:hidden" @click="mobile = !mobile">
                        <button class="flex items-center px-3 py-2.5 border rounded text-white border-white">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>

                    <Menu />

                </nav>
            </div>

            <div class="md:hidden" v-if="mobile">
                <div class="px-2 pt-2 pb-3 space-y-2">

                    <div class="hover:bg-blue-500 block px-3 py-2 rounded-md text-base font-medium text-white">
                        <i class="fas fa-home"></i>
                        <router-link 
                            :to="{ name: 'home' }" 
                            class="text-white"
                        >
                            Trang chủ
                        </router-link>
                    </div>

                    <div class="hover:bg-blue-500 block px-3 py-2 rounded-md text-base font-medium text-white">
                        <i class="fas fa-comment-dots"></i>
                        <router-link 
                            :to="{ name: 'home' }" 
                            class="text-white"
                        >
                            Thông báo
                        </router-link>
                    </div>

                    <div class="hover:bg-blue-500 block px-3 py-2 rounded-md text-base font-medium text-white">
                        <i class="fas fa-align-justify"></i>
                        <router-link 
                            :to="{ name: 'home' }" 
                            class="text-white"
                        >
                            Chủ đề
                        </router-link>
                    </div>

                    <div class="hover:bg-blue-500 block px-3 py-2 rounded-md text-base font-medium text-white">
                        <i class="fas fa-user-edit"></i>
                        <router-link 
                            :to="{ name: 'home' }" 
                            class="text-white"
                        >
                            Tác giả
                        </router-link>
                    </div>

                </div>
            </div>
        </div>
        <Link />
    </header>
</template>

<script>
import Menu from '../master/Menu'
import Link from '../master/Link'

export default {
    data() {
        return {
            mobile: false,
        }
    },
    components: {
        Menu,
        Link,
    }
};
</script>