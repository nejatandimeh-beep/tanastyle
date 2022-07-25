@extends('Layouts.IndexSeller')
@section('Content')

    <!-- Info Panel -->
    <div style="direction: rtl"
         class="card card-inverse g-brd-black g-bg-black-opacity-0_8 rounded-0">
        <h3 class="card-header h6 g-color-white-opacity-0_9 smallDevice">
            <i class="fa fa-calendar g-font-size-default g-ml-5"></i> امروز <span id="panelPersianDate"></span>

            <a class="float-left g-color-white g-color-lightred--hover g-text-underline--none--hover" href="{{ route('sellerLogout') }}"
               onclick="event.preventDefault();
                   document.getElementById('logoutForm').submit();">
                خروج<i class="icon-logout g-font-size-16 g-mr-10 align-middle"></i>
            </a>

            <form id="logoutForm" action="{{route('sellerLogout')}}" method="POST" style="display: none;">
                @csrf
            </form>
        </h3>
        <h3 class="card-header h5 g-color-white-opacity-0_8 bigDevice">
            <i class="fa fa-list-alt g-font-size-default g-ml-5"></i> صفحه اصلی

            <a class="float-left g-color-white g-color-lightred--hover g-text-underline--none--hover" href="{{ route('sellerLogout') }}"
               onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                خروج<i class="icon-logout g-font-size-16 g-mr-10 align-middle"></i>
            </a>

            <form id="logout-form" action="{{route('sellerLogout')}}" method="POST" style="display: none;">
                @csrf
            </form>
        </h3>
    </div>
    <!-- End Info Panel -->

    <div style="direction: rtl">
        <!-- Description Divs-->
        <div class="g-my-100 g-pa-10">
            <!-- Gray Colored Blockquotes -->
            <blockquote
                class="blockquote blockquote-reverse g-bg-gray-light-v5 g-brd-primary g-font-size-16 g-pa-40 g-mb-30 text-right">
                <p class="g-mb-10 p-0 g-font-weight-700">وقت بخیر <span>{{ Auth::guard('seller')->user()->name }}</span> عزیز</p>
                <p class="m-0 p-0 g-font-size-14">امیدواریم با فروش محصولات با کیفیت و مرغوب، فروش روزانه خود را دو
                    چندان نمایید.</p>
                <p class="m-0 p-0 g-font-size-14">شایان گفتن است که تلاش شبانه روزی تیم تانا استایل بر این است تا
                    محصولات شما عزیزان به بهترین نحو در صدر کالاهای موجود در کشور باشد.</p>
            </blockquote>
            <!-- End Gray Colored Blockquotes -->
        </div>
        <!-- Description Divs -->
    </div>
@endsection
