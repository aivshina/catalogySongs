<template>

    <h1>Каталог исполнителей</h1>
    <div v-for="singer in singers">
        {{singer.name}} | {{singer.genre.name}}
    </div>

    <div class="add-items">
        Исполнитель:
        <input type="text" v-model="singer">
        Жанр:
        <select v-model="selectedGenres">
            <option v-for="genre in genres" :value="genre.id">{{genre.name}}</option>
        </select>
        <div v-if="errors.length > 0" style="color: red">{{errors[0]}}</div>
        <button @click="save()">Добавить</button>
    </div>

</template>

<script>
export default {
    name: "CatalogySingers",
    data() {
        return {
            singers: [],
            genres: [],
            selectedGenres: '',
            singer: '',
            errors: []
        }
    },
    created() {
        this.getSingers()

        window.axios
            .get('api/genres')
            .then(response => {
                this.genres = response.data;
                console.log('genres', this.genres)
            });
    },
    methods: {
        getSingers(){
            window.axios
                .get('api/singers')
                .then(response => {
                    this.singers = response.data;
                });
        },
        save(){
            if(this.singer === ''){
                this.errors=['Поле "Исполнитель" обязательно для заполнения']
                return;
            }
            if(this.selectedGenres === ''){
                this.errors=['Поле "Жанр" обязательно для заполнения']
                return;
            }

            let data = {
                name: this.singer,
                genre_id: this.selectedGenres
            }
            let vm = this;
            axios.post('api/saveSinger', data).then((response) => {
                if (response.data.status) {
                    vm.getSingers();
                    vm.singer = '';
                    vm.selectedGenres = '';
                    vm.errors = []
                }
            });
        }
    }
}
</script>

<style scoped>

</style>
