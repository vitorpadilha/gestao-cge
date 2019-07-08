<template>
	<div class="modal fade" id="modalMensagem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
          	{{body}}
          </div>
    </div>
</template>
<script>
    export default {
        props: ['mensagem'],
 
        data() {
            return {
                body: '',
                show: false,
            }
        },
 
        created() {
            if (this.mensagem) {
                this.modalmensagem(this.mensagem);
            }
 /*
            window.events.$on('modalmensagem', message => {
                this.modalmensagem(mensagem);
            })*/
        },
 
        methods: {
            modalmensagem(mensagem) {
                this.body = mensagem;
                this.show = true;
                this.hide();
            },
 
            hide() {
                setTimeout(() => {
                    this.show = mensagem;
                }, 4000);
            }
        }
    }
</script>