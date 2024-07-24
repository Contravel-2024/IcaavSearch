<template>
  <div>
    {{ dataConsul }}
  </div>
</template>

<script>
import ConsultasServices from '../services/ConsultasService'
export default {
  name: 'IcaavSearchDataBase',

  data() {
    return {
      dataConsul: undefined
    }
  },

  mounted() {
    this.obtenerpagos()
  },

  methods: {
    async obtenerpagos() {
      try {
        this.dataConsul = await ConsultasServices.obtenerPagos()
        console.log(this.dataConsul)
      } catch (error) {
        console.log(error)
      }
    }
  }
}
</script>
