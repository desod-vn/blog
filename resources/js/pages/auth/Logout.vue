<script>
import desod from '../../utils/axios'

export default {
    created() {
        desod
            .post("logout")
            .then((response) => {
                if(response.data.status)
                {
                    localStorage.removeItem("token");
                    this.$router.go();
                }
            })
            .catch(() => {
                this.$router.push({ name: "home" });
            });
    }
}
</script>