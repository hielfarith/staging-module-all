{{-- <div class="row" id="div_{{$name}}">
    <label for="{{ $name }}" class="fw-bolder">{{ $label }} @if($required) <span style="color: red;">*</span> @endif</label>
    <div class="col-md-8">
        <input type="file" name="{{ $name }}" id="{{ $name }}" {{ $attributes }} class="form-control" value="" placeholder="{{$placeholder}}" @if($required) required @endif>
    </div>
    <div class="col-md-2">
        <a class="delete-button btn-btn-danger text-danger" onclick="deletediv('div_{{$name}}')">
           <span>
           <i class="fa fa-trash"></i>
           </span>
        </a>
    </div>
</div>
<br> --}}

<tr id="div_{{$name}}">
    <td style="width: 95%">
        <label class="fw-bolder mb-1" for="{{ $name }}">{{ $label }}
            @if($required)
                <span class="text-danger">*</span>
            @endif
        </label>
        <input type="file" name="{{ $name }}" id="{{ $name }}" {{ $attributes }} class="form-control" value="" placeholder="{{$placeholder}}" @if($required) required @endif>
    </td>
    <td style="width: 5%">
        <div class="d-flex justify-content-end align-items-center mt-2">
            <a class="delete-button btn-btn-danger text-danger" onclick="deletediv('div_{{$name}}')">
                <i class="fa fa-trash"></i>
            </a>
        </div>
    </td>
</tr>
