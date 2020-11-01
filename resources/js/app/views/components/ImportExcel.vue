<template>
  <div class="excel-import">
    <h3>
      Общая аналитика
    </h3>
    <p>
      Вы можете посмотреть статистику по текущим задачам или добавить новый список областей для формирования задач
      инспекторам
    </p>
    <div class="export-form">
      <file-upload :url='url' @change="onFileChange" @success="onSuccess" @error="onError" :headers="headers"
                   :btn-label="btn_label" :accept="accept"></file-upload>
    </div>
  </div>
</template>

<script>

  export default {
    name: "ImportExcel",
    data() {
      return {
        url: '/api/v1/auth/import/tasks',
        headers: {'Authorization': 'Bearer ' + this.$auth.token()},
        btn_label: "добавить xls",
        filesUploaded: [],
        accept: ".xls,.xlsx"
      }
    },
    methods: {
      onFileChange(file) {
        this.fileUploaded = file
      },
      onSuccess(event) {
        this.$store.dispatch('GET_ALL_TASKS');
      },
      onError(event) {
        // console.log(event);
      }
    }
  }
</script>

<style scoped>

</style>