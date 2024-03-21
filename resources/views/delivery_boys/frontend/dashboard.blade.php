@extends('frontend.layouts.delivery_panel')
@section('panel_content')

@php 
$delivery_boy_info = \App\Models\DeliveryBoy::where('user_id', Auth::user()->id)->first();
@endphp
<div class="aiz-titlebar mt-2 mb-4">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3">{{ translate('Dashboard') }}</h1>
        </div>
    </div>
</div>
<div class="row gutters-10">
    <div class="col-md-3">
        <div class="bg-grad-1 text-white rounded-lg mb-4 overflow-hidden">
            <div class="px-3 pt-3 text-center">
                <i class="las la-shipping-fast la-4x"></i>
                <div class="opacity-50">{{ translate('Completed Delivery') }}</div>
                @php 
                $total_complete_delivery = \App\Models\Order::where('assign_delivery_boy', Auth::user()->id)
                                            ->where('delivery_status', 'delivered')
                                            ->get();
                @endphp
                @if(count($total_complete_delivery))
                <div class="h3 fw-700">
                    {{ count($total_complete_delivery) }}
                </div>
                @else
                <div class="h3 fw-700">0</div>
                @endif
                
            </div>
            
        </div>
    </div>
    <div class="col-md-3">
        <div class="bg-grad-2 text-white rounded-lg mb-4 overflow-hidden">
            <div class="px-3 pt-3 text-center">
                <i class="las la-clock la-4x"></i>
                <div class="opacity-50">{{ translate('Pending Delivery') }}</div>
                @php 
                $total_pending_delivery = \App\Models\Order::where('assign_delivery_boy', Auth::user()->id)
                                            ->where('delivery_status', '!=', 'delivered')
                                            ->where('delivery_status', '!=', 'cancelled')
                                            ->get();
                @endphp
                 @if(count($total_pending_delivery))
                <div class="h3 fw-700">
                    {{ count($total_pending_delivery) }}
                </div>
                @else
                <div class="h3 fw-700">0</div>
                @endif
                
            </div>
            
        </div>
    </div>
    <div class="col-md-3">
        <div class="bg-grad-3 text-white rounded-lg mb-4 overflow-hidden">
            <div class="px-3 pt-3 text-center">
                <i class="las la-layer-group la-4x"></i>
                <div class="opacity-50">{{ translate('Total Collected') }}</div>
                
                <div class="h3 fw-700">
                    {{ $delivery_boy_info->total_collection }}
                </div>
                
            </div>
            
        </div>
    </div>
    <!-- <div class="col-md-3">
        <div class="bg-grad-4 text-white rounded-lg mb-4 overflow-hidden">
            <div class="px-3 pt-3 text-center">
                <i class="las la-dollar-sign la-4x"></i>
                <div class="opacity-50">{{ translate('Earnings') }}</div>
                @if(get_setting('delivery_boy_payment_type') == 'commission')
                <div class="h3 fw-700">
                    {{ $delivery_boy_info->total_earning }}/
                    <span>
                        <small>{{ translate('order') }}</small>
                    </span>
                </div>
                @endif
                @if(get_setting('delivery_boy_payment_type') == 'salary')
                <div class="h3 fw-700">
                    {{ get_setting('delivery_boy_salary') }} / {{ translate('mo') }}
                </div>
                @endif
                
            </div>
            
        </div>
    </div> -->
    
</div>
<div class="row gutters-16 mb-4">


    <!-- Assigned Deliveries -->
    <div class="col-md-4 py-3">
        <a href="{{ route('assigned-deliveries')}}" class="d-flex flex-column align-items-center py-4 py-lg-5 border bg-light has-transition hov-bg-soft-light">
            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 70 70">
                <g id="Group_25732" data-name="Group 25732" transform="translate(-1447 -715)">
                  <rect id="Rectangle" width="70" height="70" rx="35" transform="translate(1447 715)" fill="#0084b4"></rect>
                  <g id="Group_25729" data-name="Group 25729" transform="translate(1438.534 191.037)">
                    <path id="Path_2953" data-name="Path 2953" d="M20,5.963H12a3,3,0,0,0,0,6h8a3,3,0,0,0,0-6m0,4H12a1,1,0,0,1,0-2h8a1,1,0,0,1,0,2" transform="translate(27.466 537)" fill="#fff"></path>
                    <path id="Path_2954" data-name="Path 2954" d="M25.982,9.963a1,1,0,0,1,0-2H27a5,5,0,0,1,5,5v20a5,5,0,0,1-5,5H5a5,5,0,0,1-5-5v-20a5,5,0,0,1,5-5H6.017a1,1,0,0,1,0,2H5a3,3,0,0,0-3,3v20a3,3,0,0,0,3,3H27a3,3,0,0,0,3-3v-20a3,3,0,0,0-3-3Z" transform="translate(27.466 537)" fill="#fff"></path>
                    <g id="Group_25728" data-name="Group 25728" transform="translate(34.273 554.963)">
                      <rect id="Rectangle_19508" data-name="Rectangle 19508" width="16" height="2" rx="1" transform="translate(5.658 11.314) rotate(-45)" fill="#fff"></rect>
                      <rect id="Rectangle_19509" data-name="Rectangle 19509" width="2" height="10" rx="1" transform="translate(0 5.656) rotate(-45)" fill="#fff"></rect>
                    </g>
                  </g>
                </g>
            </svg>
            <span class="mb-0 mt-3 fs-14 fw-700" style="color: #0084b4;">Product Collected From Seller</span>
        </a>
    </div>

       <!-- Completed Deliveries -->
       <div class="col-md-4 py-3">
        <a href="{{route('pickup-deliveries')}}" class="d-flex flex-column align-items-center py-4 py-lg-5 border bg-light has-transition hov-bg-soft-light">
            <svg xmlns="http://www.w3.org/2000/svg" width="71" height="71" viewBox="0 0 71 71">
                <g id="Group_25732" data-name="Group 25732" transform="translate(-1099 -715)">
                  <rect id="Rectangle" width="71" height="71" rx="35.5" transform="translate(1099 715)" fill="#f3af3d"></rect>
                  <g id="Group_25730" data-name="Group 25730" transform="translate(797 303)">
                    <rect id="Rectangle_19531" data-name="Rectangle 19531" width="19.998" height="2" rx="1" transform="translate(333.999 457.997)" fill="#fff"></rect>
                    <rect id="Rectangle_19533" data-name="Rectangle 19533" width="9.999" height="2" rx="1" transform="translate(322 432)" fill="#fff"></rect>
                    <rect id="Rectangle_19532" data-name="Rectangle 19532" width="2" height="23.997" rx="1" transform="translate(329.999 432)" fill="#fff"></rect>
                    <path id="Subtraction_202" data-name="Subtraction 202" d="M5,10a5,5,0,1,1,5-5A5.009,5.009,0,0,1,5,10ZM5,2A3,3,0,1,0,8,5,3,3,0,0,0,5,2Z" transform="translate(325.996 453.997)" fill="#fff"></path>
                    <path id="Subtraction_204" data-name="Subtraction 204" d="M17,10H3A3,3,0,0,1,0,7V3A3,3,0,0,1,3,0H17a3,3,0,0,1,3,3V7A3,3,0,0,1,17,10ZM3,2A1,1,0,0,0,2,3V7A1,1,0,0,0,3,8H17a1,1,0,0,0,1-1V3a1,1,0,0,0-1-1Z" transform="translate(333.995 445.999)" fill="#fff"></path>
                    <path id="Subtraction_205" data-name="Subtraction 205" d="M11,10H3A3,3,0,0,1,0,7V3A3,3,0,0,1,3,0h8a3,3,0,0,1,3,3V7A3,3,0,0,1,11,10ZM3,2A1,1,0,0,0,2,3V7A1,1,0,0,0,3,8h8a1,1,0,0,0,1-1V3a1,1,0,0,0-1-1Z" transform="translate(333.987 438.003)" fill="#fff"></path>
                  </g>
                </g>
            </svg>
            <span class="mb-0 mt-3 fs-14 fw-700 text-warning">Confirm Product is good</span>
        </a>
    </div>


    <!-- Given to Customer -->
    <div class="col-md-4 py-3">
            <a href="{{route('on-the-way-deliveries')}}" class="d-flex flex-column align-items-center py-4 py-lg-5 border bg-light has-transition hov-bg-soft-light">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 70 70">
                    <g id="Group_25732" data-name="Group 25732" transform="translate(-751 -715)">
                    <rect id="Rectangle" width="70" height="70" rx="35" transform="translate(751 715)" fill="#d43533"></rect>
                    <g id="Group_25731" data-name="Group 25731" transform="translate(531.998 258.002)">
                        <g id="Group_25717" data-name="Group 25717" transform="translate(238 476)">
                        <g id="Group_25716" data-name="Group 25716" transform="translate(17.998)">
                            <path id="Subtraction_208" data-name="Subtraction 208" d="M2.005,11.9H2A7,7,0,1,1,14,7a6.959,6.959,0,0,1-2,4.9c-.062-.505-.593-.978-1.5-1.331A5,5,0,1,0,2,7a4.961,4.961,0,0,0,1.5,3.571c-.9.354-1.435.827-1.495,1.333Z" transform="translate(0)" fill="#fff"></path>
                            <g id="Group_25715" data-name="Group 25715" transform="translate(1.346 9.86)">
                            <rect id="Rectangle_19547" data-name="Rectangle 19547" width="7.999" height="2" rx="1" transform="translate(4.242 5.656) rotate(-45)" fill="#fff"></rect>
                            <rect id="Rectangle_19548" data-name="Rectangle 19548" width="2" height="7.999" rx="1" transform="translate(0 1.414) rotate(-45)" fill="#fff"></rect>
                            </g>
                            <ellipse id="Ellipse_618" data-name="Ellipse 618" cx="2" cy="2" rx="2" ry="2" transform="translate(4.999 4.994)" fill="#fff"></ellipse>
                        </g>
                        <path id="Subtraction_211" data-name="Subtraction 211" d="M15,18H3a3,3,0,0,1-3-3V3A3,3,0,0,1,3,0H15a3,3,0,0,1,3,3V15A3,3,0,0,1,15,18ZM3,2A1,1,0,0,0,2,3V15a1,1,0,0,0,1,1H15a1,1,0,0,0,1-1V3a1,1,0,0,0-1-1Z" transform="translate(0 13.998)" fill="#fff"></path>
                        <path id="Rectangle_19552" data-name="Rectangle 19552" d="M0,0H2A0,0,0,0,1,2,0V5A1,1,0,0,1,1,6H1A1,1,0,0,1,0,5V0A0,0,0,0,1,0,0Z" transform="translate(7.999 15.998)" fill="#fff"></path>
                        <path id="Rectangle_19559" data-name="Rectangle 19559" d="M0,0H2A0,0,0,0,1,2,0V5A1,1,0,0,1,1,6H1A1,1,0,0,1,0,5V0A0,0,0,0,1,0,0Z" transform="translate(19.998 29.996) rotate(-90)" fill="#fff"></path>
                        </g>
                        <rect id="Rectangle_19556" data-name="Rectangle 19556" width="2" height="5.999" rx="1" transform="translate(262.997 494.205) rotate(45)" fill="#fff"></rect>
                        <rect id="Rectangle_19557" data-name="Rectangle 19557" width="5.999" height="2" rx="1" transform="translate(262.997 494.205) rotate(45)" fill="#fff"></rect>
                        <rect id="Rectangle_19558" data-name="Rectangle 19558" width="2" height="9.999" rx="1" transform="translate(261.997 495.998)" fill="#fff"></rect>
                    </g>
                    </g>
                </svg>
                <span class="mb-0 mt-3 fs-14 fw-700 text-primary">Product Given to Buyer</span>
            </a>
        </div>


    </div>


 

@endsection
