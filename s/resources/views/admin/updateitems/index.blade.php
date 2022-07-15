@extends('admin.layouts.app')

@section('content')
    <div class="page-header">
        <h1>UpdateItems</h1>
    </div>

    <div class="row">
        <div id="main">
            <button type="button" class="btn btn-primary" onclick="start(this)">Start</button>
            <hr>
            <div class="row">
                <div class="col-2">
                    <span>Database data</span>
                </div>
                <div class="col-2">
                    <span>File data</span>
                </div>
                <div class="col-2">
                    <span>Result</span>
                </div>
            </div>
            <div id="line"></div>
        </div>
    </div>
@endsection

<script>
    function start(el) {
        event.preventDefault();
        $(el).text('Next Line');
        readLine();
    }

    function readLine() {
        event.preventDefault();
        $.ajax({
            method: "GET",
            url: "/s/admin/updateitems/getline",
        }).done(function(html) {
            $('#line').html(html);
        });
    }

    function saveData() {
        event.preventDefault();
        var formData = $('#result-form').serializeArray();
        $.ajax({
            method: "POST",
            url: "/s/admin/updateitems/storeline",
            data: formData,
        }).done(function(html) {
            readLine();
        });
    }

</script>