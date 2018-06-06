<template>
    <div :class="['modal', {'is-active': updateModel }]" @keyup.passive.esc='close'>
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Update Phonebook</p>
                <button class="delete" aria-label="close" @click='close'></button>
            </header>
            <section class="modal-card-body">
                <div class="field">
                    <label class="label">Name</label>
                    <div class="control has-icon has-icon-right">
                        <input :class="{'input': true }" type="text" placeholder="Your Name" v-model='updatePhonebook.name'>
                        <span v-show="dataerrors.name" class="help is-danger" v-text='dataerrors.name'></span>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Email</label>
                    <div class="control">
                        <input :class="{'input': true, 'is-danger' : dataerrors.email }" type="email" placeholder="Your Email" v-model='updatePhonebook.email'>
                        <span v-show="dataerrors.email" class="help is-danger" v-text='dataerrors.email'></span>                        
                    </div>
                </div>
                <div class="field">
                    <label class="label">Phone</label>
                    <div class="control">
                        <input :class="{'input': true }" type="text" placeholder="Your Phone" v-model='updatePhonebook.phone'>
                        <span v-show="dataerrors.phone" class="help is-danger" v-text='dataerrors.phone'></span>                                                
                    </div>
                </div>
            </section>
            <footer class="modal-card-foot">
                <button class="button is-success" v-on:click='updateData'>Save update</button>
                <button class="button" @click='close'>Cancel</button>
            </footer>
        </div>
    </div>
</template>
<script>
    export default {

        data: function(){
            return {
                dataerrors: {},
            }
        },
        props:{
            updateModel: false,
            updatePhonebook:{}
        },
        methods:{ 
            close: function(){
                this.$emit('closeModel')
            },
            updateData: function(){
                axios.put(`/phonebooks/${this.updatePhonebook.id}`, this.updatePhonebook)
                .then(response => {
                    this.close()
                    console.log(response.data)
                })
                .catch(error => {
                    this.dataerrors = error.response.data.errors
                    console.log(error.response.data)
                })
            }
        }
    }
</script>
