<table class="table header_uppercase table-bordered table-responsive" width="100%">
    <thead>
        <tr>
            <th class="font-weight-bold text-center" width="05%">INDEX</th>
            <th class="font-weight-bold text-center" width="30%">NAME</th>
            <th class="font-weight-bold text-center" width="35%">DESCRIPTION</th>
            <th class="font-weight-bold text-center" width="5%">ACTION</th>
        </tr>
    </thead>
    <tbody>
        @if($module->statuses->count() == 0)
        <tr class="text-center">
            <td colspan="4">No Data Available</td>
        </tr>
        @endif
        @foreach ($module->statuses as $status)
        <tr>
            <td>{{ $status->status_index }}</td>
            <td style="padding: 0.72rem 1rem;text-align:center;"><span class="badge rounded-pill badge-light-{{$status->status_color}} text-wrap px-1">{{ $status->status_name }}</span></td>
            <td>{{ $status->status_description }}</td>
            <td>
                <form action="{{ route('module.deleteStatus') }}" method="POST" data-refreshFunctionDivId="moduleStatusTable" data-refreshFunctionURL="{{route('module.refreshModuleStatusTable',$module)}}">
                    @csrf
                    <input type="hidden" name="module_status_id" value="{{$status->id}}">
                    <button type="button" id="btnDeleteStatus_{{$status->id}}" hidden onclick="confirmBeforeSubmit(this);"></button>
                </form>
                <div class="btn-group" role="group" aria-label="Action">
                    <a type="button" class="btn btn-outline-dark waves-effect" onclick="viewModuleStatusForm('{{$status->id}}')" data-bs-toggle="tooltip" title="Edit {{$status?->status_name }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a type="button" class="btn btn-outline-dark waves-effect" onclick="$('#btnDeleteStatus_{{$status->id}}').trigger('click');" data-bs-toggle="tooltip" title="Delete {{$status?->status_name }}">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
