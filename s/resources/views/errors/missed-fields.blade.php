@extends('layouts.app')
@section('robots', 'noindex,nofollow')
@section('styles', '')

@section('content')
@include('common.header')
<TABLE BORDER="0" CELPADDING="1" CELLSPACING="2" BGCOLOR="#ffcc66">
    <TR BGCOLOR="#ffaa00">
        <TD ALIGN="CENTER" COLSPAN="2"><FONT SIZE="+3">Missing Required Fields</FONT></TD>
    </TR>
    <TR>
        <TD><FONT VALIGN="TOP" ALIGN="CENTER" COLOR="Red">We can not complete your order without the following information.<BR>
                Please click <B><U>BACK</U></B> in your browser and fill in the required fields.</FONT></TD>
        <TD	ALIGN="LEFT">
            <OL>
                @foreach($missed as $item)
                    <LI>{{$item}}</LI>
                @endforeach
            </OL>
        </TD>
    </TR>
</TABLE>
@endsection
