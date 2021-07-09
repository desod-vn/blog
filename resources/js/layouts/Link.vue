<template>
    <div class="bg-black">
        <div class="flex items-center justify-between space-x-4 text-md py-2">
            <div class="px-2">
                <a 
                    href="https://github.com/desod-vn" 
                    class="text-white px-1"
                >
                    <i class="fab fa-github-square"></i>
                </a>

                <a 
                    href="https://facebook.com/profile.meplay" 
                    class="text-white px-1"
                >
                    <i class="fab fa-facebook-square"></i>
                </a>

                <a
                    href="mailto:thangdotpro@gmail.com"
                    class="text-white px-1"
                >
                    <i class="fas fa-envelope"></i>
                </a>

                <a 
                    href="tel:+84389064540"
                    class="text-white px-1"
                >
                    <i class="fas fa-phone-square-alt"></i>
                </a>

            </div>

            <div class="px-2">
                <router-link 
                    :to="{ name: 'home' }" 
                    class="text-white mr-3"
                >
                    Tác giả
                </router-link>

                <router-link 
                    :to="{ name: 'home' }" 
                    class="text-white"
                >
                    Bài viết
                </router-link>
            </div>

        </div>
    </div>
</template>

<script>
export default {}
</script>