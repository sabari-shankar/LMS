@if(Session::has('modal'))
<div class="modal fade" id="errorResponse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <!--Modal: Book form-->
    <div class="modal-dialog cascading-modal" role="document">

        <!--Content-->
        <div class="modal-content">

            <!--Header-->
            <div class="modal-header info-color white-text">
                <h4 class="title">
                    <i class="fa fa-book"></i> Import Error</h4>
                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">

                <label>Import Error </label> 
                <a href="{{asset('errors/'.Session::get('modal')['filePath'])}}" download>{{Session::get('modal')['fileName']}}</a>
                <div class="text-center mt-4 mb-2">
                    <button class="btn btn-info" data-dismiss="modal">Close

                    </button>
                </div>

            </div>
        </div>
        <!--/.Content-->
    </div>
    <!--/Modal: Book form-->
</div>
<script>
    $("#errorResponse").modal("show");
</script>
@endif