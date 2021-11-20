<div class="modal fade" id="saveBookForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <!--Modal: Book form-->
    <div class="modal-dialog cascading-modal" role="document">
        <form class="text-center" style="color: #757575;" id="bookForm" action="{{ route('books.store') }}" method="post">
            @csrf
            <input type="hidden" id='updateMethod' name="_method" value="" style='display:none'>
            <!--Content-->
            <div class="modal-content">

                <!--Header-->
                <div class="modal-header info-color white-text">
                    <h4 class="title">
                        <i class="fa fa-book"></i> Book</h4>
                    <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body">

                    <!-- Title -->
                    <div class="md-form">
                        <label for="title">Title</label>
                        <input type="hidden" id="id" class="form-control" name="id" value="{{ old('id') }}">
                        <input type="text" id="title" class="form-control" name="title" value="{{ old('title') }}">
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <br>

                    <!-- Author -->
                    <div class="md-form">
                        <input type="text" id="author" class="form-control" name="author" value="{{ old('author') }}">
                        <label for="author">Author</label> @error('author')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <br>

                    <!-- Subject -->
                    <div class="md-form mt-0">
                        <input type="text" id="subject" class="form-control" name="subject" value="{{ old('subject') }}">
                        <label for="subject">Subject</label> @error('subject')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <!-- Edition -->
                    <div class="md-form mt-0">
                        <input type="text" id="edition" class="form-control" name="edition" value="{{ old('edition') }}">
                        <label for="edition">Edition</label> @error('edition')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>

                    <!-- No.of.Books -->
                    <div class="md-form mt-0">
                        <input type="number" id="no_of_books" class="form-control" name="no_of_books" min=1 value="{{ old('no_of_books') }}">
                        <label for="edition">Number of books</label> @error('no_of_books')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
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