@extends('layouts.app')
@section('styles', '')
@section('meta-title', 'Custom Price Generator')

@section('content')

<CENTER>
    @include('..common.header')
</center>
<form method="post" action="/s/pid/pidgen">
    @csrf
    <CENTER>
        <table width="750" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td width="2" valign="top" align="left"><img src="../images/2x2black.jpg" width="2" height="550" alt="" border="0"></td>
                <td width="5" valign="top" align="left">&nbsp;</td>
                <td width="738" valign="top" align="left">
                    <br>
                    <center><h3>Custom Price Generator</h3></center>

                    <center>

                        <table width=300 border=0 cellpadding=0 cellspacing=0 bgcolor="#ffcc66">
                            <tr><td colspan=2 height=0 bgcolor=silver align=center valign=middle><b>Rectangle/Square</b></td></tr>
                            <tr><td height=10 colspan=2>&nbsp;</td></tr>
                            <tr><td width=30% align=right valign=middle>Length:</td><td align = left valign = middle><input name="txtLenFt" size="4" maxlength="4"> feet, <input name="txtLenIn" size="4" maxlength="4" value="0"> inches.<br></td></tr>
                            <tr><td align=right valign=middle>Width:</td><td align=left valign=middle><input name="txtWidthFt" size="4" maxlength="4"> feet, <input name="txtWidthIn" size="4" maxlength="4" value="0"> inches.<br></td></tr>
                            <tr><td align=right valign=middle>Material:</td><td align=left valign=middle>@include('custom_price_generator.parts.material_select')<br></td></tr>
                            <tr><td align=right valign=middle>Color:</td><td align=left valign=middle>@include('custom_price_generator.parts.color_select')<br><input type="hidden" name="txtShape" value="1"></td></tr>
                            <tr><td align=middle valign=middle colspan=2><hr><input type="submit" value="Get price!"></form></td></tr>
</table>

<table width=300 border=0 cellpadding=0 cellspacing=0 bgcolor="#ffcc66">
    <tr><td colspan=2 height=30 bgcolor=silver align=center valign=middle><b>Circle</b></td></tr>
    <tr><td height=10 colspan=2>&nbsp;</td></tr>
    <tr><td width=30% align=right valign= middle><form method="post" action="/s/pid/pidgen">Diameter:</td><td align = left valign = middle>@csrf<input name="txtDiameterFt" size="4" maxlength="4"> feet, <input name="txtDiameterIn" size="4" maxlength="4"> inches.<br></td></tr>
    <tr><td align=right valign=middle>Material:</td><td align=left valign=middle>@include('custom_price_generator.parts.material_select')<br></td></tr>
    <tr><td align=right valign=middle>Color:</td><td align=left valign=middle>@include('custom_price_generator.parts.color_select')<br><input type="hidden" name="txtShape" value="2"></td></tr>
    <tr><td align=middle valign=middle colspan=2><hr><input type="submit" value="Get price!"></td></tr>
</table>
</td>
</tr>
</table>
</center>
</form>
@endsection
