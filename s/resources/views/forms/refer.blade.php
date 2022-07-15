@extends('layouts.app')

@section('meta-title', 'D.S. Sewing Refer a friend!')
@section('robots', 'noindex,nofollow')

@section('content')
    <div class="container mt-0 mb-0 pt-0">
        <div class="row">
            @include('common.header')
        </div>

        <div class="col-12 d-flex justify-content-center text-center">
            <h2>Refer A Friend</h2>
        </div>

        <div class="col-12 d-flex justify-content-center text-center">
            @isset($form)
                <form action="/s/refer" method="POST" id="form1" name="form1">
                    @csrf
                    <table width="400px">
                        <tbody>
                        <tr style="margin-bottom: 10px;">
                            <td>Your Email Address</td>
                            <td><input name="yourEmail"></td>
                        </tr>
                        @error('yourEmail') <tr><td style="padding: 0;" class="alert alert-danger" colspan="2">{{ $message }}</td></tr> @enderror
                        <tr>
                            <td>Friends Email</td>
                            <td><input name="friendEmail"></td>
                        </tr>
                        @error('friendEmail') <tr><td style="padding: 0;" class="alert alert-danger" colspan="2">{{ $message }}</td></tr> @enderror
                        <tr>
                            <td style="padding-top: 15px;" align="center" colspan="2"><input type="SUBMIT" name="SUB1" value="Send email"></td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            @else
                Thanks for recommending D.S. Sewing to your friend!
            @endisset
        </div>
    </div>
@endsection