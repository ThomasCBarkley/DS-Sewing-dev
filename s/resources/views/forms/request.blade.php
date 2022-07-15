@extends('layouts.app')

@section('content')
    <div class="container mt-0 mb-0 pt-0">
        <div class="row">
            @include('common.header')
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center text-center">
                <div class="bg-white custom-container">
                    <h2>Request A Catalog</h2>
                    <p>Please fill out the following information. We will rush a catalog to you as quickly as
                        possible.</p>
                    {!! Form::open(['s/forms/request', 'method' =>'POST']) !!}
                    <table width="600px" border="0" class="text-lg-start">
                        <tbody><tr>
                            <td colspan="2">
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table>
                                    <tbody><tr>
                                        <td><b>Please choose the catalog(s) you wish to receive.</b></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="truck" value="1">Truck Tarp English</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="tough" value="1">Tough Tarp</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="drydock" value="1">Dry-Dock Covers</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="bannerblank" value="1">Truck Tarp Spanish</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="ingroundpool" value="1">Inground Pool Covers</td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="industrial" value="1">Industrial Sewing &amp; Heat Sealing</td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td><input type="checkbox" name="fabricsample" value="1">Fabric Sample</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <font color="Red"><b>We can custom sew almost <u>anything</u>!</b></font><b> If you can't find what you are
                                                looking for please enter a description. We'll contact you ASAP.</b>
                                        </td>
                                        <td><textarea cols="40" name="comments" rows="10"></textarea></td>
                                    </tr>

                                    </tbody></table>
                                <table>

                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Name</b></td>
                            <td><input size="25" maxlength="40" name="name" value="{{ old('Name') }}">
                                <font color="blue">*</font>
                                @error('name')
                                    <div class="alert alert-danger p-0 w-50">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><b>Address 1</b></td>
                            <td><input size="25" maxlength="50" name="address1" value="{{ old('address1') }}">
                                <font color="blue">*</font>
                                @error('address1')
                                    <div class="alert alert-danger p-0 w-50">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><b>Address 2</b></td>
                            <td><input size="25" maxlength="50" name="address2" value="{{ old('address2') }}"> </td>
                        </tr>
                        <tr>
                            <td><b>City</b></td>
                            <td><input maxlength="30" name="city" value="{{ old('city') }}">
                                <font color="blue">*</font>
                                @error('city')
                                    <div class="alert alert-danger p-0 w-50">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><b>State</b></td>
                            <td><input size="2" maxlength="2" name="state" value="{{ old('state') }}">
                                <font color="blue">*</font>
                                @error('state')
                                <div class="alert alert-danger p-0 w-50">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><b>Zip</b></td>
                            <td><input size="10" maxlength="10" name="zip" value="{{ old('zip') }}">
                                <font color="blue">*</font>
                                @error('zip')
                                <div class="alert alert-danger p-0 w-50">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><b>Phone</b></td>
                            <td><input size="11" maxlength="20" name="phone" value="{{ old('phone') }}"></td>
                        </tr>
                        <tr>
                            <td><b>Email</b></td>
                            <td><input size="35" maxlength="50" name="email" value="{{ old('email') }}"></td>
                        </tr>
                        <tr>
                            <td><b>If you found us
                                    through a search engine <br> (
                                    excite,lycos,altavista etc )<br>please tell us
                                    which one</b></td>
                            <td><input size="35" maxlength="50" name="searchengine" value="{{ old('searchengine') }}"></td>
                        </tr>
                        <tr>
                            <td><b>Which keywords did you use to find us</b></td>
                            <td><input size="35" maxlength="50" name="goodwords" value="{{ old('goodwords') }}"></td>
                        </tr>
                        <tr>
                            <td><b>Which keywords did not work to find us</b></td>
                            <td><input size="35" maxlength="50" name="badwords" value="{{ old('badwords') }}"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><input type="submit" value="Submit Request">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width="65" cellpadding="6" bordercolor="#ffffff" border="6" bgcolor="#dcdcdc">

                                </table>
                            </td>
                            <td></td>
                        </tr>
                        </tbody></table>
                    {!! Form::close() !!}
                    <center>
                    <table>
                        <tbody><tr>
                            <td>
                                <p>
                                    <font size="-1" face="Arial">Thank you very much for your interest,</font>
                                </p>
                                <p align="right"><img src="/images/signature.gif" width="250" height="54" align="bottom"></p>
                                <p align="right">
                                    <font size="-1" face="Arial">David Steinhardt <br>
                                        President D.S. Sewing,
                                        Inc</font>
                                </p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    </center>
                </div>
            </div>
        </div>
        <div class="row">
            @include('common.footer')
        </div>
    </div>
@endsection
