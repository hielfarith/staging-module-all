{{-- <div class="form-group main-container" id="div_{{$name}}">
    <label for="{{ $name }}">{{ $label }}</label>
    <div class="col-md-8">
        <input type="file" name="{{ $name }}" id="{{ $name }}" {{ $attributes }} class="form-control" value="">
    </div>
        <a class="delete-button btn-btn-danger" onclick="deletediv('div_{{$name}}')">
           <span>
           <i class="fa fa-trash"></i>
           </span>
        </a>
</div> --}}

<tr id="div_{{$name}}">
    <td>
        <label class="fw-bolder" for="{{ $name }}">{{ $label }}</label>
        <input type="file" name="{{ $name }}" id="{{ $name }}" {{ $attributes }} class="form-control" value="">
    </td>
    <td>
        <a class="delete-button btn-btn-danger text-danger" onclick="delete_attribute('div_{{$name}}')">
            <i class="fa fa-trash"></i>
        </a>
    </td>
</tr>
