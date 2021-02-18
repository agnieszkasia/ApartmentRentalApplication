<template>
    <div>
        <button class="btn btn-primary ml-4" @click="followFlat" v-text="buttonText"></button>
    </div>
</template>

<script>
    export default {
        props: ['flatId', 'follows'],

        mounted(){
            console.log('Component mounted.')
        },

        data: function (){
            return {
                status: this.follows,
            }
        },

        methods:{
            followFlat(){
                axios.post('/follow/' + this.flatId)
                    .then(response => {
                        this.status = ! this.status;
                        console.log(response.data);
                    });
            }
        },

        computed: {
            buttonText() {
                return (this.status) ? 'Obserwujesz' : 'Obserwuj';
            }
        }
    }
</script>


