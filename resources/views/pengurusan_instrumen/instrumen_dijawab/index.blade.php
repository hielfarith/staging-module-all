@foreach($arrays as $array)
@if( in_array($array['type'], ['text', 'number']))
@if(in_array($array['name'], ['form_name','category_name']))
@php
if ($array['name'] == 'form_name') {
$value = $form_name;
} else {
$value = $category;
}
@endphp
<div class="form-group main-container">
    <label>{{$array['label']}}</label>
    <input type="{{$array['type']}}" name="{{$array['name']}}" id="{{$array['name']}}" value="{{$value}}" readonly
        class="form-control">
</div>
@else
<x-input-field type="{{$array['type']}}" name="{{$array['name']}}" value="{{$data[$array['name']]}}" readonly required
    label="{{$array['label']}}" />
@endif
@elseif($array['type'] == 'select')
<div class="form-group main-container">
    <label>{{$array['label']}}</label>
    <div class="col-md-8">
        <select class="form-control" disabled>
            <option>{{$data[$array['name']]}}</option>
        </select>
    </div>
</div>
@elseif($array['type'] == 'file')
<div class="form-group main-container">
    <label>{{$array['label']}}</label>
    <?php
        $url = route('download',['id' => $id,'name' => $array['name']]);
    ?>
    <a href="{{$url}}" class="btn btn-primary">Download File</a>
</div>
@endif
@endforeach
