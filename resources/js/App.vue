<template>
    <div class="header">
        <div class="container">
            <div class="col-3 pt-4 pb-4 menu">
                <router-link :to="{ name: 'singers' }">Исполнители</router-link> |
                <router-link :to="{ name: 'songs' }">Песни</router-link>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="container">
            <router-view />
        </div>
    </div>
</template>

<script>
export default {
    name: "App.vue"
}

</script>

<style>
.menu{
    color: #738cef
}
h1{
    font-size: 1.5em !important;
    padding: 1em 0;
}
.add-items {
    width: 700px;
    border: 1px solid #ccc;
    padding: 1em 1em;
    margin-top: 1em;
}
.add-items input{
    margin: 5px;
    padding: 5px;
}
.add-items button {
    background: #5e9751;
    padding: 10px 10px;
    margin: 5px 10px;
    color: #fff;
}
.success{
    background: #5e9751;
    color: #fff;
    padding: 10px;
    display: none;
}
</style>
