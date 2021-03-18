@extends('Layouts.IndexSeller')
@section('Content')
    <div class="customerCropper">
        <label class="g-mb-10" for="fileShow1" id="custom-file-label">تصویر شماره 1</label>
        <div class="input-group u-file-attach-v1 g-brd-gray-light-v2 g-mb-20">
                    <span style="display: none; cursor: default"
                          class="align-self-center fa fa-check g-mr-5 g-bg-primary g-pa-15 g-color-white"
                          id="Check1"></span>
            <input id="fileShow1" class="form-control form-control-md rounded-0 g-font-size-16" type="text"
                   placeholder="فاقد تصویر" readonly="">

            <div class="input-group-btn">
                <button class="btn btn-md u-btn-primary rounded-0" tabindex="8" type="submit">اضافه کردن
                </button>
                <input id="pic1"
                       onclick="$('#fileShow1').removeClass('g-brd-lightred')"
                       type="file"
                       name="pic1"
                       accept="image/jpg,image/png,image/jpeg,image/gif">
                <input type="text" id="imageUrl1" name="imageUrl1" style="display: none">
            </div>
        </div>
        <label class="g-mb-10" for="fileShow2" id="custom-file-label">تصویر شماره 1</label>
        <div class="input-group u-file-attach-v1 g-brd-gray-light-v2 g-mb-20">
                    <span style="display: none; cursor: default"
                          class="align-self-center fa fa-check g-mr-5 g-bg-primary g-pa-15 g-color-white"
                          id="Check2"></span>
            <input id="fileShow2" class="form-control form-control-md rounded-0 g-font-size-16" type="text"
                   placeholder="فاقد تصویر" readonly="">

            <div class="input-group-btn">
                <button class="btn btn-md u-btn-primary rounded-0" tabindex="9" type="submit">اضافه کردن
                </button>
                <input id="pic2"
                       onclick="$('#fileShow2').removeClass('g-brd-lightred')"
                       type="file"
                       name="pic2"
                       accept="image/jpg,image/png,image/jpeg,image/gif">
                <input type="text" id="imageUrl2" name="imageUrl2" style="display: none">
            </div>
        </div>
        <label class="g-mb-10" for="fileShow3" id="custom-file-label">تصویر شماره 1</label>
        <div class="input-group u-file-attach-v1 g-brd-gray-light-v2 g-mb-20">
                    <span style="display: none; cursor: default"
                          class="align-self-center fa fa-check g-mr-5 g-bg-primary g-pa-15 g-color-white"
                          id="Check3"></span>
            <input id="fileShow3" class="form-control form-control-md rounded-0 g-font-size-16" type="text"
                   placeholder="فاقد تصویر" readonly="">

            <div class="input-group-btn">
                <button class="btn btn-md u-btn-primary rounded-0" tabindex="10" type="submit">اضافه کردن
                </button>
                <input id="pic3"
                       type="file"
                       onclick="$('#fileShow3').removeClass('g-brd-lightred')"
                       name="pic3"
                       accept="image/jpg,image/png,image/jpeg,image/gif">
                <input type="text" id="imageUrl3" name="imageUrl3" style="display: none">
            </div>
        </div>
        <label class="g-mb-10" for="fileShow4" id="custom-file-label">تصویر شماره 1</label>
        <div class="input-group u-file-attach-v1 g-brd-gray-light-v2 g-mb-20">
                    <span style="display: none; cursor: default"
                          class="align-self-center fa fa-check g-mr-5 g-bg-primary g-pa-15 g-color-white"
                          id="Check4"></span>
            <input id="fileShow4" class="form-control form-control-md rounded-0 g-font-size-16" type="text"
                   placeholder="فاقد تصویر" readonly="">

            <div class="input-group-btn">
                <button class="btn btn-md u-btn-primary rounded-0" tabindex="11" type="submit">اضافه کردن
                </button>
                <input id="pic4"
                       type="file"
                       onclick="$('#fileShow4').removeClass('g-brd-lightred')"
                       name="pic4"
                       accept="image/jpg,image/png,image/jpeg,image/gif">
                <input type="text" id="imageUrl4" name="imageUrl4" style="display: none">
            </div>
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
    </div>
@endsection

