<script src="{{asset('problem/js/bootstrap.min.js')}}"></script>
<script src="{{asset('problem/js/bootstrap.min.js.map')}}"></script>

<script src="{{asset('problem/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('problem/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('problem/slick/slick.js')}}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/gh/dixonandmoe/rellax@master/rellax.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>
<script src="{{asset('problem/js/custom.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>





<script>
  

  // $(document).ready(function(){
  //   var description = CKEDITOR.replace( 'description' );
  //   description.on( 'change', function( evt ) {
  //       $("#description").text( evt.editor.getData())    
  //   });
  // })
  @if(Session::has('message'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true,
    "debug": false,
    "positionClass": "toast-bottom-right",
  }
        toastr.success("{{ session('message') }}");
        
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true,
    "debug": false,
    "positionClass": "toast-bottom-right",
  }
        toastr.error("{{ session('error') }}");
        
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true,
    "debug": false,
    "positionClass": "toast-bottom-right",
  }
        toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true,
    "debug": false,
    "positionClass": "toast-bottom-right",
  }
        toastr.warning("{{ session('warning') }}");
  @endif
</script>