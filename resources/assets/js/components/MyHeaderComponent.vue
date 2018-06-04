<template>
    <div>
        <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item" href="https://bulma.io">
                    phoneBook
                </a>
                
                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>
            <div class="navbar-menu is-active">
                <div class="navbar-end">
                    <router-link class="navbar-item" :to='{ name: "phonebook" }'>
                        Home
                    </router-link>
                    <router-link class="navbar-item" to="">
                        phoneBook
                    </router-link>
                    <router-link class="navbar-item" :to="{ name: 'about' }">
                        Contact
                    </router-link>
                </div>
            </div>
        </nav>
    </div>
</template>
