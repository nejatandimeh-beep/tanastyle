@extends('Layouts.IndexSeller')
@section('Content')

    <!-- Info Panel -->
    <div style="direction: rtl; position: -webkit-sticky; position: sticky; top: 0; z-index: 100;"
         class="card card-inverse g-brd-black g-bg-black-opacity-0_8 rounded-0">
        <h3 class="card-header h5 g-color-white-opacity-0_9">
            <i class="fa fa-list-alt g-font-size-default g-ml-5"></i>ارتباط با مرکز (جزئیات گفتگو)
        </h3>
    </div>
    <!-- End Info Panel -->
    {{--Hidden Input--}}
    <div class="container">
        {{-- Total Info--}}
        <div class="rowSeller g-mt-30 g-mb-20 g-mr-0 g-ml-0">

            <!-- Icon Blocks -->
            <div
                class="col-12 g-pt-25 g-mb-5 g-px-60 text-right">
                <div class="d-inline-block">
                    <div class="d-block text-center">
                        <span class="u-icon-v2 g-color-teal rounded-circle g-mb-20">
                            <i class="et-icon-chat g-font-size-25"></i>
                        </span>
                    </div>
                    <div class="d-block text-center">
                        <h6 class="g-color-black mb-3">عنوان گفتگو</h6>
                    </div>
                    <span
                        class="u-label g-color-teal g-mb-5 g-font-size-14">{{ (isset($data)) ? $data[0]->Subject : $title }}</span>
                </div>
            </div>
            <!-- End Icon Blocks -->
        </div>
        @if (isset($data))
            <hr class="g-brd-gray-light-v4">
            @foreach($data as $key => $rec)
                @if ($rec->Replay === 1)
                    <div class="media g-mb-5">
                        <div style="border-radius: 8px 0 8px 8px;"
                             class="media-body g-brd-around g-brd-gray-light-v2 g-pa-30 text-right">
                            <div class="g-mb-15 text-right">
                                <h5 class="d-flex justify-content-between align-items-center h5 g-color-gray-dark-v1 mb-0 flex-row-reverse">
                                    <span class="d-block">{{ $rec->Name.' '.$rec->Family }}</span>
                                </h5>
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
                    <div class="media g-mb-30 g-mr-30--lg sdCommentPadding-20">
                        <div style="border-radius: 8px 0 8px 8px;"
                             class="media-body g-brd-around g-brd-primary g-pa-30 text-right">
                            <div class="g-mb-15 text-right">
                                <h5 class="d-flex justify-content-between align-items-center g-color-primary h5 mb-0 flex-row-reverse">
                                    <span class="d-block">تانا استایل</span>
                                </h5>
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
                    <div class="media g-mb-30">
                        <div style="border-radius: 8px 0 8px 8px;"
                             class="media-body g-brd-around g-brd-gray-light-v2 g-pa-30 text-right">
                            <div class="g-mb-15 text-right">
                                <h5 class="d-flex justify-content-between align-items-center h5 g-color-gray-dark-v1 mb-0 flex-row-reverse">
                                    <span class="d-block">{{ $rec->Name.' '.$rec->Family }}</span>
                                </h5>
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
            @endforeach
        @endif
        <hr class="g-brd-gray-light-v4">
        <div class="m-0 p-0">
            <form action="{{ route('adminConnectionNewMsg')}}" method="post" enctype='multipart/form-data'>
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
                        <small class="text-muted g-font-size-12">بخش پشتیبانی شرکت آماده پاسخ گویی سریع به شما عزیزان در
                            طول
                            شبانه روز است.</small><br>
                        <small class="text-muted g-font-size-12">پیام ها ظرف 5 الی 60 دقیقه بسته به سوال شما و بخش
                            مربوطه
                            پاسخ داده خواهند شد.</small><br>
                        <small class="text-muted g-font-size-12">امید است سیستم پاسخگویی ما بهترین کارایی را برای رفع
                            سریع
                            سوالات و مشکلات موجود داشته باشد.</small>
                    </div>
                </div>
                <button type="submit" class="btn btn-md u-btn-primary rounded-0 force-col-12 g-mb-25">
                    ارسال پیام
                </button>
            </form>
        </div>
        @if (isset($data))
            {{-- Pagination --}}
            {{ $data->links('General.Pagination', ['result' => $data]) }}
        @endif
    </div>
@endsection

