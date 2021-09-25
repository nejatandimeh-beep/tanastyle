@extends('Layouts.IndexSeller')
@section('Content')
    <button style="direction: rtl" type="button" class="form-control g-color-primary--hover form-control-md btn u-btn-white g-brd-around g-brd-gray-light-v2 rounded-0 g-font-size-16" data-toggle="modal" data-target="#sizeInformation">
        <i class="fa fa-exclamation"></i>
    </button>
    <div style="direction: rtl" class="modal fade" id="sizeInformation" tabindex="-1" role="dialog" aria-labelledby="sizeInformationTitle" aria-hidden="true">
        <div style="max-width: 100%; margin: 0" class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title">راهنمای سایز</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div style="direction: rtl; padding-bottom: 400px !important;" id="accordion-02" class="u-accordion u-accordion-bg-primary u-accordion-color-white g-pa-40"
                         role="tablist" aria-multiselectable="true">
                        <!-- زنانه -->
                        <div class="card g-brd-0 g-mb-15">
                            <div id="accordion-02-heading-01"
                                 class="card-header g-pa-0"
                                 role="tab">
                                <h5 class="g-bg-white g-px-0 g-py-10 mb-0">
                                    <a class="d-block u-link-v5 g-color-main g-color-primary--hover text-right" data-parent="#accordion-02"
                                       href="#accordion-02-body-01"
                                       data-toggle="collapse" aria-expanded="true" aria-controls="accordion-02-body-01"><i
                                            class="icon-user-female align-middle g-font-size-22 g-ml-5"></i>زنانه</a>
                                </h5>
                            </div>
                            <div id="accordion-02-body-01" class="collapse show g-mt-5" role="tabpanel"
                                 aria-labelledby="accordion-02-heading-01">
                                <!--سوتین-->
                                <div class="card-block g-pa-0">
                                    <div>
                                        <h5 class="card-header g-bg-gray-dark-v4 g-brd-around g-brd-gray-light-v4 g-color-white g-font-size-16 rounded-0 g-mb-5 text-right">
                                            <i class="icon-clothes-015 u-line-icon-pro align-middle g-font-size-22 g-ml-5"></i>
                                            سوتین
                                        </h5>

                                        <div class="table-responsive">
                                            <table style="direction: rtl" class="table table-bordered u-table--v2">
                                                <thead>
                                                <tr>
                                                    <th class="align-middle text-center focused rtlPosition">سایز اروپایی (UE)</th>
                                                    <th class="align-middle text-center focused rtlPosition">سایز انگلیسی (UK)</th>
                                                    <th class="align-middle text-center focused rtlPosition">سایز حروفی</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">65-65B-65C-65D--65E > ...</td>
                                                    <td class="align-middle text-nowrap text-center">30-30B-30C-30D-30DD > ...</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XS
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">70-70B-70C-70D-70E</td>
                                                    <td class="align-middle text-nowrap text-center">32-32B-32C-32D-32DD</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        S
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">75-75B-75C-75D-75E</td>
                                                    <td class="align-middle text-nowrap text-center">34-34B-34C-34D-34DD</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        M
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">80-80B-80C-80D-80E</td>
                                                    <td class="align-middle text-nowrap text-center">36-36B-36C-36D-36DD</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        L
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">85-85B-85C-85D-85E</td>
                                                    <td class="align-middle text-nowrap text-center">38-38B-38C-38D-38DD</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XL
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">90-90B-90C-90D-90E</td>
                                                    <td class="align-middle text-nowrap text-center">34-34B-34C-34D-34DD</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XXL
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">... > 75-75B-75C-75D-75E</td>
                                                    <td class="align-middle text-nowrap text-center">... > 42-42B-42C-42D-42DD</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XXXL
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!--بالاتنه-->
                                <div class="card-block g-pa-0">
                                    <div>
                                        <h5 class="card-header g-bg-gray-dark-v4 g-brd-around g-brd-gray-light-v4 g-color-white g-font-size-16 rounded-0 g-mb-5 text-right">
                                            <i class="icon-clothes-072 u-line-icon-pro align-middle g-font-size-22 g-ml-5"></i>لباس
                                            بالا تنه
                                        </h5>
                                        <div class="table-responsive">
                                            <table style="direction: rtl" class="table table-bordered u-table--v2">
                                                <thead>
                                                <tr>
                                                    <th class="align-middle text-center focused rtlPosition">دور سینه</th>
                                                    <th class="align-middle text-center focused rtlPosition">دور کمر</th>
                                                    <th class="align-middle text-center focused rtlPosition">دور شکم</th>
                                                    <th class="align-middle text-center focused rtlPosition">سایز اروپایی (UE)</th>
                                                    <th class="align-middle text-center focused rtlPosition">سایز حروفی</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">83 > ...</td>
                                                    <td class="align-middle text-nowrap text-center">67 > ...</td>
                                                    <td class="align-middle text-nowrap text-center">91 > ...</td>
                                                    <td class="align-middle text-nowrap text-center">33-34-35</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XS
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">84-88</td>
                                                    <td class="align-middle text-nowrap text-center">64-68</td>
                                                    <td class="align-middle text-nowrap text-center">92-96</td>
                                                    <td class="align-middle text-nowrap text-center">36-37</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        S
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">88-92</td>
                                                    <td class="align-middle text-nowrap text-center">68-72</td>
                                                    <td class="align-middle text-nowrap text-center">96-100</td>
                                                    <td class="align-middle text-nowrap text-center">38-39</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        M
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">92-96</td>
                                                    <td class="align-middle text-nowrap text-center">72-76</td>
                                                    <td class="align-middle text-nowrap text-center">100-104</td>
                                                    <td class="align-middle text-nowrap text-center">40-41-42</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        L
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">96-100</td>
                                                    <td class="align-middle text-nowrap text-center">76-80</td>
                                                    <td class="align-middle text-nowrap text-center">104-108</td>
                                                    <td class="align-middle text-nowrap text-center">43-44</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XL
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">100-104</td>
                                                    <td class="align-middle text-nowrap text-center">80-84</td>
                                                    <td class="align-middle text-nowrap text-center">108-112</td>
                                                    <td class="align-middle text-nowrap text-center">45-46</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XXL
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">... > 104</td>
                                                    <td class="align-middle text-nowrap text-center">... > 84</td>
                                                    <td class="align-middle text-nowrap text-center">... > 112</td>
                                                    <td class="align-middle text-nowrap text-center">47-48-49</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XXXL
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!--پایین تنه-->
                                <div class="card-block g-pa-0">
                                    <div>
                                        <h5 class="card-header g-bg-gray-dark-v4 g-brd-around g-brd-gray-light-v4 g-color-white g-font-size-16 rounded-0 g-mb-5 text-right">
                                            <i class="icon-clothes-046 u-line-icon-pro align-middle g-font-size-22 g-ml-5"></i>لباس
                                            پایین تنه
                                        </h5>
                                        <div class="table-responsive">
                                            <table style="direction: rtl" class="table table-bordered u-table--v2">
                                                <thead>
                                                <tr>
                                                    <th class="align-middle text-center focused rtlPosition">دور کمر</th>
                                                    <th class="align-middle text-center focused rtlPosition">دور باسن</th>
                                                    <th class="align-middle text-center focused rtlPosition">قد</th>
                                                    <th class="align-middle text-center focused rtlPosition">سایز اروپایی (UE)</th>
                                                    <th class="align-middle text-center focused rtlPosition">سایز حروفی</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">67 > ...</td>
                                                    <td class="align-middle text-nowrap text-center">91 > ...</td>
                                                    <td class="align-middle text-nowrap text-center">74-86</td>
                                                    <td class="align-middle text-nowrap text-center">33-34-35</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XS
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">64-68</td>
                                                    <td class="align-middle text-nowrap text-center">92-96</td>
                                                    <td class="align-middle text-nowrap text-center">74-86</td>
                                                    <td class="align-middle text-nowrap text-center">36-37</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        S
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">68-72</td>
                                                    <td class="align-middle text-nowrap text-center">96-100</td>
                                                    <td class="align-middle text-nowrap text-center">74-86</td>
                                                    <td class="align-middle text-nowrap text-center">38-39</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        M
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">72-76</td>
                                                    <td class="align-middle text-nowrap text-center">100-104</td>
                                                    <td class="align-middle text-nowrap text-center">74-86</td>
                                                    <td class="align-middle text-nowrap text-center">40-41-42</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        L
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">76-80</td>
                                                    <td class="align-middle text-nowrap text-center">104-108</td>
                                                    <td class="align-middle text-nowrap text-center">74-86</td>
                                                    <td class="align-middle text-nowrap text-center">43-44</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XL
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">80-84</td>
                                                    <td class="align-middle text-nowrap text-center">108-112</td>
                                                    <td class="align-middle text-nowrap text-center">74-86</td>
                                                    <td class="align-middle text-nowrap text-center">45-46</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XXL
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">84-88</td>
                                                    <td class="align-middle text-nowrap text-center">112-116</td>
                                                    <td class="align-middle text-nowrap text-center">74-86</td>
                                                    <td class="align-middle text-nowrap text-center">47-48-49</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XXXL
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">80-84</td>
                                                    <td class="align-middle text-nowrap text-center">108-112</td>
                                                    <td class="align-middle text-nowrap text-center">74-86</td>
                                                    <td class="align-middle text-nowrap text-center">45-46</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XXL
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">... > 84</td>
                                                    <td class="align-middle text-nowrap text-center">... > 112</td>
                                                    <td class="align-middle text-nowrap text-center">74-86</td>
                                                    <td class="align-middle text-nowrap text-center">47-48-49</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XXXL
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!--کفش-->
                                <div class="card-block g-pa-0">
                                    <div>
                                        <h5 class="card-header g-bg-gray-dark-v4 g-brd-around g-brd-gray-light-v4 g-color-white g-font-size-16 rounded-0 g-mb-5 text-right">
                                            <i class="icon-clothes-088 u-line-icon-pro align-middle g-font-size-22 g-ml-5"></i>
                                            کفش
                                        </h5>

                                        <div style="direction: ltr" class="table-responsive">
                                            <table class="table table-bordered u-table--v2">
                                                <thead>
                                                <tr>
                                                    <th class="align-middle text-center focused rtlPosition">سانتیمتر</th>
                                                    <th class="align-middle text-center focused rtlPosition">سایز اروپایی (UE)</th>
                                                    <th class="align-middle text-center focused rtlPosition">سایز انگلیسی (UK)</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">21-21.5</td>
                                                    <td class="align-middle text-nowrap text-center">35</td>
                                                    <td class="align-middle text-nowrap text-center">2.5-3</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">22-22.5</td>
                                                    <td class="align-middle text-nowrap text-center">36</td>
                                                    <td class="align-middle text-nowrap text-center">3.5-4</td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">23</td>
                                                    <td class="align-middle text-nowrap text-center">37</td>
                                                    <td class="align-middle text-nowrap text-center">4.5</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">23.5-24</td>
                                                    <td class="align-middle text-nowrap text-center">38</td>
                                                    <td class="align-middle text-nowrap text-center">5-5.5</td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">24.5</td>
                                                    <td class="align-middle text-nowrap text-center">39</td>
                                                    <td class="align-middle text-nowrap text-center">6</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">25-25.5</td>
                                                    <td class="align-middle text-nowrap text-center">40</td>
                                                    <td class="align-middle text-nowrap text-center">6.5-7</td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">26</td>
                                                    <td class="align-middle text-nowrap text-center">41</td>
                                                    <td class="align-middle text-nowrap text-center">7.5</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">26.5-27</td>
                                                    <td class="align-middle text-nowrap text-center">42</td>
                                                    <td class="align-middle text-nowrap text-center">8-8.5</td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">27.5</td>
                                                    <td class="align-middle text-nowrap text-center">43</td>
                                                    <td class="align-middle text-nowrap text-center">9</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">28</td>
                                                    <td class="align-middle text-nowrap text-center">44</td>
                                                    <td class="align-middle text-nowrap text-center">9.5</td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">29</td>
                                                    <td class="align-middle text-nowrap text-center">45</td>
                                                    <td class="align-middle text-nowrap text-center">10.5</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">29.5-30</td>
                                                    <td class="align-middle text-nowrap text-center">46</td>
                                                    <td class="align-middle text-nowrap text-center">11-11.5</td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">30.5</td>
                                                    <td class="align-middle text-nowrap text-center">47</td>
                                                    <td class="align-middle text-nowrap text-center">12</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- مردانه -->
                        <div class="card g-brd-0 g-mb-15">
                            <div id="accordion-02-heading-02" class="card-header g-pa-0" role="tab">
                                <h5 class="g-bg-white g-px-0 g-py-10 mb-0">
                                    <a class="d-block u-link-v5 g-color-main g-color-primary--hover text-right" data-parent="#accordion-02"
                                       href="#accordion-02-body-02"
                                       data-toggle="collapse" aria-expanded="false" aria-controls="accordion-02-body-02"><i
                                            class="icon-user align-middle g-font-size-22 g-ml-5"></i>مردانه</a>
                                </h5>
                            </div>
                            <div id="accordion-02-body-02" class="collapse g-mt-5" role="tabpanel"
                                 aria-labelledby="accordion-02-heading-02">
                                <!--بالا تنه-->
                                <div class="card-block g-pa-0">
                                    <div>
                                        <h5 class="card-header g-bg-gray-dark-v4 g-brd-around g-brd-gray-light-v4 g-color-white g-font-size-16 rounded-0 g-mb-5 text-right">
                                            <i class="icon-clothes-072 u-line-icon-pro align-middle g-font-size-22 g-ml-5"></i>لباس
                                            بالا تنه
                                        </h5>
                                        <div class="table-responsive">
                                            <table style="direction: rtl" class="table table-bordered u-table--v2">
                                                <thead>
                                                <tr>
                                                    <th class="align-middle text-center focused rtlPosition">دور سینه</th>
                                                    <th class="align-middle text-center focused rtlPosition">دور کمر</th>
                                                    <th class="align-middle text-center focused rtlPosition">دور باسن</th>
                                                    <th class="align-middle text-center focused rtlPosition">سایز اروپایی (UE)</th>
                                                    <th class="align-middle text-center focused rtlPosition">سایز حروفی</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">88 > ...</td>
                                                    <td class="align-middle text-nowrap text-center">73 > ...</td>
                                                    <td class="align-middle text-nowrap text-center">88 > ...</td>
                                                    <td class="align-middle text-nowrap text-center">35-36</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XS
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">88-96</td>
                                                    <td class="align-middle text-nowrap text-center">73-81</td>
                                                    <td class="align-middle text-nowrap text-center">88-96</td>
                                                    <td class="align-middle text-nowrap text-center">37-38</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        S
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">96-104</td>
                                                    <td class="align-middle text-nowrap text-center">81-89</td>
                                                    <td class="align-middle text-nowrap text-center">96-104</td>
                                                    <td class="align-middle text-nowrap text-center">39-40</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        M
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">104-112</td>
                                                    <td class="align-middle text-nowrap text-center">89-97</td>
                                                    <td class="align-middle text-nowrap text-center">104-112</td>
                                                    <td class="align-middle text-nowrap text-center">41-42</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        L
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">112-124</td>
                                                    <td class="align-middle text-nowrap text-center">98-109</td>
                                                    <td class="align-middle text-nowrap text-center">112-120</td>
                                                    <td class="align-middle text-nowrap text-center">43-44</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XL
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">124-136</td>
                                                    <td class="align-middle text-nowrap text-center">109-121</td>
                                                    <td class="align-middle text-nowrap text-center">120-128</td>
                                                    <td class="align-middle text-nowrap text-center">45-46</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XXL
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">... > 136</td>
                                                    <td class="align-middle text-nowrap text-center">... > 121</td>
                                                    <td class="align-middle text-nowrap text-center">... > 128</td>
                                                    <td class="align-middle text-nowrap text-center">47-48-49</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XXXL
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!--پایین تنه-->
                                <div class="card-block g-pa-0">
                                    <div>
                                        <h5 class="card-header g-bg-gray-dark-v4 g-brd-around g-brd-gray-light-v4 g-color-white g-font-size-16 rounded-0 g-mb-5 text-right">
                                            <i class="icon-clothes-046 u-line-icon-pro align-middle g-font-size-22 g-ml-5"></i>لباس
                                            پایین تنه
                                        </h5>
                                        <div class="table-responsive">
                                            <table style="direction: rtl" class="table table-bordered u-table--v2">
                                                <thead>
                                                <tr>
                                                    <th class="align-middle text-center focused rtlPosition">دور کمر</th>
                                                    <th class="align-middle text-center focused rtlPosition">دور باسن</th>
                                                    <th class="align-middle text-center focused rtlPosition">قد</th>
                                                    <th class="align-middle text-center focused rtlPosition">سایز اروپایی (UE)</th>
                                                    <th class="align-middle text-center focused rtlPosition">سایز حروفی</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">73 > ...</td>
                                                    <td class="align-middle text-nowrap text-center">88 > ...</td>
                                                    <td class="align-middle text-nowrap text-center">82.5 > ...</td>
                                                    <td class="align-middle text-nowrap text-center">36-37</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XS
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">73-81</td>
                                                    <td class="align-middle text-nowrap text-center">88-96</td>
                                                    <td class="align-middle text-nowrap text-center">82.5-87.5</td>
                                                    <td class="align-middle text-nowrap text-center">38-39</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        S
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">81-89</td>
                                                    <td class="align-middle text-nowrap text-center">96-104</td>
                                                    <td class="align-middle text-nowrap text-center">83-88</td>
                                                    <td class="align-middle text-nowrap text-center">40</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        M
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">89-97</td>
                                                    <td class="align-middle text-nowrap text-center">104-112</td>
                                                    <td class="align-middle text-nowrap text-center">83.5-88.5</td>
                                                    <td class="align-middle text-nowrap text-center">41-42</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        L
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">98-109</td>
                                                    <td class="align-middle text-nowrap text-center">112-120</td>
                                                    <td class="align-middle text-nowrap text-center">84-89</td>
                                                    <td class="align-middle text-nowrap text-center">43-44</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XL
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">109-121</td>
                                                    <td class="align-middle text-nowrap text-center">120-128</td>
                                                    <td class="align-middle text-nowrap text-center">84.5-89.5</td>
                                                    <td class="align-middle text-nowrap text-center">45-46</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XXL
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">121-133</td>
                                                    <td class="align-middle text-nowrap text-center">... > 128</td>
                                                    <td class="align-middle text-nowrap text-center">... > 89.5</td>
                                                    <td class="align-middle text-nowrap text-center">47-48-49</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XXXL
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!--کفش-->
                                <div class="card-block g-pa-0">
                                    <div>
                                        <h5 class="card-header g-bg-gray-dark-v4 g-brd-around g-brd-gray-light-v4 g-color-white g-font-size-16 rounded-0 g-mb-5 text-right">
                                            <i class="icon-clothes-088 u-line-icon-pro align-middle g-font-size-22 g-ml-5"></i>
                                            کفش
                                        </h5>

                                        <div style="direction: ltr" class="table-responsive">
                                            <table class="table table-bordered u-table--v2">
                                                <thead>
                                                <tr>
                                                    <th class="align-middle text-center focused rtlPosition">سانتیمتر</th>
                                                    <th class="align-middle text-center focused rtlPosition">سایز اروپایی (UE)</th>
                                                    <th class="align-middle text-center focused rtlPosition">سایز انگلیسی (UK)</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">21-21.5</td>
                                                    <td class="align-middle text-nowrap text-center">35</td>
                                                    <td class="align-middle text-nowrap text-center">2.5-3</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">22-22.5</td>
                                                    <td class="align-middle text-nowrap text-center">36</td>
                                                    <td class="align-middle text-nowrap text-center">3.5-4</td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">23</td>
                                                    <td class="align-middle text-nowrap text-center">37</td>
                                                    <td class="align-middle text-nowrap text-center">4.5</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">23.5-24</td>
                                                    <td class="align-middle text-nowrap text-center">38</td>
                                                    <td class="align-middle text-nowrap text-center">5-5.5</td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">24.5</td>
                                                    <td class="align-middle text-nowrap text-center">39</td>
                                                    <td class="align-middle text-nowrap text-center">6</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">25-25.5</td>
                                                    <td class="align-middle text-nowrap text-center">40</td>
                                                    <td class="align-middle text-nowrap text-center">6.5-7</td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">26</td>
                                                    <td class="align-middle text-nowrap text-center">41</td>
                                                    <td class="align-middle text-nowrap text-center">7.5</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">26.5-27</td>
                                                    <td class="align-middle text-nowrap text-center">42</td>
                                                    <td class="align-middle text-nowrap text-center">8-8.5</td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">27.5</td>
                                                    <td class="align-middle text-nowrap text-center">43</td>
                                                    <td class="align-middle text-nowrap text-center">9</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">28</td>
                                                    <td class="align-middle text-nowrap text-center">44</td>
                                                    <td class="align-middle text-nowrap text-center">9.5</td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">29</td>
                                                    <td class="align-middle text-nowrap text-center">45</td>
                                                    <td class="align-middle text-nowrap text-center">10.5</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">29.5-30</td>
                                                    <td class="align-middle text-nowrap text-center">46</td>
                                                    <td class="align-middle text-nowrap text-center">11-11.5</td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">30.5</td>
                                                    <td class="align-middle text-nowrap text-center">47</td>
                                                    <td class="align-middle text-nowrap text-center">12</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">31</td>
                                                    <td class="align-middle text-nowrap text-center">48</td>
                                                    <td class="align-middle text-nowrap text-center">12.5</td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">31.5-32</td>
                                                    <td class="align-middle text-nowrap text-center">49</td>
                                                    <td class="align-middle text-nowrap text-center">13-13.5</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">32.5</td>
                                                    <td class="align-middle text-nowrap text-center">50</td>
                                                    <td class="align-middle text-nowrap text-center">14</td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">33-33.5</td>
                                                    <td class="align-middle text-nowrap text-center">51</td>
                                                    <td class="align-middle text-nowrap text-center">14.5</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">34</td>
                                                    <td class="align-middle text-nowrap text-center">52</td>
                                                    <td class="align-middle text-nowrap text-center">15</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- بچگانه 8-3-->
                        <div class="card g-brd-0 g-mb-15">
                            <div id="accordion-02-heading-03" class="card-header g-pa-0" role="tab">
                                <h5 class="g-bg-white g-px-0 g-py-10 mb-0">
                                    <a class="d-block u-link-v5 g-color-main g-color-primary--hover text-right" data-parent="#accordion-02"
                                       href="#accordion-02-body-03"
                                       data-toggle="collapse" aria-expanded="false" aria-controls="accordion-02-body-03"><i
                                            class="icon-travel-074 u-line-icon-proalign-middle g-font-size-25 g-ml-5"></i>بچگانه 8-3 سال</a>
                                </h5>
                            </div>
                            <div id="accordion-02-body-03" class="collapse g-mt-5" role="tabpanel"
                                 aria-labelledby="accordion-02-heading-03">
                                <!--لباس دخترانه و پسرانه-->
                                <div class="card-block g-pa-0">
                                    <div>
                                        <h5 class="card-header g-bg-gray-dark-v4 g-brd-around g-brd-gray-light-v4 g-color-white g-font-size-16 rounded-0 g-mb-5 text-right">
                                            <i class="icon-travel-074 u-line-icon-pro align-middle g-font-size-22 g-ml-5"></i>لباس
                                            بالا و پایین تنه دخترانه و پسرانه
                                        </h5>
                                        <div class="table-responsive">
                                            <table style="direction: rtl" class="table table-bordered u-table--v2">
                                                <thead>
                                                <tr>
                                                    <th class="align-middle text-center focused rtlPosition">سایز عددی</th>
                                                    <th class="align-middle text-center focused rtlPosition">سن</th>
                                                    <th class="align-middle text-center focused rtlPosition">قد</th>
                                                    <th class="align-middle text-center focused rtlPosition">دور سینه</th>
                                                    <th class="align-middle text-center focused rtlPosition">دور کمر</th>
                                                    <th class="align-middle text-center focused rtlPosition">دور باسن</th>
                                                    <th class="align-middle text-center focused rtlPosition">سایز حروفی</th>
                                                </tr>
                                                </thead>

                                                <tbody style="direction: ltr">
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">4</td>
                                                    <td class="align-middle text-nowrap text-center">3-4</td>
                                                    <td class="align-middle text-nowrap text-center">41.5-49.5</td>
                                                    <td class="align-middle text-nowrap text-center">56-58</td>
                                                    <td class="align-middle text-nowrap text-center">54.5-56</td>
                                                    <td class="align-middle text-nowrap text-center">57-60</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XS
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">5</td>
                                                    <td class="align-middle text-nowrap text-center">4-5</td>
                                                    <td class="align-middle text-nowrap text-center">49.5-52.5</td>
                                                    <td class="align-middle text-nowrap text-center">58.5-61</td>
                                                    <td class="align-middle text-nowrap text-center">56-57</td>
                                                    <td class="align-middle text-nowrap text-center">60-62</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        S
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">6</td>
                                                    <td class="align-middle text-nowrap text-center">4-5</td>
                                                    <td class="align-middle text-nowrap text-center">52.5-55.5</td>
                                                    <td class="align-middle text-nowrap text-center">61-63</td>
                                                    <td class="align-middle text-nowrap text-center">57-58.5</td>
                                                    <td class="align-middle text-nowrap text-center">62-65</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        M
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">6X-7</td>
                                                    <td class="align-middle text-nowrap text-center">6-7</td>
                                                    <td class="align-middle text-nowrap text-center">55.5-58.5</td>
                                                    <td class="align-middle text-nowrap text-center">63-66</td>
                                                    <td class="align-middle text-nowrap text-center">58.5-61</td>
                                                    <td class="align-middle text-nowrap text-center">65-67</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        L
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">7X</td>
                                                    <td class="align-middle text-nowrap text-center">7-8</td>
                                                    <td class="align-middle text-nowrap text-center">58.5-61.5</td>
                                                    <td class="align-middle text-nowrap text-center">66-68.5</td>
                                                    <td class="align-middle text-nowrap text-center">61-63.5</td>
                                                    <td class="align-middle text-nowrap text-center">67-70</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XL
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!--کفش دخترانه و پسرانه-->
                                <div class="card-block g-pa-0">
                                    <div>
                                        <h5 class="card-header g-bg-gray-dark-v4 g-brd-around g-brd-gray-light-v4 g-color-white g-font-size-16 rounded-0 g-mb-5 text-right">
                                            <i class="icon-clothes-088 u-line-icon-pro align-middle g-font-size-22 g-ml-5"></i>
                                            کفش دخترانه و پسرانه
                                        </h5>

                                        <div style="direction: ltr" class="table-responsive">
                                            <table class="table table-bordered u-table--v2">
                                                <thead>
                                                <tr>
                                                    <th class="align-middle text-center focused rtlPosition">سن</th>
                                                    <th class="align-middle text-center focused rtlPosition">سانتیمتر</th>
                                                    <th class="align-middle text-center focused rtlPosition">سایز اروپایی (UE)</th>
                                                    <th class="align-middle text-center focused rtlPosition">سایز انگلیسی (UK)</th>
                                                    <th class="align-middle text-center focused rtlPosition">سایز آمریکایی (US)</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">3-4</td>
                                                    <td class="align-middle text-nowrap text-center">15.5</td>
                                                    <td class="align-middle text-nowrap text-center">24</td>
                                                    <td class="align-middle text-nowrap text-center">8</td>
                                                    <td class="align-middle text-nowrap text-center">9</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">4-4.5</td>
                                                    <td class="align-middle text-nowrap text-center">16.5</td>
                                                    <td class="align-middle text-nowrap text-center">25</td>
                                                    <td class="align-middle text-nowrap text-center">9</td>
                                                    <td class="align-middle text-nowrap text-center">10</td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">5</td>
                                                    <td class="align-middle text-nowrap text-center">17</td>
                                                    <td class="align-middle text-nowrap text-center">26</td>
                                                    <td class="align-middle text-nowrap text-center">10</td>
                                                    <td class="align-middle text-nowrap text-center">11</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">5-5.5</td>
                                                    <td class="align-middle text-nowrap text-center">18</td>
                                                    <td class="align-middle text-nowrap text-center">27</td>
                                                    <td class="align-middle text-nowrap text-center">11</td>
                                                    <td class="align-middle text-nowrap text-center">12</td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">5.5-6</td>
                                                    <td class="align-middle text-nowrap text-center">19</td>
                                                    <td class="align-middle text-nowrap text-center">28</td>
                                                    <td class="align-middle text-nowrap text-center">12</td>
                                                    <td class="align-middle text-nowrap text-center">13</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">7</td>
                                                    <td class="align-middle text-nowrap text-center">19.5</td>
                                                    <td class="align-middle text-nowrap text-center">29</td>
                                                    <td class="align-middle text-nowrap text-center">13</td>
                                                    <td class="align-middle text-nowrap text-center">14</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- بچگانه 15-8-->
                        <div class="card g-brd-0 g-mb-15">
                            <div id="accordion-02-heading-04" class="card-header g-pa-0" role="tab">
                                <h5 class="g-bg-white g-px-0 g-py-10 mb-0">
                                    <a class="d-block u-link-v5 g-color-main g-color-primary--hover text-right" data-parent="#accordion-02"
                                       href="#accordion-02-body-04"
                                       data-toggle="collapse" aria-expanded="false" aria-controls="accordion-02-body-04"><i
                                            class="icon-education-192 u-line-icon-pro align-middle g-font-size-27 g-ml-5"></i>بچگانه 15-8 سال</a>
                                </h5>
                            </div>
                            <div id="accordion-02-body-04" class="collapse g-mt-5" role="tabpanel"
                                 aria-labelledby="accordion-02-heading-04">
                                <!--دخترانه-->
                                <div class="card-block g-pa-0">
                                    <div>
                                        <h5 class="card-header g-bg-gray-dark-v4 g-brd-around g-brd-gray-light-v4 g-color-white g-font-size-16 rounded-0 g-mb-5 text-right">
                                            <i class="icon-education-192 u-line-icon-pro align-middle g-font-size-22 g-ml-5"></i>لباس
                                            بالا و پایین تنه دخترانه
                                        </h5>
                                        <div class="table-responsive">
                                            <table style="direction: rtl" class="table table-bordered u-table--v2">
                                                <thead>
                                                <tr>
                                                    <th class="align-middle text-center focused rtlPosition">سایز عددی</th>
                                                    <th class="align-middle text-center focused rtlPosition">سن</th>
                                                    <th class="align-middle text-center focused rtlPosition">قد</th>
                                                    <th class="align-middle text-center focused rtlPosition">دور سینه</th>
                                                    <th class="align-middle text-center focused rtlPosition">دور کمر</th>
                                                    <th class="align-middle text-center focused rtlPosition">دور باسن</th>
                                                    <th class="align-middle text-center focused rtlPosition">سایز حروفی</th>
                                                </tr>
                                                </thead>

                                                <tbody style="direction: ltr">
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">6-7</td>
                                                    <td class="align-middle text-nowrap text-center">8</td>
                                                    <td class="align-middle text-nowrap text-center">58.5-61.5</td>
                                                    <td class="align-middle text-nowrap text-center">64.5-68</td>
                                                    <td class="align-middle text-nowrap text-center">59.5-61</td>
                                                    <td class="align-middle text-nowrap text-center">68.5-73</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XS
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">8-9</td>
                                                    <td class="align-middle text-nowrap text-center">8-10</td>
                                                    <td class="align-middle text-nowrap text-center">61.5-66.5</td>
                                                    <td class="align-middle text-nowrap text-center">68-73</td>
                                                    <td class="align-middle text-nowrap text-center">61-64</td>
                                                    <td class="align-middle text-nowrap text-center">73-78.5</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        S
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">8-9 Plus</td>
                                                    <td class="align-middle text-nowrap text-center">8-10</td>
                                                    <td class="align-middle text-nowrap text-center">61.5-66.5</td>
                                                    <td class="align-middle text-nowrap text-center">73.5-80.5</td>
                                                    <td class="align-middle text-nowrap text-center">67.5-74.5</td>
                                                    <td class="align-middle text-nowrap text-center">79.5-85.5</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        S +
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">10-12</td>
                                                    <td class="align-middle text-nowrap text-center">10-12</td>
                                                    <td class="align-middle text-nowrap text-center">66.5-71.5</td>
                                                    <td class="align-middle text-nowrap text-center">73-79</td>
                                                    <td class="align-middle text-nowrap text-center">64-68</td>
                                                    <td class="align-middle text-nowrap text-center">78.5-83.5</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        M
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">10-12 Plus</td>
                                                    <td class="align-middle text-nowrap text-center">10-12</td>
                                                    <td class="align-middle text-nowrap text-center">66.5-71.5</td>
                                                    <td class="align-middle text-nowrap text-center">80.5-87.5</td>
                                                    <td class="align-middle text-nowrap text-center">74.5-82</td>
                                                    <td class="align-middle text-nowrap text-center">85.5-92</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        M +
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">14-16</td>
                                                    <td class="align-middle text-nowrap text-center">12-13</td>
                                                    <td class="align-middle text-nowrap text-center">71.5-75.5</td>
                                                    <td class="align-middle text-nowrap text-center">79-85.5</td>
                                                    <td class="align-middle text-nowrap text-center">68-71.5</td>
                                                    <td class="align-middle text-nowrap text-center">83.5-88.5</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        L
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">14-16 Plus</td>
                                                    <td class="align-middle text-nowrap text-center">12-13</td>
                                                    <td class="align-middle text-nowrap text-center">71.5-75.5</td>
                                                    <td class="align-middle text-nowrap text-center">87.5-96</td>
                                                    <td class="align-middle text-nowrap text-center">82-90</td>
                                                    <td class="align-middle text-nowrap text-center">92-99</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        L +
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">18-20</td>
                                                    <td class="align-middle text-nowrap text-center">13-15</td>
                                                    <td class="align-middle text-nowrap text-center">75.5-80.5</td>
                                                    <td class="align-middle text-nowrap text-center">85.5-92.5</td>
                                                    <td class="align-middle text-nowrap text-center">71.5-74.5</td>
                                                    <td class="align-middle text-nowrap text-center">88.5-93.5</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XL
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">18-20 Plus</td>
                                                    <td class="align-middle text-nowrap text-center">13-15</td>
                                                    <td class="align-middle text-nowrap text-center">75.5-80.5</td>
                                                    <td class="align-middle text-nowrap text-center">96-105</td>
                                                    <td class="align-middle text-nowrap text-center">90-99</td>
                                                    <td class="align-middle text-nowrap text-center">99-107</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XL +
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!--پسرانه-->
                                <div class="card-block g-pa-0">
                                    <div>
                                        <h5 class="card-header g-bg-gray-dark-v4 g-brd-around g-brd-gray-light-v4 g-color-white g-font-size-16 rounded-0 g-mb-5 text-right">
                                            <i class="icon-education-192 u-line-icon-pro align-middle g-font-size-22 g-ml-5"></i>لباس
                                            بالا و پایین تنه پسرانه
                                        </h5>
                                        <div class="table-responsive">
                                            <table style="direction: rtl" class="table table-bordered u-table--v2">
                                                <thead>
                                                <tr>
                                                    <th class="align-middle text-center focused rtlPosition">سایز عددی</th>
                                                    <th class="align-middle text-center focused rtlPosition">سن</th>
                                                    <th class="align-middle text-center focused rtlPosition">قد</th>
                                                    <th class="align-middle text-center focused rtlPosition">دور سینه</th>
                                                    <th class="align-middle text-center focused rtlPosition">دور کمر</th>
                                                    <th class="align-middle text-center focused rtlPosition">دور باسن</th>
                                                    <th class="align-middle text-center focused rtlPosition">سایز حروفی</th>
                                                </tr>
                                                </thead>

                                                <tbody style="direction: ltr">
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">6-7</td>
                                                    <td class="align-middle text-nowrap text-center">7-8</td>
                                                    <td class="align-middle text-nowrap text-center">58.5-61.5</td>
                                                    <td class="align-middle text-nowrap text-center">64.5-66</td>
                                                    <td class="align-middle text-nowrap text-center">59.5-61</td>
                                                    <td class="align-middle text-nowrap text-center">68.5-71</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XS
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">8-9</td>
                                                    <td class="align-middle text-nowrap text-center">8-10</td>
                                                    <td class="align-middle text-nowrap text-center">61.5-66.5</td>
                                                    <td class="align-middle text-nowrap text-center">66-69</td>
                                                    <td class="align-middle text-nowrap text-center">61.5-65</td>
                                                    <td class="align-middle text-nowrap text-center">71-74.5</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        S
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">8-9 Plus</td>
                                                    <td class="align-middle text-nowrap text-center">8-10</td>
                                                    <td class="align-middle text-nowrap text-center">61.5-66.5</td>
                                                    <td class="align-middle text-nowrap text-center">70.5-76.5</td>
                                                    <td class="align-middle text-nowrap text-center">65.5-70.5</td>
                                                    <td class="align-middle text-nowrap text-center">75.5-81</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        S +
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">10-12</td>
                                                    <td class="align-middle text-nowrap text-center">10-12</td>
                                                    <td class="align-middle text-nowrap text-center">66.5-71.5</td>
                                                    <td class="align-middle text-nowrap text-center">69-75</td>
                                                    <td class="align-middle text-nowrap text-center">65-69</td>
                                                    <td class="align-middle text-nowrap text-center">74.5-79.5</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        M
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">10-12 Plus</td>
                                                    <td class="align-middle text-nowrap text-center">10-12</td>
                                                    <td class="align-middle text-nowrap text-center">66.5-71.5</td>
                                                    <td class="align-middle text-nowrap text-center">76.5-83.5</td>
                                                    <td class="align-middle text-nowrap text-center">70.5-76</td>
                                                    <td class="align-middle text-nowrap text-center">81-87</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        M +
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">14-16</td>
                                                    <td class="align-middle text-nowrap text-center">12-13</td>
                                                    <td class="align-middle text-nowrap text-center">71.5-75.5</td>
                                                    <td class="align-middle text-nowrap text-center">75-81.5</td>
                                                    <td class="align-middle text-nowrap text-center">69-72.5</td>
                                                    <td class="align-middle text-nowrap text-center">79.5-84.5</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        L
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">14-16 Plus</td>
                                                    <td class="align-middle text-nowrap text-center">12-13</td>
                                                    <td class="align-middle text-nowrap text-center">71.5-75.5</td>
                                                    <td class="align-middle text-nowrap text-center">83.5-91</td>
                                                    <td class="align-middle text-nowrap text-center">76-82</td>
                                                    <td class="align-middle text-nowrap text-center">87-93.5</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        L +
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">18-20</td>
                                                    <td class="align-middle text-nowrap text-center">13-15</td>
                                                    <td class="align-middle text-nowrap text-center">75.5-80.5</td>
                                                    <td class="align-middle text-nowrap text-center">81.5-88-.5</td>
                                                    <td class="align-middle text-nowrap text-center">72.5-75.5</td>
                                                    <td class="align-middle text-nowrap text-center">84.5-89.5</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XL
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">18-20 Plus</td>
                                                    <td class="align-middle text-nowrap text-center">13-15</td>
                                                    <td class="align-middle text-nowrap text-center">75.5-80.5</td>
                                                    <td class="align-middle text-nowrap text-center">91-98</td>
                                                    <td class="align-middle text-nowrap text-center">82-88</td>
                                                    <td class="align-middle text-nowrap text-center">93.5-100</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XL +
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!--کفش دخترانه و پسرانه-->
                                <div class="card-block g-pa-0">
                                    <div>
                                        <h5 class="card-header g-bg-gray-dark-v4 g-brd-around g-brd-gray-light-v4 g-color-white g-font-size-16 rounded-0 g-mb-5 text-right">
                                            <i class="icon-clothes-088 u-line-icon-pro align-middle g-font-size-22 g-ml-5"></i>
                                            کفش دخترانه و پسرانه
                                        </h5>

                                        <div style="direction: ltr" class="table-responsive">
                                            <table class="table table-bordered u-table--v2">
                                                <thead>
                                                <tr>
                                                    <th class="align-middle text-center focused rtlPosition">سن</th>
                                                    <th class="align-middle text-center focused rtlPosition">سانتیمتر</th>
                                                    <th class="align-middle text-center focused rtlPosition">سایز اروپایی (UE)</th>
                                                    <th class="align-middle text-center focused rtlPosition">سایز انگلیسی (UK)</th>
                                                    <th class="align-middle text-center focused rtlPosition">سایز آمریکایی (US)</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">8</td>
                                                    <td class="align-middle text-nowrap text-center">20.5</td>
                                                    <td class="align-middle text-nowrap text-center">30</td>
                                                    <td class="align-middle text-nowrap text-center">14</td>
                                                    <td class="align-middle text-nowrap text-center">15</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">9</td>
                                                    <td class="align-middle text-nowrap text-center">21</td>
                                                    <td class="align-middle text-nowrap text-center">31</td>
                                                    <td class="align-middle text-nowrap text-center">15</td>
                                                    <td class="align-middle text-nowrap text-center">16</td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">10</td>
                                                    <td class="align-middle text-nowrap text-center">21.5</td>
                                                    <td class="align-middle text-nowrap text-center">32</td>
                                                    <td class="align-middle text-nowrap text-center">16</td>
                                                    <td class="align-middle text-nowrap text-center">17</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">11</td>
                                                    <td class="align-middle text-nowrap text-center">22</td>
                                                    <td class="align-middle text-nowrap text-center">33</td>
                                                    <td class="align-middle text-nowrap text-center">17</td>
                                                    <td class="align-middle text-nowrap text-center">1</td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">12</td>
                                                    <td class="align-middle text-nowrap text-center">22.5</td>
                                                    <td class="align-middle text-nowrap text-center">34</td>
                                                    <td class="align-middle text-nowrap text-center">18</td>
                                                    <td class="align-middle text-nowrap text-center">1.5</td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">13</td>
                                                    <td class="align-middle text-nowrap text-center">23</td>
                                                    <td class="align-middle text-nowrap text-center">35</td>
                                                    <td class="align-middle text-nowrap text-center">19</td>
                                                    <td class="align-middle text-nowrap text-center">2</td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">14</td>
                                                    <td class="align-middle text-nowrap text-center">23.5</td>
                                                    <td class="align-middle text-nowrap text-center">36</td>
                                                    <td class="align-middle text-nowrap text-center">20</td>
                                                    <td class="align-middle text-nowrap text-center">2.5</td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">15</td>
                                                    <td class="align-middle text-nowrap text-center">24</td>
                                                    <td class="align-middle text-nowrap text-center">37</td>
                                                    <td class="align-middle text-nowrap text-center">21</td>
                                                    <td class="align-middle text-nowrap text-center">3</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--نوزادی-->
                        <div class="card g-brd-0 g-mb-15">
                            <div id="accordion-02-heading-05" class="card-header g-pa-0" role="tab">
                                <h5 class="g-bg-white g-px-0 g-py-10 mb-0">
                                    <a class="d-block u-link-v5 g-color-main g-color-primary--hover text-right" data-parent="#accordion-02"
                                       href="#accordion-02-body-05"
                                       data-toggle="collapse" aria-expanded="false" aria-controls="accordion-02-body-05"><i
                                            class="icon-emotsmile g-font-size-20 u-line-icon-pro g-ml-5"></i>نوزادی 2-0 سال</a>
                                </h5>
                            </div>
                            <div id="accordion-02-body-05" class="collapse g-mt-5" role="tabpanel"
                                 aria-labelledby="accordion-02-heading-05">
                                <!--نوزادی لباس-->
                                <div class="card-block g-pa-0">
                                    <div>
                                        <h5 class="card-header g-bg-gray-dark-v4 g-brd-around g-brd-gray-light-v4 g-color-white g-font-size-16 rounded-0 g-mb-5 text-right">
                                            <i class="icon-emotsmile align-middle g-ml-5"></i>لباس
                                            بالا و پایین تنه نوزادی
                                        </h5>
                                        <div class="table-responsive">
                                            <table style="direction: rtl" class="table table-bordered u-table--v2">
                                                <thead>
                                                <tr>
                                                    <th class="align-middle text-center focused rtlPosition">سایز</th>
                                                    <th class="align-middle text-center focused rtlPosition">سن (ماه)</th>
                                                    <th class="align-middle text-center focused rtlPosition">قد</th>
                                                    <th class="align-middle text-center focused rtlPosition">وزن</th>
                                                    <th class="align-middle text-center focused rtlPosition">دور سینه</th>
                                                    <th class="align-middle text-center focused rtlPosition">دور کمر</th>
                                                    <th class="align-middle text-center focused rtlPosition">سایز حروفی</th>
                                                </tr>
                                                </thead>

                                                <tbody style="direction: ltr">
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">زود رسیده</td>
                                                    <td class="align-middle text-nowrap text-center">...</td>
                                                    <td class="align-middle text-nowrap text-center"> ... < 22.5</td>
                                                    <td class="align-middle text-nowrap text-center"> ... < 2.5</td>
                                                    <td class="align-middle text-nowrap text-center">32</td>
                                                    <td class="align-middle text-nowrap text-center">33</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XS
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">0M (یا) NB</td>
                                                    <td class="align-middle text-nowrap text-center">0</td>
                                                    <td class="align-middle text-nowrap text-center">22.5-25.5</td>
                                                    <td class="align-middle text-nowrap text-center">2.7-4.3</td>
                                                    <td class="align-middle text-nowrap text-center">37-42</td>
                                                    <td class="align-middle text-nowrap text-center">39-43</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XS
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">3M</td>
                                                    <td class="align-middle text-nowrap text-center">0-3</td>
                                                    <td class="align-middle text-nowrap text-center">25.5-28.5</td>
                                                    <td class="align-middle text-nowrap text-center">4.5-6.6</td>
                                                    <td class="align-middle text-nowrap text-center">42-44</td>
                                                    <td class="align-middle text-nowrap text-center">43-46</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        S
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">6M</td>
                                                    <td class="align-middle text-nowrap text-center">3-6</td>
                                                    <td class="align-middle text-nowrap text-center">28.5-31.5</td>
                                                    <td class="align-middle text-nowrap text-center">6.8-8.1</td>
                                                    <td class="align-middle text-nowrap text-center">44-46</td>
                                                    <td class="align-middle text-nowrap text-center">46-47</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        S
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">9M</td>
                                                    <td class="align-middle text-nowrap text-center">6-9</td>
                                                    <td class="align-middle text-nowrap text-center">31.5-34.5</td>
                                                    <td class="align-middle text-nowrap text-center">8.3-10</td>
                                                    <td class="align-middle text-nowrap text-center">46-47</td>
                                                    <td class="align-middle text-nowrap text-center">47-48</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        M
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">12M</td>
                                                    <td class="align-middle text-nowrap text-center">9-12</td>
                                                    <td class="align-middle text-nowrap text-center">34.5-37.5</td>
                                                    <td class="align-middle text-nowrap text-center">10.2-11.3</td>
                                                    <td class="align-middle text-nowrap text-center">47-50</td>
                                                    <td class="align-middle text-nowrap text-center">48-50</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        M
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">18M</td>
                                                    <td class="align-middle text-nowrap text-center">12-18</td>
                                                    <td class="align-middle text-nowrap text-center">37.5-40.5</td>
                                                    <td class="align-middle text-nowrap text-center">11.6-12.7</td>
                                                    <td class="align-middle text-nowrap text-center">50-52</td>
                                                    <td class="align-middle text-nowrap text-center">50-52</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        L
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">24M (یا) 2T</td>
                                                    <td class="align-middle text-nowrap text-center">18-24</td>
                                                    <td class="align-middle text-nowrap text-center">40.5-43.5</td>
                                                    <td class="align-middle text-nowrap text-center">12.9-13-6</td>
                                                    <td class="align-middle text-nowrap text-center">52-53</td>
                                                    <td class="align-middle text-nowrap text-center">52-53</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        L
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">3T</td>
                                                    <td class="align-middle text-nowrap text-center">24-36</td>
                                                    <td class="align-middle text-nowrap text-center">43.5-46.5</td>
                                                    <td class="align-middle text-nowrap text-center">...</td>
                                                    <td class="align-middle text-nowrap text-center">53-56</td>
                                                    <td class="align-middle text-nowrap text-center">53-54.5</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XL
                                                    </td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">4T</td>
                                                    <td class="align-middle text-nowrap text-center">36-48</td>
                                                    <td class="align-middle text-nowrap text-center">46.5-49.5</td>
                                                    <td class="align-middle text-nowrap text-center">...</td>
                                                    <td class="align-middle text-nowrap text-center">56-58</td>
                                                    <td class="align-middle text-nowrap text-center">54.5-56</td>
                                                    <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                        XL
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!--کفش نوزادی-->
                                <div class="card-block g-pa-0">
                                    <div>
                                        <h5 class="card-header g-bg-gray-dark-v4 g-brd-around g-brd-gray-light-v4 g-color-white g-font-size-16 rounded-0 g-mb-5 text-right">
                                            <i class="icon-clothes-088 u-line-icon-pro align-middle g-font-size-22 g-ml-5"></i>
                                            کفش دخترانه و پسرانه
                                        </h5>

                                        <div style="direction: ltr" class="table-responsive">
                                            <table class="table table-bordered u-table--v2">
                                                <thead>
                                                <tr>
                                                    <th class="align-middle text-center focused rtlPosition">سن (ماه)</th>
                                                    <th class="align-middle text-center focused rtlPosition">سانتیمتر</th>
                                                    <th class="align-middle text-center focused rtlPosition">سایز اروپایی (UE)</th>
                                                    <th class="align-middle text-center focused rtlPosition">سایز انگلیسی (UK)</th>
                                                    <th class="align-middle text-center focused rtlPosition">سایز آمریکایی (US)</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">1-3</td>
                                                    <td class="align-middle text-nowrap text-center">8.9</td>
                                                    <td class="align-middle text-nowrap text-center">16</td>
                                                    <td class="align-middle text-nowrap text-center">0</td>
                                                    <td class="align-middle text-nowrap text-center">1</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">3-6</td>
                                                    <td class="align-middle text-nowrap text-center">9.5</td>
                                                    <td class="align-middle text-nowrap text-center">17</td>
                                                    <td class="align-middle text-nowrap text-center">1</td>
                                                    <td class="align-middle text-nowrap text-center">2</td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">6-9</td>
                                                    <td class="align-middle text-nowrap text-center">10.5</td>
                                                    <td class="align-middle text-nowrap text-center">18</td>
                                                    <td class="align-middle text-nowrap text-center">2</td>
                                                    <td class="align-middle text-nowrap text-center">3</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">10-12</td>
                                                    <td class="align-middle text-nowrap text-center">11.5</td>
                                                    <td class="align-middle text-nowrap text-center">19</td>
                                                    <td class="align-middle text-nowrap text-center">3</td>
                                                    <td class="align-middle text-nowrap text-center">4</td>
                                                </tr>
                                                <tr class="g-bg-gray-light-v5">
                                                    <td class="align-middle text-nowrap text-center">15-18</td>
                                                    <td class="align-middle text-nowrap text-center">12</td>
                                                    <td class="align-middle text-nowrap text-center">20</td>
                                                    <td class="align-middle text-nowrap text-center">4</td>
                                                    <td class="align-middle text-nowrap text-center">5</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">18-24</td>
                                                    <td class="align-middle text-nowrap text-center">13</td>
                                                    <td class="align-middle text-nowrap text-center">21</td>
                                                    <td class="align-middle text-nowrap text-center">5</td>
                                                    <td class="align-middle text-nowrap text-center">6</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">24-36</td>
                                                    <td class="align-middle text-nowrap text-center">14</td>
                                                    <td class="align-middle text-nowrap text-center">22</td>
                                                    <td class="align-middle text-nowrap text-center">6</td>
                                                    <td class="align-middle text-nowrap text-center">7</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-nowrap text-center">36-48</td>
                                                    <td class="align-middle text-nowrap text-center">14.5</td>
                                                    <td class="align-middle text-nowrap text-center">23</td>
                                                    <td class="align-middle text-nowrap text-center">7</td>
                                                    <td class="align-middle text-nowrap text-center">8</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
