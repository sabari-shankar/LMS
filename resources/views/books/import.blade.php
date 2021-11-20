<div class="modal fade" id="importBookForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <!--Modal: Book form-->
    <div class="modal-dialog cascading-modal" role="document">
        <form class="text-center" style="color: #757575;" id="importForm" action="{{ route('books.import') }}" method="post" enctype='multipart/form-data'>
            @csrf
            <!--Content-->
            <div class="modal-content">

                <!--Header-->
                <div class="modal-header info-color white-text">
                    <h4 class="title">
                        <i class="fa fa-book"></i> Import Book</h4>
                    <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body">

                    <!-- Title -->
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name='file' id="inputGroupFile01"
                                   aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                    <div class="text-center mt-4 mb-2">
                        <button class="btn btn-info">Submit
                            <i class="fa fa-send ml-2"></i>
                        </button>
                    </div>

                </div>
            </div>
            <!--/.Content-->
    </div>
</form>
<!--/Modal: Book form-->
</div>
