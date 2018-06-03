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
                    <nav-link class="navbar-item" :to='{ name: ddd}'>
                        Home
                    </nav-link>
                    <nav-link class="navbar-item" :to='{ name: ddd}'>
                        phoneBook
                    </nav-link>
                    <nav-link class="navbar-item" :to='{ name: ddd}'>
                        Contact
                    </nav-link>
                </div>
            </div>
        </nav>
    </div>
</template>
