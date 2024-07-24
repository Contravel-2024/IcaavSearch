import HttpService from '@/services/HttpService'
const ConsultasService = {
  async obtenerPagos() {
    return await HttpService.post('/formasPagos.php')
  }
}
export default ConsultasService
