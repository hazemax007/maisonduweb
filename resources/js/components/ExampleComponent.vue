<template>
    <div class="container">
                <div class="contact-us">
                    <div class="contact-signature">
                        <form @submit="formSubmit">
                            <input placeholder="Nom..." type="text" required v-model="name">
                            <input placeholder="Métier..." type="text" required v-model="job">
                            <input placeholder="Société..." type="text" required v-model="company">

                            <input placeholder="Email..." type="text" required="email" v-model="email" value="">
                            <input placeholder="Tel..." type="text" required v-model="phone">
                            <input placeholder="Adresse..." type="text" required v-model="address">
                            <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"></vue-dropzone>
                            <button type="submit" @click="copyToClipboard('#copySignature')">copier signature</button>
                            <br>
                            <button type="submit">Enregistrer signature</button>
                        </form>
                    </div>
                    <div id="copySignature">
                    <div class="template-signature">
                        <table style="WIDTH: 410px; FONT-SIZE: 10pt; FONT-FAMILY: ARIAL" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td style="FONT-SIZE: 10pt; FONT-FAMILY: Arial; WIDTH: 305px; PADDING-BOTTOM: 5px; PADDING-LEFT: 10px; vertical-align: top; line-height:25px;" valign="top">
                                        <strong><span style="FONT-SIZE: 14pt; FONT-FAMILY: Arial; color:#0079ac;">{{ name }}<br></span></strong>
                                        <span><span style="color: #0079ac;"><strong>M:</strong></span><span style="FONT-SIZE: 10pt; FONT-FAMILY: Arial;"> {{ job }}<br></span></span>
                                        <span><span style="color: #0079ac;"><strong>S:</strong></span><span style="FONT-SIZE: 10pt; FONT-FAMILY: Arial;"> {{ company }}<br></span></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="FONT-SIZE: 10pt; FONT-FAMILY: Arial; PADDING-BOTTOM: 5px; PADDING-TOP: 5px; PADDING-LEFT: 10px; vertical-align: top;" valign="top">
                                        <span><span style="color: #0079ac;"><strong>E:</strong></span><span style="FONT-SIZE: 10pt; FONT-FAMILY: Arial;"> {{ email }}<br></span></span>
                                        <span><span style="color: #0079ac;"><strong>T:</strong></span><span style="FONT-SIZE: 10pt; FONT-FAMILY: Arial;"> {{ phone }}<br></span></span>
                                        <span><span style="color: #0079ac;"><strong>A:</strong></span><span style="FONT-SIZE: 10pt; FONT-FAMILY: Arial;"> {{ address }}</span></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="FONT-SIZE: 10pt; FONT-FAMILY: Arial; PADDING-BOTTOM: 5px; PADDING-TOP: 5px; PADDING-LEFT: 10px; vertical-align: top;" valign="top">
                                        <span><a href="{Facebook URL}" target="_blank"><img border="0" width="23" alt="Facebook icon" style="border:0; height:23px; width:23px" src="fb.png"></a></span>
                                        <span><a href="{Twitter URL}" target="_blank"><img border="0" width="23" alt="Twitter icon" style="border:0; height:23px; width:23px" src="tt.png"></a></span>
                                        <span><a href="{Youtube URL}" target="_blank"><img border="0" width="23" alt="Youtube icon" style="border:0; height:23px; width:23px" src="yt.png"></a></span>
                                        <span><a href="{LinkedIn URL}" target="_blank"><img border="0" width="23" alt="LinkedIn icon" style="border:0; height:23px; width:23px" src="ln.png"></a></span>

                                        <span><a href="{Instagram URL}" target="_blank"><img border="0" width="23" alt="Instagram icon" style="border:0; height:23px; width:23px" src="it.png"></a> </span>
                                        <span><a href="{Pinterest URL}" target="_blank"><img border="0" width="23" alt="Pinterest icon" style="border:0; height:23px; width:23px" src="pt.png"></a></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
</template>

<script>
    import vue2Dropzone from 'vue2-dropzone'
    import 'vue2-dropzone/dist/vue2Dropzone.min.css'

    export default {
        components: {
        vueDropzone: vue2Dropzone
      },
        data: function () {
            return {
                name:'',
                job:'',
                company:'',
                email:'',
                phone:'',
                address:'',
                dropzoneOptions: {
              url: '/store-multiple-image',
              headers: {
                "X-CSRF-TOKEN": document.head.querySelector("[name=csrf-token]").content
               }
          }
            }
        },
        methods:{
            copyToClipboard:function(element) {
                var $temp = $("<input>");
                $("body").append($temp);
                $temp.val($(element).html()).select();
                var str = $(element).html();

                function listener(e) {
                        e.clipboardData.setData("text/html", str);
                        e.clipboardData.setData("text/plain", str);
                        e.preventDefault();
                }
                document.addEventListener("copy", listener);
                document.execCommand("copy");
                document.removeEventListener("copy", listener);

                $temp.remove();
                $("#success").slideDown("slow");
            },
            formSubmit(e) {
                e.preventDefault();
                let currentObj = this;
                axios.post('/postSignature', {
                    name : this.name,
                    job : this.job,
                    company : this.company,
                    email : this.email,
                    phone : this.phone,
                    address: this.address
                })
                .then(function (response) {
                    currentObj.output = response.data;
                })
                .catch(function (error) {
                    currentObj.output = error;
                });
            },
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style lang="sass" scoped>
    @import url('https://fonts.googleapis.com/css?family=Fjalla+One&display=swap')

$bg: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/38816/image-from-rawpixel-id-2210775-jpeg.jpg"
$form-bg: #f8f4e5
$form-shadow: #ffa580
$form-primary-highlight: #95a4ff
$form-secondary-highlight: #ffc8ff
$font-size: 14pt
$font-face: 'Fjalla One'
$font-color: #2A293E

*
  margin: 40
  padding: 20

body
  background: url($bg) center center no-repeat
  background-size: cover
  width: 100vw
  height: 100vh
  display: grid
  align-items: center
  justify-items: center

.contact-us
  background: $form-bg
  padding: 80px 100px
  border: 2px solid rgba(0,0,0,1)
  box-shadow: 15px 15px 1px $form-shadow, 15px 15px 1px 2px rgba(0,0,0,1)

input
  display: block
  width: 40%
  font-size: $font-size
  line-height: $font-size * 2
  font-family: $font-face
  margin-bottom: $font-size * 2
  border: none
  border-bottom: 5px solid rgba(0,0,0,1)
  background: $form-bg
  min-width: 250px
  padding-left: 5px
  outline: none
  color: rgba(0,0,0,1)

input:focus
  border-bottom: 5px solid $form-shadow

button
  display: block
  margin: 0
  line-height: $font-size * 2
  padding: 0 20px
  background: $form-shadow
  letter-spacing: 2px
  transition: .2s all ease-in-out
  outline: none
  border: 1px solid rgba(0,0,0,1)
  box-shadow: 3px 3px 1px $form-primary-highlight, 3px 3px 1px 1px rgba(0,0,0,1)

  &:hover
    background: rgba(0,0,0,1)
    color: white
    border: 1px solid rgba(0,0,0,1)

::selection
  background: $form-secondary-highlight

input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus
  border-bottom: 5px solid $form-primary-highlight
  -webkit-text-fill-color: $font-color
  -webkit-box-shadow: 0 0 0px 1000px $form-bg inset
  transition: background-color 5000s ease-in-out 0s

.template-signature
    position: absolute
    top: 200px
    right: 180px
</style>
