<template>
    <div :class="['modal', {'is-active': openModel}]" @keyup.passive.esc='close'>
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Modal title</p>
                <button class="delete" aria-label="close" @click='close'></button>
            </header>
            <section class="modal-card-body">
                <div class="field">
                    <label class="label">Name</label>
                    <div class="control has-icon has-icon-right">
                        <input :class="{'input': true, 'is-danger': errorsdata.name }" type="text" placeholder="Your Name" v-model='phonebook.name'>
                        <span v-show="errorsdata.name" class="help is-danger" v-text='errorsdata.name'></span>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Email</label>
                    <div class="control">
                        <input :class="{'input': true, 'is-danger': errorsdata.email }" type="email" placeholder="Your Email" v-model='phonebook.email'>
                        <span v-show="errorsdata.email" class="help is-danger" v-text='errorsdata.email'></span>                        
                    </div>
                </div>
                <div class="field">
                    <label class="label">Phone</label>
                    <div class="control">
                        <input :class="{'input': true, 'is-danger': errorsdata.phone }" type="text" placeholder="Your Phone" v-model='phonebook.phone'>
                        <span v-show="errorsdata.phone" class="help is-danger" v-text='errorsdata.phone'></span>                                                
                    </div>
                </div>
            </section>
            <footer class="modal-card-foot">
                <button class="button is-success" v-on:click='saveData'>Save changes</button>
                <button class="button" @click='close'>Cancel</button>
            </footer>
        </div>
    </div>
</template>
<script>
    export default {

        data: function(){
            return {
                phonebook: {},
                errorsdata: {}
            }
        },
        props:{
            openModel: {
                type: Boolean
            }
        },
        methods:{
            close: function () {
                this.$emit('closeModel')
            },
            saveData: function(){
                axios.post('/phonebooks', this.phonebook)
                .then(response => {
                    this.close()                    
                    console.log(response.data)
                })
                .catch(error => {
                    this.errorsdata = error.response.data.errors
                    
                    console.log(this.errorsdata)
                })
            },
        }
    }
</script>
