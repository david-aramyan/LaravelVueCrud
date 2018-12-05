<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="d-inline">Sections</h4>
                <a href="#" class="btn btn-primary float-right" style="padding:4px 8px">Add</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" v-if="sections.total > 0">
                <tbody>
                    <tr v-for="(section, index) in sections.data">
                        <td>
                            <img v-bind:src="'/logo/' + section.logo" class="img-thumbnail" width="150px">
                        </td>
                        <td>
                            <strong>{{ section.name }}</strong>
                            <p>{{ section.description }}</p>
                        </td>
                        <td>
                            <strong>Users</strong>
                            <ol v-if="section.users.length > 0">
                                <li v-for="user in section.users">{{ user.name }}</li>
                            </ol>
                        </td>
                        <td>
                            <a href="#" class="btn btn-secondary btn-sm" role="button">Edit</a>
                            <button @click="deleteSection(index)" class="btn btn-danger btn-sm">Delete</button>
                        </td>

                    </tr>
                </tbody>
                </table>
                </div>
            </div>
            <div class="card-footer">
                <pagination :data="sections" @pagination-change-page="readSections"></pagination>
            </div>
        </div>
    </div>
</template>

<script>

    export default {

        data(){
            return {
                section: {
                    name: '',
                    description: '',
                    logo: '',
                    users: ''
                },
                sections: {}
            }

        },
        mounted()
        {
            this.readSections();
        },
        methods: {
            deleteSection(index)
            {
                let conf = confirm("Do you really want to delete this section?");

                if (conf === true) {
                    axios.delete('/section/' + this.sections[index].id)
                        .then(response => {
                            this.sections.splice(index, 1);
                        })
                        .catch(error => {
                            //
                        });
                }
            },
            readSections(page = 1)
            {
                axios.get('/getSections?page=' + page)
                    .then(response => {
                        this.sections = response.data;
                    });
            }
        }
    }
</script>