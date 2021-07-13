<script>
import { mapActions, mapGetters } from 'vuex';

/*****COMPONENTS*****/

export default {
    computed: {
        ...mapGetters(['getStatus'])
    },

    watch: {
        getStatus() {
            if(this.getStatus == false)
            {
                this.$router.push({ name: "home" })
            }
        }
    },

    methods: {
        ...mapActions(['logout']),
        handle() {
            this.logout()
        }
    },

    created() {
        this.handle()
        if(this.getStatus == false)
            this.$router.push({ name: "home" })
    }
}
</script>