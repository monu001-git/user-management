@extends('front.layouts.app')

@section('content')



<h1>menu</h1>
@if(isset($dmenuName) && count($dmenuName) > 0)
@foreach ($menuName as $menuNames)
{{ $menuNames->name }}
@endforeach
@else
<p>No menu items available.</p>
@endif


<h1>banner</h1>
@if(isset($bannerData) && count($bannerData) > 0)
@foreach ($bannerData as $bannerDatas)
{{ $bannerDatas->name }}
@endforeach
@else
<p>No banner items available.</p>
@endif

<h1>orgination</h1>

{{ $orgData->name ?? 'o orgination items available' }}


<h1>footer menu</h1>
@if(isset($footerMenu) && count($footerMenu) > 0)
@foreach ($footerMenu as $footerMenus)
{{ $footerMenus->name }}
@endforeach
@else
<p>No Footer items available.</p>
@endif



@endsection
