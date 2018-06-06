<template>
    <div>
        <nav class="panel column is-offset-2 is-8">
            <p class="panel-heading">
                Vue Js phoneBook Laravel
                <a class="button is-primary is-rounded is-outlined" @click="showModel()">Add New</a>
            </p>
            <div class="panel-block">
                <p class="control has-icons-left">
                <input class="input is-small" type="text" placeholder="search">
                <span class="icon is-small is-left">
                    <i class="fas fa-search" aria-hidden="true"></i>
                </span>
                </p>
            </div>
            <p class="panel-tabs">
                <a class="is-active">all</a>
                <a>public</a>
                <a>private</a>
                <a>sources</a>
                <a>forks</a>
            </p>
            <a class="panel-block" v-for="phonebook in allphonebooks" :key="phonebook.id">
                <span class="panel-icon">
                    <i class="fa fa-book" aria-hidden="true"></i>
                </span>
                <span  class="column is-9"> {{ phonebook.name }} </span>
                <span class="panel-card column is-1">
                    <i class="has-text-danger fa fa-trash" aria-hidden="true"></i>
                </span><span class="panel-card column is-1">
                    <i class="has-text-info fa fa-edit" aria-hidden="true" @click="updatePhonebook(phonebook)"></i>
                </span><span class="panel-card column is-1">
                    <i class="has-text-primary fa fa-eye" aria-hidden="true" v-on:click='showEye(phonebook)'></i>
                </span>
            </a>
        </nav>
        <transition>
            <add-item :open-model='isActive' @closeModel='hideModel'></add-item>
        </transition>
            <show-item :show-model="showActive" @closeModel='hideModel'></show-item>
            <update-item :update-model='showUpdate' :update-phonebook="itemphonebook" @closeModel='hideModel'></update-item>
    </div>
</template>

<script>

    import AddItem from './AddComponent.vue'
    import showItem from './showComponent.vue'
    import UpdateItem from './UpdateComponent.vue';

    export default {
        data(){
            return {
                isActive: false,
                showActive: false,
                showUpdate : false,
                allphonebooks: [],
                itemphonebook: {}
            }
        },
        components: {
            AddItem, 
            showItem,
            UpdateItem
        },
        methods: {
            showModel: function(){
                this.isActive = true
            },
            showEye: function($phonebook){
                this.showActive = true
                this.$children[1].showPhonebook = $phonebook
            },
            updatePhonebook: function($phonebook){
                this.showUpdate = true
                this.itemphonebook = $phonebook
            },
            hideModel(){
                this.isActive = false
                this.showActive = false
                this.showUpdate = false
            },
            getPhonebooks(){
                axios.get('phonebooks')
                .then( res => {
                    this.allphonebooks = res.data
                    console.log(res.data)
                })
                .catch((error) => {
                    console.log(error)
                })
            }
        },
        created(){
            this.getPhonebooks()
        }
    }
</script>

