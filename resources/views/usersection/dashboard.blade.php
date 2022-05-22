@extends('userlayouts.layouts.header_auth')
@section('content')
<body>
   <div class="exc-box-0">
      <!--portfolio-start--->
      <div class="excc-1">
         <div class="eexc-head-text">
            Coin Balance
         </div>
         <div class="excc-acc-ou-4-4"> <img style="margin-top: -4px; padding-top: 0px; float: left; padding-right: 10px;" src="images/download-icon.png"> Download</div>
         <div class="exchange-package-4">
            <table class="small_tb1" cellspacing="4px" cellpadding="4px" border="0">
               <tbody>
                  <tr>
                     <td>
                        <div class="exchange-border-2">Date &amp; Tim</div>
                     </td>
                     <td>
                        <div class="exchange-border-2">Quantity</div>
                     </td>
                     <td>
                        <div class="exchange-border-2">Coin Pair</div>
                     </td>
                  </tr>
                  @foreach($coin as $coinval)
                  <tr>
                     <td>
                        <div class="exchange-border-3">{{ $coinval->coinname }}</div>
                     </td>
                     <td>
                        <div class="exchange-border-3"><span>100</span></div>
                     </td>
                     <td>
                        <div class="exchange-border-3">{{ $coinval->symbol }}</div>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
         <div class="excc-bpx-1">
            {!! $coin->links() !!}
         </div>
      </div>
      <!--portfolio-end--->
   </div>
</body>
@endsection