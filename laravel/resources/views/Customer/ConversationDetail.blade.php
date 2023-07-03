@extends('Layouts.IndexCustomer')
@section('Content')

    <!-- End Info Panel -->
    {{--Hidden Input--}}
    <div class="container g-brd-top g-brd-gray-light-v4">
        {{-- Total Info--}}
        <div class="rowSeller g-mt-30 g-mr-0 g-ml-0">

            <!-- Icon Blocks -->
            <div class="col-12 g-pt-25 px-0 text-right">
                <div class="d-inline-block">

                    <div class="d-block">
                        <h6 class="g-color-black g-mb-5">عنوان گفتگو</h6>
                    </div>
                    <span class="u-label g-color-darkblue g-font-weight-500 p-0 g-font-size-14">{{$title}}</span>
                </div>
            </div>
            <!-- End Icon Blocks -->
        </div>
        @if (isset($data))
            <hr class="g-brd-gray-light-v4 g-mt-10">
            @foreach($data as $key => $rec)
                @if ($rec->Replay === 1)
                    @if($rec->Question!=='')
                       <div class="media g-mb-5">
                        <div style="border-radius: 8px 0 8px 8px;"
                             class="media-body g-brd-around g-brd-gray-light-v2 g-bg-gray-light-v5 g-pa-30 text-right">
                            <div class="g-mb-15 text-right">
                                <h6 class="d-flex justify-content-between align-items-center h5 g-color-gray-dark-v1 mb-0 flex-row-reverse">
                                    <span class="d-block">{{ $rec->Name.' '.$rec->Family }}</span>
                                </h6>
                                @if (isset($questionHowDay[$key]))
                                    <span style="direction: rtl"
                                          class="g-color-gray-dark-v4 g-font-size-12">{{ $questionHowDay[$key] }}</span>
                                @else
                                    <span style="direction: rtl"
                                          class="g-color-gray-dark-v4 g-font-size-12">{{ $qPersianDate[$key][0].'/'.$qPersianDate[$key][1].'/'.$qPersianDate[$key][2] }}</span>
                                @endif
                            </div>

                            <pre
                                style="direction: rtl; resize: none; -webkit-text-fill-color: #2a2734; opacity: 1;"
                                class="text-justify text-right col-12 g-brd-none g-bg-transparent g-line-height-2"
                                disabled>{{ $rec->Question }}</pre>
                        </div>
                    </div>
                    @endif
                    <div class="media g-mb-5 g-mr-30--lg sdCommentPadding-20">
                        <div style="border-radius: 8px 0 8px 8px;"
                             class="media-body g-brd-around g-brd-primary g-bg-gray-light-v5 g-pa-30 text-right">
                            <div class="g-mb-15 text-right">
                                <h6 class="d-flex justify-content-between align-items-center g-color-primary h5 mb-0 flex-row-reverse">
                                    <span class="d-block">تانا استایل</span>
                                </h6>
                                @if (isset($answerHowDay[$key]))
                                    <span style="direction: rtl"
                                          class="g-color-gray-dark-v4 g-font-size-12">{{ $answerHowDay[$key] }}</span>
                                @else
                                    <span style="direction: rtl"
                                          class="g-color-gray-dark-v4 g-font-size-12">{{ $aPersianDate[$key][0].'/'.$aPersianDate[$key][1].'/'.$aPersianDate[$key][2] }}</span>
                                @endif
                            </div>

                            <pre
                                style="direction: rtl; resize: none; -webkit-text-fill-color: #2a2734; opacity: 1;"
                                class="text-justify text-right col-12 g-brd-none g-bg-transparent g-line-height-2"
                                disabled>{{ $rec->Answer }}</pre>
                        </div>
                    </div>
                @else
                    @if($rec->Question!=='')
                    <div class="media g-mb-5">
                        <div style="border-radius: 8px 0 8px 8px;"
                             class="media-body g-brd-around g-brd-gray-light-v2 g-bg-gray-light-v5 g-pa-30 text-right">
                            <div class="g-mb-15 text-right">
                                <h6 class="d-flex justify-content-between align-items-center h5 g-color-gray-dark-v1 mb-0 flex-row-reverse">
                                    <span class="d-block">{{ $rec->Name.' '.$rec->Family }}</span>
                                </h6>
                                @if (isset($questionHowDay[$key]))
                                    <span style="direction: rtl"
                                          class="g-color-gray-dark-v4 g-font-size-12">{{ $questionHowDay[$key] }}</span>
                                @else
                                    <span style="direction: rtl"
                                          class="g-color-gray-dark-v4 g-font-size-12">{{ $qPersianDate[$key][0].'/'.$qPersianDate[$key][1].'/'.$qPersianDate[$key][2] }}</span>
                                @endif
                            </div>

                            <pre
                                style="direction: rtl; resize: none; -webkit-text-fill-color: #2a2734; opacity: 1;"
                                class="text-justify text-right col-12 g-brd-none g-bg-transparent g-line-height-2"
                                disabled>{{ $rec->Question }}</pre>
                        </div>
                    </div>
                    @endif
                @endif
            @endforeach
        @endif
        <hr class="g-brd-gray-light-v4 g-mt-10">
        <div class="m-0 p-0">
            <form action="{{ route('customerConnectionNewMsg')}}" method="post" id="customerMsgForm" enctype='multipart/form-data'>
                @csrf
                {{--                Hidden Input--}}
                <input style="display: none" type="text" name="conversationID"
                       value="{{ isset($data) ? $data[0]->ConversationID: '' }}">
                @if (!isset($data))
                    <input style="display: none" type="text" name="title" value="{{ $title }}">
                    <input style="display: none" type="text" name="priority" value="{{ $priority }}">
                    <input style="display: none" type="text" name="section" value="{{ $section }}">
                @endif
                <div class="form-group g-mb-20 text-right">
                    <label class="h5 g-mb-10 g-color-gray-dark-v1">پیام جدید</label>
                    <div class="input-group g-brd-primary--focus g-mb-10">
                    <textarea style="direction: rtl"
                              class="form-control form-control-md g-resize-none rounded-0 pl-0 text-right g-font-size-16"
                              rows="6"
                              tabindex="1"
                              value=""
                              placeholder="پیامتان را شروع کنید.. (300 حرف)"
                              name="question"
                              id="question"
                              maxlength="300"></textarea>
                    </div>
                    <div style="direction: rtl">
                        <small class="d-inline-block text-muted g-font-size-12">بخش پشتیبانی شرکت آماده پاسخ گویی سریع به شما عزیزان در
                            طول
                            شبانه روز است.</small><br>
                        <small class="d-inline-block text-muted g-font-size-12">پیام ها ظرف 5 الی 60 دقیقه بسته به سوال شما و بخش
                            مربوطه
                            پاسخ داده خواهند شد.</small><br>
                        <small class="d-inline-block text-muted g-font-size-12">امید است سیستم پاسخگویی ما بهترین کارایی را برای رفع
                            سریع
                            سوالات و مشکلات موجود داشته باشد.</small>
                    </div>
                </div>
                <button id="sendMsgSubmit" type="button" onclick="submitButton($(this),'waitingSendMsg');"
                        class="btn btn-md u-btn-primary rounded-0 force-col-12 g-mb-100">
                    ارسال پیام
                </button>
                <i id="waitingSendMsg"
                   style="display: none"
                   class="fa fa-spinner fa-spin m-0 force-col-12 g-mb-100 g-font-size-20 g-color-primary"></i>
            </form>
        </div>
        @if (isset($data))
            {{-- Pagination --}}
            {{ $data->links('General.Pagination', ['result' => $data]) }}
        @endif
    </div>
@endsection

