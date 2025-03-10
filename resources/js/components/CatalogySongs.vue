<template>
    <h1>Каталог песен</h1>
    <template v-if="songs.length > 0">
        <div v-for="song in songs">
            <template v-if="song.singer_song.length > 1">
                <template  v-for="singer in song.singer_song">
                    {{singer.singer.name}}
                    <template v-if="song.singer_song.indexOf(singer) < song.singer_song.length-1">&</template>
                </template>
            </template>
            <template v-else>
                {{song.singer_song[0].singer.name}}
            </template>

            - {{song.name}}
        </div>
    </template>
    <template v-else>
        <div>Список песен пуст</div>
    </template>


    <div class="add-items">
        Название:
        <input type="text" v-model="songName">
<br/>
        Исполнитель:

        <v-select v-model="selectedSingers"
                  :options="singers"
                  :reduce="option => option.id"
                  :selectable="option => !selectedSingers.includes(option.id)"
                  :multiple="true"
                  label="name"
                  name="singers_ids"
                  class="style-chooser checkbox-chooser taggable"
        >
            <template v-slot:option="option">
                <li>
                    <label class="custom-control style-chooser-custom-checkbox custom-checkbox mb-0">
                        <input :checked="selectedSingers.find(id => id === option.id)"
                               class="style-chooser-custom-control-input custom-control-input"
                               type="checkbox">
                        <span class="style-chooser-custom-control-label custom-control-label">
                            {{ option.name }}
                        </span>
                    </label>
                </li>
            </template>
        </v-select>

        <button @click="save()">Добавить</button>
        <div v-if="errors.length > 0" style="color: red">{{errors[0]}}</div>
    </div>
</template>

<script>
import vSelect from 'vue-select';
export default {
    name: "CatalogySongs",
    data() {
        return {
            songs: [],
            songName: '',
            selectedSingers: [],
            singers: [],
            errors: []
        }
    },
    components:{
        vSelect
    },
    created() {
        window.axios
            .get('api/songs')
            .then(response => {
                this.songs = response.data;
            });

        window.axios
            .get('api/singers')
            .then(response => {
                this.singers = response.data;
            });
    },
    methods: {
        getSongs(){
            window.axios
                .get('api/songs')
                .then(response => {
                    this.songs = response.data;
                });
        },
        save(){
            if(this.songName === ''){
                this.errors=['Поле "Название" обязательно для заполнения']
                return;
            }
            if(this.selectedSingers.length < 1){
                this.errors=['Поле "Исполнитель" обязательно для заполнения']
                return;
            }

            let data = {
                name: this.songName,
                singer_ids: this.selectedSingers
            }

            let vm = this;

            axios.post('api/songs', data).then((response) => {
                if (response.data.status) {
                    vm.getSongs();
                    vm.songName = '';
                    vm.selectedSingers = [];
                    vm.errors = []
                }
            });
        }
    }
}
</script>

<style scoped>

</style>
