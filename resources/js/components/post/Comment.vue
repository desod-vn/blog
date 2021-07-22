<template>
    <div class="border mt-5 p-3" v-if="getStatus">
        <Error v-if="errors && type == 'c'" :errors="errors" />
        <div class="form-comment">
            <input
                class="form-input" 
                v-model="send.comment"
                placeholder="Chia sẻ cảm nghĩ về bài viết"
            />
            <button 
                type="submit" 
                class="form-button"
                @click="handle()"
            >
                GỬI
            </button>
        </div>

        <div 
            class="row my-3"
            v-for="(comment, index) in comments"
            :key="index"    
        >
            <div class="col-2 text-center">
                <img 
                    height="50px" 
                    width="50px" 
                    :src="comment.user.avatar" 
                    alt="" 
                    class="rounded-circle fit" 
                />
            </div>
            <div class="col-10">
                <router-link 
                    :to="{ 
                        name: 'one-user',
                        params: {
                            id: comment.user.id,
                            slug: comment.user.slug
                        } 
                    }"
                    class="text-decoration-none text-dark font-weight-bold h6"            
                >
                    {{ comment.user.fullname }}
                </router-link>
                <p>{{ comment.comment }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="small">{{ moment(comment.created_at).locale('vi').fromNow() }}</span>
                    <span class="text-primary">
                        <button 
                            class="form-button"
                            @click="clickReply(index)"
                        >
                                <span><i class="fa fa-reply"></i> Trả lời</span>
                        </button>
                    </span>
                </div>


                <Error v-if="errors && type == 'r'" :errors="errors" />
                <div v-if="replyInput && which == index" class="form-reply">
                    <input
                        class="form-input" 
                        v-model="replyComment"
                        placeholder="Trả lời bình luận"
                    />
                    <button 
                        type="submit" 
                        class="form-button"
                        @click="replyThis(comment.id)"
                    >
                        TRẢ LỜI
                    </button>
                </div>
                <hr />
                <div v-if="comment.replies">
                    <div 
                        class="row"
                        v-for="(reply, index) in comment.replies"
                        :key="`reply-${index}`"   
                    >
                        <div class="col-2 text-center">
                            <img 
                                :src="reply.user.avatar" 
                                alt="" 
                                class="rounded-circle fit" 
                                height="50px" 
                                width="50px" 
                            />
                        </div>
                        <div class="col-10">
                            <router-link 
                                :to="{ 
                                    name: 'one-user',
                                    params: {
                                        id: reply.user.id,
                                        slug: reply.user.slug
                                    } 
                                }"
                                class="text-decoration-none text-dark font-weight-bold h6"            
                            >
                                {{ reply.user.fullname }}
                            </router-link>
                            <p>{{ reply.comment }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="small">{{ moment(reply.created_at).locale('vi').fromNow() }}</span>
                            </div>
                            <hr />
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapGetters, mapMutations } from 'vuex'

/*****COMPONENTS*****/
import moment from 'moment'

import Error from '../Error'

export default {
    name: 'comment',
    props: ['post', 'comments'],
    data() {
        return {
            send: {
                post: this.post,
                comment: '',
            },
            replyComment: '',
            errors: {},
            type: '',
            replyInput: false,
            moment: moment,
            which: ''
        }
    },

    components: {
        Error,
    },
    
    watch: {
        getError () {
            this.errors = this.getError
        },
        
        getPostComment() {
            if(this.getPostComment == true) {
                this.SET_COMMENT(false)
                this.send.comment = ''
                this.replyComment = ''
                this.$parent.handle()
            }
        }
    },
 
    computed: {
        ...mapGetters([
            'getStatus',
            'getError',
            'getPostComment',
        ])
    },

    methods: {
        ...mapMutations(['SET_COMMENT']),
        ...mapActions(['comment', 'reply']),
        handle() {
            this.type = 'c'
            this.comment(this.send)
        },
        replyThis(id) {
            this.type ='r'
            let reply = {
                post: id,
                comment: this.replyComment,
            }
            this.reply(reply)
        },
        clickReply(index) {
            this.which = index
            this.replyInput = !this.replyInput
        }
        
    }
}
</script>

<style scoped>
.form-comment {
    display: flex;
    padding: 1rem 1rem;
    flex-direction:row;
    border-bottom: 1px solid #ccc;
}
.form-reply {
    display: flex;
    padding: 1rem 1rem;
    flex-direction:row;
}
.form-input {
    flex-grow: 2;
    padding: 5px;
    border: none;
}
.form-input:focus {
    outline: none;
}
.form-button {
    background: transparent;
    border: none;
    color: #3f78d4;
}
.border-dotted {
    border-bottom: 1px dotted #ccc;
    margin: 0 10px;
    padding: 10px
}
.fit {
    object-fit: cover;
}
</style>