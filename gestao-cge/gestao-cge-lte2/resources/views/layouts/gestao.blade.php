@extends('adminlte::page')

@section('content') 
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
   
	<div class="box">
		<div class="box-header">
			@yield('cabecalho_conteudo')
		</div>
		<div class="box-body">
			@yield('conteudo')
		</div>    	
	</div>
	
	
	<div id="app2">
        		<!-- Modal -->
                <div class="modal fade" id="modalMensagemGestao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Mensagem</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      	<div class="alert" v-bind:class="[tipo]" role="alert">
                           @{{mensagemModal}}
                        </div>                       
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                      </div>
                    </div>
                  </div>
                </div>
	</div>
@stop

@section('js')
	<script>
    $(document).ready(function() {
       // $("#mensagemModal").modal();
      });
	function alertModal(data) {
		console.log(data);
		$(".fade").fadeOut(500,function(){
			
			$(".close").each(function(){
	            $(this).click();
	        });
			
		});
		if(data.msgOk) {
			app2.alterar(data.msgOk,'sucesso');
		}else if(data.msgErro) {
			app2.alterar(data.msgErro,'erro');
		}
		
		setTimeout(function() {$('#modalMensagemGestao').modal('show');}, 600);

	}
    var app2 = new Vue({
    	el: '#app2',
    	data: {
            	mensagemModal: 'Bob',
            	tipo: ''
            },
        methods:{
        	  alterar: function(msg, tipo){
            	  this.mensagemModal=msg;
            	  if(tipo=='sucesso') {
					this.tipo = "alert-success";
                  }
            	  else if(tipo=='erro') {
					this.tipo = "alert-danger";
                  }
        	  }
        }
    });
	</script>
	<!-- script src="{{ asset('js/app.js') }}" defer></script -->
    @yield('scriptjs')
@stop
