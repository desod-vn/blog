<template>
    <div class="p-3 text-dark">
        <div class="h2 mb-3">Danh sách bình luận</div>
        <div class="text-center" v-if="comments == false">Chưa có bình luận nào :((.</div>
        <div 
            class="border-bottom p-2 mt-1" 
            v-for="(comment, index) in comments.slice(0, more)" 
            :key="index"
        >
            <div>
                <b-icon icon="clock-history" />
                {{ moment(comment.created_at).locale('vi').format("HH:MM - DD/MM/YYYY") }}
            </div>
            <div class="m-1">
                <span v-if="user.id == userInfo.id">
                    Bạn
                </span>
                <span v-else>
                    <router-link 
                        :to="{ 
                            name: 'one-user',
                            params: {
                                id: userInfo.id,
                                slug: userInfo.slug
                            } 
                        }"
                        class="text-decoration-none"            
                    >
                        {{ userInfo.fullname }}
                    </router-link>
                </span>

                đã

                <span v-if="comment.reply_id">
                    trả lời một bình luận
                </span>

                <span v-else>
                    bình luận 
                </span>

                trong bài viết 

                <router-link
                    :to="{
                        name: 'post',
                        params: { id: comment.post.id, slug: comment.post.slug },
                    }"
                    class="text-decoration-none"
                >
                    {{ comment.post.name }}
                </router-link>

                <div :class="comment.reply_id ? 'alert alert-success' : 'alert alert-info'">
                    {{ comment.comment }}
                </div>
            </div>
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
    props: ['comments', 'moment', 'user', 'userInfo'],
}
</script>