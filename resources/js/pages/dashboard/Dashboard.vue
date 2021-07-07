<template>
    <div class="flex">
        <Sidebar class="flex-0" />
        <div class="flex-1">
            <div class="bg-gray-700 p-3 text-white">
                DESOD
            </div>
            <div class="md:container mx-auto m-5">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script>
import Sidebar from '../../components/dashboard/Sidebar'

export default {
    components: {
        Sidebar
    }    
}
</script>