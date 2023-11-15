<!-- resources/views/components/input-field.blade.php -->
<div class="form-group main-container" id="div_{{$name}}">
    <label for="{{ $name }}">{{ $label }}</label>
        <div class="col-md-8">
        <input type="{{$type}}" name="{{ $name }}" id="{{ $name }}" {{ $attributes }} class="form-control" value="" placeholder="Enter {{$name}}">
        </div>
        <a class="delete-button btn-btn-danger" onclick="deletediv('div_{{$name}}')">
            <i class="fa fa-trash"></i>
        </a>
</div>
