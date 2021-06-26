<template>
    <div id="login">
        <section class="min-h-screen flex flex-col">
            <nav class="bg-gray-200">
                <div class="px-4 py-4">
                    <router-link 
                        :to="{ name: 'home' }" 
                        class="font-bold tracking-wider text-4xl w-full no-underline hover:no-underline text-gray-600"
                    >
                        Desod
                    </router-link>
                </div>
            </nav>
            <div class="flex items-center justify-center flex-1">
                <div class="rounded-xl shadow-lg sm:border-2 px-4 lg:px-24 py-16 lg:max-w-xl sm:max-w-md w-full text-center">
                    <form class="text-center">
                        <h1 class="font-bold tracking-wider text-3xl mb-8 w-full text-blue-400">
                            Đăng ký tài khoản
                        </h1>
                        <div class="p-2">
                            <input 
                                type="text" 
                                class="bg-gray-100 border-2 border-gray-100 focus:outline-none block w-full py-3 px-4 rounded-lg focus:border-gray-500" 
                                placeholder="Tên tài khoản"
                            />
                        </div>
                        <div class="p-2">
                            <input 
                                type="email" 
                                class="bg-gray-100 border-2 border-gray-100 focus:outline-none block w-full py-3 px-4 rounded-lg focus:border-gray-500" 
                                placeholder="Email"
                            />
                        </div>
                        <div class="p-2">
                            <input 
                                type="password" 
                                class="bg-gray-100 border-2 border-gray-100 focus:outline-none block w-full py-3 px-4 rounded-lg focus:border-gray-500" 
                                placeholder="Mật khẩu" />
                        </div>
                        <div class="p-2">
                            <input 
                                type="password" 
                                class="bg-gray-100 border-2 border-gray-100 focus:outline-none block w-full py-3 px-4 rounded-lg focus:border-gray-500" 
                                placeholder="Xác nhận mật khẩu" />
                        </div>
                        <div class="p-2">
                            <button 
                                type="submit" 
                                class="border-2 uppercase border-blue-100 focus:outline-none bg-blue-600 text-white font-bold tracking-wider block w-full p-3 rounded-lg focus:border-blue-700 hover:bg-blue-700"
                            >
                                Đăng ký
                            </button>
                        </div>
                    </form>
                    <div class="text-center mt-12">
                        <span>
                            Đã có tài khoản ?
                        </span>
                        <router-link :to="{ name: 'login' }" class="font-light text-md text-blue-600 font-semibold hover:text-blue-800">Đăng nhập</router-link>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
</script>