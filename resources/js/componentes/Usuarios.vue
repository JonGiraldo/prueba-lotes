<template>
    <div class="container mt-5">

        <h2 class="mb-4">CRUD Usuarios</h2>

        <div class="card p-4 mb-4">

            <div class="row g-3">

                <div class="col-md-4">
                    <input v-model="form.nombre" class="form-control" placeholder="Nombre">
                </div>

                <div class="col-md-4">
                    <input v-model="form.email" class="form-control" placeholder="Email">
                </div>

                <div class="col-md-2">
                    <input v-model="form.edad" class="form-control" placeholder="Edad">
                </div>

                <div class="col-md-2">
                    <button @click="guardar" class="btn btn-primary w-100">
                        Guardar
                    </button>
                </div>

            </div>
        </div>


        <h4>Usuarios registrados</h4>

        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Edad</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="u in usuarios" :key="u.id">

                    <td>{{ u.id }}</td>
                    <td>{{ u.nombre }}</td>
                    <td>{{ u.email }}</td>
                    <td>{{ u.edad }}</td>

                    <td>

                        <button class="btn btn-warning btn-sm me-2" @click="editar(u)">
                            Editar
                        </button>

                        <button class="btn btn-danger btn-sm" @click="eliminar(u.id)">
                            Eliminar
                        </button>

                    </td>

                </tr>
            </tbody>

        </table>

    </div>
</template>

<script>

import axios from 'axios'

export default {

    data() {
        return {

            usuarios: [],

            form: {
                id: null,
                nombre: '',
                email: '',
                edad: ''
            }

        }
    },

    mounted() {
        this.cargar()
    },

    methods: {

        async cargar() {

            let res = await axios.get('/usuarios')
            this.usuarios = res.data

        },

        async guardar() {

            console.log("Datos enviados:", this.form)

            await axios.post('/usuarios', this.form)

            this.form = {
                nombre: '',
                email: '',
                edad: ''
            }

            this.cargar()

        },

        editar(u) {

            this.form = { ...u }

        },

        async eliminar(id) {

            await axios.delete('/usuarios/' + id)

            this.cargar()

        }

    }

}

</script>