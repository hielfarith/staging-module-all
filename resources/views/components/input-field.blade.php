<!-- resources/views/components/input-field.blade.php -->
{{-- <div class="form-group main-container" id="div_{{$name}}">
    <label for="{{ $name }}">{{ $label }}</label>
        <div class="col-md-8">
        <input type="{{$type}}" name="{{ $name }}" id="{{ $name }}" {{ $attributes }} class="form-control" value="" placeholder="Enter {{$name}}">
        </div>
        <a class="delete-button btn-btn-danger" onclick="deletediv('div_{{$name}}')">
            <i class="fa fa-trash"></i>
        </a>
</div> --}}

<tr id="div_{{$name}}">
    <td>
        <label class="fw-bolder" for="{{ $name }}">{{ $label }}</label>
        <input type="{{$type}}" name="{{ $name }}" id="{{ $name }}" {{ $attributes }} class="form-control" value="" placeholder="Enter {{$name}}">
    </td>
    <td>
        <a class="delete-button btn-btn-danger text-danger" onclick="delete_attribute('div_{{$name}}')">
            <i class="fa fa-trash"></i>
        </a>
    </td>
</tr>
