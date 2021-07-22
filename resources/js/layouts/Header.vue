<template>
    <header>
        <nav class="navbar bg-light-blue navbar-light navbar-expand">
            <div class="container">

                <div class="nav-brand">
                    <router-link :to="{ name: 'home' }">
                        <img src="/images/logo.png" alt="" class="d-block d-lg-none"/>
                        <img src="/images/logo-main.png" alt="" class="d-none d-lg-block"/>
                    </router-link>
                </div>

                <div class="form-search d-none d-md-flex">
                    <input class="form-input" placeholder="Search" />
                    <button type="submit" class="form-button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>

                <div class="d-md-none d-inline">
                    <span 
                        class="text-dark"
                        @click="show = !show"
                    >
                        <i class="fas fa-search"></i>
                    </span>

                    <div class="form-md-search" v-if="show">
                            <input class="form-input" placeholder="Search" />
                            <button type="submit" class="form-button">
                                <i class="fas fa-search"></i>
                            </button>
                    </div>
                </div>

                <Menu :getUser="getUser" :getStatus="getStatus"/>
            </div>
        </nav>
    </header>
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
header {
    margin-bottom: 6rem;
}
.bg-light-blue {
    color: #fff;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1;
    background: white;
    border-bottom: 1px solid #ccc;
}
.form-search {
    display: flex;
    border-radius: 25px;
    border: 1px solid #ccc;
    padding: 0.5rem 1rem;
    flex-direction:row;
}
.form-md-search {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 1;
    margin: 1rem 0;
    background: white;
    display: flex;
    border: 1px solid #ccc;
    padding: 0.5rem 1rem;
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
    color:black;
}
</style>