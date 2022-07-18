<script src="{{asset('web/assets/js/jquery-3.6.0.min.js')}}"></script>

<script src="{{asset('web/assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('web/assets/js/feather.min.js')}}"></script>

<script src="{{asset('web/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<script src="{{asset('web/assets/plugins/apexchart/apexcharts.min.js')}}"></script>
<script src="{{asset('web/assets/plugins/apexchart/chart-data.js')}}"></script>

<script src="{{asset('web/assets/js/script.js')}}"></script>


<script src="{{asset('web/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('web/assets/plugins/datatables/datatables.min.js')}}"></script>

<script src="{{asset('web/assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('web/assets/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
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

<!-- CSS File End -->
<script>
    $(document).ready(function(){
        var current_work_performed = CKEDITOR.replace( 'current_work_performed');
        current_work_performed.on( 'change', function( evt ) {
            $("#current_work_performed").text( evt.editor.getData())
        });

    })
    $(document).ready(function(){
        var current_recommendation = CKEDITOR.replace( 'current_recommendation');
        current_recommendation.on( 'change', function( evt ) {
            $("#current_recommendation").text( evt.editor.getData())
        });

    })
    $(document).ready(function(){
        var current_note = CKEDITOR.replace( 'current_note');
        current_note.on( 'change', function( evt ) {
            $("#current_note").text( evt.editor.getData())
        });

    })

    var speed = 200;
    $(".accordion dt.expanded + dd").slideDown(speed);

    $(".accordion dt").on("click", function () {
        var that = $(this);

        // Expandable
        if (that.parent().hasClass("expandable")) {
            that.toggleClass("expanded").next("dd").slideToggle(speed);

            // Collapsable
        } else if (that.parent().hasClass("collapsable")) {
            if (!that.hasClass("expanded")) {
                that.siblings("dt").removeClass("expanded").next("dd").slideUp(speed);
            }

            that.toggleClass("expanded").next("dd").slideToggle(speed);
            // Standard
        } else {
            // make sure its not collapsing itself and reappearing right after.
            if (!that.hasClass("expanded")) {
                that.siblings("dt").removeClass("expanded").next("dd").slideUp(speed);
                that.toggleClass("expanded").next("dd").slideToggle(speed);
            }
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#select2").select2({
            tags: true,
        });
    });

    function reviewFunction() {
        var current_recommendation = CKEDITOR.instances['current_recommendation'].getData();
        var current_work_performed = CKEDITOR.instances['current_work_performed'].getData();
        $("#work_performed_display").html(current_work_performed)
        $("#recommendation_display").html(current_recommendation)

    }
    $(document).on('click','#approve',function(){
        var work_component = $("#work_component").val();
        var work_performed = $("#work_performed").val();
        var current_work_performed = CKEDITOR.instances['current_work_performed'].getData();

        var recom_component = $("#recom_component").val();
        var recommendation = $("#recommendation").val();
        var current_recommendation = CKEDITOR.instances['current_recommendation'].getData();

        var note_component = $("#note_component").val();
        var current_note = CKEDITOR.instances['current_note'].getData();

        var amount = $(this).data("amount")
        var request_id = $(this).data("id")
        $.ajax({
            type: 'post',
            dataType : 'json',
            url: "{{route('invoice_submit')}}",        
            data: {work_component: work_component , work_performed: work_performed ,current_work_performed: current_work_performed ,recom_component: recom_component ,recommendation: recommendation ,current_recommendation: current_recommendation ,note_component: note_component ,current_note: current_note , amount: amount , request_id: request_id , _token: '{{csrf_token()}}'},
            success: function (response) {
                if (response.status == 1) {
                    var path =window.location.origin;
                    window.location.replace(path+"/customer");
                }else{
                    toastr.error(response.message);    
                }
            }
        });
    });
    $(document).on('click','#invoice_modal',function(){
        
        var id = $(this).data("id");
        $.ajax({
            type: 'post',
            dataType : 'json',
            url: "{{route('invoice_modal')}}",        
            data: {id: id , _token: '{{csrf_token()}}'},
            success: function (response) {
                if (response.status == 1) {
                    $("#certificate-info-modal").remove();
                    $("#invoice_modal_div").append(response.message);
                    $("#certificate-poppup").modal("show")
                }
            }
        });
    })
    $(document).on('click','.edit-labour',function(){
        $("#labour_record_id").val($(this).data("id"))
        $("#tech").val($(this).data("tech"))
        $("#work_date").val($(this).data("work_date"))
        $("#hours").val($(this).data("hours"))
        $("#pay_type").val($(this).data("pay_type"))
        $("#hourly_rate").val($(this).data("hourly_rate"))
        $("#work_date").removeAttr("required");
        $("#laborModal").modal("show")

    })
    $(document).on('click','.edit-part',function(){
        $("#record_id").val($(this).data("id"))
        $("#value").val($(this).data("value"))
        $("#part").val($(this).data("part"))
        $("#description").val($(this).data("description"))
        $("#component").val($(this).data("component"))
        $("#unit_price").val($(this).data("unit_price"))
        $("#sell_price").val($(this).data("sell_price"))
        $("#location").val($(this).data("location"))
        $("#quantity_price").val($(this).data("quantity_price"))
        $("#exampleModal").modal("show")
    });
    $(document).on('click','#add-tech-button',function(){
        $("#password").attr("required","true");
        $("#password").val("")
    })
    $(document).on('click','.edit-tech',function(){
        $("#record_id").val($(this).data("id"))
        $("#name").val($(this).data("name"))
        $("#email").val($(this).data("email"))
        $("#password").val("")
        $("#password").removeAttr("required")
        $("#exampleModal").modal("show")
    })
    $(document).on('change','.tech-name',function(){
        var tech = $(this).val();
        var request_id = $(this).closest('td').find('.request_id').val();
        var element = $(this);
        $.ajax({
            type: 'post',
            dataType : 'json',
            url: "{{route('assign_tech')}}",        
            data: {tech: tech , request_id:request_id, _token: '{{csrf_token()}}'},
            success: function (response) {
                if (response.status == 1) {
                    toastr.success(response.message);
                    element.closest('tr').find('.dropdown-action').css('display','')
                }else{
                    toastr.error(response.message);    
                }
            }
        });
    })
</script>
