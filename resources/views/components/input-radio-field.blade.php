<div class="row" id="div_{{$name}}">
    <label for="{{ $name }}" class="fw-bolder">{{ $label }} @if($required) <span style="color: red;">*</span> @endif</label>
    <div class="col-md-8">
        {{ $slot }}
    </div>
    <div class="col-md-2">
        <a class="delete-button btn-btn-danger text-danger" onclick="deletediv('div_{{$name}}')">
            <span>
                <i class="fa fa-trash"></i>
            </span>
        </a>
    </div>
</div> 