<?php 
  $ip = $_SERVER['REMOTE_ADDR'];
  $ipdetails = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
  if (!isset($ipdetails->country) && empty($ipdetails->country)) {
    $country_abbr = "AU";
  } else {

    $country_abbr = strtoupper($ipdetails->country);
  }

  function code_to_country( $code ){

     $countryList = array(
         'AF' => 'Afghanistan',
         'AX' => 'Aland Islands',
         'AL' => 'Albania',
         'DZ' => 'Algeria',
         'AS' => 'American Samoa',
         'AD' => 'Andorra',
         'AO' => 'Angola',
         'AI' => 'Anguilla',
         'AQ' => 'Antarctica',
         'AG' => 'Antigua and Barbuda',
         'AR' => 'Argentina',
         'AM' => 'Armenia',
         'AW' => 'Aruba',
         'AU' => 'Australia',
         'AT' => 'Austria',
         'AZ' => 'Azerbaijan',
         'BS' => 'Bahamas the',
         'BH' => 'Bahrain',
         'BD' => 'Bangladesh',
         'BB' => 'Barbados',
         'BY' => 'Belarus',
         'BE' => 'Belgium',
         'BZ' => 'Belize',
         'BJ' => 'Benin',
         'BM' => 'Bermuda',
         'BT' => 'Bhutan',
         'BO' => 'Bolivia',
         'BA' => 'Bosnia and Herzegovina',
         'BW' => 'Botswana',
         'BV' => 'Bouvet Island (Bouvetoya)',
         'BR' => 'Brazil',
         'IO' => 'British Indian Ocean Territory (Chagos Archipelago)',
         'VG' => 'British Virgin Islands',
         'BN' => 'Brunei Darussalam',
         'BG' => 'Bulgaria',
         'BF' => 'Burkina Faso',
         'BI' => 'Burundi',
         'KH' => 'Cambodia',
         'CM' => 'Cameroon',
         'CA' => 'Canada',
         'CV' => 'Cape Verde',
         'KY' => 'Cayman Islands',
         'CF' => 'Central African Republic',
         'TD' => 'Chad',
         'CL' => 'Chile',
         'CN' => 'China',
         'CX' => 'Christmas Island',
         'CC' => 'Cocos (Keeling) Islands',
         'CO' => 'Colombia',
         'KM' => 'Comoros the',
         'CD' => 'Congo',
         'CG' => 'Congo the',
         'CK' => 'Cook Islands',
         'CR' => 'Costa Rica',
         'CI' => 'Cote d\'Ivoire',
         'HR' => 'Croatia',
         'CU' => 'Cuba',
         'CY' => 'Cyprus',
         'CZ' => 'Czech Republic',
         'DK' => 'Denmark',
         'DJ' => 'Djibouti',
         'DM' => 'Dominica',
         'DO' => 'Dominican Republic',
         'EC' => 'Ecuador',
         'EG' => 'Egypt',
         'SV' => 'El Salvador',
         'GQ' => 'Equatorial Guinea',
         'ER' => 'Eritrea',
         'EE' => 'Estonia',
         'ET' => 'Ethiopia',
         'FO' => 'Faroe Islands',
         'FK' => 'Falkland Islands (Malvinas)',
         'FJ' => 'Fiji the Fiji Islands',
         'FI' => 'Finland',
         'FR' => 'France, French Republic',
         'GF' => 'French Guiana',
         'PF' => 'French Polynesia',
         'TF' => 'French Southern Territories',
         'GA' => 'Gabon',
         'GM' => 'Gambia the',
         'GE' => 'Georgia',
         'DE' => 'Germany',
         'GH' => 'Ghana',
         'GI' => 'Gibraltar',
         'GR' => 'Greece',
         'GL' => 'Greenland',
         'GD' => 'Grenada',
         'GP' => 'Guadeloupe',
         'GU' => 'Guam',
         'GT' => 'Guatemala',
         'GG' => 'Guernsey',
         'GN' => 'Guinea',
         'GW' => 'Guinea-Bissau',
         'GY' => 'Guyana',
         'HT' => 'Haiti',
         'HM' => 'Heard Island and McDonald Islands',
         'VA' => 'Holy See (Vatican City State)',
         'HN' => 'Honduras',
         'HK' => 'Hong Kong',
         'HU' => 'Hungary',
         'IS' => 'Iceland',
         'IN' => 'India',
         'ID' => 'Indonesia',
         'IR' => 'Iran',
         'IQ' => 'Iraq',
         'IE' => 'Ireland',
         'IM' => 'Isle of Man',
         'IL' => 'Israel',
         'IT' => 'Italy',
         'JM' => 'Jamaica',
         'JP' => 'Japan',
         'JE' => 'Jersey',
         'JO' => 'Jordan',
         'KZ' => 'Kazakhstan',
         'KE' => 'Kenya',
         'KI' => 'Kiribati',
         'KP' => 'Korea',
         'KR' => 'Korea',
         'KW' => 'Kuwait',
         'KG' => 'Kyrgyz Republic',
         'LA' => 'Lao',
         'LV' => 'Latvia',
         'LB' => 'Lebanon',
         'LS' => 'Lesotho',
         'LR' => 'Liberia',
         'LY' => 'Libyan Arab Jamahiriya',
         'LI' => 'Liechtenstein',
         'LT' => 'Lithuania',
         'LU' => 'Luxembourg',
         'MO' => 'Macao',
         'MK' => 'Macedonia',
         'MG' => 'Madagascar',
         'MW' => 'Malawi',
         'MY' => 'Malaysia',
         'MV' => 'Maldives',
         'ML' => 'Mali',
         'MT' => 'Malta',
         'MH' => 'Marshall Islands',
         'MQ' => 'Martinique',
         'MR' => 'Mauritania',
         'MU' => 'Mauritius',
         'YT' => 'Mayotte',
         'MX' => 'Mexico',
         'FM' => 'Micronesia',
         'MD' => 'Moldova',
         'MC' => 'Monaco',
         'MN' => 'Mongolia',
         'ME' => 'Montenegro',
         'MS' => 'Montserrat',
         'MA' => 'Morocco',
         'MZ' => 'Mozambique',
         'MM' => 'Myanmar',
         'NA' => 'Namibia',
         'NR' => 'Nauru',
         'NP' => 'Nepal',
         'AN' => 'Netherlands Antilles',
         'NL' => 'Netherlands the',
         'NC' => 'New Caledonia',
         'NZ' => 'New Zealand',
         'NI' => 'Nicaragua',
         'NE' => 'Niger',
         'NG' => 'Nigeria',
         'NU' => 'Niue',
         'NF' => 'Norfolk Island',
         'MP' => 'Northern Mariana Islands',
         'NO' => 'Norway',
         'OM' => 'Oman',
         'PK' => 'Pakistan',
         'PW' => 'Palau',
         'PS' => 'Palestinian Territory',
         'PA' => 'Panama',
         'PG' => 'Papua New Guinea',
         'PY' => 'Paraguay',
         'PE' => 'Peru',
         'PH' => 'Philippines',
         'PN' => 'Pitcairn Islands',
         'PL' => 'Poland',
         'PT' => 'Portugal, Portuguese Republic',
         'PR' => 'Puerto Rico',
         'QA' => 'Qatar',
         'RE' => 'Reunion',
         'RO' => 'Romania',
         'RU' => 'Russian Federation',
         'RW' => 'Rwanda',
         'BL' => 'Saint Barthelemy',
         'SH' => 'Saint Helena',
         'KN' => 'Saint Kitts and Nevis',
         'LC' => 'Saint Lucia',
         'MF' => 'Saint Martin',
         'PM' => 'Saint Pierre and Miquelon',
         'VC' => 'Saint Vincent and the Grenadines',
         'WS' => 'Samoa',
         'SM' => 'San Marino',
         'ST' => 'Sao Tome and Principe',
         'SA' => 'Saudi Arabia',
         'SN' => 'Senegal',
         'RS' => 'Serbia',
         'SC' => 'Seychelles',
         'SL' => 'Sierra Leone',
         'SG' => 'Singapore',
         'SK' => 'Slovakia (Slovak Republic)',
         'SI' => 'Slovenia',
         'SB' => 'Solomon Islands',
         'SO' => 'Somalia, Somali Republic',
         'ZA' => 'South Africa',
         'GS' => 'South Georgia and the South Sandwich Islands',
         'ES' => 'Spain',
         'LK' => 'Sri Lanka',
         'SD' => 'Sudan',
         'SR' => 'Suriname',
         'SJ' => 'Svalbard & Jan Mayen Islands',
         'SZ' => 'Swaziland',
         'SE' => 'Sweden',
         'CH' => 'Switzerland, Swiss Confederation',
         'SY' => 'Syrian Arab Republic',
         'TW' => 'Taiwan',
         'TJ' => 'Tajikistan',
         'TZ' => 'Tanzania',
         'TH' => 'Thailand',
         'TL' => 'Timor-Leste',
         'TG' => 'Togo',
         'TK' => 'Tokelau',
         'TO' => 'Tonga',
         'TT' => 'Trinidad and Tobago',
         'TN' => 'Tunisia',
         'TR' => 'Turkey',
         'TM' => 'Turkmenistan',
         'TC' => 'Turks and Caicos Islands',
         'TV' => 'Tuvalu',
         'UG' => 'Uganda',
         'UA' => 'Ukraine',
         'AE' => 'United Arab Emirates',
         'GB' => 'United Kingdom',
         'US' => 'United States of America',
         'UM' => 'United States Minor Outlying Islands',
         'VI' => 'United States Virgin Islands',
         'UY' => 'Uruguay, Eastern Republic of',
         'UZ' => 'Uzbekistan',
         'VU' => 'Vanuatu',
         'VE' => 'Venezuela',
         'VN' => 'Vietnam',
         'WF' => 'Wallis and Futuna',
         'EH' => 'Western Sahara',
         'YE' => 'Yemen',
         'ZM' => 'Zambia',
         'ZW' => 'Zimbabwe'
     );

    return $countryList[$code];
  }

  $country_full_name = strtolower(code_to_country($country_abbr));

  if ($country_full_name == "") {
    $country_full_name = "australia";
  }
?>
@extends('layouts.master')

@section('style')
<style media="screen">
  .bg-cover{
    background:url('{{asset('/')}}public/images/pages/{{$banner}}') no-repeat;
    background-position:center;
    background-size:cover;
  }
  #filterFees{
    display:none;
}
</style>
@endsection

@section('content')
  <div class="site-search">
   <div class="site-search__close bg-black-0_8"></div>
   <form class="form-site-search" action="#" method="POST">
    <div class="input-group">
      <input type="text" placeholder="Search" class="form-control py-3 border-white" required="">
      <div class="input-group-append">
        <button class="btn btn-primary" type="submit"><i class="ti-search"></i></button>
      </div>
    </div>
   </form>
  </div> <!-- END site-search-->
  <div class="py-5 bg-cover text-white" data-dark-overlay="6"  >
    <div class="container">
     <div class="row align-items-center">
       <div class="col-md-6 text-white">
         <h2>Admission</h2>
       </div>
       <div class="col-md-6">
        <ol class="breadcrumb justify-content-md-end bg-transparent">
          <li class="breadcrumb-item">
            <a href="{{route('home')}}">Home</a>
          </li>
          <li class="breadcrumb-item">
          Admission
          </li>
        </ol>
       </div>
     </div>
    </div>
  </div>

  <section class="padding-y-30 border-bottom border-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
          <ul class="nav flex-column mb-3 justify-content-center bg-light-v2" role="tablist">
            <?php /*
              <li class="nav-item category-nav-item">
               <a class="nav-link active" data-toggle="tab" href="#Tabs_4-1" role="tab" aria-selected="true">
                  Course Fee Structure
               </a>
              </li>
              <li class="nav-item category-nav-item">
               <a class="nav-link" data-toggle="tab" href="#Tabs_4-2" role="tab" aria-selected="true">
                 How To Apply
               </a>
              </li>
              <li class="nav-item category-nav-item">
               <a class="nav-link" data-toggle="tab" href="#Tabs_4-3" role="tab" aria-selected="true">
                  Intake Dates
               </a>

              </li>
              <li class="nav-item category-nav-item">
               <a class="nav-link" href="apply-now" aria-selected="true">
                  Apply Now
               </a>

              </li>
              <li class="nav-item category-nav-item">
               <a class="nav-link" data-toggle="tab" href="#Tabs_4-4" role="tab" aria-selected="true">
                  Orientation
               </a>

              </li>
              */ ?>
              @php
                  $count = 0;
                  $counter= 0;
                  $subpage_id = 0;
                  @endphp
                  @foreach ($modules as $mod)
                  <li class="nav-item category-nav-item">
                      <a class="nav-link border rounded text-center @if ($subpage == $mod->module->title) active @endif " data-toggle="tab" href="#Tabs_4-{{$mod->module->id}}" role="tab" aria-selected="true">
                          {{$mod->module->title}}
                      <?php 

                      if($subpage == $mod->module->title){
                          $subpage_id = $mod->module->id;
                      }
                      ?>
                      </a>
                  </li>
                  @php
                  $count++;
                  @endphp
                  @endforeach

                  <li class="nav-item category-nav-item">
                   <a class="nav-link border rounded text-center" href="../apply-now" aria-selected="true">
                      Apply Now
                   </a>

              </li>
          </ul>
      </div>
      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
       <!-- <ul class="nav tab-line tab-line tab-line--3x border-bottom mb-4" role="tablist">
         <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#Tabs_4-1" role="tab" aria-selected="true">
           <i class="ti-home mr-1"></i>
            Course Fee Structure
          </a>
         </li>
         <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#Tabs_4-2" role="tab" aria-selected="true">
           <i class="ti-user mr-1"></i>
            How To Apply
          </a>
         </li>
         <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="tab" href="#Tabs_4-3" role="tab" aria-selected="true">
           <i class="ti-settings mr-1"></i>
            Intake Dates
          </a>
       
         </li>
       </ul> -->

        <div class="tab-content">
          <div class="tab-pane fade @if ($subpage_id == 24) show active @endif" id="Tabs_4-24" role="tabpanel">
            <div class="row">
              <div class="col-12">
               <!-- <ul class="nav tab-state-primary mb-3 justify-content-center" role="tablist">
                 <li class="nav-item m-1">
                   <a class="nav-link border rounded text-center p-3 active" data-toggle="tab" href="#Tabs_8-1" role="tab" aria-selected="true">
                    <span class=" d-block">  OnShore Fee</span>
               
                   </a>
                 </li>
                 <li class="nav-item m-1">
                   <a class="nav-link border rounded text-center p-3" data-toggle="tab" href="#Tabs_8-2" role="tab" aria-selected="true">
                    <span class=" d-block">  OffShore Fee</span>
                   </a>
                 </li>
                 <li class="nav-item m-1 ">
                   <a class="nav-link border rounded text-center p-3" href="{{url('/')}}/public/files/applynow.pdf" target="_blank" role="tab" aria-selected="true">
                   <a class="nav-link border rounded text-center p-3" href="{{url('/')}}/apply-now" target="_blank" role="tab" aria-selected="true">
                    <span class=" d-block ">Apply Now</span>
                   </a>
                 </li>
               
               </ul> -->

                <div class="tab-content">
                  <!-- <div class="tab-pane fade show active" id="Tabs_8-1" role="tabpanel">
                    <div class="row">
                        @foreach ($courses as $category)
                          @if (count($category->courses) > 0)
                  
                          <div class="col-lg-6 col-md-6 marginTop-30 wow float-left " data-wow-delay=".1s">
                            <div class=" p-1 text-center bg-light bg-primary border-bottom">
                              <h5 class="my-4 text-white">
                                {{$category->name}}
                              </h5>
                            </div>
                            @foreach ($category->courses as $course)
                              @if ($course->course_category_id == $category->id)
                                <div class="p-4 bg-light border-bottom">
                                  <div class="media justify-content-between">
                                    <ul class="list-unstyled mb-0">
                                      <li class="mb-1">
                                        <h5 class="my-4">
                                          {{$course->name}}
                                        </h5>
                                      </li>
                                      <li class="mb-1">
                                        {{$course->code}}
                                      </li>
                                    </ul>
                                    <ul class="list-unstyled mb-0  text-right">
                                      <li class="mb-1">
                                        <h5 class="my-4 d-block text-primary">{{$course->onshore_fee}}</h5>
                                      </li>
                                      <li class="mb-1">
                                        @php
                                          $string = explode(' ',$course->duration);
                                        @endphp
                                        @if (isset($string[0]))
                                        {{$string[0]}}
                                        @endif
                                        @if (isset($string[1]))
                                        {{$string[1]}}
                                        @endif
                                      </li>
                                    </ul>
                  
                                  </div>
                  
                                </div>
                              @endif
                            @endforeach
                  
                          </div>
                        @endif
                  
                        @endforeach
                    </div>
                  </div> -->
                  <div class="tab-pane fade show fade active" id="Tabs_8-2" role="tabpanel">
                    <div class="row">
                      
                      <div class="col-lg-12 col-md-12 marginTop-30 wow " data-wow-delay=".5s">
                        <h5 class="border-bottom mb-4">
                          Note:
                        </h5>
                        <p>
                        The above mentioned charges are for course tuition fees only, and do not include other applicable Administration / Service Charges. Please click here for a list of additional Administration / Service Charges.
                        </p>
                        <p>
                          <i>
                          "Currently AHIC is offering special price for individual courses. Please contact with college or speak with AHIC approved educational consultant for special price."
                          </i>
                        </p>

                      </div>
                    </div>
                    <h6 class="mt-2"><i>The following are the fee structure for "{{ ucfirst($country_full_name) }}"</i></h6>
                    <!-- <div class="row d-flex justify-content-end">
                        <div class="col-md-3">
                          <div class="form-group">
                            <select name="country" class="form-control country_filter">
                              <option value=""> SELECT A COUNTRY</option>
                              <?php $country_index = 0; ?>
                                @foreach ($countries as $country)
                                <?php 
                                  if (strtolower($country->name) == $country_full_name) {
                                    $country_index = $country->id;
                                  }
                                 ?>
                                  @if ($country->name!="Australia")
                                    <option value="{{$country->id}}">{{strtolower($country->name)}}</option>
                                  @endif
                                @endforeach
                            </select>
                          </div>
                        </div>
                    </div> -->
                    <div class="row" id="filterFees">
                    </div>
                  </div>

                </div> <!-- END tab-content-->
              </div> <!-- END col-12 -->
            </div>
          </div>
          <div class="tab-pane fade @if ($subpage_id == 6) show active @endif" id="Tabs_4-6" role="tabpanel">
            <div class="col-12">
              <ul class="ec-timeline-portlet list-unstyled bullet-line-list">
                @php
                  $count = 1;
                @endphp
                @foreach ($modules as $mod)
                  @if($mod['module']['display_type'] == 2)
                    @foreach ($mod['module']['content'] as $module)
                      @php
                      $num ='';
                      if($count > 10){
                        $c = $count % 10;
                      }
                      else{
                        $c = $count;
                      }

                      if ($c === 1) {
                        $num = $count.  "st";
                      }
                      elseif ($c === 2) {
                        $num = $count. "nd";
                      }
                      elseif ($c === 3) {
                        $num = $count. "rd";
                      }
                      else{
                        $num = $count.  "th";
                      }
                      @endphp
                      <li class="ec-timeline-portlet__item">
                          <h6>{!!html_entity_decode($num)!!}</h6>
                          <p class="mb-0 text-uppercase">{{$module['title']}}</p>
                          <p class="text-muted marginTop-30">
                              {!!html_entity_decode($module['description'])!!}
                          </p>
                      </li>

                      @php
                        $count++;
                      @endphp
                    @endforeach
                  @endif
                @endforeach

              </ul>
            </div>

            @foreach ($modules as $mod)
@if($mod['module']['display_type'] != 2 && $mod['module']['title'] != "Orientation")
                @foreach ($mod['module']['content'] as $module)
                  <div class="col-md-12 marginTop-30 wow" data-wow-delay=".1s">
                    <div class="media border rounded p-4">

                      <div class="media-body ml-4">
                        <h5 class="border-bottom mb-4">
                            {{$module['title']}}
                        </h5>
                        {!!html_entity_decode($module['description'])!!}
                      </div>
                    </div>
                  </div>
                @endforeach
              @endif
            @endforeach

          </div>
          <div class="tab-pane fade @if ($subpage_id == 25) show active @endif" id="Tabs_4-25" role="tabpanel">


                  @foreach ($intakeyear as $year)
                    <div class="container marginTop-30">
                        <div class="row">
                    <div class="col-12 text-center mb-4">
                      <h4>Year - <span class="text-primary">{{$year->year}}</span></h4>
                    </div>

                    @foreach ($intakes as $intake)

                      @php
                      $num ='';
                    if($intake->term > 0){
                      if($intake->term > 10){
                        $c = $intake->term % 10;
                      }
                      else{
                        $c = $intake->term;
                      }
                      if ($c == 1) {
                        $num = $intake->term.  "st";
                      }
                      elseif ($c == 2) {
                        $num = $intake->term. "nd";
                      }
                      elseif ($c == 3) {
                        $num = $intake->term. "nd";
                      }
                      else{
                        $num = $intake->term.  "th";
                      }
                    }
                      @endphp
                      @if($intake->year == $year->year)
                        <div class="col-md-6 mt-5 wow" data-wow-delay=".1s">
                         <div class="card text-center height-100p border  p-4 p-lg-5 shadow-v2">
                          <span class="iconbox iconbox-lg rounded bg-primary mx-auto" data-offset-top-md="-75">
                             {{$num}} <br> Term
                           </span>
                           <div class="table-responsive my-4">
                             <table class="table text-left table-hover">
                               <thead>
                                 <tr>
                                   <th scope="col">Start Date</th>
                                   <th scope="col">{{$intake->date}}</th>

                                 </tr>
                               </thead>
                               <tbody>
                                 <tr>
                                   <th scope="row">Mid Term</th>
                                   <td>{{$intake->mid_term}}</td>
                                 </tr>
                                 <tr>
                                   <th scope="row">End Date</th>
                                   <td>{{$intake->end_date}}</td>
                                 </tr>
                                 <tr>
                                   <th scope="row">Duration</th>
                                   <td>{{$intake->duration}}</td>
                                 </tr>
                                 <tr>
                                   <th scope="row">Holiday Start</th>
                                   <td>{{$intake->holiday_start}}</td>
                                 </tr>
                                 <tr>
                                   <th scope="row">Holiday End</th>
                                   <td>{{$intake->holiday_end}}</td>
                                 </tr>
                                 <tr>
                                   <th scope="row">Holiday Duration</th>
                                   <td>{{$intake->holiday_duration}}</td>
                                 </tr>
                                 <tr>
                                   <th scope="row">Credential Release</th>
                                   <td>{{$intake->credential_release}}</td>
                                 </tr>

                               </tbody>
                             </table>
                           </div>
                         </div>
                        </div>
                      @endif
                    @endforeach
                  </div>
                  </div>
                  @endforeach
          </div>
          <div class="tab-pane fade @if ($subpage_id == 21) show active @endif" id="Tabs_4-21" role="tabpanel">
            @foreach ($modules as $mod)
@if($mod['module']['title'] == "Orientation")
                @foreach ($mod['module']['content'] as $module)
                  <div class="col-md-12 marginBottom-15 wow" data-wow-delay=".1s">
                    <div class="media border rounded p-4">

                      <div class="media-body ml-4">
                        <h5 class="border-bottom mb-4">
                            {{$module['title']}}
                        </h5>
                        {!!html_entity_decode($module['description'])!!}
                      </div>
                    </div>
                  </div>
                @endforeach
              @endif
            @endforeach
          </div>
        </div> <!-- END tab-content-->
      </div> <!-- END col-12 -->
    </div> <!-- END row-->
  </div> <!-- END container-->
</section> <!-- END section-->




@endsection

@section('script')
  <script>
  $(document).ready(function() {
    // $('.country_filter').change(function(event) {
        // var val = $(this).val();
        $.post('{{url('/')}}/course/country_filter',{id:<?= $country_index; ?>},function(data){
            $('#filterFees').html(data);
            $('#filterFees').css('display','block');
        })
    // });
    // $(".country_filter").val(<?= $country_index; ?>).change();
    // $('.country_filter').prop('selectedIndex', <?= $country_index; ?>);
  });
  </script>
@endsection
