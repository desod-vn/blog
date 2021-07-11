<template>
    <nav class="navbar bg-light-blue navbar-light navbar-expand mb-5">
    <div class="container">
        <div class="nav-brand">
            <router-link :to="{ name: 'home' }">
                <img src="/images/logo.png" alt="" class="d-block d-lg-none"/>
                <img src="/images/logo-main.png" alt="" class="d-none d-lg-block"/>
            </router-link>
            
        </div>

        <div class="form-search d-none d-md-flex">
            <input class="form-input" placeholder="Tìm kiếm bài viết" />
            <button type="submit" class="form-button">
                <b-icon icon="search" />
            </button>
        </div>

        <div class="d-md-none d-inline">
            <span 
                class="btn btn-outline-dark"
                @click="show = !show"
            >
                <b-icon icon="search" />
            </span>
            <div class="position-absolute form-md-search" v-if="show">
                <input class="form-md-input" placeholder="Tìm kiếm bài viết" />
                <button type="submit" class="form-md-button">
                    <b-icon icon="search" />
                </button>
            </div>
        </div>

        <Menu :getUser="getUser" :getStatus="getStatus"/>
    </div>
  </nav>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';

/*****COMPONENTS*****/

import Menu from './Menu'

export default {
    data() {
        return {
            show: false,
        }
    },
    components: {
        Menu,
    },

    computed: {
        ...mapGetters(['getStatus', 'getUser'])
    },

    methods: {
        ...mapActions(['user']),
        handle() {
            this.user()
        }
    },

    created() {
        if(this.getStatus == false)
            this.handle()
        
    }

}
</script>

<style scoped>
.bg-light-blue {
    color: #fff;
    border-bottom: 1px dashed #ccc;
}
.form-search {
    display: flex;
    border-radius: 25px;
    border: 1px solid #ccc;
    padding: 0.5rem 1rem;
    flex-direction:row;
}
.form-md-search {
    border: 1px solid #ccc;
    margin: 10px 10px;
    background: white;
    box-shadow: 3px 3px 10px #000;
    left: 0;
    z-index: 1;
    display: block;
    padding: 3px;
}
.form-input {
    flex-grow: 2;
    padding: 5px;
    border: none;
}
.form-md-input {
    width: 100%;
    border: none;
    border-bottom: 1px solid #ccc;
    padding: 5px;
}
.form-input:focus {
    outline: none;
}
.form-button {
    background: transparent;
    border: none;
    color:black;
}
.form-md-input:focus {
    outline: none;
}
.form-md-button {
    width: 100%;
    margin-top: 5px;
    padding: 5px;
    text-align: center;
    background: #2C3E50;
    border: none;
    color:white;
}
</style>