@extends('Layouts.IndexDelivery')
@section('Content')

    <div class="shortcode-html">
        <a class="btn u-btn-primary" href="#modal1" data-modal-target="#modal1" data-modal-effect="fadein">Launch Modal</a>

        <!-- Demo modal window -->
        <div id="modal1" class="text-left g-max-width-600 g-bg-white g-pa-20" style="display: none;">
            <button type="button" class="close" onclick="Custombox.modal.close();">
                <i class="hs-icon hs-icon-close"></i>
            </button>
            <h4 class="g-mb-20">Modal title</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
        <!-- End Demo modal window -->
    </div>


@endsection
