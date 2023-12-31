<!-- resources/views/components/input-field.blade.php -->
<div class="row" id="div_{{$name}}">
    <label for="{{ $name }}" class="fw-bolder">{{ $label }} @if($required) <span style="color: red;">*</span> @endif</label>
        <div class="col-md-8">
        <input type="{{$type}}" name="{{ $name }}" id="{{ $name }}" {{ $attributes }} class="form-control" value="" placeholder="{{$placeholder}}" @if($required) required @endif>
        </div>
        <div class="col-md-2">
            <a class="delete-button btn-btn-danger text-danger" onclick="deletediv('div_{{$name}}')">
                <i class="fa fa-trash"></i>
            </a>
        </div>
</div> 

<!-- <tr id="div_{{$name}}">
    <td>
        <label class="fw-bolder" for="{{ $name }}">{{ $label }}</label>
        <input type="{{$type}}" name="{{ $name }}" id="{{ $name }}" {{ $attributes }} class="form-control" value="" placeholder="Enter {{$name}}">
    </td>
    <td>
        <a class="delete-button btn-btn-danger text-danger" onclick="deletediv('div_{{$name}}')">
            <i class="fa fa-trash"></i>
        </a>
    </td>
</tr>
 -->