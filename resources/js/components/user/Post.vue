<template>
    <div class="p-3 text-dark">
        <div class="h2 mb-3">Danh sách bài viết</div>
        <div class="text-center" v-if="posts == false">Chưa có bài viết nào :((.</div>
        <div 
            class="border-bottom p-2 mt-1" 
            v-for="(post, index) in posts.slice(0, more)" 
            :key="index"
        >
            <div class="position-relative">
                <img
                    height="200px" 
                    width="100%"
                    class="fit"
                    :src="post.image"
                    alt=""
                />

                <router-link
                    :to="{
                        name: 'one-post',
                        params: { id: post.id, slug: post.slug },
                    }"
                    class="position-absolute point"
                >
                    {{ post.name }}
                </router-link>
            </div>

            <div class="mt-2 d-flex justify-content-between align-items-center">
                <span class="font-weight-bold">
                    <b-icon icon="clock" />
                    Đăng ngày {{ moment(post.created_at).locale('vi').format("HH:MM - DD/MM/YYYY") }}
                </span>
                <span v-if="post.updated_at != post.created_at">
                    Chỉnh sửa {{ moment(post.updated_at).locale('vi').fromNow() }}
                </span>
            </div>
            <div class="m-2">
                {{ post.description }}
            </div>
            <div class="small font-italic">{{ post.view }} lượt xem</div>
        </div>
        <div class="text-center">
            <span 
                class="btn btn-outline-success my-3"
                @click="more += more"
            >
                Xem thêm ...
            </span>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            more: 5,
        }
    },
    props: ['posts', 'moment'],
}
</script>

<style scoped>
.fit {
    object-fit: cover;

}
.point {
    bottom: 0;
    left: 0;
    color: white;
    text-decoration: none;
    padding: 5px 10px; 
    font-size: 2rem;
    font-weight: 600;
    overflow: hidden;
    width: 100%;
    background: rgb(0,0,0);
    background: linear-gradient(0deg, rgba(0,0,0,1) 0%, transparent 100%);
}
.point:hover {
    color: #cccccc;
}
</style>