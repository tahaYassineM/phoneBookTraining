<template>
    <div :class="[ 'modal', { 'is-active': showModel }]">
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Modal title</p>
                <button class="delete" aria-label="close" @click="close"></button>
            </header>
            <section class="modal-card-body">
                <div class="field">
                    <label class="label">Name</label>
                    <div class="control">
                        <p>{{ showPhonebook.name}}</p>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Phone</label>
                    <div class="control">
                        <p>{{ showPhonebook.phone}}</p>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Email</label>
                    <div class="control">
                        <p>{{ showPhonebook.email}}</p>
                    </div>
                </div>
            </section>
            <footer class="modal-card-foot">
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
