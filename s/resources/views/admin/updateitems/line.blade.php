<hr>
<div class="row">
    <div class="col-2">
        @foreach($dbData as $field => $item)
            <div class="form-group col-6">
                <label for="exampleInputName2">{{$field}}</label>
                <input type="text" class="form-control" id="db-{{$field}}" value="{{$item}}">
            </div>
        @endforeach
    </div>
    <div class="col-2">
        @foreach($fileData as $field => $item)
            <div class="form-group col-6">
                <label for="exampleInputName2">{{$field}}</label>
                <input type="text" class="form-control" id="file-{{$field}}" value="{{$item}}">
            </div>
        @endforeach
    </div>
    <div class="col-2">
        <form id="result-form">
            @csrf
            @foreach($fileData as $field => $item)
                <div class="form-group col-6">
                    <label for="exampleInputName2">{{$field}}</label>
                    <input type="text" class="form-control" id="result-{{$field}}" name="{{$field}}" value="{{$item}}">
                </div>
            @endforeach
        </form>
    </div>
</div>
<div class="col-3 pt-2">
    <button class="btn btn-success" onclick="saveData()">Save Data</button>
</div>
<hr>