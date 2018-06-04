<template>
    <div :class="[ 'modal', { 'is-active': showModel }]">
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Modal title</p>
                <button class="delete" aria-label="close" @click="close"></button>
            </header>
            <section class="modal-card-body">
            <!-- Content ... -->
            </section>
            <footer class="modal-card-foot">
                <button class="button is-success" >Save changes</button>
                <button class="button" @click="close">Cancel</button>
            </footer>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return {
               showPhonebook: {},
            }
        },
        props:{
            showModel: false,
        },
        methods:{
            close: function(){
                this.$emit('closeModel')
            }
        }
    }
</script>
