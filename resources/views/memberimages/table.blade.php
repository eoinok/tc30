<div class="table-responsive">
    <table class="table" id="memberimages-table">
        <thead>
        <tr>
            <th>Memberid</th>
            <th>Description</th>
            <th>Imagefile</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($memberimages as $memberimages)
            <tr>
                <td>{{ $memberimages->memberid }}</td>
                <td>{{ $memberimages->description }}</td>
                <td>
                    <img class="img-responsive center-block" height="200" width="100" 
                        src="data:image/jpeg;base64,{{$memberimages->imagefile}}">
                </td>
                <td width="120">
                    {!! Form::open(['route' => ['memberimages.destroy', $memberimages->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('memberimages.show', [$memberimages->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('memberimages.edit', [$memberimages->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
