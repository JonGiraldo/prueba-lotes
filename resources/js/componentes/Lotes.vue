<template>

    <div class="container mt-5">

        <h3>Lotes</h3>

        <table class="table table-bordered">

            <thead class="table-dark">
                <tr>
                    <th>Modelo</th>
                    <th>Lote</th>
                    <th>Estado</th>
                    <th>Observaciones</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                <tr v-for="l in lotes" :key="l.id">

                    <td>{{ l.modelo }}</td>
                    <td>{{ l.lote }}</td>

                    <td>

                        <span v-if="l.vencido" class="badge bg-danger">
                            Vencido
                        </span>

                        <span v-else class="badge bg-success">
                            Vigente
                        </span>

                    </td>
                    <td>{{ l.observaciones }}</td>
                    <td>

                        <div v-if="l.vencido">

                            <button class="btn btn-primary btn-sm me-2" @click="abrirModal(l.id, 'disponible')">
                                Disponer
                            </button>

                            <button class="btn btn-warning btn-sm" @click="abrirModal(l.id, 'reservado')">
                                Reservar
                            </button>

                        </div>

                    </td>

                </tr>

            </tbody>

        </table>


        <!-- MODAL -->

        <div class="modal fade" id="modalObs" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Observaciones</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>

                    <div class="modal-body">

                        <textarea v-model="observaciones" class="form-control" rows="4"
                            placeholder="Escribe las observaciones">
</textarea>

                    </div>

                    <div class="modal-footer">

                        <button class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancelar
                        </button>

                        <button class="btn btn-success" @click="confirmarAccion">
                            Guardar
                        </button>

                    </div>

                </div>
            </div>
        </div>
    </div>

</template>

<script>

import axios from 'axios'
import * as bootstrap from 'bootstrap'

export default {

    data() {
        return {

            lotes: [],

            idSeleccionado: null,
            estadoSeleccionado: null,
            observaciones: ''

        }
    },

    mounted() {
        this.cargar()
    },

    methods: {


        async cargar() {

            let res = await axios.get('/lotes')
            this.lotes = res.data

        },


        abrirModal(id, estado) {

            this.idSeleccionado = id
            this.estadoSeleccionado = estado
            this.observaciones = ''

            let modal = new bootstrap.Modal(
                document.getElementById('modalObs')
            )

            modal.show()

        },


        async confirmarAccion() {

            await axios.put('/lotes/' + this.idSeleccionado, {
                estado: this.estadoSeleccionado,
                observaciones: this.observaciones
            })

            this.cargar()

            let modal = bootstrap.Modal.getInstance(
                document.getElementById('modalObs')
            )

            modal.hide()

        }

    }

}

</script>