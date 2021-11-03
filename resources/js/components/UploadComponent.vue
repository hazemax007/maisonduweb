<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>
                    <div class="card-body">
                        I'm an example component.
                        <Vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"></Vue-dropzone>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import Vue2Dropzone from 'Vue2-dropzone'
import 'Vue2-dropzone/dist/Vue2Dropzone.min.css'

    export default {
     components: {
        VueDropzone: Vue2Dropzone
      },
      data: function () {
        return {
          dropzoneOptions: {
              url: '/formSubmit',
              headers: {
                "X-CSRF-TOKEN": document.head.querySelector("[name=csrf-token]").content
               }
          }
        }
      },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
