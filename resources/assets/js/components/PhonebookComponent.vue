<template>
    <div>
        <nav class="panel column is-offset-2 is-8">
            <p class="panel-heading">
                Vue Js phoneBook Laravel
                <a class="button is-primary is-rounded is-outlined" @click="showModel()">Add New</a>
            </p>
            <div class="panel-block">
                <p class="control has-icons-left">
                <input class="input is-small" type="text" placeholder="search" v-model="searchQuery">
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
            <a class="panel-block" v-for="(phonebook, key) in tempLists" :key="phonebook.id">
                <span class="panel-icon">
                    <i class="fa fa-book" aria-hidden="true"></i>
                </span>
                <span  class="column is-9"> {{ phonebook.name }} </span>
                <span class="panel-card column is-1">
                    <i class="has-text-danger fa fa-trash" aria-hidden="true" @click="deletPhonebook(key, phonebook.id)"></i>
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

    import addItem from './AddComponent.vue'
    import showItem from './showComponent.vue'
    import updateItem from './UpdateComponent.vue';
    import swal from 'sweetalert'
    
    export default {
        data(){
            return {
                isActive: false,
                showActive: false,
                showUpdate : false,
                allphonebooks: [],
                tempLists: {},
                itemphonebook: {},
                searchQuery: '',
            }
        },
        components: {
            addItem, 
            showItem,
            updateItem
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
            deletPhonebook(key, id){
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            axios.delete(`/phonebooks/${id}`)
                            .then((response) => {
                                this.allphonebooks.splice(key, 1)
                                console.log(this.allphonebooks)
                                console.log(response.data)
                            })
                            .catch((error) => {

                            })
                            swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                            });
                        } else {
                            swal("Your imaginary file is safe!");
                        }
                    });
                
            },
            hideModel(){
                this.isActive = false
                this.showActive = false
                this.showUpdate = false
            },
            getPhonebooks(){
                axios.get('phonebooks')
                .then( res => {
                     this.tempLists = this.allphonebooks = res.data
                    console.log(res.data)
                })
                .catch((error) => {
                    console.log(error)
                })
            }
        },
        created(){
            this.getPhonebooks()
        },
        watch: {
            searchQuery(){
                if (this.searchQuery.length > 0) {
                    this.tempLists = this.allphonebooks.filter((item) => {
                        return item.name.toLowerCase().indexOf(this.searchQuery.toLowerCase()) > -1
                    });
                    
                }else{
                    this.tempLists = this.allphonebookss
                }
            }
        }
    }
</script>

