<template>
    <div class="container "> 
        <div class="page-content page-container" id="page-content">
            <div class="padding ">
                <div class="row container d-flex justify-content-center">
                    <div class="col-md-10 ">
                        <nav class=" navbar-expand-lg navbar-light bg-light">
                            <div class="card mt-8">
                                <div class="display-inline-flex navbar-collapse">
                                    <div class="navbar-nav ">
                                        <router-link to="/" class="nav-item nav-link">Todos List</router-link>
                                        <router-link to="/complete" class="nav-item nav-link">Complete list </router-link>
                                        <router-link to="/active" class="nav-item nav-link">Active List </router-link>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <router-view> </router-view>
    </div>
</template>
 
<script>
    export default {}
</script>