@extends('Layouts.IndexCustomer')
@section('Content')
        <div class="image_area">
            <form id="uploadImage" action="{{route('uploadImage')}}"
                  enctype="multipart/form-data" method="POST">
                @csrf
                <label for="upload_image">
                    <img src="img/Other/user-add-icon.png" id="uploaded_image"
                         class="g-width-80 g-height-80 rounded-circle g-ml-15 g-brd-around g-brd-gray-light-v2">
                    <input type="file" name="image" id="upload_image" class="image" style="display: none">
                    <input type="text" id="imageUrl" name="imageUrl">
                </label>
            </form>
        </div>
        <div class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close"
                                data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="img-container">
                            <div class="col-md-12 p-0">
                                <img src="" id="sample_image" width="600px" height="600px">
                            </div>
                            {{--                        <div class="col-md-4">--}}
                            {{--                            <div class="preview rounded-circle mx-auto g-mt-20"></div>--}}
                            {{--                        </div>--}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button"
                                class="btn btn-secondary" data-dismiss="modal">Close
                        </button>
                        <button type="button" id="crop" class="btn btn-primary">Crop</button>
                    </div>
                </div>
            </div>
        </div>
@endsection

