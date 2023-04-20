<template>
    <Teleport to="body">
        <div class="modal" v-if="$route.name">
            <div class="content">
                <router-link class="close" to="/">
                    x
                </router-link>
                <Error v-if="error" :msg="error"/>
                <router-view/>
            </div>
        </div>
    </Teleport>
</template>

<script>
import Error from "@/components/error/Error.vue";

export default {
    name: "AuthLayouth",
    components: {Error},
    computed: {
        error() {
            return this.$store.getters.getUserError
        }
    },
}
</script>

<style lang="scss">
.modal {
    position: fixed;
    z-index: 5;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.431372549);

    .content {
        position: relative;
        border-radius: 5px;
        margin: 200px auto;
        background-color: white;
        width: 300px;
        padding: 40px 20px;

        .close {
            position: absolute;
            right: 10px;
            top: 5px;
        }

        form {
            input[type=text], input[type=email], input[type=password] {
                width: 100%;
                margin-bottom: 10px;
            }

            input[type=submit] {
                width: 100%;
                padding: 10px;
                margin-top: 10px;
                background-color: var(--orange);
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
        }
    }

}

</style>
